<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Naic Rural Health Unit</title>


   <link rel="icon" href="{{ asset('images/welcome_img/RHU_LOGO.ico') }}" type="image/x-icon">





    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/dist/css/adminlte.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('/plugins/sweetalert2/bootstrap-4.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap">
    <link rel="stylesheet" href="{{ asset('/plugins/bootstrap/css/bootstrap.min.css') }}">
    <style>
        .vertical-divider {
            border-left: 2.5px solid grey;
            /* Color of the vertical line */
            height: 40px;
            /* Fixed height to ensure visibility */
            margin: 0 50px;
            /* Add spacing around the line */
            border-color: #6c757d;
            /* Muted grey color */
            border-radius: 5px;
            /* Rounded edges */
            opacity: 0.6;
            /* Muted effect */
        }

        .navbar-nav .nav-item {
            display: flex;
            align-items: center;
            /* Center content vertically within nav items */
        }
    </style>



</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>

                {{-- <li class="nav-item d-none d-sm-inline-block text-center" style="margin-top: -5px;"> <!-- Adjusted margin-top to move it upward -->
        <a class="nav-link" href="/" style="padding: 6px;"> <!-- Added padding-top for additional spacing -->
            <span style="display: inline-block; width: 5em; text-align: center;"> <!-- Adjusted width and text-align -->
                <i class="fas fa-home" style="font-size: 2.5em;"></i> <!-- Adjusted font-size -->
            </span>
        </a>
    </li> --}}
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
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
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

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

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-0">
            <!-- Brand Logo -->


            {{-- <img src="{{ asset('/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span> --}}

            <ul class="navbar-nav">
                <li class="nav-item d-none d-sm-inline-block text-center" style="margin-top: -5px;">
                    <!-- Adjusted margin-top to move it upward -->
                    <a class="brand-link" href="/"> <!-- Added padding-top for additional spacing -->
                        <span style="text-align: left;"> <!-- Adjusted width and text-align -->
                            <i class="fas fa-home" style="font-size: 2.5em;"></i> <!-- Adjusted font-size -->
                        </span>
                        <span class="brand-text font-weight-light"
                            style="font-family: Montserrat, sans-serif; font-size: 14px;">NAIC Rural Health Unit</span>
                    </a>
                </li>
            </ul>



            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          
          <img src="{{ asset('/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="/home" class="d-block"><h5><strong> {{ Auth::user()->full_name }}</strong></h5></a>
        </div>
      </div> --}}

                @canany(['Admin-view', 'Nurse-view'])


                    <!-- SidebarSearch Form -->
                    {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}
                @endcan

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library
              menu-open -->

                        <a href="{{ url('/home') }}" class="nav-link {{ request()->is('home') ? 'active' : '' }}">
                            <center>
                                <i class="nav-icon fas fa-user-circle" style="font-size: 20px;"></i>
                                <p> {{ Auth::user()->full_name }}</p>
                            </center>
                        </a>



                        <li
                            class="nav-item {{ request()->is('users') || request()->is('roles') || request()->is('events') ? 'menu-open' : '' }}">








                            @canany(['Admin-view', 'Nurse-view'])
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Management
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                            @endcan

                            @canany(['Admin-view', 'Nurse-view'])
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">

                                        <a href="{{ route('users.index') }}"
                                            class="nav-link {{ request()->is('users') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Users</p>
                                        </a>
                                    </li>

                                    {{-- @can('event-list') --}}
                                    <li class="nav-item">
                                        <a href="{{ route('events.index') }}"
                                            class="nav-link {{ request()->is('events') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Events</p>
                                        </a>
                                    </li>
                                    {{-- @endcan --}}
                                @endcan

                                @can('Admin-view')
                                    <li class="nav-item">

                                        <a href="{{ route('roles.index') }}"
                                            class="nav-link {{ request()->is('roles') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Roles</p>
                                        </a>
                                    </li>
                                @endcan

                                @can('Admin-view')
                                    <li class="nav-item">

                                        <a href="{{ route('questions.index') }}"
                                            class="nav-link {{ request()->is('questions') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Donor Form</p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>

                        </li>
                        {{-- 2nd ROW --}}
                        <li
                            class="nav-item {{ request()->is('users') || request()->is('roles') || request()->is('events') ? 'menu-open' : '' }}">
                            {{-- <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Schedule 
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
                
              <a href="{{ route('users.index') }}" class="nav-link {{ (request()->is('users')) ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Calendar</p>
              </a>
            </li>
          </ul>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Simple Link is here
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li> --}}
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            {{-- BODY CONTENT GO HERE - VANZ --}}
            <main class="py-4">
                @yield('content')
            </main>


        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

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


    <!-- Page specific script -->
    <script>
        $(function() {
            // Assuming the logged-in user is stored in the 'loggedInUser' variable from Laravel
            var loggedInUser = "{{ Auth::user()->full_name }}"; // Pass the user's name here
    
            $("#example1").DataTable({
                responsive: {
                    details: {
                        type: 'column',
                        target: 'tr'
                    }
                },
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": [
                    "copy", "csv", "excel", 
                    {
                        extend: 'pdfHtml5',
                        text: 'PDF',
                        title: 'Custom Report Title',
                        orientation: 'portrait',
                        pageSize: 'A4',
                        customize: function(doc) {
                            // Adding "Prepared By" section to the PDF
                            doc.content.splice(0, 0, {
                                text: 'Prepared By: ' + loggedInUser, 
                                alignment: 'left',
                                margin: [0, 10, 0, 10],
                                style: 'preparedBy' // Custom style
                            });
    
                            // Custom style for "Prepared By"
                            doc.styles.preparedBy = {
                                fontSize: 10,
                                italic: true,
                                margin: [0, 0, 0, 10]
                            };
    
                            // Add your other customizations here (like headers, footers, etc.)
                            doc.footer = function(currentPage, pageCount) {
                                return {
                                    text: currentPage.toString() + ' of ' + pageCount,
                                    alignment: 'center',
                                    margin: [10, 0]
                                };
                            };
                        }
                    },
                    "print", "colvis"
                ]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
</body>

</html>
