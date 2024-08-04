<?php

namespace App\Http\Controllers;

use App\Models\EventDetail;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        // Total Donors
        // $totalActiveDonors = EventDetail::where('donor_status', 'Active')->count();
        $totalActiveDonors = EventDetail::where('donor_status', 'Active')
            ->distinct('userID')
            ->count('userID');


        // Total Male Donors

        // Total Femail Donors

        return view('welcome', compact('totalActiveDonors'));
    }
}
