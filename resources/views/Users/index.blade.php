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
                <h1 class="m-0">Users Management</h1>
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
                    {{-- <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a> --}}

                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-create">
                        <b>Create New User</b>
                    </button>
                    
                    @include('Users.modal.create')

                </div>


                {{-- SPACE --}}
                <div class="mt-2 col-md-12">
                </div>
                {{-- END SPACE --}}

                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($data as $key => $user)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $user->name }}</td>
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
                                {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>

        </div>
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->

{!! $data->render() !!}

@endsection
