<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $hasQuiz = Quiz::where('user_id', Auth::id());
        $quizzes = Quiz::where('approved', 1)->orderBy('created_at', 'desc')->get();
        $questions = Question::all();
        return view('index', compact('quizzes', 'questions', 'user', 'hasQuiz'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check()){
            return view('create-quiz');
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
        $quiz = new Quiz;
    $quiz->title = $request->title;
    $quiz->desc = $request->desc;
    $quiz->img = $request->img;
    $quiz->user_id = Auth::id();
    $quiz->save();
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
        $quiz = Quiz::where('id',$id)->first();
        $questions = Question::where('quiz_id', $id)->get();
        return view('quiz',compact('quiz','questions'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quizzes = Quiz::where('id', $id)->first();
        return view('edit-quiz')->with('quizzes', $quizzes);
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
        
        $quiz = Quiz::where('id', $id)->update([
        'title' => $request->input('title'),
        'desc' => $request->input('desc'),
        'img' => $request->input('img'),
        'user_id' => Auth::id()]);
        
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
        Quiz::destroy($id);
        return redirect('/acc');
    }

    public function approve($id)
    {
        $quiz = Quiz::find($id);
        $quiz->approved = 1;
        $quiz->save();
        return redirect('/');
    }
}
