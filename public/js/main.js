const startQuiz = document.getElementById('start-quiz-btn')
const main = document.querySelector('#main')
let counter = 0
let correct = 0
let incorrect = 0




startQuiz.addEventListener('click', function(){
  main.innerHTML = '';
  startQuiz.textContent = 'Next'
})

function check(id) {
  fetch('/quiz-api/' + id)  
      .then((response) => response.json())
      .then((data) => {
          if (counter+1 <= data.length){
          const element = data[counter]
          console.log(typeof(element.quiz_id))
          main.innerHTML = `<div>
          <h2>${element.question}</h2>
      </div>  
        <div>
            <img src="${element.image}" alt="...">
        </div>
        <div class="answers-container">
            <button onclick="checkAnswer(${ element.id }, '${element.answer1}', ${ element.quiz_id })"><span>${element.answer1}</span></button>
            <button onclick="checkAnswer(${ element.id }, '${element.answer2}', ${ element.quiz_id })"><span>${element.answer2}</span></button>
        </div>
        <div class="answers-container">
          <button onclick="checkAnswer(${ element.id }, '${element.answer3}', ${ element.quiz_id })"><span>${element.answer3}</span></button>
          <button onclick="checkAnswer(${ element.id }, '${element.answer4}', ${ element.quiz_id })"><span>${element.answer4}</span></button>
        </div>
        <div>
          <p>Question: ${counter+1}/${data.length}</p>
      </div>`
      }
      else{
        
        if(correct >= incorrect)
        main.innerHTML = `
        <div>
          <h2 class"score">Score: ${correct}/${counter}</h2>
        </div>`
        startQuiz.style.visibility = 'hidden'
        
      }
        
    })
  }



function checkAnswer(id, answer, quiz_id) {
  fetch('/quizzes-api/' + id)  
      .then((response) => response.json())
      .then((data) => {
          

        
          if (data[0]['correct_answer'] == answer) {
            main.innerHTML = `<div class="cover-answer-correct">
            <h1 id="correct-text"'> Correct! </h1>
            </div>`
              correct++
          } else {
              main.innerHTML = `<div class="cover-answer-incorrect">
              <h1 id="wrong-text"> Wrong! </h1>
              </div>`
              incorrect++
          }
          
      })
  

  counter++;

}

