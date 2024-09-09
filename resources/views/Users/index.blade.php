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
                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-show{{ $users->id }}">
                                                Show
                                            </button>
                                            
                                            <a class="btn btn-primary" href="{{ route('users.edit', $users->id) }}">Edit</a>
                                            
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete{{ $users->id }}">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                    
                                    <!-- Modals are placed outside the table but inside the loop -->
                                    @include('Users.modal.show', ['users' => $users])
                                    @include('Users.modal.delete', ['users' => $users])
                                    
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
                    
                    <!-- Modals Outside the Table Structure -->
                    @foreach ($data as $users)
                        <!-- Show User Modal -->
                        <div class="modal fade" id="modal-show{{ $users->id }}" tabindex="-1" role="dialog" aria-labelledby="modalShowLabel{{ $users->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Modal content here -->
                                    <div class="modal-header">
                                        <h4 class="modal-title"><b>User Profile</b></h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <strong>Name:</strong> {{ $users->full_name }}
                                        </div>
                                        <div class="form-group">
                                            <strong>Blood Type:</strong> {{ $users->blood_type }}
                                        </div>
                                        <div class="form-group">
                                            <strong>Age:</strong> {{ $users->age }}
                                        </div>
                                        <div class="form-group">
                                            <strong>Gender:</strong> {{ $users->gender }}
                                        </div>
                                        <div class="form-group">
                                            <strong>Civil Status:</strong> {{ $users->civil_status }}
                                        </div>
                                        <div class="form-group">
                                            <strong>Nationality:</strong> {{ $users->nationality }}
                                        </div>
                                        <div class="form-group">
                                            <strong>Occupation:</strong> {{ $users->occupation }}
                                        </div>
                                        <div class="form-group">
                                            <strong>Address:</strong> {{ $users->address }}
                                        </div>
                                        <div class="form-group">
                                            <strong>Contact Information:</strong> {{ $users->contact_info }}
                                        </div>
                                        <div class="form-group">
                                            <strong>Email:</strong> {{ $users->email }}
                                        </div>
                                        <div class="form-group">
                                            <strong>Roles:</strong>
                                            @if(!empty($users->getRoleNames()))
                                                @foreach($users->getRoleNames() as $v)
                                                    <label class="badge badge-success">{{ $v }}</label>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <!-- Delete User Modal -->
                        <div class="modal fade" id="modal-delete{{ $users->id }}" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel{{ $users->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Modal content here -->
                                    <div class="modal-header">
                                        <h4 class="modal-title"><b>Delete User</b></h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete this user?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <form action="{{ route('users.destroy', $users->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                    
                    <!-- /.card-body -->
                </div>

                <!-- /.card-body -->
            </div>

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
    <!-- Add DataTables scripts -->
@endsection
