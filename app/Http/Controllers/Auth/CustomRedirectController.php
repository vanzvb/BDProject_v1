<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\Question;

class   CustomRedirectController extends Controller
{
    public function redirectToBlade()
    {
        $events = Event::all(); // Fetch all events
        $questions = Question::orderBy('order', 'asc')->get(); // Order questions by 'order' field in ascending order

        return view('auth.form', compact('events', 'questions')); // Pass events and questions to the view
    }

    public function handleFormSubmit(Request $request)
    {
        // Your form handling logic here
        // e.g., process event selection, save data, etc.

        $event_id = $request->input('event_id');
        // Perform actions based on $event_id, or proceed with form submission
        // Assuming question ids are 1 and 5; adjust accordingly based on your database
        $question1Answer = $request->input('question_1'); // Change 1 to the actual question ID for question 1
        $question5Answer = $request->input('question_5'); // Change 5 to the actual question ID for question 5

        // Initialize eligibility status
        $isEligible = true;

        // Check conditions
        if ($question1Answer === 'no') {
            $isEligible = false; // Not eligible if question 1 is answered 'no'
        }

        if ($question5Answer === 'yes') {
            $isEligible = false; // Not eligible if question 5 is answered 'yes'
        }

        // Redirect based on eligibility
        if ($isEligible) {
            // Handle successful form submission (e.g., save data, proceed with registration)
            return redirect()->back()->with('success', 'You are eligible to donate.');
        } else {
            // Handle rejection
            return redirect()->back()->with('error', 'You are not eligible to donate. The form will reset your answers.')->withInput();
        }
    }
}
