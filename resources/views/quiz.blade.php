<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <img src="{{ $quiz->img }}" alt="f">
        <div>
            <h1>
                {{ $quiz->title }}
            </h1>
        </div>
        
        <div>
            <p>
                {{ $quiz->desc }}
            </p>
        </div>
    </div>    
    <div>
        <button id='start-quiz-btn' onclick="check({{ $quiz->id }})">Start Quiz</button>
        <a  id='go-back-btn' href="/">Go Back</a>
    </div>
    <div id='main' class="main">
        
    </div>
    <script src="{{ asset('js/main.js')}}"></script>
</body>
</html>