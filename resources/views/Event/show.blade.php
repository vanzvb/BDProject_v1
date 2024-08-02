@extends('layouts.adminlte')

@php
    use Carbon\Carbon;
@endphp

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Show Event</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('events.index') }}">Back</a>
            </div>
        </div>
    </div>

    <div class="row mt-4 text-center">
        <div class="col-md-12">
            <div class="form-group">
                <h3><strong>Name:</strong> {{ $event->name }}</h3>
            </div>
            <div class="form-group">
                <p><strong>Details:</strong> {{ $event->detail }}</p>
            </div>
            <div class="form-group">
                <p><strong>Start Date:</strong> {{ Carbon::parse($event->start_date)->format('F j, Y') }}</p>
            </div>
            <div class="form-group">
                <p><strong>End Date:</strong> {{ Carbon::parse($event->end_date)->format('F j, Y') }}</p>
            </div>
            <div class="form-group">
                <p><strong>Event ID:</strong> {{ $event->id }}</p>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <h3 class="text-center">Event Details</h3>
            @if(isset($eventDetails) && $eventDetails->isNotEmpty())
                @foreach($eventDetails->chunk(4) as $chunk)
                    <div class="row">
                        @foreach($chunk as $eventDetail)
                            <div class="col-lg-3 col-md-4 mb-4">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <h5 class="card-title">Event Detail ID: {{ $eventDetail->id }}</h5>
                                        <p class="card-text">
                                            <strong>User ID:</strong> {{ $eventDetail->userID }}
                                        </p>
                                        <!-- Display user information if needed -->
                                        @if($users->find($eventDetail->userID))
                                            @php
                                                $user = $users->find($eventDetail->userID);
                                            @endphp
                                            <p class="card-text">
                                                <strong>Full Name:</strong> {{ $user->getFullNameAttribute() }}
                                            </p>
                                            <p class="card-text">
                                                <strong>User Email:</strong> {{ $user->email }}
                                            </p>
                                        @endif
                                        <!-- Placeholder Button -->
                                        <a href="#" class="btn btn-primary">Placeholder Button</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            @else
                <div class="alert alert-info text-center" role="alert">
                    No event details found.
                </div>
            @endif
        </div>
    </div>
@endsection
