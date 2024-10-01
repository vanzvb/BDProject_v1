<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <link rel="stylesheet" href="{{ asset('/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap">
  

    <style>
    .vertical-divider {
    border-left: 2px solid grey; /* Color of the vertical line */
    height: 40px; /* Fixed height to ensure visibility */
    margin: 0 15px; /* Add spacing around the line */
    border-color: #6c757d; /* Muted grey color */
    border-radius: 5px; /* Rounded edges */
    opacity: 0.6; /* Muted effect */
}

.navbar-nav .nav-item {
    display: flex;
    align-items: center; /* Center content vertically within nav items */
}
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <!-- Left navbar links -->
    
    {{-- <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block text-center" style="margin-top: -5px;"> <!-- Adjusted margin-top to move it upward -->
            <a class="nav-link" href="/" style="padding: 6px;"> <!-- Added padding-top for additional spacing -->
                <span style="display: inline-block; width: 5em; text-align: center;"> <!-- Adjusted width and text-align -->
                    <i class="fas fa-home" style="font-size: 2.5em;"></i> <!-- Adjusted font-size -->
                </span>
            </a>
        </li>
    </ul> --}}
    
  
    <a class="nav-link" href="/" style="display: flex; align-items: center; justify-content: center;">
        <img src="{{ asset('images/welcome_img/RHU_LOGO.png') }}" style="height: 80px; margin-right: 20px;"> <!-- Adjust height as needed -->
        <h1 style="font-family: Montserrat, sans-serif; color: #004b7e; margin: 0;">
            <strong>NAIC Rural Health Unit</strong>
        </h1>
    </a>
    
    
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto ">
        @guest
            @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
            @endif

            @if (Route::has('auth.form'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('auth.form') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else

        @canany(['Admin-view', 'Nurse-view'])
        <li><a class="nav-link" href="{{ route('users.index') }}">Manage Users</a></li>
        <li><a class="nav-link" href="{{ route('events.index') }}">Manage Events</a></li>
        @endcanany
        @can('Admin-view')
        <li><a class="nav-link" href="{{ route('roles.index') }}">Manage Role</a></li>
        <li><a class="nav-link" href="{{ route('questions.index') }}">Manage Donor Form</a></li>
        @endcan
        
      

         <!-- Vertical divider -->
         <li class="nav-item vertical-divider"></li>
         <!-- End vertical divider -->

         <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->full_name }}
            </a>
        
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <!-- Link to redirect to /home -->
                <a class="dropdown-item" href="{{ url('/home') }}">
                    Profile
                </a>
        
                <!-- Logout link (existing code) -->
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
        
                <!-- Logout form (existing code) -->
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
            <li><a class="nav-link" href="#"></a></li>
        @endguest


    </ul>
</nav>
<!-- /.navbar -->


<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/dist/js/adminlte.min.js') }}"></script>
<!-- Script for dropdown (logout)-->
<script src="{{ asset('js/app.js') }}" defer></script>

<!-- DataTables  & Plugins -->
<script src="{{ asset('/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>





</body>
</html>