@extends('layouts.adminlte')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <a class="btn btn-primary mb-3 ml-3" href="{{ route('events.index') }}">Back to Event Management</a> <!-- Back Button -->
    </div>
</div>



@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3>Blood Drive History</h3>
            </div>

            <div class="card-body">
                <table id="deletedEventsTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Details</th>
                            <th>Deleted At</th>
                            <th>Action</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($deletedEvents as $event)
                        <tr>
                            <td>{{ $event->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($event->start_date)->format('F d, Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($event->end_date)->format('F d, Y') }}</td>
                            <td>{{ $event->detail }}</td>
                            <td>{{ \Carbon\Carbon::parse($event->deleted_at )->format('F d, Y') }}</td>
                            <td>
                                <form action="{{ route('events.destroy', $event->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('events.show.deleted', $event->id) }}">Show</a>   
                                </form>
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection




