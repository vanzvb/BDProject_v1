<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Symfony\Component\Console\Question\Question;

class   CustomRedirectController extends Controller
{
    public function redirectToBlade()
    {
        $events = Event::all(); // Fetch all events
        return view('auth.form', compact('events')); // Pass events to the view
        // You can change 'your-blade-file-name' to the actual blade file name you want to redirect to
        // return view('auth.form');
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
