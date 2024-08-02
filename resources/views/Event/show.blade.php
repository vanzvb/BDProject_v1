@extends('layouts.app')

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

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $event->name }}
            </div>
            <div class="form-group">
                <strong>Details:</strong>
                {{ $event->detail }}
            </div>
            <div class="form-group">
                <strong>Event ID:</strong>
                {{ $event->id }}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <h3>Event Details</h3>
            @if(isset($eventDetails) && $eventDetails->isNotEmpty())
                @foreach($eventDetails as $eventDetail)
                    <div class="form-group">
                        <strong>Event Detail ID:</strong>
                        {{ $eventDetail->id }}
                    </div>
                    <div class="form-group">
                        <strong>User ID:</strong>
                        {{ $eventDetail->userID }}
                    </div>
                    <!-- Display user information if needed -->
                    @if($users->find($eventDetail->userID))
                        @php
                            $user = $users->find($eventDetail->userID);
                        @endphp
                        <div class="form-group">
                            <strong>User Name:</strong>
                            {{ $user->getFullNameAttribute() }}
                        </div>
                        <div class="form-group">
                            <strong>User Email:</strong>
                            {{ $user->email }}
                        </div>
                    @endif
                @endforeach
            @else
                <p>No event details found.</p>
            @endif
        </div>
    </div>
@endsection
