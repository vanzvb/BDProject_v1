@extends('layouts.adminlte')

@php
    use Carbon\Carbon;
@endphp

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                {{-- <h2>Show Event</h2> --}}
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('events.index') }}">Back</a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card">
            <div class="card-header">
                <h3 class="font-weight-bold">{{ $event->name }}</h3>
            </div>
            <div class="card-body">
                <h5 class="font-weight-bold">Event Information</h5>
                <hr>
                <div class="event-detail">
                    {{-- <p class="mb-2"><strong>Name:</strong> {{ $event->name }}</p> --}}
                    <p class="mb-2"><strong>Details:</strong> {{ $event->detail }}</p>
                    <p class="mb-2"><strong>Start Date:</strong> {{ Carbon::parse($event->start_date)->format('F j, Y') }}</p>
                    <p class="mb-2"><strong>End Date:</strong> {{ Carbon::parse($event->end_date)->format('F j, Y') }}</p>
                </div>
            </div>
        </div>
        
        
    </div>

    <div class="card mt-3">
        <div class="card-header">
            <h3 class="card-title">Participants</h3>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="200px">Name</th>
                     
                        <th>Blood Type</th>
                        <th>Age</th>
                        <th>Sex</th>
                        <th>Birthday</th>
                        <th>Status</th>
                        <th width="200px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($event->eventDetails as $eventDetail)
                        @if ($eventDetail->user)
                            <tr>
                                <td>{{ $eventDetail->user->full_name }}</td>
                          
                                <td>{{ $eventDetail->user->blood_type }}</td>
                                <td>{{ $eventDetail->user->calculated_age }}</td>
                                <td>{{ $eventDetail->user->gender }}</td>
                                <td>{{ Carbon::parse($eventDetail->user->birthdate)->format('F j, Y') }}</td>

                                <td>{{ $eventDetail->donor_status }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('users.edit', $eventDetail->user->id) }}">Edit</a>
                                    <form action="{{ route('event-details.changeStatus', $eventDetail->id) }}" method="GET" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Change Status</button>
                                    </form>
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="6" class="text-center">No user associated</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
