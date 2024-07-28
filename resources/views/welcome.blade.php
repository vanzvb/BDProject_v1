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
    {{-- <link rel="stylesheet" href="{{ asset('/dist/css/adminlte.min.css') }}"> --}}

    {{-- NEWLY ADDED --}}

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    {{-- Bootstrap 4 --}}
    <link rel="stylesheet" href="{{ asset('../plugins/bootstrap/css/bootstrap.min.css') }}">
    

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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
        .table-container {
            max-height: 300px; /* Adjust height as needed */
            overflow-y: auto; /* Enable vertical scrolling */
            margin-bottom: 20px; /* Space between tables */
        }
        .table {
            margin-bottom: 0; /* Remove margin at the bottom of the table */
        }
        .barangay-btn {
            width: 100%;
            font-size: 1.5em;
            margin-bottom: 10px;
        }
        .summary-table th, .summary-table td {
            text-align: center;
        }
        .section-header {
            font-size: 1.5em;
            margin-bottom: 20px;
        }
        .card {
            margin-bottom: 1.5rem; /* Space between cards */
        }
        .card-title {
            font-weight: bold;
        }
        .card-body {
            text-align: center;
        }
        .wrapper {
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
        }
        .card-img-top {
            width: 100%;  /* Full width of the card */
            height: 450px; /* Fixed height */
            object-fit: cover; /* Cover the area, cropping if necessary */
        }

    </style>

</head>



{{-- @include('layouts.app') --}}


<body>

    
    <div class="wrapper">
        @include('layouts._navbar') <!-- Include the navbar partial -->
        
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1><strong></strong></h1>
                        </div>
                        <div class="col-sm-6">
                            <!-- Empty for potential future content -->
                        </div>
                    </div>
                    <!-- Cards Row -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card shadow">
                                <img src="{{ asset('images/welcome_img/blood_donate1.jpg') }}" class="card-img-top" alt="Card Image 1">
                                <div class="card-body">
                                    <h5 class="card-title"> Guide to Blood Donation</h5>
                                    <p class="card-text">Blood donation is a simple yet impactful way to save lives. This guide provides essential information on how to prepare for donating blood, what to expect during the process, and post-donation care.</p>
                                    <a href="#guideblood" class="btn btn-primary">Take me there</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card shadow">
                                <img src="images\welcome_img\doctor_guide.jpg" class="card-img-top" alt="Card Image 2">
                                <div class="card-body">
                                    <h5 class="card-title">Frequently Asked Questions</h5>
                                    <p class="card-text">Discover key information about blood donation with answers to common questions on eligibility, safety, and preparation. This guide ensures you’re well-informed for a smooth and impactful donation experience.</p>
                                    <a href="#faqblood" class="btn btn-primary">Take me there</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card shadow">
                                <img src="images\welcome_img\analytic_report.jpg" class="card-img-top" alt="Card Image 3">
                                <div class="card-body">
                                    <h5 class="card-title">Blood Donation Analytics </h5>
                                    <p class="card-text">Explore insights into blood donation patterns across different barangays. This analysis helps understand local donation trends and supports targeted efforts to meet community needs.</p>
                                    <a href="#bloodanalytic" class="btn btn-primary">Take me there</a>
                                </div>
                            </div>
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
                                <div id="guideblood" class="card-header bg-primary text-white">
                                    <h3 class="card-title"><i class="fas fa-hand-holding-heart"></i> Guide to Blood
                                        Donation</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="mb-3"><i class="fas fa-check-circle text-success"></i> Do's
                                                of Blood Donation:</h4>
                                            <ul class="list-group">
                                                <li class="list-group-item">Stay hydrated: Drink plenty of water or
                                                    juice before donating.</li>
                                                <li class="list-group-item">Eat well: Have a nutritious meal before
                                                    your donation.</li>
                                                <li class="list-group-item">Rest well: Get a good night's sleep before
                                                    donating.</li>
                                                <li class="list-group-item">Bring ID: Carry a valid ID for
                                                    identification.</li>
                                                <li class="list-group-item">Inform staff: Let them know about any
                                                    health concerns.</li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <h4 class="mb-3"><i class="fas fa-times-circle text-danger"></i> Don'ts
                                                of Blood Donation:</h4>
                                            <ul class="list-group">
                                                <li class="list-group-item">Don't skip meals: Eat before donating to
                                                    maintain blood sugar levels.</li>
                                                <li class="list-group-item">Avoid alcohol: Refrain from drinking
                                                    alcohol 24 hours before donation.</li>
                                                <li class="list-group-item">No smoking: Don't smoke one hour before or
                                                    after donating.</li>
                                                <li class="list-group-item">Avoid intense exercise: Skip vigorous
                                                    exercise on donation day.</li>
                                                <li class="list-group-item">Postpone if sick: Wait until you recover
                                                    from illness.</li>
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


                        <div  class="col-lg-6 offset-lg-0">
                            <!-- FAQ SECTION -->
                            <div class="card shadow mt-4">
                                <div id="faqblood" class="card-header bg-info text-white">
                                    <h3 class="card-title"><i class="fas fa-question-circle"></i> Frequently Asked
                                        Questions</h3>
                                </div>
                                <div class="card-body">
                                    <div class="accordion" id="faqAccordion">
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <div class="accordion-header" data-bs-toggle="collapse"
                                                     data-bs-target="#collapseOne" aria-expanded="false"
                                                     aria-controls="collapseOne">
                                                    <span class="accordion-title">How often can I donate blood?</span>
                                                    <i class="fas fa-plus accordion-icon"></i>
                                                </div>
                                            </div>
                                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                                 data-bs-parent="#faqAccordion">
                                                <div class="card-body">
                                                    You must wait at least 56 days between donations of whole blood and
                                                    112 days between Power Red donations.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingTwo">
                                                <div class="accordion-header collapsed" data-bs-toggle="collapse"
                                                     data-bs-target="#collapseTwo" aria-expanded="false"
                                                     aria-controls="collapseTwo">
                                                    <span class="accordion-title">Who can donate blood?</span>
                                                    <i class="fas fa-plus accordion-icon"></i>
                                                </div>
                                            </div>
                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                                 data-bs-parent="#faqAccordion">
                                                <div class="card-body">
                                                    Most people can donate blood if they are in good health. Age,
                                                    weight, and other factors may affect eligibility.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingThree">
                                                <div class="accordion-header collapsed" data-bs-toggle="collapse"
                                                     data-bs-target="#collapseThree" aria-expanded="false"
                                                     aria-controls="collapseThree">
                                                    <span class="accordion-title">Does donating blood hurt?</span>
                                                    <i class="fas fa-plus accordion-icon"></i>
                                                </div>
                                            </div>
                                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                                 data-bs-parent="#faqAccordion">
                                                <div class="card-body">
                                                    Donating blood is usually painless. You may feel a slight pinch when
                                                    the needle is inserted, but discomfort is minimal.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingFour">
                                                <div class="accordion-header collapsed" data-bs-toggle="collapse"
                                                     data-bs-target="#collapseFour" aria-expanded="false"
                                                     aria-controls="collapseFour">
                                                    <span class="accordion-title">Can I donate if I have a cold?</span>
                                                    <i class="fas fa-plus accordion-icon"></i>
                                                </div>
                                            </div>
                                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                                                 data-bs-parent="#faqAccordion">
                                                <div class="card-body">
                                                    If you have cold or flu symptoms, it is best to wait until you are
                                                    feeling better before donating blood.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingFive">
                                                <div class="accordion-header collapsed" data-bs-toggle="collapse"
                                                     data-bs-target="#collapseFive" aria-expanded="false"
                                                     aria-controls="collapseFive">
                                                    <span class="accordion-title">How long does the donation process take?</span>
                                                    <i class="fas fa-plus accordion-icon"></i>
                                                </div>
                                            </div>
                                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                                                 data-bs-parent="#faqAccordion">
                                                <div class="card-body">
                                                    The entire donation process typically takes about an hour, including
                                                    registration, medical history, donation, and refreshments.
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
                                <div id="bloodanalytic" class="card-header bg-info text-white">
                                    <h3 class="card-title"><i class="fas fa-chart-bar"></i> Blood Donation Analytics
                                    </h3>
                                </div>
                                <!-- /.card-barangays-->
                                <div class="card-body">
                                    <div id="analyticsAccordion">

                                        
                                           
                                           <!-- Bagong Kalsada Section -->
                                        <div class="my-4">
                                            <h2 class="section-header">
                                                <button class="btn btn-primary barangay-btn" type="button" onclick="toggleTable('bagongKalsada')">
                                                    Bagong Kalsada
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
                                        <div class="my-4">
                                            <h2 class="section-header">
                                                <button class="btn btn-primary barangay-btn" type="button" onclick="toggleTable('balsahan')">
                                                    Balsahan
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

                                        


                                        {{-- <div class="row">
                                            <!-- Mabolo Card -->
                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                                                <div class="card bg-primary text-white">
                                                    <div class="card-header border-0 py-3" id="headingMabolo"
                                                        data-toggle="collapse" data-target="#collapseMabolo"
                                                        aria-expanded="true" aria-controls="collapseMabolo">
                                                        <h5 class="mb-0">Mabolo</h5>
                                                    </div>
                                                    <div id="collapseMabolo" class="collapse"
                                                        aria-labelledby="headingMabolo"
                                                        data-parent="#analyticsAccordion">
                                                        <div class="card-body">
                                                            <h6>Blood Types Donated</h6>
                                                            <ul class="list-group mb-3">
                                                                <li class="list-group-item">A+: <span
                                                                        id="mabolo-a-positive">0</span></li>
                                                                <li class="list-group-item">A-: <span
                                                                        id="mabolo-a-negative">0</span></li>
                                                                <li class="list-group-item">B+: <span
                                                                        id="mabolo-b-positive">0</span></li>
                                                                <li class="list-group-item">B-: <span
                                                                        id="mabolo-b-negative">0</span></li>
                                                                <li class="list-group-item">AB+: <span
                                                                        id="mabolo-ab-positive">0</span></li>
                                                                <li class="list-group-item">AB-: <span
                                                                        id="mabolo-ab-negative">0</span></li>
                                                                <li class="list-group-item">O+: <span
                                                                        id="mabolo-o-positive">0</span></li>
                                                                <li class="list-group-item">O-: <span
                                                                        id="mabolo-o-negative">0</span></li>
                                                            </ul>
                                                            <h6>Donor Genders</h6>
                                                            <ul class="list-group">
                                                                <li class="list-group-item">Male: <span
                                                                        id="mabolo-male">0</span></li>
                                                                <li class="list-group-item">Female: <span
                                                                        id="mabolo-female">0</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Labac Card -->
                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                                                <div class="card bg-primary text-white">
                                                    <div class="card-header border-0 py-3" id="headingLabac"
                                                        data-toggle="collapse" data-target="#collapseLabac"
                                                        aria-expanded="true" aria-controls="collapseLabac">
                                                        <h5 class="mb-0">Labac</h5>
                                                    </div>
                                                    <div id="collapseLabac" class="collapse"
                                                        aria-labelledby="headingLabac"
                                                        data-parent="#analyticsAccordion">
                                                        <div class="card-body">
                                                            <h6>Blood Types Donated</h6>
                                                            <ul class="list-group mb-3">
                                                                <li class="list-group-item">A+: <span
                                                                        id="labac-a-positive">0</span></li>
                                                                <li class="list-group-item">A-: <span
                                                                        id="labac-a-negative">0</span></li>
                                                                <li class="list-group-item">B+: <span
                                                                        id="labac-b-positive">0</span></li>
                                                                <li class="list-group-item">B-: <span
                                                                        id="labac-b-negative">0</span></li>
                                                                <li class="list-group-item">AB+: <span
                                                                        id="labac-ab-positive">0</span></li>
                                                                <li class="list-group-item">AB-: <span
                                                                        id="labac-ab-negative">0</span></li>
                                                                <li class="list-group-item">O+: <span
                                                                        id="labac-o-positive">0</span></li>
                                                                <li class="list-group-item">O-: <span
                                                                        id="labac-o-negative">0</span></li>
                                                            </ul>
                                                            <h6>Donor Genders</h6>
                                                            <ul class="list-group">
                                                                <li class="list-group-item">Male: <span
                                                                        id="labac-male">0</span></li>
                                                                <li class="list-group-item">Female: <span
                                                                        id="labac-female">0</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Bancaan Card -->
                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                                                <div class="card bg-primary text-white">
                                                    <div class="card-header border-0 py-3" id="headingBancaan"
                                                        data-toggle="collapse" data-target="#collapseBancaan"
                                                        aria-expanded="true" aria-controls="collapseBancaan">
                                                        <h5 class="mb-0">Bancaan</h5>
                                                    </div>
                                                    <div id="collapseBancaan" class="collapse"
                                                        aria-labelledby="headingBancaan"
                                                        data-parent="#analyticsAccordion">
                                                        <div class="card-body">
                                                            <h6>Blood Types Donated</h6>
                                                            <ul class="list-group mb-3">
                                                                <li class="list-group-item">A+: <span
                                                                        id="bancaan-a-positive">0</span></li>
                                                                <li class="list-group-item">A-: <span
                                                                        id="bancaan-a-negative">0</span></li>
                                                                <li class="list-group-item">B+: <span
                                                                        id="bancaan-b-positive">0</span></li>
                                                                <li class="list-group-item">B-: <span
                                                                        id="bancaan-b-negative">0</span></li>
                                                                <li class="list-group-item">AB+: <span
                                                                        id="bancaan-ab-positive">0</span></li>
                                                                <li class="list-group-item">AB-: <span
                                                                        id="bancaan-ab-negative">0</span></li>
                                                                <li class="list-group-item">O+: <span
                                                                        id="bancaan-o-positive">0</span></li>
                                                                <li class="list-group-item">O-: <span
                                                                        id="bancaan-o-negative">0</span></li>
                                                            </ul>
                                                            <h6>Donor Genders</h6>
                                                            <ul class="list-group">
                                                                <li class="list-group-item">Male: <span
                                                                        id="bancaan-male">0</span></li>
                                                                <li class="list-group-item">Female: <span
                                                                        id="bancaan-female">0</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Bagong Kalsada Card -->
                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                                                <div class="card bg-primary text-white">
                                                    <div class="card-header border-0 py-3" id="headingBagongKalsada"
                                                        data-toggle="collapse" data-target="#collapseBagongKalsada"
                                                        aria-expanded="true" aria-controls="collapseBagongKalsada">
                                                        <h5 class="mb-0">Bagong Kalsada</h5>
                                                    </div>
                                                    <div id="collapseBagongKalsada" class="collapse"
                                                        aria-labelledby="headingBagongKalsada"
                                                        data-parent="#analyticsAccordion">
                                                        <div class="card-body">
                                                            <h6>Blood Types Donated</h6>
                                                            <ul class="list-group mb-3">
                                                                <li class="list-group-item">A+: <span
                                                                        id="bagong-kalsada-a-positive">0</span></li>
                                                                <li class="list-group-item">A-: <span
                                                                        id="bagong-kalsada-a-negative">0</span></li>
                                                                <li class="list-group-item">B+: <span
                                                                        id="bagong-kalsada-b-positive">0</span></li>
                                                                <li class="list-group-item">B-: <span
                                                                        id="bagong-kalsada-b-negative">0</span></li>
                                                                <li class="list-group-item">AB+: <span
                                                                        id="bagong-kalsada-ab-positive">0</span></li>
                                                                <li class="list-group-item">AB-: <span
                                                                        id="bagong-kalsada-ab-negative">0</span></li>
                                                                <li class="list-group-item">O+: <span
                                                                        id="bagong-kalsada-o-positive">0</span></li>
                                                                <li class="list-group-item">O-: <span
                                                                        id="bagong-kalsada-o-negative">0</span></li>
                                                            </ul>
                                                            <h6>Donor Genders</h6>
                                                            <ul class="list-group">
                                                                <li class="list-group-item">Male: <span
                                                                        id="bagong-kalsada-male">0</span></li>
                                                                <li class="list-group-item">Female: <span
                                                                        id="bagong-kalsada-female">0</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Bucana Sasahan Card -->
                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                                                <div class="card bg-primary text-white">
                                                    <div class="card-header border-0 py-3" id="headingBucanaSasahan"
                                                        data-toggle="collapse" data-target="#collapseBucanaSasahan"
                                                        aria-expanded="true" aria-controls="collapseBucanaSasahan">
                                                        <h5 class="mb-0">Bucana Sasahan</h5>
                                                    </div>
                                                    <div id="collapseBucanaSasahan" class="collapse"
                                                        aria-labelledby="headingBucanaSasahan"
                                                        data-parent="#analyticsAccordion">
                                                        <div class="card-body">
                                                            <h6>Blood Types Donated</h6>
                                                            <ul class="list-group mb-3">
                                                                <li class="list-group-item">A+: <span
                                                                        id="bucana-sasahan-a-positive">0</span></li>
                                                                <li class="list-group-item">A-: <span
                                                                        id="bucana-sasahan-a-negative">0</span></li>
                                                                <li class="list-group-item">B+: <span
                                                                        id="bucana-sasahan-b-positive">0</span></li>
                                                                <li class="list-group-item">B-: <span
                                                                        id="bucana-sasahan-b-negative">0</span></li>
                                                                <li class="list-group-item">AB+: <span
                                                                        id="bucana-sasahan-ab-positive">0</span></li>
                                                                <li class="list-group-item">AB-: <span
                                                                        id="bucana-sasahan-ab-negative">0</span></li>
                                                                <li class="list-group-item">O+: <span
                                                                        id="bucana-sasahan-o-positive">0</span></li>
                                                                <li class="list-group-item">O-: <span
                                                                        id="bucana-sasahan-o-negative">0</span></li>
                                                            </ul>
                                                            <h6>Donor Genders</h6>
                                                            <ul class="list-group">
                                                                <li class="list-group-item">Male: <span
                                                                        id="bucana-sasahan-male">0</span></li>
                                                                <li class="list-group-item">Female: <span
                                                                        id="bucana-sasahan-female">0</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Bucana Malaki Card -->
                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                                                <div class="card bg-primary text-white">
                                                    <div class="card-header border-0 py-3" id="headingBucanaMalaki"
                                                        data-toggle="collapse" data-target="#collapseBucanaMalaki"
                                                        aria-expanded="true" aria-controls="collapseBucanaMalaki">
                                                        <h5 class="mb-0">Bucana Malaki</h5>
                                                    </div>
                                                    <div id="collapseBucanaMalaki" class="collapse"
                                                        aria-labelledby="headingBucanaMalaki"
                                                        data-parent="#analyticsAccordion">
                                                        <div class="card-body">
                                                            <h6>Blood Types Donated</h6>
                                                            <ul class="list-group mb-3">
                                                                <li class="list-group-item">A+: <span
                                                                        id="bucana-malaki-a-positive">0</span></li>
                                                                <li class="list-group-item">A-: <span
                                                                        id="bucana-malaki-a-negative">0</span></li>
                                                                <li class="list-group-item">B+: <span
                                                                        id="bucana-malaki-b-positive">0</span></li>
                                                                <li class="list-group-item">B-: <span
                                                                        id="bucana-malaki-b-negative">0</span></li>
                                                                <li class="list-group-item">AB+: <span
                                                                        id="bucana-malaki-ab-positive">0</span></li>
                                                                <li class="list-group-item">AB-: <span
                                                                        id="bucana-malaki-ab-negative">0</span></li>
                                                                <li class="list-group-item">O+: <span
                                                                        id="bucana-malaki-o-positive">0</span></li>
                                                                <li class="list-group-item">O-: <span
                                                                        id="bucana-malaki-o-negative">0</span></li>
                                                            </ul>
                                                            <h6>Donor Genders</h6>
                                                            <ul class="list-group">
                                                                <li class="list-group-item">Male: <span
                                                                        id="bucana-malaki-male">0</span></li>
                                                                <li class="list-group-item">Female: <span
                                                                        id="bucana-malaki-female">0</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Balsahan Card -->
                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                                                <div class="card bg-primary text-white">
                                                    <div class="card-header border-0 py-3" id="headingBalsahan"
                                                        data-toggle="collapse" data-target="#collapseBalsahan"
                                                        aria-expanded="true" aria-controls="collapseBalsahan">
                                                        <h5 class="mb-0">Balsahan</h5>
                                                    </div>
                                                    <div id="collapseBalsahan" class="collapse"
                                                        aria-labelledby="headingBalsahan"
                                                        data-parent="#analyticsAccordion">
                                                        <div class="card-body">
                                                            <h6>Blood Types Donated</h6>
                                                            <ul class="list-group mb-3">
                                                                <li class="list-group-item">A+: <span
                                                                        id="balsahan-a-positive">0</span></li>
                                                                <li class="list-group-item">A-: <span
                                                                        id="balsahan-a-negative">0</span></li>
                                                                <li class="list-group-item">B+: <span
                                                                        id="balsahan-b-positive">0</span></li>
                                                                <li class="list-group-item">B-: <span
                                                                        id="balsahan-b-negative">0</span></li>
                                                                <li class="list-group-item">AB+: <span
                                                                        id="balsahan-ab-positive">0</span></li>
                                                                <li class="list-group-item">AB-: <span
                                                                        id="balsahan-ab-negative">0</span></li>
                                                                <li class="list-group-item">O+: <span
                                                                        id="balsahan-o-positive">0</span></li>
                                                                <li class="list-group-item">O-: <span
                                                                        id="balsahan-o-negative">0</span></li>
                                                            </ul>
                                                            <h6>Donor Genders</h6>
                                                            <ul class="list-group">
                                                                <li class="list-group-item">Male: <span
                                                                        id="balsahan-male">0</span></li>
                                                                <li class="list-group-item">Female: <span
                                                                        id="balsahan-female">0</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Calubcob Card -->
                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                                                <div class="card bg-primary text-white">
                                                    <div class="card-header border-0 py-3" id="headingCalubcob"
                                                        data-toggle="collapse" data-target="#collapseCalubcob"
                                                        aria-expanded="true" aria-controls="collapseCalubcob">
                                                        <h5 class="mb-0">Calubcob</h5>
                                                    </div>
                                                    <div id="collapseCalubcob" class="collapse"
                                                        aria-labelledby="headingCalubcob"
                                                        data-parent="#analyticsAccordion">
                                                        <div class="card-body">
                                                            <h6>Blood Types Donated</h6>
                                                            <ul class="list-group mb-3">
                                                                <li class="list-group-item">A+: <span
                                                                        id="calubcob-a-positive">0</span></li>
                                                                <li class="list-group-item">A-: <span
                                                                        id="calubcob-a-negative">0</span></li>
                                                                <li class="list-group-item">B+: <span
                                                                        id="calubcob-b-positive">0</span></li>
                                                                <li class="list-group-item">B-: <span
                                                                        id="calubcob-b-negative">0</span></li>
                                                                <li class="list-group-item">AB+: <span
                                                                        id="calubcob-ab-positive">0</span></li>
                                                                <li class="list-group-item">AB-: <span
                                                                        id="calubcob-ab-negative">0</span></li>
                                                                <li class="list-group-item">O+: <span
                                                                        id="calubcob-o-positive">0</span></li>
                                                                <li class="list-group-item">O-: <span
                                                                        id="calubcob-o-negative">0</span></li>
                                                            </ul>
                                                            <h6>Donor Genders</h6>
                                                            <ul class="list-group">
                                                                <li class="list-group-item">Male: <span
                                                                        id="calubcob-male">0</span></li>
                                                                <li class="list-group-item">Female:
                                                                    <spanid="calubcob-female">0</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div> --}}
                                        <!-- BARANGAYS ROW -->
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



        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
 
</body>


<script>
    function toggleTable(id) {
        var table = document.getElementById(id);
        if (table.style.display === 'none') {
            table.style.display = 'block';
        } else {
            table.style.display = 'none';
        }
    }
</script>


  
    {{-- <!-- Script for dropdown (logout)-->
    <script src="{{ asset('js/app.js') }}" defer></script> --}}


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>

    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery, Popper.js, and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



    <!-- Bootstrap CSS -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome (for icons) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>



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
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40',
                        '#FF6384', '#36A2EB'
                    ]
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

    {{-- SCRIPT FOR FAQ section --}}
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



<footer class="main-footer p-3">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
</footer>



</html>
