<?php

namespace App\Http\Controllers;


use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EventDetail;


class EventController extends Controller
{
    function __construct()
    {
        $this->middleware(['role:Admin|Nurse']);
        //  $this->middleware('permission:event-list|event-create|event-edit|event-delete', ['only' => ['index','show']]);
        //  $this->middleware('permission:event-create', ['only' => ['create','store']]);
        //  $this->middleware('permission:event-edit', ['only' => ['edit','update']]);
        //  $this->middleware('permission:event-delete', ['only' => ['destroy']]);
        
         
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::latest()->get();
         
        // return view('Event.index',compact('events'))
        //     ->with('i', (request()->input('page', 1) - 1) * 5);
        return view('Event.index',compact('events')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Event.create');
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
    
        Event::create($request->all());
    
        return redirect()->route('events.index')
                        ->with('success','Event created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
{
    // Load related event details and users
    $eventDetails = $event->eventDetails;
    
    
    // Optionally, if you need to show a specific user related to the event
    $users = User::all(); // Fetch all users or filter as needed

    return view('Event.show', compact('event', 'eventDetails', 'users'));
}




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('Event.edit',compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
    
        $event->update($request->all());
    
        return redirect()->route('events.index')
                        ->with('success','Event updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();
    
        return redirect()->route('events.index')
                        ->with('success','Event deleted successfully');
    }
}
