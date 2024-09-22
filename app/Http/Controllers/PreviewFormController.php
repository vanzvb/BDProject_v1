<?php

namespace App\Http\Controllers;

use App\Models\Question; // Adjust the namespace based on your application's structure
use Illuminate\Http\Request;

class PreviewFormController extends Controller
{
    public function showPreviewForm()
    {
        // Fetch all questions; you can adjust this query as needed
        $questions = Question::all();

        // Return the view with the questions
        return view('previewform', compact('questions'));
    }
}
