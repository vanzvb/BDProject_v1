<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class   CustomRedirectController extends Controller
{
    public function redirectToBlade()
    {
        $events = Event::all(); // Fetch all events
        return view('auth.form', compact('events')); // Pass events to the view
        // You can change 'your-blade-file-name' to the actual blade file name you want to redirect to
        // return view('auth.form');
    }

    
}
