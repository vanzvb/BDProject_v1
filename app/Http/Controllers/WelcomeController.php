<?php

namespace App\Http\Controllers;

use App\Models\EventDetail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        // Retrieve the barangay filter from the request (if provided)
        $barangay = $request->input('barangay');
    
        // Base query for EventDetails
        $eventDetailQuery = EventDetail::where('donor_status', 'Eligible');
    
        // Apply the barangay filter if it is not empty
        if (!empty($barangay)) {
            $eventDetailQuery->whereHas('user', function ($query) use ($barangay) {
                $query->where('address', 'LIKE', "%{$barangay}%");
            });
        }
    
        // Total Active Donors
        $totalActiveDonors = $eventDetailQuery->distinct('userID')->count('userID');
    
        // Total Male Donors
        $totalMaleDonors = clone $eventDetailQuery;
        $totalMaleDonors = $totalMaleDonors->whereHas('user', function ($query) {
            $query->where('gender', 'Male');
        })
        ->distinct('userID')
        ->count('userID');
    
        // Total Female Donors
        $totalFemaleDonors = clone $eventDetailQuery;
        $totalFemaleDonors = $totalFemaleDonors->whereHas('user', function ($query) {
            $query->where('gender', 'Female');
        })
        ->distinct('userID')
        ->count('userID');
    
        // Total Blood Type : 'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'
        $bloodTypes = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
        $bloodTypeCounts = [];
    
        foreach ($bloodTypes as $bloodType) {
            $bloodTypeCounts[$bloodType] = clone $eventDetailQuery;
            $bloodTypeCounts[$bloodType] = $bloodTypeCounts[$bloodType]->whereHas('user', function ($query) use ($bloodType) {
                $query->where('blood_type', $bloodType);
            })
            ->distinct('userID')
            ->count('userID');
        }
    
        // Age groups
        $ageGroups = [
            '18-25' => [18, 25],
            '26-35' => [26, 35],
            '36-45' => [36, 45],
            '46-55' => [46, 55],
            '56-65' => [56, 65],
            '65+' => [66, 150], // assuming 150 as an upper limit
        ];
    
        $ageGroupCounts = [];
    
        foreach ($ageGroups as $key => $range) {
            $ageGroupCounts[$key] = clone $eventDetailQuery;
            $ageGroupCounts[$key] = $ageGroupCounts[$key]->whereHas('user', function ($query) use ($range) {
                $query->whereBetween('age', $range);
            })
            ->distinct('userID')
            ->count('userID');
        }
    
        return view('welcome', compact('totalActiveDonors', 'totalMaleDonors', 'totalFemaleDonors', 'bloodTypeCounts', 'ageGroupCounts'));
    }

}
