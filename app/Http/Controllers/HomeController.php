<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
    
        $joinedEventIds = EventDetail::where('userID', $user->id)->pluck('eventID')->toArray();
        $donationHistorys = Event::whereNotIn('id', $joinedEventIds)->get();
        
        // Eager load deleted events
        $myEvents = EventDetail::with(['event' => function($query) {
            $query->withTrashed(); // Include soft deleted events
        }])->where('userID', $user->id)->get();
    
        $email = Auth::user()->email;
    
        $donorStatus = EventDetail::where('userID', $user->id)->pluck('donated')->first();
        return view('home', [
            'user' => $user,
            'email' => $user->email,
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
