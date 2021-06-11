<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Test Page</title>
		<link rel="stylesheet" href="./TestPage.css">
		<script src="test.js?6"></script>
		<?php
		include '../credentials.php'
			if(isset($_GET["TestID"])){

                $TestID         = htmlspecialchars($_GET["TestID"]);
                // Create connection
                $conn = new mysqli($serverName, $userName, $password, $dbName);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT questions  FROM tests WHERE id = ? ";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('i', $TestID);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows == 1) {
                    // output data of each row
                    if($row = $result->fetch_assoc()) {
                        $filepath = $row["questions"];
                    }
                    else{
                        $filepath ='./ExampleTest.json';
                    }
                } else {
                    $filepath ='./ExampleTest.json';;
                }
                $conn->close();
				$filepath;
			}
			else{
				$filepath ='./ExampleTest.json';
			}
			echo "<script type='text/javascript'>
			LoadTest('{$filepath}');
			</script>";
		?>
	</head>
	<body>
	    <header class="pageHeding_doTest">
            <div class= "find_test_link">
                <a class="SelectTest" href='../FindTest/FindTest.php'>Избери Тест</a>
            </div>
            <div class= "create_test_link">
                <a class="CreateTest" href='../CreateTest/CreateTest.html'>Създай тест</a>
            </div>
        </header>
		<div id = "test_body" class = "test_body"></div>
	</body>
</html>
