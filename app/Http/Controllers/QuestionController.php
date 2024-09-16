<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all questions
        $questions = Question::all();
        return view('questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // Validate and store the question
         $request->validate([
            'question_text' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'type' => 'required|in:text,checkbox,radio,textarea',
            'is_mandatory' => 'required|boolean',
            'order' => 'nullable|integer',
        ]);

        Question::create($request->all());

        return redirect()->route('questions.index')
                         ->with('success', 'Question created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
         // Validate and update the question
         $request->validate([
            'question_text' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'type' => 'required|in:text,checkbox,radio,textarea',
            'is_mandatory' => 'required|boolean',
            'order' => 'nullable|integer',
        ]);

        $question->update($request->all());

        return redirect()->route('questions.index')
                         ->with('success', 'Question updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();

        return redirect()->route('questions.index')
                         ->with('success', 'Question deleted successfully.');
    }
}
