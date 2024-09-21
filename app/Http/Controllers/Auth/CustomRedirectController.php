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
    return redirect()->back()->with('success', 'Form submitted successfully!');
}



    
}
