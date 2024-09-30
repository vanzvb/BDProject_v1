<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\EventDetail;
use App\Models\User;


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

    public function changeStatus($id)
    {

        // $this->validate($request, [
        //     'name' => 'required',
        //     'permission' => 'required',
        // ]);

        // $role = Role::find($id);
        // $role->name = $request->input('name');
        // $role->save();

        // $role->syncPermissions($request->input('permission'));

        // return redirect()->route('event.show')
        //                 ->with('success','Donor status updated successfully');
        $eventDetail = EventDetail::find($id);
        $eventDetail->donor_status = 'Active';
        $eventDetail->save();   

        // return redirect()->route('event.show')
        //                 ->with('success','Donor status updated successfully');

        return redirect()->back()->with('status', 'Status updated successfully!');

        // dd($eventDetail);
    }
}
