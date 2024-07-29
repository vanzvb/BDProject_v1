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
                <h1 class="m-0">Users Management</h1>
                <ol class="breadcrumb float-sm">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#"></a>Users</li>
                </ol>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Users</a></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
 --}}

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
                @canany(['Admin-view', 'Admin-add','Nurse-view', 'Nurse-add'])
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-create">
                        <b>Create New User</b>
                    </button>
                    @include('Users.modal.create')
                @endcan
                <div class="mt-2 col-md-12">
                    {{-- IM JUST A SPACE --}}
                </div>
                
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
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
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($data as $key => $user ) 
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $user->full_name }}</td>
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
                                @include('Users.modal.show')
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-show{{ $user->id }}">
                                    Show
                                </button>
                                {{-- <a class="btn btn-info" href="{{ route('users.show', $user->id) }}">Show</a> --}}
                                
                                <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">Edit</a>

                                @include('Users.modal.delete')
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete{{ $user->id }}">
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
                            <th>No</th>
                            <th width="280px">Name</th>
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
                            <th width="280px">Action</th>
                        </tr>
                    </tfoot>
                </table>
                {{-- <div class="d-flex justify-content-center">
                    {{ $data->links() }}
                </div> --}}
                
              
            </div>
            
            <!-- /.card-body -->
        </div>

    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->



@endsection
