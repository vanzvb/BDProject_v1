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

   


    <div class="card">

        <div class="card-body">
            <h3><strong>Name:</strong> {{ $event->name }}</h3>
            <p><strong>Details:</strong> {{ $event->detail }}</p>
            <p><strong>Start Date:</strong> {{ Carbon::parse($event->start_date)->format('F j, Y') }}</p>
            <p><strong>End Date:</strong> {{ Carbon::parse($event->end_date)->format('F j, Y') }}</p>
            {{-- will remove --}}
            <p><strong>Event ID:</strong> {{ $event->id }}</p> 
    
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="200px">Name</th>
                        <th>Blood Type</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Civil Status</th>
                        <th>Nationality</th>
                        <th>Occupation</th>
                        <th>Address</th>
                        <th>Contact Information</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th width="200px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($eventDetails as $eventDetail)
                        @php
                            $user = $users->find($eventDetail->userID);
                        @endphp
                        @if ($user)
                            <tr>
                                <td>{{ $user->getFullNameAttribute() }}</td>
                                <td>{{ $user->blood_type }}</td>
                                <td>{{ $user->age }}</td>
                                <td>{{ $user->gender }}</td>
                                <td>{{ $user->civil_status }}</td>
                                <td>{{ $user->occupation }}</td>
                                <td>{{ $user->nationality }}</td>
                                <td>{{ $user->address }}</td>
                                <td>{{ $user->contact_info }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if (!empty($user->getRoleNames()))
                                        @foreach ($user->getRoleNames() as $v)
                                            <label class="badge bg-success">{{ $v }}</label>
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    {{-- @include('Users.modal.show') --}}
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-show{{ $user->id }}">
                                        Show
                                    </button>
                                    {{-- <a class="btn btn-info" href="{{ route('users.show', $user->id) }}">Show</a> --}}
                                    
                                    <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">Edit</a>
    
                                    {{-- @include('Users.modal.delete') --}}
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete{{ $user->id }}">
                                        Delete
                                    </button>
                                    {{-- <a class="btn btn-danger" href="{{ route('users.destroy', $user->id) }}">Delete</a> --}}
                                    {{-- {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}  --}}
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="2">No user information available for Event Detail ID: {{ $eventDetail->id }}
                                </td>
                            </tr>
                        @endif
                    @empty
                        <tr>
                            <td colspan="2">No event details found.</td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
    
                </tfoot>
            </table>
            
            
        </div>
    
    </div>



    

    {{-- <div class="row mt-4">
        <div class="col-md-12">
            <h3 class="text-center">Event Details</h3>
            @if (isset($eventDetails) && $eventDetails->isNotEmpty())
                @foreach ($eventDetails->chunk(4) as $chunk)
                    <div class="row">
                        @foreach ($chunk as $eventDetail)
                            <div class="col-lg-3 col-md-4 mb-4">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <h5 class="card-title">Event Detail ID: {{ $eventDetail->id }}</h5>
                                        <p class="card-text">
                                            <strong>User ID:</strong> {{ $eventDetail->userID }}
                                        </p>

                                        @if ($users->find($eventDetail->userID))
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
    </div> --}}









@endsection


