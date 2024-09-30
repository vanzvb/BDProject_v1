@extends('layouts.app')

<style>
    /* Custom style to force uppercase */
    .uppercase-input {
        text-transform: uppercase;
    }

    .uppercase-select option {
        text-transform: uppercase;
    }
</style>

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
                                <strong>Start Date:</strong>
                                {{ \Carbon\Carbon::parse($event->start_date)->format('F j, Y') }} <br>
                                <strong>End Date:</strong> {{ \Carbon\Carbon::parse($event->end_date)->format('F j, Y') }}
                                <br>
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
                                <label for="first_name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>
                                <div class="col-md-6">
                                    <input id="first_name" type="text"
                                        class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                        value="{{ old('first_name') }}" required autocomplete="first_name"
                                        style="text-transform: uppercase;" oninput="this.value = this.value.toUpperCase();">

                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="middle_name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Middle Name') }}</label>
                                <div class="col-md-6">
                                    <input id="middle_name" type="text"
                                        class="form-control @error('middle_name') is-invalid @enderror" name="middle_name"
                                        value="{{ old('middle_name') }}" required autocomplete="middle_name"
                                        style="text-transform: uppercase;" oninput="this.value = this.value.toUpperCase();">

                                    @error('middle_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="last_name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>
                                <div class="col-md-6">
                                    <input id="last_name" type="text"
                                        class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                        value="{{ old('last_name') }}" required autocomplete="last_name"
                                        style="text-transform: uppercase;" oninput="this.value = this.value.toUpperCase();">

                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>





                            <div class="row mb-3">
                                <label for="blood_type"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Blood Type') }}</label>

                                <div class="col-md-6">
                                    <select id="blood_type" class="form-control @error('blood_type') is-invalid @enderror"
                                        name="blood_type" required>
                                        <option value="" disabled selected>Select your blood type</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                        <option value="UNKNOWN">NOT SURE</option>
                                    </select>

                                    @error('blood_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="birthdate"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Birthdate') }}</label>

                                <div class="col-md-6">
                                    <input id="birthdate" type="date"
                                        class="form-control @error('age') is-invalid @enderror" name="birthdate"
                                        value="{{ old('birthdate') }}" required autocomplete="bday"
                                        onchange="calculateAge()">

                                    @error('age')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <!-- Add a space for an error message related to age -->
                                    <span id="age-error" class="text-danger"></span>
                                </div>
                            </div>

                            {{-- <div class="row mb-3">
                            <label for="age" class="col-md-4 col-form-label text-md-end">{{ __('Age') }}</label>
                        
                            <div class="col-md-6">
                                <input id="age" type="number" class="form-control" name="age" readonly>
                            </div>
                        </div> --}}

                            {{-- <div class="row mb-3">
                            <label for="age" class="col-md-4 col-form-label text-md-end">{{ __('Age') }}</label>
                        
                            <div class="col-md-6">
                                <input id="age" type="number" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" required autocomplete="age" step="1" oninput="this.value = this.value.replace(/[^0-9]/g, ''); if (this.value.length > 3) this.value = this.value.slice(0, 3);" maxlength="3">
                            
                                @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}


                            <div class="row mb-3">
                                <label for="gender"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Sex') }}</label>
                                <div class="col-md-6">
                                    <select id="gender"
                                        class="form-control @error('gender') is-invalid @enderror uppercase-select"
                                        name="gender" required>
                                        <option value="" disabled selected>Select your Sex</option>
                                        <option value="MALE">MALE</option>
                                        <option value="FEMALE">FEMALE</option>
                                    </select>
                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="civil_status"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Civil Status') }}</label>
                                <div class="col-md-6">
                                    <select id="civil_status"
                                        class="form-control @error('civil_status') is-invalid @enderror uppercase-select"
                                        name="civil_status" required>
                                        <option value="" disabled selected>Select your civil status</option>
                                        <option value="SINGLE">SINGLE</option>
                                        <option value="MARRIED">MARRIED</option>
                                        <option value="DIVORCED">DIVORCED</option>
                                        <option value="WIDOWED">WIDOWED</option>
                                        <option value="LEGALLY SEPARATED">LEGALLY SEPARATED</option>
                                    </select>
                                    @error('civil_status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="nationality"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Nationality') }}</label>
                                <div class="col-md-6">
                                    <input id="nationality" type="text"
                                        class="form-control @error('nationality') is-invalid @enderror" name="nationality"
                                        value="{{ old('nationality') }}" required autocomplete="nationality"
                                        style="text-transform: uppercase;"
                                        oninput="this.value = this.value.toUpperCase();">
                                    @error('nationality')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="occupation"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Occupation') }}</label>
                                <div class="col-md-6">
                                    <input id="occupation" type="text"
                                        class="form-control @error('occupation') is-invalid @enderror" name="occupation"
                                        value="{{ old('occupation') }}" required autocomplete="occupation"
                                        style="text-transform: uppercase;"
                                        oninput="this.value = this.value.toUpperCase();">
                                    @error('occupation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="barangay"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Select a Barangay') }}</label>
                                <div class="col-md-6">
                                    <select id="barangay" class="form-control @error('address') is-invalid @enderror"
                                        name="barangay_select" required onchange="toggleOtherAddressField()">
                                        <option value="">{{ __('Select a barangay') }}</option>
                                        <option value="BAGONG KALSADA">BAGONG KALSADA</option>
                                        <option value="BALSAHAN">BALSAHAN</option>
                                        <option value="BANCAAN">BANCAAN</option>
                                        <option value="BUCANA MALAKI">BUCANA MALAKI</option>
                                        <option value="BUCANA SASAHAN">BUCANA SASAHAN</option>
                                        <option value="CALUBCOB">CALUBCOB</option>
                                        <option value="CAPT. C. NAZARENO (POBLACION)">CAPT. C. NAZARENO (POBLACION)
                                        </option>
                                        <option value="GOMBALZA (POBLACION)">GOMBALZA (POBLACION)</option>
                                        <option value="HALANG">HALANG</option>
                                        <option value="HUMBAC">HUMBAC</option>
                                        <option value="IBAYO ESTACION">IBAYO ESTACION</option>
                                        <option value="IBAYO SILANGAN">IBAYO SILANGAN</option>
                                        <option value="KANLURAN RIZAL">KANLURAN RIZAL</option>
                                        <option value="LATORIA">LATORIA</option>
                                        <option value="LABAC">LABAC</option>
                                        <option value="MABOLO">MABOLO</option>
                                        <option value="MALAINEN BAGO">MALAINEN BAGO</option>
                                        <option value="MALAINEN LUMA">MALAINEN LUMA</option>
                                        <option value="MAQUINA">MAQUINA</option>
                                        <option value="MOLINO">MOLINO</option>
                                        <option value="MUNTING MAPINO">MUNTING MAPINO</option>
                                        <option value="MUZON">MUZON</option>
                                        <option value="PALANGUE 2">PALANGUE 2</option>
                                        <option value="PALANGUE 3">PALANGUE 3</option>
                                        <option value="PALANGUE CENTRAL">PALANGUE CENTRAL</option>
                                        <option value="SABANG">SABANG</option>
                                        <option value="SAN ROQUE">SAN ROQUE</option>
                                        <option value="SANTULAN">SANTULAN</option>
                                        <option value="SAPA">SAPA</option>
                                        <option value="TIMALAN BALSAHAN">TIMALAN BALSAHAN</option>
                                        <option value="TIMALAN CONCEPCION">TIMALAN CONCEPCION</option>
                                        <option value="OTHER">OTHER (PLEASE SPECIFY)</option>
                                    </select>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3" id="otherAddressField" style="display: none;">
                                <label for="other_address"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Other Address') }}</label>

                                <div class="col-md-6">
                                    <input id="other_address" type="text"
                                        class="form-control @error('other_address') is-invalid @enderror"
                                        name="other_address" value="{{ old('other_address') }}"
                                        autocomplete="other_address" style="text-transform: uppercase;" required>

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
                                <label for="contact_info"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Contact Number') }}</label>

                                <div class="col-md-6">
                                    <input id="contact_info" type="number"
                                        class="form-control @error('contact_info') is-invalid @enderror"
                                        name="contact_info" value="{{ old('contact_info') }}" required
                                        autocomplete="contact_info" step="1"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '');">

                                    @error('contact_info')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password">
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
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="toggle-password-confirm"
                                                style="cursor: pointer;">
                                                <i class="fas fa-eye"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" id="submit-btn">
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
        // Birhdate to Age 
        function calculateAge() {
            const birthdate = document.getElementById('birthdate').value;
            const ageErrorElement = document.getElementById('age-error');
            const submitButton = document.getElementById('submit-btn');

            if (birthdate) {
                const today = new Date();
                const birthDateObj = new Date(birthdate);
                let age = today.getFullYear() - birthDateObj.getFullYear();
                const monthDiff = today.getMonth() - birthDateObj.getMonth();

                if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDateObj.getDate())) {
                    age--;
                }

                // Check if the user is below 18
                if (age < 18) {
                    ageErrorElement.textContent = "Minors are not allowed to donate blood.";
                    document.getElementById('birthdate').classList.add('is-invalid');
                    submitButton.disabled = true; // Disable the submit button
                } else {
                    ageErrorElement.textContent = ""; // Clear the error if the age is valid
                    document.getElementById('birthdate').classList.remove('is-invalid');
                    submitButton.disabled = false; // Enable the submit button
                }
            } else {
                submitButton.disabled = false; // Enable button if no date is selected yet
            }
        }




        document.addEventListener('DOMContentLoaded', function() {
            var togglePassword = document.getElementById('toggle-password');
            var password = document.getElementById('password');

            togglePassword.addEventListener('click', function() {
                var type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                this.querySelector('i').classList.toggle('fa-eye');
                this.querySelector('i').classList.toggle('fa-eye-slash');
            });

            var togglePasswordConfirm = document.getElementById('toggle-password-confirm');
            var passwordConfirm = document.getElementById('password-confirm');

            togglePasswordConfirm.addEventListener('click', function() {
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

            if (barangaySelect.value === 'OTHER') {
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

            if (barangaySelect.value === 'OTHER') {
                addressInput.value = this.value;
            }
        });

        // Call the function on page load to set the initial state
        document.addEventListener('DOMContentLoaded', function() {
            toggleOtherAddressField();
        });
    </script>
@endsection
