@extends('layouts.adminlte')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">

        </div>
    </div>



{{-- 
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Event Management</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Events</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
 --}}


    @if ($message = Session::get('success'))
        <div class="alert alert-success">   
            <p>{{ $message }}</p>
        </div>
    @endif

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">


            <div class="card">
                <div class="card-header">
                    <h2>Event Management</h2>
                </div>
                <!-- /.card-header -->
                
                <div class="card-body">
    

                    {{-- @can('event-create') --}}
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-create">
                        <b>Create New Event</b>
                    </button>
                    @include('Event.modal.create')
                    {{-- @endcan --}}

                    <a class="btn btn-primary" href="{{ route('events.deleted') }}">
                        View Blood Drive History
                    </a>

                    
                    <div class="mt-2 col-md-12">
                        {{-- IM JUST A SPACE --}}

                      
                        
                    </div>
    
                    


                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                {{-- <th>No</th> --}}
                                <th>Name</th>
                                <th>Start Date</th> <!-- New header for Start Date -->
                                <th>End Date</th> <!-- New header for End Date -->
                                <th>Details</th>
                                <th width="280px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $event)
                            <tr>
                                {{-- <td>{{ ++$i }}</td> --}}
                                <td>{{ $event->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($event->start_date)->format('F d, Y') }}</td> <!-- New cell displaying formatted Start Date -->
                                <td>{{ \Carbon\Carbon::parse($event->end_date)->format('F d, Y') }}</td> <!-- New cell displaying formatted End Date -->
                                <td>{{ $event->detail }}</td>
                                <td>
                                    <form action="{{ route('events.destroy', $event->id) }}" method="POST">
                                        <a class="btn btn-info" href="{{ route('events.show', $event->id) }}">Show</a>
                                        {{-- @can('event-edit') --}}
                                        <a class="btn btn-primary" href="{{ route('events.edit', $event->id) }}">Edit</a>
                                        {{-- @endcan --}}
                                        @csrf
                                        @method('DELETE')
                                        {{-- @can('event-delete') --}}
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                        {{-- @endcan --}}
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                {{-- <th>No</th> --}}
                                <th>Name</th>
                                <th>Start Date</th> <!-- New footer for Start Date -->
                                <th>End Date</th> <!-- New footer for End Date -->
                                <th>Details</th>
                                <th width="280px">Action</th>
                            </tr>
                        </tfoot>
                    </table>


                   



                    
                    
                    
                    
                </div>
                <!-- /.card-body -->
            </div>

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->




    <p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>
@endsection
