<?php

namespace App\Http\Controllers;


use App\Models\EventDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class EventDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch event details with users
        $eventDetails = EventDetail::with('user')->get();
        $users = User::all(); // Fetch all users to access them by ID

        return view('Event.show', compact('eventDetails', 'users'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eventDetails = EventDetail::with('user')->get();
        $users = User::all(); // Fetch all users to access them by ID

        return view('Event.show', compact('eventDetails', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private static $lastIncrementedNumber = [];
    public function changeStatus($id)
    {
       
        $eventDetail = EventDetail::with('user')->findOrFail($id);
        $user = User::find($eventDetail->userID);
        // Generate ID      
        // Example Outputs:
        // For user 1: NAIC-2024-0001-DONOR
        // For user 9999: NAIC-2024-9999-DONOR
        // For user 10000: NAIC-2024-10000-DONOR
        // For user 100001: NAIC-2024-100001-DONOR
        $year = now()->year;

        // Check if there is already a value for this year
        if (!isset(self::$lastIncrementedNumber[$year])) {
            // If not, initialize with 0
            self::$lastIncrementedNumber[$year] = 0;
        }

        // Increment the number for the current year
        self::$lastIncrementedNumber[$year]++;

        // Determine the length of the padding based on the incremented value
        // Start with 4 digits, but increase as needed (e.g., 10000 becomes 5 digits)
        $paddingLength = max(4, strlen(self::$lastIncrementedNumber[$year]));

        // Pad the increment number to the correct length (e.g., 0001, 10000, etc.)
        $incrementedPart = str_pad(self::$lastIncrementedNumber[$year], $paddingLength, '0', STR_PAD_LEFT);

        // Generate the final donor ID
        $customDonorId = "NAIC-$year-$incrementedPart-DONOR";

        $user->unique_id = $customDonorId;
        $user->save();

        $eventDetail = EventDetail::find($id);
        $eventDetail->donor_status = 'Eligible';
        $eventDetail->save();


        // return redirect()->route('event.show')
        //                 ->with('success','Donor status updated successfully');

        return redirect()->back()->with('status', 'Status updated successfully!');

        // dd($eventDetail);
    }
}
