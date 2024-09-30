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

        $donationHistorys = Event::all();
        


        
        // dd($donationHistorys);
        $user = Auth::user();
        $myEvents = EventDetail::where('userID', $user->id)->get();
        // dd($myEvents);
        $email = Auth::user()->email;

        $donorStatus = EventDetail::where('userID', $user->id)->pluck('donor_status')->first();
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
