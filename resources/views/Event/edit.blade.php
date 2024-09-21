@extends('layouts.adminlte')


@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h2 class="p-2">Edit Event</h2>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('events.update', $event->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" value="{{ $event->name }}" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <strong>Detail:</strong>
                        <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail">{{ $event->detail }}</textarea>
                    </div>
                    <div class="form-group">
                        <strong>Start Date:</strong>
                        <input type="date" name="start_date" value="{{ $event->start_date }}" class="form-control" placeholder="Start Date">
                    </div>
                    <div class="form-group">
                        <strong>End Date:</strong>
                        <input type="date" name="end_date" value="{{ $event->end_date }}" class="form-control" placeholder="End Date">
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn btn-secondary" href="{{ route('events.index') }}">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>
@endsection