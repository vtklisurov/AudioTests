function isEmpty(str) {
    return (!str || 0 === str.length);
}
var theTest;

function LoadTest(file){
	fetch(file, {
		cache: "reload"
	}).then(function(resp) {
		return resp.json();
	}).then(function(test) {
		theTest = test;
		var testBody = document.getElementById('test_body');
		var index = 0;
		for (question of test.Questions) {
			var questionDiv = document.createElement('div');
			questionDiv.className = 'Question_Boby';
			testBody.appendChild(questionDiv);

			var questionText = document.createElement('h2');
			questionText.className = 'Question_texst';
			questionText.textContent = question.question_text;
			questionDiv.appendChild(questionText);

			if (!isEmpty(question.question_audio)) {
				var audioTag = document.createElement('AUDIO')
				audioTag.className = 'Question_audio';
				audioTag.textContent = 'Your browser does not support the audio tag.';
				audioTag.setAttribute("controls", "controls");
				audioTag.setAttribute("src", question.question_audio);
				audioTag.setAttribute('type', "audio/mpeg");
				questionDiv.appendChild(audioTag);
			}

			switch (question.question_type) {
				case 'MultiChoiceText':
                    var buttonGroup = document.createElement("div");
                    buttonGroup.className = "MultyButton";

					var answerA = document.createElement("BUTTON");
					answerA.innerHTML = question.available_answers[0];
					answerA.setAttribute("data-qnum", index);
					answerA.className = 'text-button';
					questionDiv.appendChild(buttonGroup );
					buttonGroup.appendChild(answerA);
					answerA.addEventListener('click', clickTextButon);

					var answerB = document.createElement("BUTTON");
					answerB.innerHTML = question.available_answers[1];
					answerB.className = 'text-button';
					answerB.setAttribute("class", 'text-button');
					answerB.setAttribute("data-qnum", index);
					buttonGroup.appendChild(answerB);
					answerB.addEventListener('click', clickTextButon);

					var answerC = document.createElement("BUTTON");
					answerC.innerHTML = question.available_answers[2];
					answerC.className = 'text-button';
					answerC.setAttribute("data-qnum", index);
					buttonGroup.appendChild(answerC);
					answerC.addEventListener('click', clickTextButon);
					break;

				case 'MultiChoiceAudio':
                    var buttonGroup = document.createElement("div");
                    buttonGroup.className = "MultyButton";

					var answerA = document.createElement("BUTTON");
					answerA.innerHTML = "Отговор А";
					answerA.setAttribute("data-qnum", index);
					answerA.setAttribute("data-anum", "A");
					answerA.setAttribute("data-audioSrc", question.available_answers[0]);
					answerA.className = 'audio-button';
					questionDiv.appendChild(buttonGroup);
					buttonGroup.appendChild(answerA);
					var audioAnswer = document.createElement('audio');
					audioAnswer.id = index + "audioAnswer";
					questionDiv.appendChild(audioAnswer);
					answerA.addEventListener('mouseover', hoverAudioAnswer);
					answerA.addEventListener('mouseout', hoverOutAudioAnswer);
					answerA.addEventListener('click', onAudioAnswer);

					var answerB = document.createElement("BUTTON");
					answerB.innerHTML = "Отговор Б";
					answerB.setAttribute("data-qnum", index);
					answerB.setAttribute("data-anum", "A");
					answerB.setAttribute("data-audioSrc", question.available_answers[1]);
					answerB.className = 'audio-button';
					buttonGroup.appendChild(answerB);
					answerB.addEventListener('mouseover', hoverAudioAnswer);
					answerB.addEventListener('mouseout', hoverOutAudioAnswer);
					answerB.addEventListener('click', onAudioAnswer);

					var answerC = document.createElement("BUTTON");
					answerC.innerHTML = "Отговор В";
					answerC.setAttribute("data-qnum", index);
					answerC.setAttribute("data-anum", "C");
					answerC.setAttribute("data-audioSrc", question.available_answers[2]);
					answerC.className = 'audio-button';
					buttonGroup.appendChild(answerC);
					answerC.addEventListener('mouseover', hoverAudioAnswer);
					answerC.addEventListener('mouseout', hoverOutAudioAnswer);
					answerC.addEventListener('click', onAudioAnswer);
					
					var help = document.createElement('p');
					help.innerHTML = "Поставете курсура върху бутон за да чуете аудиото.";
					questionDiv.appendChild(help);
					break;

				case 'TextInput':

                    var buttonGroup         = document.createElement("div");
                    buttonGroup.className   = "MultyButton";

					var textInput = document.createElement('input');
					textInput.setAttribute("type", 'text');
					textInput.setAttribute("placeholder", 'Твоя отговор...');
					textInput.setAttribute("data-qnum", index);
					textInput.className = 'input_text';
					questionDiv.appendChild(buttonGroup);
					buttonGroup.appendChild(textInput);

					var check = document.createElement("BUTTON");
					check.innerHTML = 'Провери отговора';
					check.className = 'text-button';
					check.setAttribute("data-qnum", index);
					buttonGroup.appendChild(check);
					check.addEventListener('click', clickTextinpit);
					break;

				case 'MultiChoicePicture':

                    var buttonGroup         = document.createElement("div");
                    buttonGroup.className   = "MultyButton";

					var imgA = document.createElement('img');
					imgA.src=question.available_answers[0];
					imgA.classList.add('img_answer');
					imgA.setAttribute("data-qnum", index);
					imgA.addEventListener('click', clickImgInpit )
					questionDiv.appendChild(buttonGroup);
					buttonGroup.appendChild(imgA);

					var imgB = document.createElement('img');
					imgB.src=question.available_answers[1];
					imgB.classList.add('img_answer');
					imgB.setAttribute("data-qnum", index);
					imgB.addEventListener('click', clickImgInpit )
					buttonGroup.appendChild(imgB);
					
					var imgC = document.createElement('img');
					imgC.src=question.available_answers[2];
					imgC.classList.add('img_answer');
					imgC.setAttribute("data-qnum", index);
					imgC.addEventListener('click', clickImgInpit )
					buttonGroup.appendChild(imgC);
					break;
			}
			index++;
		}
	});
}
function clickTextButon(event) {
    var button = event.path[0];
    var qNum = button.getAttribute('data-qnum');
    var nodes = button.parentElement.childNodes;
    for (nod of nodes) {
        if (nod.className === 'text-button') {
            if (nod.innerHTML != theTest.Questions[qNum].answer) {
                nod.style.background = '#ff0000';
            } else {
                nod.style.background = '#00cc00';
            }
            nod.removeEventListener('click', clickTextButon);
        }
    }
}
function clickTextinpit(event) {
    var button = event.path[0];
    var qNum = button.getAttribute('data-qnum');
    var parent = button.parentElement;
    var nodes = parent.childNodes;
    for (nod of nodes) {
        if (nod.className === 'input_text') {
            if (nod.value != theTest.Questions[qNum].answer) {
                nod.style.background = '#ff0000';
                var anserH = document.createElement('h4');
                anserH.innerHTML = 'Верният отговор е: ' + theTest.Questions[qNum].answer;
                parent.appendChild(anserH);
            } else {
                nod.style.background = '#00cc00';
            }
            nod.readOnly = true;
            button.removeEventListener('click', clickTextinpit);
        }
    }
}


function clickImgInpit(event) {
	var img = event.path[0];
	var qNum = img.getAttribute('data-qnum');
	var anserH = document.createElement('h4');
    img.parentElement.appendChild(anserH);
    var answer = theTest.Questions[qNum].answer.replace("..", "");
	if(img.src.endsWith(answer)){
		anserH.innerHTML = 'Верен отговор.';
	}
	else{
		anserH.innerHTML = 'Грешен отговор.';
	}
	var nodes = img.parentElement.childNodes;
    for (nod of nodes) {
		 if (nod.tagName == 'IMG') {
			 nod.removeEventListener('click', clickImgInpit);
		 }
	}
}

function hoverAudioAnswer(event){
	var btn = event.path[0];
	var qNum = btn.getAttribute('data-qnum');
	var ANum = btn.getAttribute('data-anum');
	var audioSrc = btn.getAttribute('data-audioSrc');
	var audio = document.getElementById(qNum + 'audioAnswer' )
	audio.src = audioSrc;
	audio.play();
}

function hoverOutAudioAnswer(event){
	var btn = event.path[0];
	var qNum = btn.getAttribute('data-qnum');
	var ANum = btn.getAttribute('data-anum');
	var audio = document.getElementById(qNum + "audioAnswer" )
	audio.pause();
}
function onAudioAnswer(event){
	var btn = event.path[0];
	var qNum = btn.getAttribute('data-qnum');
	var ANum = btn.getAttribute('data-anum');
	var audio = document.getElementById(qNum + "audioAnswer" )
	audio.pause()

	var nodes = btn.parentElement.childNodes;
    for (nod of nodes) {
		 if (nod.tagName == 'BUTTON') {
		     var answer     = theTest.Questions[qNum].answer.replace("..", "");
             var audioSrc   = nod.getAttribute('data-audioSrc');
			 if(audioSrc.endsWith(answer)){
				nod.style.background = '#00cc00';
            } else {
                nod.style.background = '#ff0000';
				}
			 nod.removeEventListener('click', onAudioAnswer);
		 }
	}
}