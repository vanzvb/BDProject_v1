<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventDetail;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewFormController extends Controller
{
    //
    public function showNewForm($event_id)
{
     // Fetch all questions or any specific logic you have to get questions
     $event = Event::findOrFail($event_id); // This will throw a 404 if the event is not found
     $questions = Question::all(); // Adjust this as needed
 
     return view('newform', compact('questions', 'event'));
}

public function joinEvent(Request $request)
{
    $data = $request->all();
    $user = Auth::user();
    // dd($data, $user->id, $data['event_id']);
    //  $event = Event::findOrFail($data['event_id']); 

     EventDetail::create([
        'eventID' => $data['event_id'], // Replace with actual event ID
        // 'donor_status' => $data['event_id'],
        'userID' => $user->id, // Assign the user's ID
    ]);

    
    $donationHistorys = Event::all();
    $myEvents = EventDetail::where('userID', $user->id)->get();
    $email = Auth::user()->email;

    $donorStatus = EventDetail::where('userID', $user->id)->pluck('donor_status')->first();
    return view('home', [
        'user' => $user,
        'email' => $email,
        'firstName' => $user->first_name,
        'middleName' => $user->middle_name,
        'lastName' => $user->last_name,
        'bloodType' => $user->blood_type,
        'age' => $user->age,
        'gender' => $user->gender,
        'civilStatus' => $user->civil_status,
        'nationality' => $user->nationality,
        'occupation' => $user->occupation,
        'address' => $user->address,
        'contactInfo' => $user->contact_info,
        'events' => $donationHistorys,
        'myEvents' => $myEvents,
        'donorStatus' => $donorStatus,
    ]);
}


}
