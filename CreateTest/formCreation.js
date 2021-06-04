var count = 0;

function removeQuestion(elem) {
	var toRemove = document.getElementById(elem.parentNode.id)
	toRemove.parentNode.removeChild(toRemove)
}

function addQuestion(type) {
	count++;
	switch(type) {
		case 1:
			$("#testForm").append('<div id="question'+count+'" class="mtext">' + `<br>
									<textarea id="question_text" name="question_text[]" required></textarea><br>
									<label for="question_audio">Аудио файл (при нужда):</label><br>
									<input type="file" id="question_audio" name="question_audio[]" accept="audio/mpeg" ><br>
									<input type="hidden" name="type[]" value="mtext" />
									<div class="answers"> 
									<label for="answer1">Отговор 1:</label><br>
									<textarea id="answer1" name="answer1[]" required></textarea><br>
									<label for="answer2">Отговор 2:</label><br>
									<textarea id="answer2" name="answer2[]" required></textarea><br>
									<label for="answer3">Отговор 3:</label><br>
									<textarea id="answer3" name="answer3[]" required></textarea><br>
									</div>
									<label for="correct">Верен отговор:</label><br>
									<input type="number" id="correct" name="correct[]" min="1" max="3" required>
									<button class="remove" onclick="removeQuestion(this)">Премахни въпроса</button>
									</div>`
			);
			break;
		case 2:
			$("#testForm").append('<div id="question'+count+'" class="maudio">' + `<br>
									<textarea id="question_text" name="question_text[]" required></textarea><br>
									<label for="question_audio">Аудио файл (при нужда):</label><br>
									<input type="file" id="question_audio" name="question_audio[]" accept="audio/mpeg"><br>
									<input type="hidden" name="type[]" value="maudio" />
									<div class="answers">
									<label for="answer1">Аудио 1:</label><br>
									<input type="file" id="answer1" name="answer1[]" accept="audio/mpeg" required><br>
									<label for="answer2">Аудио 2:</label><br>
									<input type="file" id="answer2" name="answer2[]" accept="audio/mpeg" required><br>
									<label for="answer3">Аудио 3:</label><br>
									<input type="file" id="answer3" name="answer3[]" accept="audio/mpeg" required><br>
									</div>
									<label for="correct">Верен отговор:</label><br>
									<input type="number" id="correct" name="correct[]" min="1" max="3" required>
									<button class="remove" onclick="removeQuestion(this)">Премахни въпроса</button>
									</div>`
			);
			break;
		case 3:
			$("#testForm").append('<div id="question'+count+'" class="mimage">' + `<br>
									<textarea id="question_text" name="question_text[]" required></textarea><br>
									<label for="question_audio">Аудио файл (при нужда):</label><br>
									<input type="file" id="question_audio" name="question_audio[]" accept="audio/mpeg"><br>
									<input type="hidden" name="type[]" value="mimage" />
									<div class="answers">
									<label for="answer1">Изображение 1:</label><br>
									<input type="file" id="answer1" name="answer1[]" accept="image/jpeg" required><br>
									<label for="answer2">Изображение 2:</label><br>
									<input type="file" id="answer2" name="answer2[]" accept="image/jpeg" required><br>
									<label for="answer3">Изображение 3:</label><br>
									<input type="file" id="answer3" name="answer3[]" accept="image/jpeg" required><br>
									</div>
									<label for="correct">Верен отговор:</label><br>
									<input type="number" id="correct" name="correct[]" min="1" max="3" required>
									<button class="remove" onclick="removeQuestion(this)">Премахни въпроса</button>
									</div>`
			);
			break;
		case 4:
			$("#testForm").append('<div id="question'+count+'" class="ftext">' + `<br>
									<textarea id="question_text" name="question_text[]" required></textarea><br>
									<label for="question_audio">Аудио файл (при нужда):</label><br>
									<input type="file" id="question_audio" name="question_audio[]" accept="audio/mpeg"><br>
									<input type="hidden" name="type[]" value="ftext" />
									<label for="correct">Верен отговор:</label><br>
									<input type="text" id="correct" name="correct[]" required>
									<button class="remove" onclick="removeQuestion(this)">Премахни въпроса</button>
									</div>`
			);
			break;
	}
}

function submitForm() {
	document.theForm.submit();
}
