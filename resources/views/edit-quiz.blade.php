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
            <label for="quizImg">Image</label>
            <input name="img" type="text" class="form-control" id="quizImg" value="{{ $quizzes->img }}">
          </div>
          <div>
            <label for="quizTitle">Title</label>
            <input name="title" type="text" class="form-control" id="quizTitle" value="{{ $quizzes->title }}">
          </div>
          <div>
            <label for="quizDesc"> Description</label>
            <textarea name="desc" class="form-control" id="quizDesc" rows="3" placeholder="{{ $quizzes->desc }}"></textarea>
          </div>
  
            <button type="submit" >Submit</button>
        </form>
</body>
</html>