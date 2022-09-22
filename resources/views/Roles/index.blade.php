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
                        @can('role-create')
                            <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
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
                           <th width="280px">Action</th>
                        </tr>
                          @foreach ($roles as $key => $role)
                          <tr>
                              <td>{{ ++$i }}</td>
                              <td>{{ $role->name }}</td>
                              <td>
                                  <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
                                  @can('role-edit')
                                      <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                                  @endcan
                                  @can('role-delete')
                                      {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                          {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                      {!! Form::close() !!}
                                  @endcan
                              </td>
                          </tr>
                          @endforeach
                      </table>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->

    {!! $roles->render() !!}

    <p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>
@endsection
