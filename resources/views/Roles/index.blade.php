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
                <h1 class="m-0">Role Management</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="">Roles </a></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

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
                <h2>Roles Management</h2>
            </div>
            <!-- /.card-header -->
            
            <div class="card-body">
                
                @can('role-create')
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-create">
                    <b>Create New Role</b>
                </button>
                @include('Roles.modal.create')
                @endcan

                
                {{-- <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a> --}}
                

                <div class="mt-2 col-md-12">
                    {{-- IM JUST A SPACE --}}
                </div>

                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th width="280px">Action</th>
                         </tr>
                    </thead>
                    <tbody>

                        @foreach ($roles as $key => $role)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                {{-- <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
                                @include('Roles.modal.show')
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-show{{ $role->id }}">
                                    Show
                                </button> --}}
                                @can('role-edit')
                                    <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">View</a>
                                @endcan
                                @can('role-delete')
                                @include('Roles.modal.delete')
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete{{ $role->id }}">
                                    Delete
                                </button>
                                    {{-- {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!} --}}
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
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

{!! $roles->render() !!}

<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>
@endsection
