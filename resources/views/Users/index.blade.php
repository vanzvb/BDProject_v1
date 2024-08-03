@extends('layouts.adminlte')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">

        </div>
    </div>


    @if ($message = Session::get('success'))
        {{-- <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div> --}}
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> Success!</h5>
            <p>{{ $message }}</p>
        </div>
    @endif


    <!-- Main content -->
    <div class="content">

        <div class="container-fluid">

            <div class="card">
                <div class="card-header">
                    <h2>Users Management</h2>
                </div>
                <!-- /.card-header -->

                <div class="card-body">
                    @canany(['Admin-view', 'Admin-add', 'Nurse-view', 'Nurse-add'])
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-create">
                            <b>Create New User</b>
                        </button>
                        @include('Users.modal.create')
                    @endcan
                    <div class="mt-2 col-md-12">
                        {{-- IM JUST A SPACE --}}
                    </div>


                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    {{-- <th>No</th> --}}
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
                                @foreach ($data as $users)
                                    <tr>
                                        {{-- <td>{{ ++$i }}</td> --}}
                                        <td>{{ $users->full_name }}</td>
                                        <td>{{ $users->blood_type }}</td>
                                        <td>{{ $users->age }}</td>
                                        <td>{{ $users->gender }}</td>
                                        <td>{{ $users->civil_status }}</td>
                                        <td>{{ $users->occupation }}</td>
                                        <td>{{ $users->nationality }}</td>
                                        <td>{{ $users->address }}</td>
                                        <td>{{ $users->contact_info }}</td>
                                        <td>{{ $users->email }}</td>
                                        <td>
                                            @if (!empty($users->getRoleNames()))
                                                @foreach ($users->getRoleNames() as $v)
                                                    <label class="badge bg-success">{{ $v }}</label>
                                                @endforeach
                                            @endif
                                        </td>

                                        <td>
                                            @include('Users.modal.show')
                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-show{{ $users->id }}">
                                                Show
                                            </button>
                                            {{-- <a class="btn btn-info" href="{{ route('users.show', $user->id) }}">Show</a> --}}
                                            
                                            <a class="btn btn-primary" href="{{ route('users.edit', $users->id) }}">Edit</a>
            
                                            @include('Users.modal.delete')
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete{{ $users->id }}">
                                                Delete
                                            </button>
                                            {{-- <a class="btn btn-danger" href="{{ route('users.destroy', $user->id) }}">Delete</a> --}}
                                            {{-- {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}  --}}
                                        </td>
                                        
                                    </tr>
                                @endforeach 
                            </tbody>
                            <tfoot>
                                <tr>
                                    {{-- <th>No</th> --}}
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
                            </tfoot>
                        </table>

                    </div>
                    <!-- /.card-body -->
                </div>

                <!-- /.card-body -->
            </div>

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
    <!-- Add DataTables scripts -->

@endsection
