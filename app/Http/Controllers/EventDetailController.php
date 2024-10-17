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
    
        // Update only the donor status without generating the unique ID
        $eventDetail->donor_status = 'Eligible';
        $eventDetail->save();
    
        return redirect()->back()->with('status', 'Donor status updated successfully!');
    }
    public function changeDonatedStatus($id)
    {
        // Find the EventDetail by ID
    $eventDetail = EventDetail::findOrFail($id);

    // Update the donated status to "Yes" (true)
    $eventDetail->donated = true;

    // Generate ID for the user associated with the event detail
    $user = User::find($eventDetail->userID);
    if ($user && !$user->unique_id) { // Only generate if the user doesn't already have a unique_id
        $year = now()->year;

        // Count how many donors have donated this year to generate the next incremented ID
        $donorCount = User::where('unique_id', 'LIKE', "NAIC-$year-%")->count();
        $incrementedPart = str_pad($donorCount + 1, 4, '0', STR_PAD_LEFT);

        // Generate the final donor ID
        $customDonorId = "NAIC-$year-$incrementedPart-DONOR";

        // Update the user's unique ID
        $user->unique_id = $customDonorId;
        $user->save();
    }

    // Save the updated eventDetail record
    $eventDetail->save();

    return redirect()->back()->with('status', 'Donated status updated successfully!');
    }
}
