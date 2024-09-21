<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | DataTables</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/dist/css/adminlte.min.css') }}">

    {{-- NEWLY ADDED --}}
     
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

     {{-- Bootstrap 4 --}}
     <link rel="stylesheet" href="{{ asset('../plugins/bootstrap/css/bootstrap.min.css') }}">

     {{-- Custom CSS for FAQ section --}}
     <style>
         .accordion-header {
             cursor: pointer;
             padding: 10px 15px;
             background-color: #f8f9fa;
             border: 1px solid #dee2e6;
             margin-bottom: 1px;
             position: relative;
         }
 
         .accordion-title {
             flex: 1;
         }
 
         .accordion-icon {
             position: absolute;
             right: 15px;
             top: 50%;  
             transform: translateY(-50%);
         }
 
         .rotate-icon {
             transform: translateY(-50%) rotate(45deg);
         }
 
         .accordion-body {
             padding: 15px;
             border-top: 1px solid #dee2e6;
             display: none;
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
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                {{-- <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li> --}}

                <!-- Messages Dropdown Menu -->
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li> --}}
                <!-- Notifications Dropdown Menu -->
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"
                        role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li> --}}

                <!-- Login/Register Links -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('auth.form') }}">{{ __('Register') }}</a>
            </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="" class="brand-link">
                <img src="" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Alexander Pierce</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard v1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard v2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard v3</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Widgets
                                    <span class="right badge badge-danger">New</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Layout Options
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right">6</span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../layout/top-nav.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Top Navigation</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../layout/top-nav-sidebar.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Top Navigation + Sidebar</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../layout/boxed.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Boxed</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../layout/fixed-sidebar.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Fixed Sidebar</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../layout/fixed-sidebar-custom.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Fixed Sidebar <small>+ Custom Area</small></p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../layout/fixed-topnav.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Fixed Navbar</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../layout/fixed-footer.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Fixed Footer</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../layout/collapsed-sidebar.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Collapsed Sidebar</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Charts
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../charts/chartjs.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>ChartJS</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../charts/flot.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Flot</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../charts/inline.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Inline</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../charts/uplot.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>uPlot</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tree"></i>
                                <p>
                                    UI Elements
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../UI/general.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>General</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../UI/icons.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Icons</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../UI/buttons.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Buttons</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../UI/sliders.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Sliders</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../UI/modals.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Modals & Alerts</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../UI/navbar.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Navbar & Tabs</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../UI/timeline.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Timeline</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../UI/ribbons.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Ribbons</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Forms
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../forms/general.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>General Elements</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../forms/advanced.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Advanced Elements</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../forms/editors.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Editors</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../forms/validation.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Validation</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Tables
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../tables/simple.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Simple Tables</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../tables/data.html" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>DataTables</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../tables/jsgrid.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>jsGrid</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-header">EXAMPLES</li>
                        <li class="nav-item">
                            <a href="../calendar.html" class="nav-link">
                                <i class="nav-icon far fa-calendar-alt"></i>
                                <p>
                                    Calendar
                                    <span class="badge badge-info right">2</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../gallery.html" class="nav-link">
                                <i class="nav-icon far fa-image"></i>
                                <p>
                                    Gallery
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../kanban.html" class="nav-link">
                                <i class="nav-icon fas fa-columns"></i>
                                <p>
                                    Kanban Board
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-envelope"></i>
                                <p>
                                    Mailbox
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../mailbox/mailbox.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Inbox</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../mailbox/compose.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Compose</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../mailbox/read-mail.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Read</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Pages
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../examples/invoice.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Invoice</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../examples/profile.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Profile</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../examples/e-commerce.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>E-commerce</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../examples/projects.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Projects</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../examples/project-add.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Project Add</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../examples/project-edit.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Project Edit</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../examples/project-detail.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Project Detail</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../examples/contacts.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Contacts</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../examples/faq.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>FAQ</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../examples/contact-us.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Contact us</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-plus-square"></i>
                                <p>
                                    Extras
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Login & Register v1
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="../examples/login.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Login v1</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="../examples/register.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Register v1</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="../examples/forgot-password.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Forgot Password v1</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="../examples/recover-password.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Recover Password v1</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Login & Register v2
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="../examples/login-v2.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Login v2</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="../examples/register-v2.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Register v2</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="../examples/forgot-password-v2.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Forgot Password v2</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="../examples/recover-password-v2.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Recover Password v2</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="../examples/lockscreen.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Lockscreen</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../examples/legacy-user-menu.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Legacy User Menu</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../examples/language-menu.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Language Menu</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../examples/404.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Error 404</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../examples/500.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Error 500</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../examples/pace.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pace</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../examples/blank.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Blank Page</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../starter.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Starter Page</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-search"></i>
                                <p>
                                    Search
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../search/simple.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Simple Search</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../search/enhanced.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Enhanced</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-header">MISCELLANEOUS</li>
                        <li class="nav-item">
                            <a href="../../iframe.html" class="nav-link">
                                <i class="nav-icon fas fa-ellipsis-h"></i>
                                <p>Tabbed IFrame Plugin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="https://adminlte.io/docs/3.1/" class="nav-link">
                                <i class="nav-icon fas fa-file"></i>
                                <p>Documentation</p>
                            </a>
                        </li>
                        <li class="nav-header">MULTI LEVEL EXAMPLE</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>Level 1</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-circle"></i>
                                <p>
                                    Level 1
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Level 2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Level 2
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Level 3</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Level 3</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Level 3</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Level 2</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>Level 1</p>
                            </a>
                        </li>
                        <li class="nav-header">LABELS</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-circle text-danger"></i>
                                <p class="text">Important</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-circle text-warning"></i>
                                <p>Warning</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-circle text-info"></i>
                                <p>Informational</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        {{-- VANZ --}}
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>DataTables</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">DataTables</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            {{-- NEW BLOOD DONATION SECTION --}}
                            <div class="card shadow">
                                <div class="card-header bg-primary text-white">
                                    <h3 class="card-title"><i class="fas fa-hand-holding-heart"></i> Guide to Blood Donation</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="mb-3"><i class="fas fa-check-circle text-success"></i> Do's of Blood Donation:</h4>
                                            <ul class="list-group">
                                                <li class="list-group-item">Stay hydrated: Drink plenty of water or juice before donating.</li>
                                                <li class="list-group-item">Eat well: Have a nutritious meal before your donation.</li>
                                                <li class="list-group-item">Rest well: Get a good night's sleep before donating.</li>
                                                <li class="list-group-item">Bring ID: Carry a valid ID for identification.</li>
                                                <li class="list-group-item">Inform staff: Let them know about any health concerns.</li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <h4 class="mb-3"><i class="fas fa-times-circle text-danger"></i> Don'ts of Blood Donation:</h4>
                                            <ul class="list-group">
                                                <li class="list-group-item">Don't skip meals: Eat before donating to maintain blood sugar levels.</li>
                                                <li class="list-group-item">Avoid alcohol: Refrain from drinking alcohol 24 hours before donation.</li>
                                                <li class="list-group-item">No smoking: Don't smoke one hour before or after donating.</li>
                                                <li class="list-group-item">Avoid intense exercise: Skip vigorous exercise on donation day.</li>
                                                <li class="list-group-item">Postpone if sick: Wait until you recover from illness.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /.row -->
            
                                    {{-- <div class="mt-4">
                                        <h4 class="mb-3"><i class="fas fa-info-circle text-info"></i> Before Blood Donation:</h4>
                                        <ul class="list-group">
                                            <li class="list-group-item">Check eligibility: Ensure you meet donation criteria.</li>
                                            <li class="list-group-item">Review medical history: Be ready to discuss your health.</li>
                                            <li class="list-group-item">Bring ID and documents: Carry necessary identification and documents.</li>
                                            <li class="list-group-item">Wear suitable clothing: Choose clothing with sleeves that can be rolled up.</li>
                                            <li class="list-group-item">Plan for recovery: Rest and have a light snack post-donation.</li>
                                        </ul>
                                    </div>
                                    <!-- /.mt-4 --> --}}
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->  
                        </div>
                        <!-- /.col do's and dont's -->


                    <div class="col-lg-6 offset-lg-0">
                             <!-- FAQ SECTION -->
                            <div class="card shadow mt-4">
                                <div class="card-header bg-info text-white">
                                    <h3 class="card-title"><i class="fas fa-question-circle"></i> Frequently Asked Questions</h3>
                                </div>
                                <div class="card-body">
                                    <div class="accordion" id="faqAccordion">
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <div class="accordion-header" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    <span class="accordion-title">How often can I donate blood?</span>
                                                    <i class="fas fa-plus accordion-icon"></i>
                                                </div>
                                            </div>
                                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#faqAccordion">
                                                <div class="card-body">
                                                    You must wait at least 56 days between donations of whole blood and 112 days between Power Red donations.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingTwo">
                                                <div class="accordion-header collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    <span class="accordion-title">Who can donate blood?</span>
                                                    <i class="fas fa-plus accordion-icon"></i>
                                                </div>
                                            </div>
                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                                                <div class="card-body">
                                                    Most people can donate blood if they are in good health. Age, weight, and other factors may affect eligibility.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingThree">
                                                <div class="accordion-header collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    <span class="accordion-title">Does donating blood hurt?</span>
                                                    <i class="fas fa-plus accordion-icon"></i>
                                                </div>
                                            </div>
                                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
                                                <div class="card-body">
                                                    Donating blood is usually painless. You may feel a slight pinch when the needle is inserted, but discomfort is minimal.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingFour">
                                                <div class="accordion-header collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                    <span class="accordion-title">Can I donate if I have a cold?</span>
                                                    <i class="fas fa-plus accordion-icon"></i>
                                                </div>
                                            </div>
                                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#faqAccordion">
                                                <div class="card-body">
                                                    If you have cold or flu symptoms, it is best to wait until you are feeling better before donating blood.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingFive">
                                                <div class="accordion-header collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                    <span class="accordion-title">How long does the donation process take?</span>
                                                    <i class="fas fa-plus accordion-icon"></i>
                                                </div>
                                            </div>
                                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#faqAccordion">
                                                <div class="card-body">
                                                    The entire donation process typically takes about an hour, including registration, medical history, donation, and refreshments.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.accordion -->
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card SHADOW FAQ SECTION-->

                            {{-- ADD SECTIONS HERE --}}

                    </div>
                    <!-- /.col FAQ SECTION -->

                    <!-- ANALYTIC REPORTS -->
                    <div class="col-lg-6 offset-lg-0">
                                        <!-- ANALYTIC REPORTS -->
                        <div class="card shadow mt-4">
                            <!-- /.card-header -->
                            <div class="card-header bg-info text-white">
                                <h3 class="card-title"><i class="fas fa-chart-bar"></i> Blood Donation Analytics</h3>
                            </div>
                                    <!-- /.card-barangays-->
                                <div class="card-body">
                                    <div id="analyticsAccordion">

                                            <div class="row">
                                                        <!-- Mabolo Card -->
                                                        <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                                                            <div class="card bg-primary text-white">
                                                                <div class="card-header border-0 py-3" id="headingMabolo" data-toggle="collapse" data-target="#collapseMabolo" aria-expanded="true" aria-controls="collapseMabolo">
                                                                    <h5 class="mb-0">Mabolo</h5>
                                                                </div>
                                                                <div id="collapseMabolo" class="collapse" aria-labelledby="headingMabolo" data-parent="#analyticsAccordion">
                                                                    <div class="card-body">
                                                                        <h6>Blood Types Donated</h6>
                                                                        <ul class="list-group mb-3">
                                                                            <li class="list-group-item">A+: <span id="mabolo-a-positive">0</span></li>
                                                                            <li class="list-group-item">A-: <span id="mabolo-a-negative">0</span></li>
                                                                            <li class="list-group-item">B+: <span id="mabolo-b-positive">0</span></li>
                                                                            <li class="list-group-item">B-: <span id="mabolo-b-negative">0</span></li>
                                                                            <li class="list-group-item">AB+: <span id="mabolo-ab-positive">0</span></li>
                                                                            <li class="list-group-item">AB-: <span id="mabolo-ab-negative">0</span></li>
                                                                            <li class="list-group-item">O+: <span id="mabolo-o-positive">0</span></li>
                                                                            <li class="list-group-item">O-: <span id="mabolo-o-negative">0</span></li>
                                                                        </ul>
                                                                        <h6>Donor Genders</h6>
                                                                        <ul class="list-group">
                                                                            <li class="list-group-item">Male: <span id="mabolo-male">0</span></li>
                                                                            <li class="list-group-item">Female: <span id="mabolo-female">0</span></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Labac Card -->
                                                        <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                                                            <div class="card bg-primary text-white">
                                                                <div class="card-header border-0 py-3" id="headingLabac" data-toggle="collapse" data-target="#collapseLabac" aria-expanded="true" aria-controls="collapseLabac">
                                                                    <h5 class="mb-0">Labac</h5>
                                                                </div>
                                                                <div id="collapseLabac" class="collapse" aria-labelledby="headingLabac" data-parent="#analyticsAccordion">
                                                                    <div class="card-body">
                                                                        <h6>Blood Types Donated</h6>
                                                                        <ul class="list-group mb-3">
                                                                            <li class="list-group-item">A+: <span id="labac-a-positive">0</span></li>
                                                                            <li class="list-group-item">A-: <span id="labac-a-negative">0</span></li>
                                                                            <li class="list-group-item">B+: <span id="labac-b-positive">0</span></li>
                                                                            <li class="list-group-item">B-: <span id="labac-b-negative">0</span></li>
                                                                            <li class="list-group-item">AB+: <span id="labac-ab-positive">0</span></li>
                                                                            <li class="list-group-item">AB-: <span id="labac-ab-negative">0</span></li>
                                                                            <li class="list-group-item">O+: <span id="labac-o-positive">0</span></li>
                                                                            <li class="list-group-item">O-: <span id="labac-o-negative">0</span></li>
                                                                        </ul>
                                                                        <h6>Donor Genders</h6>
                                                                        <ul class="list-group">
                                                                            <li class="list-group-item">Male: <span id="labac-male">0</span></li>
                                                                            <li class="list-group-item">Female: <span id="labac-female">0</span></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Bancaan Card -->
                                                        <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                                                            <div class="card bg-primary text-white">
                                                                <div class="card-header border-0 py-3" id="headingBancaan" data-toggle="collapse" data-target="#collapseBancaan" aria-expanded="true" aria-controls="collapseBancaan">
                                                                    <h5 class="mb-0">Bancaan</h5>
                                                                </div>
                                                                <div id="collapseBancaan" class="collapse" aria-labelledby="headingBancaan" data-parent="#analyticsAccordion">
                                                                    <div class="card-body">
                                                                        <h6>Blood Types Donated</h6>
                                                                        <ul class="list-group mb-3">
                                                                            <li class="list-group-item">A+: <span id="bancaan-a-positive">0</span></li>
                                                                            <li class="list-group-item">A-: <span id="bancaan-a-negative">0</span></li>
                                                                            <li class="list-group-item">B+: <span id="bancaan-b-positive">0</span></li>
                                                                            <li class="list-group-item">B-: <span id="bancaan-b-negative">0</span></li>
                                                                            <li class="list-group-item">AB+: <span id="bancaan-ab-positive">0</span></li>
                                                                            <li class="list-group-item">AB-: <span id="bancaan-ab-negative">0</span></li>
                                                                            <li class="list-group-item">O+: <span id="bancaan-o-positive">0</span></li>
                                                                            <li class="list-group-item">O-: <span id="bancaan-o-negative">0</span></li>
                                                                        </ul>
                                                                        <h6>Donor Genders</h6>
                                                                        <ul class="list-group">
                                                                            <li class="list-group-item">Male: <span id="bancaan-male">0</span></li>
                                                                            <li class="list-group-item">Female: <span id="bancaan-female">0</span></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Bagong Kalsada Card -->
                                                        <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                                                            <div class="card bg-primary text-white">
                                                                <div class="card-header border-0 py-3" id="headingBagongKalsada" data-toggle="collapse" data-target="#collapseBagongKalsada" aria-expanded="true" aria-controls="collapseBagongKalsada">
                                                                    <h5 class="mb-0">Bagong Kalsada</h5>
                                                                </div>
                                                                <div id="collapseBagongKalsada" class="collapse" aria-labelledby="headingBagongKalsada" data-parent="#analyticsAccordion">
                                                                    <div class="card-body">
                                                                        <h6>Blood Types Donated</h6>
                                                                        <ul class="list-group mb-3">
                                                                            <li class="list-group-item">A+: <span id="bagong-kalsada-a-positive">0</span></li>
                                                                            <li class="list-group-item">A-: <span id="bagong-kalsada-a-negative">0</span></li>
                                                                            <li class="list-group-item">B+: <span id="bagong-kalsada-b-positive">0</span></li>
                                                                            <li class="list-group-item">B-: <span id="bagong-kalsada-b-negative">0</span></li>
                                                                            <li class="list-group-item">AB+: <span id="bagong-kalsada-ab-positive">0</span></li>
                                                                            <li class="list-group-item">AB-: <span id="bagong-kalsada-ab-negative">0</span></li>
                                                                            <li class="list-group-item">O+: <span id="bagong-kalsada-o-positive">0</span></li>
                                                                            <li class="list-group-item">O-: <span id="bagong-kalsada-o-negative">0</span></li>
                                                                        </ul>
                                                                        <h6>Donor Genders</h6>
                                                                        <ul class="list-group">
                                                                            <li class="list-group-item">Male: <span id="bagong-kalsada-male">0</span></li>
                                                                        <li class="list-group-item">Female: <span id="bagong-kalsada-female">0</span></li>
                                                                    </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Bucana Sasahan Card -->
                                                        <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                                                            <div class="card bg-primary text-white">
                                                                <div class="card-header border-0 py-3" id="headingBucanaSasahan" data-toggle="collapse" data-target="#collapseBucanaSasahan" aria-expanded="true" aria-controls="collapseBucanaSasahan">
                                                                    <h5 class="mb-0">Bucana Sasahan</h5>
                                                                </div>
                                                                <div id="collapseBucanaSasahan" class="collapse" aria-labelledby="headingBucanaSasahan" data-parent="#analyticsAccordion">
                                                                    <div class="card-body">
                                                                        <h6>Blood Types Donated</h6>
                                                                        <ul class="list-group mb-3">
                                                                            <li class="list-group-item">A+: <span id="bucana-sasahan-a-positive">0</span></li>
                                                                            <li class="list-group-item">A-: <span id="bucana-sasahan-a-negative">0</span></li>
                                                                            <li class="list-group-item">B+: <span id="bucana-sasahan-b-positive">0</span></li>
                                                                            <li class="list-group-item">B-: <span id="bucana-sasahan-b-negative">0</span></li>
                                                                            <li class="list-group-item">AB+: <span id="bucana-sasahan-ab-positive">0</span></li>
                                                                            <li class="list-group-item">AB-: <span id="bucana-sasahan-ab-negative">0</span></li>
                                                                            <li class="list-group-item">O+: <span id="bucana-sasahan-o-positive">0</span></li>
                                                                            <li class="list-group-item">O-: <span id="bucana-sasahan-o-negative">0</span></li>
                                                                        </ul>
                                                                        <h6>Donor Genders</h6>
                                                                        <ul class="list-group">
                                                                            <li class="list-group-item">Male: <span id="bucana-sasahan-male">0</span></li>
                                                                            <li class="list-group-item">Female: <span id="bucana-sasahan-female">0</span></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Bucana Malaki Card -->
                                                        <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                                                            <div class="card bg-primary text-white">
                                                                <div class="card-header border-0 py-3" id="headingBucanaMalaki" data-toggle="collapse" data-target="#collapseBucanaMalaki" aria-expanded="true" aria-controls="collapseBucanaMalaki">
                                                                    <h5 class="mb-0">Bucana Malaki</h5>
                                                                </div>
                                                                <div id="collapseBucanaMalaki" class="collapse" aria-labelledby="headingBucanaMalaki" data-parent="#analyticsAccordion">
                                                                    <div class="card-body">
                                                                        <h6>Blood Types Donated</h6>
                                                                        <ul class="list-group mb-3">
                                                                            <li class="list-group-item">A+: <span id="bucana-malaki-a-positive">0</span></li>
                                                                            <li class="list-group-item">A-: <span id="bucana-malaki-a-negative">0</span></li>
                                                                            <li class="list-group-item">B+: <span id="bucana-malaki-b-positive">0</span></li>
                                                                            <li class="list-group-item">B-: <span id="bucana-malaki-b-negative">0</span></li>
                                                                            <li class="list-group-item">AB+: <span id="bucana-malaki-ab-positive">0</span></li>
                                                                            <li class="list-group-item">AB-: <span id="bucana-malaki-ab-negative">0</span></li>
                                                                            <li class="list-group-item">O+: <span id="bucana-malaki-o-positive">0</span></li>
                                                                            <li class="list-group-item">O-: <span id="bucana-malaki-o-negative">0</span></li>
                                                                        </ul>
                                                                        <h6>Donor Genders</h6>
                                                                        <ul class="list-group">
                                                                            <li class="list-group-item">Male: <span id="bucana-malaki-male">0</span></li>
                                                                            <li class="list-group-item">Female: <span id="bucana-malaki-female">0</span></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Balsahan Card -->
                                                        <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                                                            <div class="card bg-primary text-white">
                                                                <div class="card-header border-0 py-3" id="headingBalsahan" data-toggle="collapse" data-target="#collapseBalsahan" aria-expanded="true" aria-controls="collapseBalsahan">
                                                                    <h5 class="mb-0">Balsahan</h5>
                                                                </div>
                                                                <div id="collapseBalsahan" class="collapse" aria-labelledby="headingBalsahan" data-parent="#analyticsAccordion">
                                                                    <div class="card-body">
                                                                        <h6>Blood Types Donated</h6>
                                                                        <ul class="list-group mb-3">
                                                                            <li class="list-group-item">A+: <span id="balsahan-a-positive">0</span></li>
                                                                            <li class="list-group-item">A-: <span id="balsahan-a-negative">0</span></li>
                                                                            <li class="list-group-item">B+: <span id="balsahan-b-positive">0</span></li>
                                                                            <li class="list-group-item">B-: <span id="balsahan-b-negative">0</span></li>
                                                                            <li class="list-group-item">AB+: <span id="balsahan-ab-positive">0</span></li>
                                                                            <li class="list-group-item">AB-: <span id="balsahan-ab-negative">0</span></li>
                                                                            <li class="list-group-item">O+: <span id="balsahan-o-positive">0</span></li>
                                                                            <li class="list-group-item">O-: <span id="balsahan-o-negative">0</span></li>
                                                                        </ul>
                                                                        <h6>Donor Genders</h6>
                                                                        <ul class="list-group">
                                                                            <li class="list-group-item">Male: <span id="balsahan-male">0</span></li>
                                                                            <li class="list-group-item">Female: <span id="balsahan-female">0</span></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Calubcob Card -->
                                                        <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                                                            <div class="card bg-primary text-white">
                                                                <div class="card-header border-0 py-3" id="headingCalubcob" data-toggle="collapse" data-target="#collapseCalubcob" aria-expanded="true" aria-controls="collapseCalubcob">
                                                                    <h5 class="mb-0">Calubcob</h5>
                                                                </div>
                                                                <div id="collapseCalubcob" class="collapse" aria-labelledby="headingCalubcob" data-parent="#analyticsAccordion">
                                                                    <div class="card-body">
                                                                        <h6>Blood Types Donated</h6>
                                                                        <ul class="list-group mb-3">
                                                                            <li class="list-group-item">A+: <span id="calubcob-a-positive">0</span></li>
                                                                            <li class="list-group-item">A-: <span id="calubcob-a-negative">0</span></li>
                                                                            <li class="list-group-item">B+: <span id="calubcob-b-positive">0</span></li>
                                                                            <li class="list-group-item">B-: <span id="calubcob-b-negative">0</span></li>
                                                                            <li class="list-group-item">AB+: <span id="calubcob-ab-positive">0</span></li>
                                                                            <li class="list-group-item">AB-: <span id="calubcob-ab-negative">0</span></li>
                                                                            <li class="list-group-item">O+: <span id="calubcob-o-positive">0</span></li>
                                                                            <li class="list-group-item">O-: <span id="calubcob-o-negative">0</span></li>
                                                                        </ul>
                                                                        <h6>Donor Genders</h6>
                                                                        <ul class="list-group">
                                                                            <li class="list-group-item">Male: <span id="calubcob-male">0</span></li>
                                                                            <li class="list-group-item">Female: <spanid="calubcob-female">0</span></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    
                                            </div>
                                            <!-- BARANGAYS ROW -->


                                            <!-- BARANGAY LIST OLD-->
                                            <div class="card-body">
                                    
                                                <div class ="offset-lg-2 shadow m-1" id="analyticsAccordion">
                                                    <!-- Start of the row -->
                                                    <h1 class="my-4"><strong> List of Barangays in Naic</strong></h2>
                                                    <div class="row">
                                                        <!-- First group of 10 barangays -->
                                                        <div class="col-4 ">
                                                            <!-- Bagong Kalsada Section -->
                                                            <div class="m-2">
                                                                <h2 class="section-header">
                                                                    <button class="btn btn-primary barangay-btn" type="button" onclick="toggleTable('bagongKalsada')">
                                                                        <strong>Bagong Kalsada</strong>
                                                                    </button>
                                                                </h2>
                                                                <div class="table-container" id="bagongKalsada" style="display: none;">
                                                                    <table class="table table-bordered summary-table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Blood Type</th>
                                                                                <th>Male Donors</th>
                                                                                <th>Female Donors</th>
                                                                                <th>Total Donors</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>A+</td>
                                                                                <td>...</td> <!-- A+ male donors -->
                                                                                <td>...</td> <!-- A+ female donors -->
                                                                                <td>...</td> <!-- Total donors for A+ -->
                                                                            </tr>
                                                                            <tr>
                                                                                <td>A-</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>B+</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>B-</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>AB+</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>AB-</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>O+</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>O-</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                
                                                            <!-- Balsahan Section -->
                                                            <div class="m-2">
                                                                <h2 class="section-header">
                                                                    <button class="btn btn-primary barangay-btn" type="button" onclick="toggleTable('balsahan')">
                                                                        <strong>Balsahan</strong>
                                                                    </button>
                                                                </h2>
                                                                <div class="table-container" id="balsahan" style="display: none;">
                                                                    <table class="table table-bordered summary-table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Blood Type</th>
                                                                                <th>Male Donors</th>
                                                                                <th>Female Donors</th>
                                                                                <th>Total Donors</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>A+</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>A-</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>B+</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>B-</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>AB+</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>AB-</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>O+</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>O-</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                
                                                            <!-- Bancaan Section -->
                                                            <div class="m-2">
                                                                <h2 class="section-header">
                                                                    <button class="btn btn-primary barangay-btn" type="button" onclick="toggleTable('bancaan')">
                                                                        <strong>Bancaan</strong>
                                                                    </button>
                                                                </h2>
                                                                <div class="table-container" id="bancaan" style="display: none;">
                                                                    <table class="table table-bordered summary-table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Blood Type</th>
                                                                                <th>Male Donors</th>
                                                                                <th>Female Donors</th>
                                                                                <th>Total Donors</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>A+</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>A-</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>B+</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>B-</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>AB+</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>AB-</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>O+</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>O-</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                               
                                                            <!-- Bucana Malaki Section -->
                                                            <div class="m-2">
                                                                <h2 class="section-header">
                                                                    <button class="btn btn-primary barangay-btn" type="button" onclick="toggleTable('bucanaMalaki')">
                                                                        <strong>Bucana Malaki</strong>
                                                                    </button>
                                                                </h2>
                                                                <div class="table-container" id="bucanaMalaki" style="display: none;">
                                                                    <table class="table table-bordered summary-table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Blood Type</th>
                                                                                <th>Male Donors</th>
                                                                                <th>Female Donors</th>
                                                                                <th>Total Donors</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>A+</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>A-</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>B+</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>B-</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>AB+</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>AB-</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>O+</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>O-</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
            
                                                            <!-- Bucana Sasahan Section -->
                                                            <div class="m-2">
                                                                <h2 class="section-header">
                                                                    <button class="btn btn-primary barangay-btn" type="button" onclick="toggleTable('bucanaSasahan')">
                                                                        <strong>Bucana Sasahan</strong>
                                                                    </button>
                                                                </h2>
                                                                <div class="table-container" id="bucanaSasahan" style="display: none;">
                                                                    <table class="table table-bordered summary-table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Blood Type</th>
                                                                                <th>Male Donors</th>
                                                                                <th>Female Donors</th>
                                                                                <th>Total Donors</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>A+</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>A-</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>B+</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>B-</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>AB+</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>AB-</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>O+</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>O-</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
            
                                                            <!-- Calubcob Section -->
                                                            <div class="m-2">
                                                                <h2 class="section-header">
                                                                    <button class="btn btn-primary barangay-btn" type="button" onclick="toggleTable('calubcob')">
                                                                        <strong>Calubcob</strong>
                                                                    </button>
                                                                </h2>
                                                                <div class="table-container" id="calubcob" style="display: none;">
                                                                    <table class="table table-bordered summary-table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Blood Type</th>
                                                                                <th>Male Donors</th>
                                                                                <th>Female Donors</th>
                                                                                <th>Total Donors</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>A+</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>A-</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>B+</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>B-</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>AB+</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>AB-</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>O+</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>O-</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
            
                                                            <!-- Capt. C. Nazareno (Poblacion) Section -->
                                                            <div class="m-2">
                                                                <h2 class="section-header">
                                                                    <button class="btn btn-primary barangay-btn" type="button" onclick="toggleTable('captNazareno')">
                                                                        <strong>Capt. C. Nazareno (Poblacion)</strong>
                                                                    </button>
                                                                </h2>
                                                                <div class="table-container" id="captNazareno" style="display: none;">
                                                                    <table class="table table-bordered summary-table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Blood Type</th>
                                                                                <th>Male Donors</th>
                                                                                <th>Female Donors</th>
                                                                                <th>Total Donors</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>A+</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>A-</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>B+</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>B-</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>AB+</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>AB-</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>O+</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>O-</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
            
                                                            <!-- Gombalza (Poblacion) Section -->
                                                            <div class="m-2">
                                                                <h2 class="section-header">
                                                                    <button class="btn btn-primary barangay-btn" type="button" onclick="toggleTable('gombalza')">
                                                                        <strong>Gombalza (Poblacion)</strong>
                                                                    </button>
                                                                </h2>
                                                                <div class="table-container" id="gombalza" style="display: none;">
                                                                    <table class="table table-bordered summary-table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Blood Type</th>
                                                                                <th>Male Donors</th>
                                                                                <th>Female Donors</th>
                                                                                <th>Total Donors</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>A+</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>A-</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>B+</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>B-</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>AB+</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>AB-</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>O+</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>O-</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
            
                                                            <!-- Halang Section -->
                                                            <div class="m-2">
                                                                <h2 class="section-header">
                                                                    <button class="btn btn-primary barangay-btn" type="button" onclick="toggleTable('halang')">
                                                                        <strong>Halang</strong>
                                                                    </button>
                                                                </h2>
                                                                <div class="table-container" id="halang" style="display: none;">
                                                                    <table class="table table-bordered summary-table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Blood Type</th>
                                                                                <th>Male Donors</th>
                                                                                <th>Female Donors</th>
                                                                                <th>Total Donors</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>A+</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>A-</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>B+</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>B-</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>AB+</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>AB-</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>O+</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>O-</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
            
                                                            <!-- Humbac Section -->
                                                            <div class="m-2">
                                                                <h2 class="section-header">
                                                                    <button class="btn btn-primary barangay-btn" type="button" onclick="toggleTable('humbac')">
                                                                        <strong>Humbac</strong>
                                                                    </button>
                                                                </h2>
                                                                <div class="table-container" id="humbac" style="display: none;">
                                                                    <table class="table table-bordered summary-table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Blood Type</th>
                                                                                <th>Male Donors</th>
                                                                                <th>Female Donors</th>
                                                                                <th>Total Donors</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>A+</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>A-</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>B+</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>B-</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>AB+</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>AB-</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>O+</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>O-</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
            
                                                            <!-- Add more barangays here in the same pattern, up to 10 in this column -->
                                                        </div>
                                                
                                                        <!-- Second group of 10 barangays -->
                                                        <div class="col-4 ">
                                                            <!-- Ibayo Estacion Section -->
                                                            <div class="m-2">
                                                                <h2 class="section-header">
                                                                    <button class="btn btn-primary barangay-btn" type="button" onclick="toggleTable('ibayoestacion')">
                                                                        <strong>Ibayo Estacion</strong>
                                                                    </button>
                                                                </h2>
                                                                <div class="table-container" id="ibayoestacion" style="display: none;">
                                                                    <table class="table table-bordered summary-table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Blood Type</th>
                                                                                <th>Male Donors</th>
                                                                                <th>Female Donors</th>
                                                                                <th>Total Donors</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>A+</td>
                                                                                <td>...</td> <!-- A+ male donors -->
                                                                                <td>...</td> <!-- A+ female donors -->
                                                                                <td>...</td> <!-- Total donors for A+ -->
                                                                            </tr>
                                                                            <tr>
                                                                                <td>A-</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>B+</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>B-</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>AB+</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>AB-</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>O+</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>O-</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
            
            
                                                             <!-- Ibayo Silangan Section -->
                                                            <div class="m-2">
                                                                <h2 class="section-header">
                                                                    <button class="btn btn-primary barangay-btn" type="button" onclick="toggleTable('ibayoSilangan')">
                                                                        <strong>Ibayo Silangan</strong>
                                                                    </button>
                                                                </h2>
                                                                <div class="table-container" id="ibayoSilangan" style="display: none;">
                                                                    <table class="table table-bordered summary-table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Blood Type</th>
                                                                                <th>Male Donors</th>
                                                                                <th>Female Donors</th>
                                                                                <th>Total Donors</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr><td>A+</td><td>...</td><!-- A+ male donors --><td>...</td> <!-- A+ female donors --><td>...</td></tr> <!-- Total donors for A+ -->
                                                                            <tr><td>A-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>B+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>B-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>AB+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>AB-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>O+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>O-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
            
            
                                                             <!-- Kanluran Rizal Section -->
                                                                <div class="m-2">
                                                                    <h2 class="section-header">
                                                                        <button class="btn btn-primary barangay-btn" type="button" onclick="toggleTable('kanluranRizal')">
                                                                            <strong>Kanluran Rizal</strong>
                                                                        </button>
                                                                    </h2>
                                                                    <div class="table-container" id="kanluranRizal" style="display: none;">
                                                                        <table class="table table-bordered summary-table">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Blood Type</th>
                                                                                    <th>Male Donors</th>
                                                                                    <th>Female Donors</th>
                                                                                    <th>Total Donors</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr><td>A+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>A-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>B+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>B-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>AB+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>AB-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>O+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>O-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
            
                                                                <!-- Latoria Section -->
                                                                <div class="m-2">
                                                                    <h2 class="section-header">
                                                                        <button class="btn btn-primary barangay-btn" type="button" onclick="toggleTable('latoria')">
                                                                            <strong>Latoria</strong>
                                                                        </button>
                                                                    </h2>
                                                                    <div class="table-container" id="latoria" style="display: none;">
                                                                        <table class="table table-bordered summary-table">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Blood Type</th>
                                                                                    <th>Male Donors</th>
                                                                                    <th>Female Donors</th>
                                                                                    <th>Total Donors</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr><td>A+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>A-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>B+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>B-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>AB+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>AB-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>O+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>O-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
            
                                                                <!-- Labac Section -->
                                                                <div class="m-2">
                                                                    <h2 class="section-header">
                                                                        <button class="btn btn-primary barangay-btn" type="button" onclick="toggleTable('labac')">
                                                                            <strong>Labac</strong>
                                                                        </button>
                                                                    </h2>
                                                                    <div class="table-container" id="labac" style="display: none;">
                                                                        <table class="table table-bordered summary-table">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Blood Type</th>
                                                                                    <th>Male Donors</th>
                                                                                    <th>Female Donors</th>
                                                                                    <th>Total Donors</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr><td>A+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>A-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>B+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>B-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>AB+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>AB-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>O+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>O-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
            
                                                                <!-- Mabolo Section -->
                                                                <div class="m-2">
                                                                    <h2 class="section-header">
                                                                        <button class="btn btn-primary barangay-btn" type="button" onclick="toggleTable('mabolo')">
                                                                            <strong>Mabolo</strong>
                                                                        </button>
                                                                    </h2>
                                                                    <div class="table-container" id="mabolo" style="display: none;">
                                                                        <table class="table table-bordered summary-table">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Blood Type</th>
                                                                                    <th>Male Donors</th>
                                                                                    <th>Female Donors</th>
                                                                                    <th>Total Donors</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr><td>A+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>A-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>B+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>B-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>AB+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>AB-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>O+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>O-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
            
                                                                <!-- Malainen Bago Section -->
                                                                <div class="m-2">
                                                                    <h2 class="section-header">
                                                                        <button class="btn btn-primary barangay-btn" type="button" onclick="toggleTable('malainenBago')">
                                                                            <strong>Malainen Bago</strong>
                                                                        </button>
                                                                    </h2>
                                                                    <div class="table-container" id="malainenBago" style="display: none;">
                                                                        <table class="table table-bordered summary-table">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Blood Type</th>
                                                                                    <th>Male Donors</th>
                                                                                    <th>Female Donors</th>
                                                                                    <th>Total Donors</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr><td>A+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>A-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>B+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>B-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>AB+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>AB-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>O+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>O-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
            
                                                                <!-- Malainen Luma Section -->
                                                                <div class="m-2">
                                                                    <h2 class="section-header">
                                                                        <button class="btn btn-primary barangay-btn" type="button" onclick="toggleTable('malainenLuma')">
                                                                            <strong>Malainen Luma</strong>
                                                                        </button>
                                                                    </h2>
                                                                    <div class="table-container" id="malainenLuma" style="display: none;">
                                                                        <table class="table table-bordered summary-table">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Blood Type</th>
                                                                                    <th>Male Donors</th>
                                                                                    <th>Female Donors</th>
                                                                                    <th>Total Donors</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr><td>A+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>A-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>B+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>B-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>AB+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>AB-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>O+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>O-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
            
                                                                <!-- Maquina Section -->
                                                                <div class="m-2">
                                                                    <h2 class="section-header">
                                                                        <button class="btn btn-primary barangay-btn" type="button" onclick="toggleTable('maquina')">
                                                                            <strong>Maquina</strong>
                                                                        </button>
                                                                    </h2>
                                                                    <div class="table-container" id="maquina" style="display: none;">
                                                                        <table class="table table-bordered summary-table">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Blood Type</th>
                                                                                    <th>Male Donors</th>
                                                                                    <th>Female Donors</th>
                                                                                    <th>Total Donors</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr><td>A+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>A-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>B+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>B-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>AB+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>AB-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>O+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>O-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
            
                                                                <!-- Molino Section -->
                                                                <div class="m-2">
                                                                    <h2 class="section-header">
                                                                        <button class="btn btn-primary barangay-btn" type="button" onclick="toggleTable('molino')">
                                                                            <strong>Molino</strong>
                                                                        </button>
                                                                    </h2>
                                                                    <div class="table-container" id="molino" style="display: none;">
                                                                        <table class="table table-bordered summary-table">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Blood Type</th>
                                                                                    <th>Male Donors</th>
                                                                                    <th>Female Donors</th>
                                                                                    <th>Total Donors</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr><td>A+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>A-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>B+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>B-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>AB+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>AB-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>O+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                                <tr><td>O-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
            
                                                
                                                            <!-- Add more barangays here in the same pattern, up to 10 in this column -->
                                                        </div>
                                                
                                                        <!-- Third group of 10 barangays -->
                                                        <div class="col-4 ">
                                                            <!-- Munting Mapino Section -->
                                                            <div class="m-2">
                                                                <h2 class="section-header">
                                                                    <button class="btn btn-primary barangay-btn" type="button" onclick="toggleTable('muntingmapino')">
                                                                        <strong>Munting Mapino</strong>
                                                                    </button>
                                                                </h2>
                                                                <div class="table-container" id="muntingmapino" style="display: none;">
                                                                    <table class="table table-bordered summary-table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Blood Type</th>
                                                                                <th>Male Donors</th>
                                                                                <th>Female Donors</th>
                                                                                <th>Total Donors</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>A+</td>
                                                                                <td>...</td> <!-- A+ male donors -->
                                                                                <td>...</td> <!-- A+ female donors -->
                                                                                <td>...</td> <!-- Total donors for A+ -->
                                                                            </tr>
                                                                            <tr>
                                                                                <td>A-</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>B+</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>B-</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>AB+</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>AB-</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>O+</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>O-</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                                <td>...</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
            
                                                            
                                                            <!-- Muzon Section -->
                                                            <div class="m-2">
                                                                <h2 class="section-header">
                                                                    <button class="btn btn-primary barangay-btn" type="button" onclick="toggleTable('muzon')">
                                                                        <strong>Muzon</strong>
                                                                    </button>
                                                                </h2>
                                                                <div class="table-container" id="muzon" style="display: none;">
                                                                    <table class="table table-bordered summary-table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Blood Type</th>
                                                                                <th>Male Donors</th>
                                                                                <th>Female Donors</th>
                                                                                <th>Total Donors</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr><td>A+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>A-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>B+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>B-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>AB+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>AB-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>O+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>O-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
            
                                                            <!-- Palangue 2 Section -->
                                                            <div class="m-2">
                                                                <h2 class="section-header">
                                                                    <button class="btn btn-primary barangay-btn" type="button" onclick="toggleTable('palangue2')">
                                                                        <strong>Palangue 2</strong>
                                                                    </button>
                                                                </h2>
                                                                <div class="table-container" id="palangue2" style="display: none;">
                                                                    <table class="table table-bordered summary-table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Blood Type</th>
                                                                                <th>Male Donors</th>
                                                                                <th>Female Donors</th>
                                                                                <th>Total Donors</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr><td>A+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>A-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>B+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>B-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>AB+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>AB-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>O+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>O-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
            
                                                            <!-- Palangue 3 Section -->
                                                            <div class="m-2">
                                                                <h2 class="section-header">
                                                                    <button class="btn btn-primary barangay-btn" type="button" onclick="toggleTable('palangue3')">
                                                                        <strong>Palangue 3</strong>
                                                                    </button>
                                                                </h2>
                                                                <div class="table-container" id="palangue3" style="display: none;">
                                                                    <table class="table table-bordered summary-table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Blood Type</th>
                                                                                <th>Male Donors</th>
                                                                                <th>Female Donors</th>
                                                                                <th>Total Donors</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr><td>A+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>A-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>B+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>B-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>AB+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>AB-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>O+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>O-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
            
                                                            <!-- Palangue Central Section -->
                                                            <div class="m-2">
                                                                <h2 class="section-header">
                                                                    <button class="btn btn-primary barangay-btn" type="button" onclick="toggleTable('palanguecentral')">
                                                                        <strong>Palangue Central</strong>
                                                                    </button>
                                                                </h2>
                                                                <div class="table-container" id="palanguecentral" style="display: none;">
                                                                    <table class="table table-bordered summary-table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Blood Type</th>
                                                                                <th>Male Donors</th>
                                                                                <th>Female Donors</th>
                                                                                <th>Total Donors</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr><td>A+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>A-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>B+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>B-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>AB+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>AB-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>O+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>O-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
            
                                                            <!-- Sabang Section -->
                                                            <div class="m-2">
                                                                <h2 class="section-header">
                                                                    <button class="btn btn-primary barangay-btn" type="button" onclick="toggleTable('sabang')">
                                                                        <strong>Sabang</strong>
                                                                    </button>
                                                                </h2>
                                                                <div class="table-container" id="sabang" style="display: none;">
                                                                    <table class="table table-bordered summary-table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Blood Type</th>
                                                                                <th>Male Donors</th>
                                                                                <th>Female Donors</th>
                                                                                <th>Total Donors</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr><td>A+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>A-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>B+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>B-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>AB+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>AB-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>O+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>O-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
            
                                                            <!-- San Roque Section -->
                                                            <div class="m-2">
                                                                <h2 class="section-header">
                                                                    <button class="btn btn-primary barangay-btn" type="button" onclick="toggleTable('sanroque')">
                                                                        <strong>San Roque</strong>
                                                                    </button>
                                                                </h2>
                                                                <div class="table-container" id="sanroque" style="display: none;">
                                                                    <table class="table table-bordered summary-table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Blood Type</th>
                                                                                <th>Male Donors</th>
                                                                                <th>Female Donors</th>
                                                                                <th>Total Donors</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr><td>A+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>A-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>B+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>B-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>AB+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>AB-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>O+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>O-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
            
                                                            <!-- Santulan Section -->
                                                            <div class="m-2">
                                                                <h2 class="section-header">
                                                                    <button class="btn btn-primary barangay-btn" type="button" onclick="toggleTable('santulan')">
                                                                        <strong>Santulan</strong>
                                                                    </button>
                                                                </h2>
                                                                <div class="table-container" id="santulan" style="display: none;">
                                                                    <table class="table table-bordered summary-table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Blood Type</th>
                                                                                <th>Male Donors</th>
                                                                                <th>Female Donors</th>
                                                                                <th>Total Donors</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr><td>A+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>A-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>B+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>B-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>AB+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>AB-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>O+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>O-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
            
                                                            <!-- Sapa Section -->
                                                            <div class="m-2">
                                                                <h2 class="section-header">
                                                                    <button class="btn btn-primary barangay-btn" type="button" onclick="toggleTable('sapa')">
                                                                        <strong>Sapa</strong>
                                                                    </button>
                                                                </h2>
                                                                <div class="table-container" id="sapa" style="display: none;">
                                                                    <table class="table table-bordered summary-table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Blood Type</th>
                                                                                <th>Male Donors</th>
                                                                                <th>Female Donors</th>
                                                                                <th>Total Donors</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr><td>A+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>A-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>B+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>B-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>AB+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>AB-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>O+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>O-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
            
                                                            <!-- Timalan Balsahan Section -->
                                                            <div class="m-2">
                                                                <h2 class="section-header">
                                                                    <button class="btn btn-primary barangay-btn" type="button" onclick="toggleTable('timalanbalsahan')">
                                                                        <strong>Timalan Balsahan</strong>
                                                                    </button>
                                                                </h2>
                                                                <div class="table-container" id="timalanbalsahan" style="display: none;">
                                                                    <table class="table table-bordered summary-table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Blood Type</th>
                                                                                <th>Male Donors</th>
                                                                                <th>Female Donors</th>
                                                                                <th>Total Donors</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr><td>A+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>A-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>B+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>B-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>AB+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>AB-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>O+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>O-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
            
                                                            <!-- Timalan Concepcion Section -->
                                                            <div class="m-2">
                                                                <h2 class="section-header">
                                                                    <button class="btn btn-primary barangay-btn" type="button" onclick="toggleTable('timalanconcepcion')">
                                                                        <strong>Timalan Concepcion</strong>
                                                                    </button>
                                                                </h2>
                                                                <div class="table-container" id="timalanconcepcion" style="display: none;">
                                                                    <table class="table table-bordered summary-table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Blood Type</th>
                                                                                <th>Male Donors</th>
                                                                                <th>Female Donors</th>
                                                                                <th>Total Donors</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr><td>A+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>A-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>B+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>B-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>AB+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>AB-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>O+</td><td>...</td><td>...</td><td>...</td></tr>
                                                                            <tr><td>O-</td><td>...</td><td>...</td><td>...</td></tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
            
            
                                                            <!-- Add more barangays here in the same pattern, up to 10 in this column -->
                                                        </div>
                                                        
                                                    </div>
                                                    <!-- row -->
                                                </div> 
                                                <!--analyticsAccordion -->
                                            </div>
                                    </div>
                                    <!-- /.accordion -->
                                </div> 
                                <!-- /.card-body -->
                            {{-- ADD NEW SECTIONS HERE --}}
                        </div>
                        {{-- card shadow ANALYTIC REPORT  --}}
                    </div>
                    <!-- /.col anayltic report -->

                    {{-- ADD NEW SECTIONS HERE --}}

                    </div>
                    <!-- /.row ENTIRE SECTION -->
                </div>
                <!-- /.container-fluid -->
            </section>

            
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.2.0
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('/plugins/jquery/jquery.min.js') }}"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap Bundle (includes Popper) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap 4 -->
    <script src="{{ asset('/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
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
    <!-- AdminLTE App -->
    <script src="{{ asset('/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('/dist/js/demo.js') }}"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

<script>
    // Example using Chart.js to create the charts
    var ctxBloodTypeMabolo = document.getElementById('bloodTypeChartMabolo').getContext('2d');
    var bloodTypeChartMabolo = new Chart(ctxBloodTypeMabolo, {
        type: 'pie',
        data: {
            labels: ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'],
            datasets: [{
                label: 'Blood Types Donated',
                data: [0, 0, 0, 0, 0, 0, 0, 0], // Replace with dynamic data
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40', '#FF6384', '#36A2EB']
            }]
        }
    });

    var ctxGenderMabolo = document.getElementById('genderChartMabolo').getContext('2d');
    var genderChartMabolo = new Chart(ctxGenderMabolo, {
        type: 'doughnut',
        data: {
            labels: ['Male', 'Female'],
            datasets: [{
                label: 'Donor Genders',
                data: [0, 0], // Replace with dynamic data
                backgroundColor: ['#36A2EB', '#FF6384']
            }]
        }
    });
</script>

    {{-- SCRIPT FOR FAQ section--}}
    <script>
        $(document).ready(function() {
            $('.accordion-header').click(function() {
                // Toggle accordion body
                $(this).next('.collapse').collapse('toggle');

                // Rotate accordion icon
                $(this).find('.accordion-icon').toggleClass('fa-plus fa-minus');
            });
        });
    </script>
</body>

</html>
