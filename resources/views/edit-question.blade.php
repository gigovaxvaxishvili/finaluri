<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        @csrf
        @method('put')
          <div>
            <label for="quizId">QuizId</label>
            <select id="quizId" name="quiz_id">
                @foreach ($quizzes as $quiz)
                    <option value="{{ $quiz->id }}">{{ $quiz->title }}</option>
                @endforeach
            </select>
          </div>
          <div>
            <label for="quizImg">Image</label>
            <input name="img" type="text" class="form-control" id="quizImg" value="{{ $question->image }}">
          </div>
          <div>
            <label for="quizQuestion">Question</label>
            <input name="question" type="text" class="form-control" id="quizQuestion" value="{{ $question->question }}">
          </div>
          <div>
            <label for="quizAnswer1"> Answer1</label>
            <textarea name="answer1" class="form-control" id="quizAnswer1" placeholder="{{ $question->answer1 }}"></textarea>
          </div>
          <div>
            <label for="quizAnswer2"> Answer2</label>
            <textarea name="answer2" class="form-control" id="quizAnswer2" placeholder="{{ $question->answer2 }}"></textarea>
          </div>
          <div>
            <label for="quizAnswer3"> Answer3</label>
            <textarea name="answer3" class="form-control" id="quizAnswer3" placeholder="{{ $question->answer3 }}"></textarea>
          </div>
          <div>
            <label for="quizAnswer4"> Answer4</label>
            <textarea name="answer4" class="form-control" id="quizAnswer4" placeholder="{{ $question->answer4 }}"></textarea>
          </div>
          <div>
            <label for="quizCorrectAnswer"> Correct Answer</label>
            <input type="number" name="correct_answer" class="form-control" id="quizCorrectAnswer" value="{{ $question->correct_answer }}"></textarea>
          </div>
  
          <div>
            <label for="quizPosition"> Position</label>
            <input type="number" name="position" class="form-control" id="quizPosition" value="{{ $question->position }}"></textarea>
          </div>
  
            <button type="submit" >Finish</button>
        </form>
</body>
</html>