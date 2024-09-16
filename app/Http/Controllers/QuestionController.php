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
        $questions = Question::all(); // Fetch all questions
        return view('questions.index', compact('questions')); // Pass variable to view
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
        $request->validate([
            'question_text' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'type' => 'required|in:text,checkbox,radio,textarea',
            'is_mandatory' => 'nullable|boolean', // Change to nullable
            'order' => 'nullable|integer',
        ]);
    
        $data = $request->all();
        $data['is_mandatory'] = $request->has('is_mandatory'); // Ensure checkbox state
    
        Question::create($data);
    
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
        $question = Question::findOrFail($id); // Fetch the question by ID
    return view('questions.show', compact('question')); // Pass the question to the view
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)   
    {
        $question = Question::findOrFail($id); // Fetch the question by ID
        return view('questions.edit', compact('question')); // Pass the question to the view
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
        $request->validate([
            'question_text' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'type' => 'required|in:text,checkbox,radio,textarea',
            'is_mandatory' => 'nullable|boolean', // Change to nullable
            'order' => 'nullable|integer',
        ]);
    
        $data = $request->all();
        $data['is_mandatory'] = $request->has('is_mandatory'); // Ensure checkbox state
    
        $question->update($data);
    
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
