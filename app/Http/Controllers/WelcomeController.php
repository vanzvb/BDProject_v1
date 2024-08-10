<?php

namespace App\Http\Controllers;

use App\Models\EventDetail;
use App\Models\User;
use Carbon\Carbon;
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
        // $totalMaleDonors = User::where('gender','Male')
        // ->count();
        $totalMaleDonors = EventDetail::whereHas('user', function ($query) {
            $query->where('gender', 'Male');
        })
            ->where('donor_status', 'Active')
            ->distinct('userID')
            ->count('userID');


        // Total Female Donors
        $totalFemaleDonors = EventDetail::whereHas('user', function ($query) {
            $query->where('gender', 'Female');
        })
            ->where('donor_status', 'Active')
            ->distinct('userID')
            ->count('userID');

        // Total Blood Type : 'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'
        $bloodTypes = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
        $bloodTypeCounts = [];

        foreach ($bloodTypes as $bloodType) {
            $bloodTypeCounts[$bloodType] = EventDetail::whereHas('user', function ($query) use ($bloodType) {
                $query->where('blood_type', $bloodType);
            })
                ->where('donor_status', 'Active')
                ->distinct('userID')
                ->count('userID');
        }

        // Age groups
        $ageGroups = [
            '18-25' => [18, 25],
            '26-35' => [26, 33],
            '36-45' => [36, 45],
            '46-55' => [46, 55],
            '56-65' => [56, 65],
            '65+' => [66, 150], // assuming 150 as an upper limit
        ];

        $ageGroupCounts = [];

        foreach ($ageGroups as $key => $range) {
            $ageGroupCounts[$key] = EventDetail::whereHas('user', function ($query) use ($range) {
                $query->whereBetween('age', $range);
            })
                ->where('donor_status', 'Active')
                ->distinct('userID')
                ->count('userID');
        }

        

        


        return view('welcome', compact('totalActiveDonors', 'totalMaleDonors', 'totalFemaleDonors', 'bloodTypeCounts', 'ageGroupCounts'));
    }
}
