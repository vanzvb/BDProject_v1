@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                
                
                <div class="card">
                    <div class="card-header">{{ __('Registration Details') }}</div>
                    <div class="card-body">
                        <p>
                            Selected Event: <br>
                            <strong>Name:</strong> {{ $event->name }} <br>
                            <strong>Start Date:</strong> {{ \Carbon\Carbon::parse($event->start_date)->format('F j, Y') }} <br>
                            <strong>End Date:</strong> {{ \Carbon\Carbon::parse($event->end_date)->format('F j, Y') }} <br>
                            <strong>Detail:</strong> {{ $event->detail }}
                        </p>
                    </div>
                </div>
                


                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <input type="hidden" name="eventID" value="{{ $event->id }}">

                        {{-- <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

                        <div class="row mb-3">
                            <label for="first_name" class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>
                
                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                
                        <div class="row mb-3">
                            <label for="middle_name" class="col-md-4 col-form-label text-md-end">{{ __('Middle Name') }}</label>
                
                            <div class="col-md-6">
                                <input id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name" value="{{ old('middle_name') }}" required autocomplete="middle_name">
                
                                @error('middle_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                
                        <div class="row mb-3">
                            <label for="last_name" class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>
                
                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name">
                
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="blood_type" class="col-md-4 col-form-label text-md-end">{{ __('Blood Type') }}</label>
                        
                            <div class="col-md-6">
                                <select id="blood_type" class="form-control @error('blood_type') is-invalid @enderror" name="blood_type" required>
                                    <option value="" disabled selected>Select your blood type</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                        
                                @error('blood_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                
                        <div class="row mb-3">
                            <label for="age" class="col-md-4 col-form-label text-md-end">{{ __('Age') }}</label>
                        
                            <div class="col-md-6">
                                <input id="age" type="number" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" required autocomplete="age" step="1" oninput="this.value = this.value.replace(/[^0-9]/g, ''); if (this.value.length > 3) this.value = this.value.slice(0, 3);" maxlength="3">
                            
                                @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                
                        <div class="row mb-3">
                            <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>
                        
                            <div class="col-md-6">
                                <select id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender" required>
                                    <option value="" disabled selected>Select your gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                        
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="civil_status" class="col-md-4 col-form-label text-md-end">{{ __('Civil Status') }}</label>
                            <div class="col-md-6">
                                <select id="civil_status" class="form-control @error('civil_status') is-invalid @enderror" name="civil_status" required>
                                    <option value="" disabled selected>Select your civil status</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Divorced">Divorced</option>
                                    <option value="Widowed">Widowed</option>
                                    <option value="Legally Separated">Legally Separated</option>
                                </select>
                                @error('civil_status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                
                        <div class="row mb-3">
                            <label for="nationality" class="col-md-4 col-form-label text-md-end">{{ __('Nationality') }}</label>
                            <div class="col-md-6">
                                <input id="nationality" type="text" class="form-control @error('nationality') is-invalid @enderror" name="nationality" value="{{ old('nationality') }}" required autocomplete="nationality">
                                @error('nationality')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                
                        <div class="row mb-3">
                            <label for="occupation" class="col-md-4 col-form-label text-md-end">{{ __('Occupation') }}</label>
                            <div class="col-md-6">
                                <input id="occupation" type="text" class="form-control @error('occupation') is-invalid @enderror" name="occupation" value="{{ old('occupation') }}" required autocomplete="occupation">
                                @error('occupation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                
                        <div class="row mb-3">
                            <label for="barangay" class="col-md-4 col-form-label text-md-end">{{ __('Select a Barangay') }}</label>
                        
                            <div class="col-md-6">
                                <select id="barangay" class="form-control @error('address') is-invalid @enderror" name="barangay_select" required onchange="toggleOtherAddressField()">
                                    <option value="">{{ __('Select a barangay') }}</option>
                                    <option value="Bagong Kalsada">Bagong Kalsada</option>
                                    <option value="Balsahan">Balsahan</option>
                                    <option value="Bancaan">Bancaan</option>
                                    <option value="Bucana Malaki">Bucana Malaki</option>
                                    <option value="Bucana Sasahan">Bucana Sasahan</option>
                                    <option value="Calubcob">Calubcob</option>
                                    <option value="Capt. C. Nazareno (Poblacion)">Capt. C. Nazareno (Poblacion)</option>
                                    <option value="Gombalza(Poblacion)">Gombalza (Poblacion)</option>
                                    <option value="Halang">Halang</option>
                                    <option value="Humbac">Humbac</option>
                                    <option value="Ibayo Estacion">Ibayo Estacion</option>
                                    <option value="Ibayo Silangan">Ibayo Silangan</option>
                                    <option value="Kanluran Rizal">Kanluran Rizal</option>
                                    <option value="Latoria">Latoria</option>
                                    <option value="Labac">Labac</option>
                                    <option value="Mabolo">Mabolo</option>
                                    <option value="Malainen Bago">Malainen Bago</option>
                                    <option value="Malainen Luma">Malainen Luma</option>
                                    <option value="Maquina">Maquina</option>
                                    <option value="Molino">Molino</option>
                                    <option value="Munting Mapino">Munting Mapino</option>
                                    <option value="Muzon">Muzon</option>
                                    <option value="Palangue 2">Palangue 2</option>
                                    <option value="Palangue 3">Palangue 3</option>
                                    <option value="Palangue Central">Palangue Central</option>
                                    <option value="Sabang">Sabang</option>
                                    <option value="San Roque">San Roque</option>
                                    <option value="Santulan">Santulan</option>
                                    <option value="Sapa">Sapa</option>
                                    <option value="Timalan Balsahan">Timalan Balsahan</option>
                                    <option value="Timalan Concepcion">Timalan Concepcion</option>
                                    <option value="Other">Other (Please Specify)</option>
                                </select>
                        
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3" id="otherAddressField" style="display: none;">
                            <label for="other_address" class="col-md-4 col-form-label text-md-end">{{ __('Other Address') }}</label>
                        
                            <div class="col-md-6">
                                <input id="other_address" type="text" class="form-control @error('other_address') is-invalid @enderror" name="other_address" value="{{ old('other_address') }}" autocomplete="other_address">
                        
                                @error('other_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- Hidden input to store the actual address -->
                        <input type="hidden" name="address" id="address" value="{{ old('address') }}">
                        
                        
                
                        <div class="row mb-3">
                            <label for="contact_info" class="col-md-4 col-form-label text-md-end">{{ __('Contact Number') }}</label>
                        
                            <div class="col-md-6">
                                <input id="contact_info" type="number" class="form-control @error('contact_info') is-invalid @enderror" name="contact_info" value="{{ old('contact_info') }}" required autocomplete="contact_info" step="1" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                            
                                @error('contact_info')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="toggle-password" style="cursor: pointer;">
                                            <i class="fas fa-eye"></i>
                                        </span>
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="toggle-password-confirm" style="cursor: pointer;">
                                            <i class="fas fa-eye"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

document.addEventListener('DOMContentLoaded', function () {
    var togglePassword = document.getElementById('toggle-password');
    var password = document.getElementById('password');

    togglePassword.addEventListener('click', function () {
        var type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.querySelector('i').classList.toggle('fa-eye');
        this.querySelector('i').classList.toggle('fa-eye-slash');
    });

    var togglePasswordConfirm = document.getElementById('toggle-password-confirm');
    var passwordConfirm = document.getElementById('password-confirm');

    togglePasswordConfirm.addEventListener('click', function () {
        var type = passwordConfirm.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordConfirm.setAttribute('type', type);
        this.querySelector('i').classList.toggle('fa-eye');
        this.querySelector('i').classList.toggle('fa-eye-slash');
    });
});

// Address Script

function toggleOtherAddressField() {
        var barangaySelect = document.getElementById('barangay');
        var otherAddressField = document.getElementById('otherAddressField');
        var addressInput = document.getElementById('address');

        if (barangaySelect.value === 'Other') {
            otherAddressField.style.display = 'flex';
        } else {
            otherAddressField.style.display = 'none';
            addressInput.value = barangaySelect.value;
        }
    }

    // Update the hidden address input when the other address field changes
    document.getElementById('other_address').addEventListener('input', function() {
        var addressInput = document.getElementById('address');
        var barangaySelect = document.getElementById('barangay');

        if (barangaySelect.value === 'Other') {
            addressInput.value = this.value;
        }
    });

    // Call the function on page load to set the initial state
    document.addEventListener('DOMContentLoaded', function () {
        toggleOtherAddressField();
    });
    
</script>
@endsection
