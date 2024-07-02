@extends('layouts.adminlte')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            {{-- <div class="pull-left">
                <h2>Edit New User</h2>
            </div> --}}
            {{-- <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
            </div> --}}

        </div>
    </div>

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0">Users Management</h1> --}}
                    <ol class="breadcrumb float-sm">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                        <li class="breadcrumb-item">Edit</li>
                    </ol>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    {{-- <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Users</a></li> --}}
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit User</h3>
                        </div>
                        <div class="card-body">
                            {!! Form::model($user, ['method' => 'PATCH', 'route' => ['users.update', $user->id]]) !!}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>First Name:</strong>
                                        {!! Form::text('first_name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Middle Name:</strong>
                                        {!! Form::text('middle_name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Last Name:</strong>
                                        {!! Form::text('last_name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Blood Type:</strong>
                                        {!! Form::select('blood_type', [
                                            'A+' => 'A+',
                                            'A-' => 'A-',
                                            'B+' => 'B+',
                                            'B-' => 'B-',
                                            'AB+' => 'AB+',
                                            'AB-' => 'AB-',
                                            'O+' => 'O+',
                                            'O-' => 'O-',
                                        ], null, ['placeholder' => 'Select Blood Type', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Age:</strong>
                                        {!! Form::text('age', null, ['placeholder' => 'Age', 'class' => 'form-control', 'maxlength' => '3', 'oninput' => 'this.value = this.value.replace(/[^0-9]/g, "")']) !!}
                                    </div>
                                </div>
                                
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Gender:</strong>
                                        {!! Form::select('gender', ['Male' => 'Male', 'Female' => 'Female'], null, ['placeholder' => 'Select Gender', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Civil Status:</strong>
                                        {!! Form::select('civil_status', [
                                            'Single' => 'Single',
                                            'Married' => 'Married',
                                            'Divorced' => 'Divorced',
                                            'Legally Separated' => 'Legally Separated',
                                            'Widowed' => 'Widowed',
                                        ], null, ['placeholder' => 'Select Civil Status', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Nationality:</strong>
                                        {!! Form::text('nationality', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Occupation:</strong>
                                        {!! Form::text('occupation', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Address:</strong>
                                        {!! Form::text('address', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Contact Information:</strong>
                                        {!! Form::text('contact_info', null, ['placeholder' => 'Name', 'class' => 'form-control', 'id' => 'contact_info_input']) !!}
                                    </div>
                                </div>

                                {{-- ONLY ACCEPT INTEGERS SCRIPT --}}
                                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                <script>
                                    $(document).ready(function() {
                                        $('#contact_info_input').on('input', function() {
                                            // Remove any non-digit characters
                                            $(this).val($(this).val().replace(/\D/g, ''));
                                        });
                                    });
                                </script>

                                
                                
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Email address:</strong>
                                        {!! Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
 
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Password:</strong>
                                        {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control', 'minlength' => '8', 'required']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Confirm Password:</strong>
                                        {!! Form::password('confirm-password', ['placeholder' => 'Confirm Password', 'class' => 'form-control', 'minlength' => '8', 'required']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Role:</strong>
                                        {!! Form::select('roles[]', ['' => 'Select Role'] + $roles, $userRole, ['class' => 'form-control', 'multiple']) !!}
                                         <small class="form-text text-muted">Select a role to assign. Select "Select Role" to unassign.</small>
                                    </div>
                                </div>
                                
                                
                                
                                
                                
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <a class="btn btn-secondary" href="{{ route('users.index') }}">Cancel</a>
                                        </div>
                                    </div>
                                </div>

                               
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
   
    

@endsection
