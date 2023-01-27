<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $curAccount = User::where('id', Auth::id())->first();
        // $quizzes = Quiz::where('user_id', $curAccount)->orderBy('created_at', 'desc')->get();
        // $questions = Question::where('user_id', $curAccount)->orderBy('created_at')->get();
        // return view('create-question', compact('quizzes', 'questions'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check()){
            $curAccount = User::where('id', Auth::id())->first();
            $quizzes = Quiz::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
            $questions = Question::where('user_id', Auth::id())->orderBy('created_at')->get();
            return view('create-question', compact('quizzes', 'questions'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $question = new Question;
        $question->question = $request->question;
        $question->answer1 = $request->answer1;
        $question->answer2 = $request->answer2;
        $question->answer3 = $request->answer3;
        $question->answer4 = $request->answer4;
        $question->correct_answer = $request->correct_answer;
        $question->position = $request->position;
        $question->quiz_id = $request->quiz_id;
        $question->image = $request->img;
        $question->user_id = Auth::id();
        $question->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quizzes = Quiz::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        $questions = Question::where('user_id', Auth::id())->orderBy('created_at')->get();
        $question = Question::find($id)->first();
        return view('edit-question')->with('question', $question)->with('quizzes', $quizzes)->with('questions', $questions);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $question = Question::where('id', $id)->update([
        'question' => $request->input('question'),
        'answer1' => $request->input('answer1'),
        'answer2' => $request->input('answer2'),
        'answer3' => $request->input('answer3'),
        'answer4' => $request->input('answer4'),
        'correct_answer' => $request->input('correct_answer'),
        'position' => $request->input('position'),
        'quiz_id' => $request->input('quiz_id'),
        'image' => $request->input('img'),
        'user_id' => Auth::id()
        ]);
        
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Question::destroy($id);
        return redirect('/acc');
    }
}
