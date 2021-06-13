<?php
header('Content-Type: text/html; charset=utf-8');
require '../../../../../home/ec2-user/vendor/autoload.php';

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

//setup variables
include '../credentials.php';

$s3 = new Aws\S3\S3Client([
	'region'  => 'us-east-1',
	'version' => 'latest',
	'credentials' => [
	    'key'    => $key,
	    'secret' => $secretkey,
		'token' => $sessiontoken,
	]
]);

$audioPath= "../Audio/";
$imagePath= "../Images/";
$testPath= "../Tests/";
$domain="http://ec2-52-54-235-211.compute-1.amazonaws.com";


//connect to the database
$conn = new mysqli($serverName, $userName, $password, $dbName);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8");


//find what ID this test will have
$id=0;
$result = $conn->query("SELECT MAX(id) FROM tests");

while ($row = $result->fetch_assoc()) {
	$id=$row["MAX(id)"]+1;
}

//get the name of the test and sanitize it because it will be going into the database
$testName = filter_var($_POST["testName"], FILTER_SANITIZE_STRING);

//declare the array from which the JSON will be created, as well as the indeces for the audio files, the images and the questions, needing extra files
$arr = [];
$audioindex=0;
$imageindex=0;

$finfo = finfo_open(FILEINFO_MIME_TYPE);

$textquestion = 0;
$filequestion = 0;

//process the questions
for ($x = 0; $x <= count($_POST["type"])-1; $x++) {
	
	//check the file type of the question's audio
	if (isset($_FILES['question_audio']['tmp_name'][$x]) && $_FILES['question_audio']['tmp_name'][$x] != "") {
		$mime = finfo_file($finfo, $_FILES['question_audio']['tmp_name'][$x]);
		if ($mime != 'audio/mpeg') {
			echo "Wrong file";
			die();
		}
	}
	
	//switch on the different question types
	switch ($_POST["type"][$x]) {
		//multiple choice text
		case "mtext":
		
		//parse the information from the form
		$type = "MultiChoiceText";
		$text = addslashes($_POST["question_text"][$textquestion]);
		if (isset($_FILES['question_audio']['tmp_name'][$x]) && $_FILES['question_audio']['tmp_name'][$x] != "") $qaudio = $audioPath . $id . "-". $audioindex . '.' . @end((explode(".", $_FILES["question_audio"]["name"][$x])));
		else $qaudio = "";
		$answer1= $_POST["answer1"][$textquestion];
		$answer2= $_POST["answer2"][$textquestion];
		$answer3= $_POST["answer3"][$textquestion];
		$correct = $_POST["correct"][$x];
		switch ($correct) {
			case "1": 
				$correct=$answer1;
				break;
			case"2":
				$correct=$answer2;
				break;
			case"3":
				$correct=$answer3;
				break;
		}
		
		//save the file if it exists
		if (isset($_FILES['question_audio']['tmp_name'][$x])) {
			move_uploaded_file($_FILES["question_audio"]["tmp_name"][$x], $audioPath . $id . "-". $audioindex++ . '.' . @end((explode(".", $_FILES["question_audio"]["name"][$x]))) );
			
			//$s3->putObject([
				//'Bucket' => 'audio-tests-project',
				//'Key'    => $audioPath . $id . "-". $audioindex++ . '.' . @end((explode(".", $_FILES["question_audio"]["name"][$x]))),
				//'SourceFile' => $_FILES['question_audio']['tmp_name'][$x]			
			//]);
		
		}
		
		//put it into the JSON
		array_push($arr,'"question_type": "'.$type.'", "question_text": "' . $text .'", "question_audio": "' . $qaudio . '", "available_answers": ["'. $answer1 . '", "'. $answer2 . '", "' . $answer3 . '"], "answer": "' . $correct . '"' );
		$textquestion++;
		break;
		
	//multiple choice audio
	case "maudio":
	
		//check the file types
		if (isset($_FILES['answer1']['tmp_name'][$filequestion]) && $_FILES['answer1']['tmp_name'][$filequestion] != "") {
			$mime = finfo_file($finfo, $_FILES['answer1']['tmp_name'][$filequestion]);
			if ($mime != 'audio/mpeg') {
				echo "Wrong file";
				die();
			}
		}
		if (isset($_FILES['answer2']['tmp_name'][$filequestion]) && $_FILES['answer2']['tmp_name'][$filequestion] != "") {
			$mime = finfo_file($finfo, $_FILES['answer2']['tmp_name'][$filequestion]);
			if ($mime != 'audio/mpeg') {
				echo "Wrong file";
				die();
			}
		}
		if (isset($_FILES['answer3']['tmp_name'][$filequestion]) && $_FILES['answer3']['tmp_name'][$filequestion] != "") {
			$mime = finfo_file($finfo, $_FILES['answer3']['tmp_name'][$filequestion]);
			if ($mime != 'audio/mpeg') {
				echo "Wrong file";
				die();
			}
		}
	
		//parse the information from the form
		$type = "MultiChoiceAudio";	
		$text = addslashes($_POST["question_text"][$x]);
		if (isset($_FILES['question_audio']['tmp_name'][$x]) && $_FILES['question_audio']['tmp_name'][$x] != "") $qaudio = $audioPath . $id . "-". $audioindex++ . '.' . @end((explode(".", $_FILES["question_audio"]["name"][$x])));
		else $qaudio = "";
		$answer1= $audioPath . $id . "-". $audioindex++ . '.' . @end((explode(".", $_FILES["answer1"]["name"][$filequestion])));
		$answer2= $audioPath . $id . "-". $audioindex++ . '.' . @end((explode(".", $_FILES["answer2"]["name"][$filequestion])));
		$answer3= $audioPath . $id . "-". $audioindex++ . '.' . @end((explode(".", $_FILES["answer3"]["name"][$filequestion])));
		$audioindex = $audioindex - 4;
		$correct = $_POST["correct"][$x];
	
				switch ($correct) {
			case "1": 
				$correct=$answer1;
				break;
			case "2":
				$correct=$answer2;
				break;
			case "3":
				$correct=$answer3;
				break;
		}

		//save the files
		if (isset($_FILES['question_audio']['tmp_name'][$x])) move_uploaded_file($_FILES["question_audio"]["tmp_name"][$x], $audioPath . $id . "-". $audioindex++ . '.' . @end((explode(".", $_FILES["question_audio"]["name"][$x]))) );
		move_uploaded_file($_FILES["answer1"]["tmp_name"][$filequestion], $audioPath . $id . "-". $audioindex++ . '.' . @end((explode(".", $_FILES["answer1"]["name"][$filequestion]))) );
		move_uploaded_file($_FILES["answer2"]["tmp_name"][$filequestion], $audioPath . $id . "-". $audioindex++ . '.' . @end((explode(".", $_FILES["answer2"]["name"][$filequestion]))) );
		move_uploaded_file($_FILES["answer3"]["tmp_name"][$filequestion], $audioPath . $id . "-". $audioindex++ . '.' . @end((explode(".", $_FILES["answer3"]["name"][$filequestion]))) );	
		

		//put it into the JSONS
		array_push($arr,'"question_type": "'.$type.'", "question_text": "' . $text .'", "question_audio": "' . $qaudio . '", "available_answers": ["'. $answer1 . '", "'. $answer2 . '", "' . $answer3 . '"], "answer": "' . $correct . '"' );
		$filequestion++;
		break;
	
	//multiple choice image 
	case "mimage":
	
		//check the file types
		if (isset($_FILES['answer1']['tmp_name'][$filequestion]) && $_FILES['answer1']['tmp_name'][$filequestion] != "") {
			$mime = finfo_file($finfo, $_FILES['answer1']['tmp_name'][$filequestion]);
			if ($mime != 'image/jpeg') {
				echo "Wrong file";
				die();
			}
		}
		if (isset($_FILES['answer2']['tmp_name'][$filequestion]) && $_FILES['answer2']['tmp_name'][$filequestion] != "") {
			$mime = finfo_file($finfo, $_FILES['answer2']['tmp_name'][$filequestion]);
			if ($mime != 'image/jpeg') {
				echo "Wrong file";
				die();
			}
		}
		if (isset($_FILES['answer3']['tmp_name'][$filequestion]) && $_FILES['answer3']['tmp_name'][$filequestion] != "") {
			$mime = finfo_file($finfo, $_FILES['answer3']['tmp_name'][$filequestion]);
			if ($mime != 'image/jpeg') {
				echo "Wrong file";
				die();
			}
		}
	
		//parse the information from the form
		$type = "MultiChoicePicture";	
		$text = addslashes($_POST["question_text"][$x]);
		if (isset($_FILES['question_audio']['tmp_name'][$x]) && $_FILES['question_audio']['tmp_name'][$x] != "") $qaudio = $audioPath . $id . "-". $audioindex . '.' . @end((explode(".", $_FILES["question_audio"]["name"][$x])));
		else $qaudio = "";
		$answer1= $imagePath . $id . "-". $imageindex++ . '.' . @end((explode(".", $_FILES["answer1"]["name"][$filequestion])));
		$answer2= $imagePath . $id . "-". $imageindex++ . '.' . @end((explode(".", $_FILES["answer2"]["name"][$filequestion])));
		$answer3= $imagePath . $id . "-". $imageindex++ . '.' . @end((explode(".", $_FILES["answer3"]["name"][$filequestion])));
		$imageindex = $imageindex - 3;
		$correct = $_POST["correct"][$x];
			switch ($correct) {
			case "1": 
				$correct=$answer1;
				break;
			case "2":
				$correct=$answer2;
				break;
			case "3":
				$correct=$answer3;
				break;
		}

		//save the files
		if (isset($_FILES['question_audio']['tmp_name'][$x])) move_uploaded_file($_FILES["question_audio"]["tmp_name"][$x], $audioPath . $id . "-". $audioindex++ . '.' . @end((explode(".", $_FILES["question_audio"]["name"][$x]))) );
		move_uploaded_file($_FILES["answer1"]["tmp_name"][$filequestion], $imagePath . $id . "-". $imageindex++ . '.' . @end((explode(".", $_FILES["answer1"]["name"][$filequestion]))) );
		move_uploaded_file($_FILES["answer2"]["tmp_name"][$filequestion], $imagePath . $id . "-". $imageindex++ . '.' . @end((explode(".", $_FILES["answer2"]["name"][$filequestion]))) );
		move_uploaded_file($_FILES["answer3"]["tmp_name"][$filequestion], $imagePath . $id . "-". $imageindex++ . '.' . @end((explode(".", $_FILES["answer3"]["name"][$filequestion]))) );
	
		//put it into the json
		array_push($arr,'"question_type": "'.$type.'", "question_text": "' . $text .'", "question_audio": "' . $qaudio . '", "available_answers": ["'. $answer1 . '", "'. $answer2 . '", "' . $answer3 . '"], "answer": "' . $correct . '"' );
		$filequestion++;
		break;
		
	//free text
	default:
	
		//parse the information from the form
		$type = "TextInput";
		$text = addslashes($_POST["question_text"][$x]);
		if (isset($_FILES['question_audio']['tmp_name'][$x]) && $_FILES['question_audio']['tmp_name'][$x] != "") $qaudio = $audioPath . $id . "-". $audioindex . '.' . @end((explode(".", $_FILES["question_audio"]["name"][$x])));
		else $qaudio = "";
		$correct = $_POST["correct"][$x];
		
		//save the file if it exists
		if (isset($_FILES['question_audio']['tmp_name'][$x])) move_uploaded_file($_FILES["question_audio"]["tmp_name"][$x], $audioPath . $id . "-". $audioindex++ . '.' . @end((explode(".", $_FILES["question_audio"]["name"][$x]))) );
	
		//put it into the json
		array_push($arr,'"question_type": "'.$type.'", "question_text": "' . $text .'", "question_audio": "' . $qaudio . '", "answer": "' . $correct . '"');
	
	}
}

finfo_close($finfo);


//create the json
$counter=1;
$json = '{ "Questions" : [';

foreach ($arr as $entry) {
	$json .= "{" . $entry . "}";
	$counter = $counter + 1;
	if ($counter <= count($arr))  $json .= ",";
}

$json .= "] }";

//save the json to a file
$fileloc= $testPath . $id . ".json";
$filename = $id . ".json";
$jsonfile= fopen($testPath . $filename, "w");
fwrite($jsonfile, $json);
fclose($jsonfile);

//insert the needed info into the database
$stmt = $conn->prepare("INSERT INTO tests (name, questions) VALUES (?, ?)");
$stmt->bind_param("ss", $testName, $fileloc);

$stmt->execute();

$stmt->close();
$conn->close();

//output a message on the browser and redirect back to the homepage

echo '<!DOCTYPE html>
<html>
<body style="text-align:center; background-color: #EDE7E3;">
<h1>Тестът беше записан</h1>
<p>Ще бъдете пренасочени след 5 секунди</p>
<script>
var timer = setTimeout(function() {
window.location="'.$domain.'"
}, 5000);
</script>
</body>
</html>';
?>
