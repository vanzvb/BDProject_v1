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
                                        {!! Form::select(
                                            'blood_type',
                                            [
                                                'A+' => 'A+',
                                                'A-' => 'A-',
                                                'B+' => 'B+',
                                                'B-' => 'B-',
                                                'AB+' => 'AB+',
                                                'AB-' => 'AB-',
                                                'O+' => 'O+',
                                                'O-' => 'O-',
                                                'UNKNOWN' => 'UNKNOWN',
                                            ],
                                            null,
                                            ['placeholder' => 'Select Blood Type', 'class' => 'form-control'],
                                        ) !!}
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Birthdate:</strong>
                                        {!! Form::date('birthdate', old('birthdate'), [
                                            'class' => 'form-control' . ($errors->has('birthdate') ? ' is-invalid' : ''),
                                            'required' => true,
                                            'autocomplete' => 'bday',
                                            'onchange' => 'calculateAge()',
                                        ]) !!}
                                        @error('birthdate')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <!-- Add a space for an error message related to age -->
                                        <span id="age-error" class="text-danger"></span>
                                    </div>
                                </div>



                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Sex:</strong>
                                        {!! Form::select('gender', ['MALE' => 'MALE', 'FEMALE' => 'FEMALE'], null, [
                                            'placeholder' => 'Select Sex',
                                            'class' => 'form-control',
                                        ]) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Civil Status:</strong>
                                        {!! Form::select(
                                            'civil_status',
                                            [
                                                'SINGLE' => 'SINGLE',
                                                'MARRIED' => 'MARRIED',
                                                'DIVORCED' => 'DIVORCED',
                                                'LEGALLY SEPARATED' => 'LEGALLY SEPARATED',
                                                'WIDOWED' => 'WIDOWED',
                                            ],
                                            null,
                                            ['placeholder' => 'Select Civil Status', 'class' => 'form-control'],
                                        ) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Nationality:</strong>
                                        {!! Form::text('nationality', null, ['placeholder' => 'Nationality', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Occupation:</strong>
                                        {!! Form::text('occupation', null, ['placeholder' => 'Occupation', 'class' => 'form-control']) !!}
                                    </div>
                                </div>



                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Barangay:</strong>
                                        {!! Form::select(
                                            'address', // Keep the name as 'address'
                                            [
                                                'BAGONG KALSADA' => 'BAGONG KALSADA',
                                                'BALSAHAN' => 'BALSAHAN',
                                                'BANCAAN' => 'BANCAAN',
                                                'BUCANA MALAKI' => 'BUCANA MALAKI',
                                                'BUCANA SASAHAN' => 'BUCANA SASAHAN',
                                                'CALUBCOB' => 'CALUBCOB',
                                                'CAPT. C. NAZARENO (POBLACION)' => 'CAPT. C. NAZARENO (POBLACION)',
                                                'GOMBALZA (POBLACION)' => 'GOMBALZA (POBLACION)',
                                                'HALANG' => 'HALANG',
                                                'HUMBAC' => 'HUMBAC',
                                                'IBAYO ESTACION' => 'IBAYO ESTACION',
                                                'IBAYO SILANGAN' => 'IBAYO SILANGAN',
                                                'KANLURAN RIZAL' => 'KANLURAN RIZAL',
                                                'LATORIA' => 'LATORIA',
                                                'LABAC' => 'LABAC',
                                                'MABOLO' => 'MABOLO',
                                                'MALAINEN BAGO' => 'MALAINEN BAGO',
                                                'MALAINEN LUMA' => 'MALAINEN LUMA',
                                                'MAQUINA' => 'MAQUINA',
                                                'MOLINO' => 'MOLINO',
                                                'MUNTING MAPINO' => 'MUNTING MAPINO',
                                                'MUZON' => 'MUZON',
                                                'PALANGUE 2' => 'PALANGUE 2',
                                                'PALANGUE 3' => 'PALANGUE 3',
                                                'PALANGUE CENTRAL' => 'PALANGUE CENTRAL',
                                                'SABANG' => 'SABANG',
                                                'SAN ROQUE' => 'SAN ROQUE',
                                                'SANTULAN' => 'SANTULAN',
                                                'SAPA' => 'SAPA',
                                                'TIMALAN BALSAHAN' => 'TIMALAN BALSAHAN',
                                                'TIMALAN CONCEPCION' => 'TIMALAN CONCEPCION',
                                                'OTHER' => 'OTHER (PLEASE SPECIFY)',
                                            ],
                                            old('address'), // Use old address for pre-selected value
                                            [
                                                'id' => 'barangay',
                                                'class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''),
                                                'onchange' => 'handleBarangayChange()',
                                            ],
                                        ) !!}
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Other Address Field -->
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Other Address:</strong>
                                        {!! Form::text('address', old('address'), [
                                            'id' => 'other_address',
                                            'placeholder' => 'Other Address (if applicable)',
                                            'class' => 'form-control',
                                            'style' => 'text-transform: uppercase;',
                                            'oninput' => 'this.value = this.value.toUpperCase()',
                                        ]) !!}
                                    </div>
                                </div>





                                <!-- Hidden input to store the actual address -->
                                {{-- <input type="hidden" name="address_hidden" id="address_hidden"
                                    value="{{ old('address') }}"> --}}




                                {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Address:</strong>
                                        {!! Form::text('address', null, ['placeholder' => 'Address', 'class' => 'form-control']) !!}
                                    </div>
                                </div> --}}




                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Contact Information:</strong>
                                        {!! Form::text('contact_info', null, [
                                            'placeholder' => 'Contact Information',
                                            'class' => 'form-control',
                                            'id' => 'contact_info_input',
                                        ]) !!}
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
                                    <button type="button" id="set-password-btn" class="btn btn-warning">Set
                                        Password</button>
                                </div>

                                <div id="password-fields" style="display:none;">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Password:</strong>
                                            {!! Form::password('password', [
                                                'placeholder' => 'Password',
                                                'class' => 'form-control',
                                                'id' => 'password-field',
                                            ]) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Confirm Password:</strong>
                                            {!! Form::password('confirm-password', [
                                                'placeholder' => 'Confirm Password',
                                                'class' => 'form-control',
                                                'id' => 'confirm-password-field',
                                            ]) !!}
                                        </div>
                                    </div>
                                </div>



                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Role:</strong>
                                        {!! Form::select('roles[]', ['' => 'Select Role'] + $roles, $userRole, ['class' => 'form-control', 'multiple']) !!}
                                        <small class="form-text text-muted">Select a role to assign. Select "Select Role" to
                                            unassign.</small>
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

    <script>
        document.getElementById('set-password-btn').addEventListener('click', function() {
            var passwordFields = document.getElementById('password-fields');
            var passwordInput = document.getElementById('password-field');
            var confirmPasswordInput = document.getElementById('confirm-password-field');

            if (passwordFields.style.display === "none") {
                passwordFields.style.display = "block";
                passwordInput.setAttribute('required', 'required');
                confirmPasswordInput.setAttribute('required', 'required');
            } else {
                passwordFields.style.display = "none";
                passwordInput.removeAttribute('required');
                confirmPasswordInput.removeAttribute('required');
            }
        });



        function handleBarangayChange() {
            var barangaySelect = document.getElementById('barangay');
            var otherAddressInput = document.getElementById('other_address');

            if (barangaySelect.value === 'OTHER') {
                // If 'OTHER (PLEASE SPECIFY)' is selected, do not change the input
                otherAddressInput.value = ''; // Clear input for clarity
            } else {
                // If a barangay is selected, set the other address input
                otherAddressInput.value = barangaySelect.value;
            }
        }

        // Update the barangay select based on the other address input
        document.getElementById('other_address').addEventListener('input', function() {
            var barangaySelect = document.getElementById('barangay');
            if (this.value) {
                barangaySelect.value = 'OTHER'; // Set barangay select to 'OTHER'
            } else {
                barangaySelect.value = ''; // Reset barangay select if input is empty
            }
        });
    </script>



@endsection
