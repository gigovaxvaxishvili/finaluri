<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
    <header>
        <nav >
          <div >
              @if(Auth::check())
              <form  method="POST" action="/logout">
                @csrf
                <a id="sign-in-btn"  href="/acc">My Quizzes</a>
                <button type='submit' id="register-btn" >Log out</button>
              </form>
              @else
              <form >
                <a id="login-btn"  href="/login">Login</a>
                <a id="register-btn"  href="/register">Register</a>
              </form>
              @endif
            </div>
          </div>
        </nav>
      </header>
            @if (Auth::check())
              
            <div >
              <a type="button" href='/create'>Create Quiz</a>
              @if ($hasQuiz)
                
              <a type="button" href='/create-question'>Create Question</a>
              
                
              @endif
              
            </div>
            @endif
            
    
       <div id="quiz-go" style="display:flex; flex-direction:column;">
        @foreach($quizzes as $quiz)
          <div >
            <div >
              <img src="{{ $quiz->img }}"  alt="Card image cap">
              <div >
                <a href="/quiz/{{ $quiz->id }}">{{ $quiz->title }}</a>
                <p class="card-text">{{ $quiz->desc }}</p>
              </div>
              <div >
                <small >Questions: {{ $questions->where('quiz_id', $quiz->id)->count() }}</small>
              </div>
            </div>
            @endforeach
       </div>
      </main>
      <footer>
      </footer>
</body>
</html>
