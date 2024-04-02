@extends('layouts.adminlte')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">

        </div>
    </div>




    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Events Management</h1>
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

    @if ($message = Session::get('success'))
        <div class="alert alert-success">   
            <p>{{ $message }}</p>
        </div>
    @endif

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12">

                    <div class="pull-left">
                        <h2></h2>
                    </div>
                    <div class="pull-right">
                        @can('event-create')
                        <a class="btn btn-success" href="{{ route('events.create') }}"> Create New event</a>
                        @endcan
                    </div>

                    {{-- SPACE --}}
                    <div class="mt-2 col-md-12">
                    </div>
                    {{-- END SPACE --}}

                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Details</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach ($events as $event)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $event->name }}</td>
                            <td>{{ $event->detail }}</td>
                            <td>
                                <form action="{{ route('events.destroy',$event->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('events.show',$event->id) }}">Show</a>
                                    @can('event-edit')
                                    <a class="btn btn-primary" href="{{ route('events.edit',$event->id) }}">Edit</a>
                                    @endcan
                
                
                                    @csrf
                                    @method('DELETE')
                                    @can('event-delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    @endcan
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->

    {!! $events->links() !!}


    <p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>
@endsection
