<?php

namespace App\Http\Controllers;

use \DB;
use App\Models\EventDetail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        // API barangays
        $response = Http::get('https://psgc.gitlab.io/api//cities-municipalities/042115000/barangays');
        $APIbarangays = $response->json();

        // Extract barangay names from the API response
        $barangayNames = collect($APIbarangays)->pluck('name')->toArray();

        // Retrieve the barangay filter from the request (if provided)
        $barangay = $request->input('barangay');

        // Base query for EventDetails
        $eventDetailQuery = EventDetail::where('donated', '1');

        // If filtering by 'Others' (i.e., outside barangays from the list)
        if ($barangay == "Others") {
            $eventDetailQuery->whereHas('user', function ($query) use ($barangayNames) {
                $query->whereNotIn('address', $barangayNames);
            });
        }

        // Apply the barangay filter if it is not empty
        if (!empty($barangay) && $barangay != "Others") {
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

        // Initialize Blood Type Counts array to avoid the undefined error
        $bloodTypes = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
        $bloodTypeCounts = [];  // Ensure this variable is always initialized

        foreach ($bloodTypes as $bloodType) {
            $bloodTypeCounts[$bloodType] = clone $eventDetailQuery;
            $bloodTypeCounts[$bloodType] = $bloodTypeCounts[$bloodType]->whereHas('user', function ($query) use ($bloodType) {
                $query->where('blood_type', $bloodType);
            })
                ->distinct('userID')
                ->count('userID');
        }

        // Initialize Age Group Counts
        $ageGroups = [
            '18-25' => [18, 25],
            '26-35' => [26, 35],
            '36-45' => [36, 45],
            '46-55' => [46, 55],
            '56-65' => [56, 65],
            '65+'   => [66, 150], // Upper limit as 150
        ];
        $ageGroupCounts = [];

        foreach ($ageGroups as $key => $range) {
            $ageGroupCounts[$key] = clone $eventDetailQuery;
            $ageGroupCounts[$key] = $ageGroupCounts[$key]->whereHas('user', function ($query) use ($range) {
                // Calculate the age based on the birthdate using MySQL's DATE function
                $currentDate = now();
                $query->whereBetween(
                    DB::raw("TIMESTAMPDIFF(YEAR, birthdate, '{$currentDate}')"),
                    $range
                );
            })
                ->distinct('userID')
                ->count('userID');
        }


        // Get the top 10 donated barangays
        $topBarangays = EventDetail::where('donated', '1')
            ->join('users', 'event_details.userID', '=', 'users.id') // Assuming userID is the foreign key
            ->select('users.address', DB::raw('count(*) as total'))
            ->groupBy('users.address')
            ->orderBy('total', 'desc')
            ->limit(10)
            ->get();

        // Return the view with all required variables
        return view('welcome', compact('totalActiveDonors', 'totalMaleDonors', 'totalFemaleDonors', 'bloodTypeCounts', 'ageGroupCounts', 'topBarangays', 'APIbarangays'));
    }
}
