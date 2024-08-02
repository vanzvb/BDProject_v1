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
        canvas {
            display: block;
            height: 400px; /* Set a fixed height */
            width: 100%; /* Full width of the parent container */
        }
        .card-title {
            font-weight: bold;
        }
        .card-body {
            text-align: center;
            flex: 1;
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
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
        #bloodTypeChart {
            max-width: 800px;
            margin: auto;
        }
        .barangay-section {
            display: none;
        }
        .faq-card {
            display: flex;
            flex-direction: column;
            height: 100%;   
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
                        <div class="col-lg-10 offset-lg-1">
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


                        
                        <div class="col-lg-10 offset-lg-1">
                            <!-- FAQ SECTION -->
                            <div class="shadow mt-0">
                                <div id="faqblood" class="card-header bg-info text-white">
                                    <h3 class="card-title"><i class="fas fa-question-circle"></i> Frequently Asked Questions</h3>
                                </div>
                                <div class="card-body">
                                    <div class="accordion" id="faqAccordion">
                                        <!-- First Row -->
                                        <div class="row">
                                            <div class="col-md-6 col-lg-4">
                                                <!-- Card 1 -->
                                                <div class="card faq-card">
                                                    <div class="card-header" id="headingOne">
                                                        <div class="accordion-header" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                            <span class="accordion-title">How often can I donate blood?</span>
                                                            <i class="fas fa-plus accordion-icon"></i>
                                                        </div>
                                                    </div>
                                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                                                        <div class="card-body">
                                                            You must wait at least 56 days between donations of whole blood and 112 days between Power Red donations.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-4">
                                                <!-- Card 2 -->
                                                <div class="card faq-card">
                                                    <div class="card-header" id="headingTwo">
                                                        <div class="accordion-header collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                            <span class="accordion-title">Who can donate blood?</span>
                                                            <i class="fas fa-plus accordion-icon"></i>
                                                        </div>
                                                    </div>
                                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                                                        <div class="card-body">
                                                            Most people can donate blood if they are in good health. Age, weight, and other factors may affect eligibility.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-4">
                                                <!-- Card 3 -->
                                                <div class="card faq-card">
                                                    <div class="card-header" id="headingThree">
                                                        <div class="accordion-header collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                            <span class="accordion-title">Does donating blood hurt?</span>
                                                            <i class="fas fa-plus accordion-icon"></i>
                                                        </div>
                                                    </div>
                                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                                                        <div class="card-body">
                                                            Donating blood is usually painless. You may feel a slight pinch when the needle is inserted, but discomfort is minimal.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Second Row -->
                                        <div class="row">
                                            <div class="col-md-6 col-lg-4">
                                                <!-- Card 4 -->
                                                <div class="card faq-card">
                                                    <div class="card-header" id="headingFour">
                                                        <div class="accordion-header collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                            <span class="accordion-title">Can I donate if I have a cold?</span>
                                                            <i class="fas fa-plus accordion-icon"></i>
                                                        </div>
                                                    </div>
                                                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                                                        <div class="card-body">
                                                            If you have cold or flu symptoms, it is best to wait until you are feeling better before donating blood.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-4">
                                                <!-- Card 5 -->
                                                <div class="card faq-card">
                                                    <div class="card-header" id="headingFive">
                                                        <div class="accordion-header collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                            <span class="accordion-title">How long does the donation process take?</span>
                                                            <i class="fas fa-plus accordion-icon"></i>
                                                        </div>
                                                    </div>
                                                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                                                        <div class="card-body">
                                                            The entire donation process typically takes about an hour, including registration, medical history, donation, and refreshments.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-4">
                                                <!-- Card 6 -->
                                                <div class="card faq-card">
                                                    <div class="card-header" id="headingSix">
                                                        <div class="accordion-header collapsed" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                                            <span class="accordion-title">How is blood tested?</span>
                                                            <i class="fas fa-plus accordion-icon"></i>
                                                        </div>
                                                    </div>
                                                    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-bs-parent="#faqAccordion">
                                                        <div class="card-body">
                                                            Blood is tested for various diseases and conditions to ensure it is safe for transfusion.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Third Row -->
                                        <div class="row">
                                            <div class="col-md-6 col-lg-4">
                                                <!-- Card 7 -->
                                                <div class="card faq-card">
                                                    <div class="card-header" id="headingSeven">
                                                        <div class="accordion-header collapsed" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                                            <span class="accordion-title">Can I donate if I am on medication?</span>
                                                            <i class="fas fa-plus accordion-icon"></i>
                                                        </div>
                                                    </div>
                                                    <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-bs-parent="#faqAccordion">
                                                        <div class="card-body">
                                                            It depends on the medication. Consult with the blood bank to confirm eligibility.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-4">
                                                <!-- Card 8 -->
                                                <div class="card faq-card">
                                                    <div class="card-header" id="headingEight">
                                                        <div class="accordion-header collapsed" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                                            <span class="accordion-title">Can I donate blood if I am pregnant?</span>
                                                            <i class="fas fa-plus accordion-icon"></i>
                                                        </div>
                                                    </div>
                                                    <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-bs-parent="#faqAccordion">
                                                        <div class="card-body">
                                                            Pregnant women are generally advised not to donate blood.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-4">
                                                <!-- Card 9 -->
                                                <div class="card faq-card">
                                                    <div class="card-header" id="headingNine">
                                                        <div class="accordion-header collapsed" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                                            <span class="accordion-title">How often can I donate platelets?</span>
                                                            <i class="fas fa-plus accordion-icon"></i>
                                                        </div>
                                                    </div>
                                                    <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-bs-parent="#faqAccordion">
                                                        <div class="card-body">
                                                            Platelets can be donated more frequently than whole blood, typically every 2 weeks.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-4">
                                                <!-- Card 10 ADD MORE QUESTIONS HERE-->
                                                {{-- <div class="card faq-card">
                                                    <div class="card-header" id="headingTen">
                                                        <div class="accordion-header collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                                            <span class="accordion-title">Where does the donated blood go?</span>
                                                            <i class="fas fa-plus accordion-icon"></i>
                                                        </div>
                                                    </div>
                                                    <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-bs-parent="#faqAccordion">
                                                        <div class="card-body">
                                                            Donated blood is processed, tested, and then distributed to hospitals and clinics for use in medical treatments.
                                                        </div>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.accordion -->
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card SHADOW FAQ SECTION-->
                        </div>
                        
                        
                        <!-- /.col FAQ SECTION -->


                        <!-- ANALYTIC REPORTS -->
                        <div class="col-lg-10 offset-lg-1">
                            <!-- ANALYTIC REPORTS -->

                            <div class="card shadow mt-4">
                                <!-- /.card-header -->
                                <div id="bloodanalytic" class="card-header bg-info text-white">
                                    <h3 class="card-title"><i class="fas fa-chart-bar"></i> Blood Donation Analytics
                                    </h3>
                                </div>

                              

                                <div class="container mt-4">
                                    <div class="row">
                                        <!-- Total Donors Card -->
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3>Total Donors Within Naic</h3>
                                                </div>
                                                <div class="card-body">
                                                    <h4>Total Donors</h4>
                                                    <p>...</p> <!-- Total Donors -->
                                                </div>
                                            </div>
                                        </div>
                            
                                        <!-- Total Male Donors Card -->
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3>Total Male Donors</h3>
                                                </div>
                                                <div class="card-body">
                                                    <h4>Total Male Donors</h4>
                                                    <p>...</p> <!-- Total Male Donors -->
                                                </div>
                                            </div>
                                        </div>
                            
                                        <!-- Total Female Donors Card -->
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3>Total Female Donors</h3>
                                                </div>
                                                <div class="card-body">
                                                    <h4>Total Female Donors</h4>
                                                    <p>...</p> <!-- Total Female Donors -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            <div class="container mt-4">
                                <div class="row">
                                    <!-- Blood Type Distribution Chart -->
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3>Total Blood Type Distribution</h3>
                                            </div>
                                            <div class="card-body">
                                                <canvas id="bloodTypeChart"></canvas>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Age Distribution Chart -->
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3>Total Age Distribution of Donors</h3>
                                            </div>
                                            <div class="card-body">
                                                <canvas id="ageDistributionChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <div class="container shadow my-5">
                                <h1 class="text-center mby-4"><strong>Barangay Analytics</strong></h1>
                                <div class="form-group">
                                    <label for="barangayDropdown">Select Barangay:</label>
                                    <input type="text" id="barangaySearch" class="form-control mb-2" placeholder="Search Barangay">
                                    <select class="form-control" id="barangayDropdown">
                                        <option value="">-- Select Barangay --</option>
                                        <option value="bagongkalsada">Bagong Kalsada</option>
                                        <option value="balsahan">Balsahan</option>
                                        <option value="bancaan">Bancaan</option>
                                        <option value="bucanamalaki">Bucana Malaki</option>
                                        <option value="bucanasasahan">Bucana Sasahan</option>
                                        <option value="calubcob">Calubcob</option>
                                        <option value="captcnazareno">Capt. C. Nazareno (Poblacion)</option>
                                        <option value="gombalza">Gombalza (Poblacion)</option>
                                        <option value="halang">Halang</option>
                                        <option value="humbac">Humbac</option>
                                        <option value="ibayoestacion">Ibayo Estacion</option>
                                        <option value="ibayosilangan">Ibayo Silangan</option>
                                        <option value="kanluranrizal">Kanluran Rizal</option>
                                        <option value="latoria">Latoria</option>
                                        <option value="labac">Labac</option>
                                        <option value="mabolo">Mabolo</option>
                                        <option value="malainenbago">Malainen Bago</option>
                                        <option value="malainenluma">Malainen Luma</option>
                                        <option value="maquina">Maquina</option>
                                        <option value="molino">Molino</option>
                                        <option value="muntingmapino">Munting Mapino</option>
                                        <option value="muzon">Muzon</option>
                                        <option value="palangue2">Palangue 2</option>
                                        <option value="palangue3">Palangue 3</option>
                                        <option value="palanguecentral">Palangue Central</option>
                                        <option value="sabang">Sabang</option>
                                        <option value="sanroque">San Roque</option>
                                        <option value="santulan">Santulan</option>
                                        <option value="sapa">Sapa</option>
                                        <option value="timalanbalsahan">Timalan Balsahan</option>
                                        <option value="timalanconcepcion">Timalan Concepcion</option>
                                    </select>
                                </div>
                                
                            <div id="barangaySections">
                                    <!-- Bagong Kalsada Section -->
                                <div class="barangay-section" id="bagongkalsada-section">
                                    <h2 class="section-header">Bagong Kalsada</h2>
                                    <div class="table-container">
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

                                <!-- Balsahan Section -->
                                <div class="barangay-section" id="balsahan-section">
                                    <h2 class="section-header">Balsahan</h2>
                                    <div class="table-container">
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

                                <!-- Bancaan Section -->
                                <div class="barangay-section" id="bancaan-section">
                                    <h2 class="section-header">Bancaan</h2>
                                    <div class="table-container">
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

                                <!-- Bucana Malaki Section -->
                                <div class="barangay-section" id="bucanamalaki-section">
                                    <h2 class="section-header">Bucana Malaki</h2>
                                    <div class="table-container">
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

                                <!-- Bucana Sasahan Section -->
                                <div class="barangay-section" id="bucanasasahan-section">
                                    <h2 class="section-header">Bucana Sasahan</h2>
                                    <div class="table-container">
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

                                <!-- Calubcob Section -->
                                <div class="barangay-section" id="calubcob-section">
                                    <h2 class="section-header">Calubcob</h2>
                                    <div class="table-container">
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

                                <!-- Capt. C. Nazareno (Poblacion) Section -->
                                <div class="barangay-section" id="captcnazareno-section">
                                    <h2 class="section-header">Capt. C. Nazareno (Poblacion)</h2>
                                    <div class="table-container">
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

                                <!-- Gombalza (Poblacion) Section -->
                                <div class="barangay-section" id="gombalza-section">
                                    <h2 class="section-header">Gombalza (Poblacion)</h2>
                                    <div class="table-container">
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

                                <!-- Halang Section -->
                                <div class="barangay-section" id="halang-section">
                                    <h2 class="section-header">Halang</h2>
                                    <div class="table-container">
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

                                <!-- Humbac Section -->
                                <div class="barangay-section" id="humbac-section">
                                    <h2 class="section-header">Humbac</h2>
                                    <div class="table-container">
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

                                <!-- Ibayo Estacion Section -->
                                <div class="barangay-section" id="ibayoestacion-section">
                                    <h2 class="section-header">Ibayo Estacion</h2>
                                    <div class="table-container">
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

                                <!-- Ibayo Silangan Section -->
                                <div class="barangay-section" id="ibayosilangan-section">
                                    <h2 class="section-header">Ibayo Silangan</h2>
                                    <div class="table-container">
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

                                <!-- Kanluran Section -->
                                <div class="barangay-section" id="kanluran-section">
                                    <h2 class="section-header">Kanluran</h2>
                                    <div class="table-container">
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
                                <div class="barangay-section" id="latoria-section">
                                    <h2 class="section-header">Latoria</h2>
                                    <div class="table-container">
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
                                    <div class="barangay-section" id="labac-section">
                                        <h2 class="section-header">Labac</h2>
                                        <div class="table-container">
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
                                    <div class="barangay-section" id="mabolo-section">
                                        <h2 class="section-header">Mabolo</h2>
                                        <div class="table-container">
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
                                    <div class="barangay-section" id="malainenbago-section">
                                        <h2 class="section-header">Malainen Bago</h2>
                                        <div class="table-container">
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
                                    <div class="barangay-section" id="malainenluma-section">
                                        <h2 class="section-header">Malainen Luma</h2>
                                        <div class="table-container">
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
                                    <div class="barangay-section" id="maquina-section">
                                        <h2 class="section-header">Maquina</h2>
                                        <div class="table-container">
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
                                    <div class="barangay-section" id="molino-section">
                                        <h2 class="section-header">Molino</h2>
                                        <div class="table-container">
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

                        
                                    <!-- Add other barangay sections here following the same format -->
                        
                                    <!-- Example: Munting Mapino Section -->
                                    <div class="barangay-section" id="muntingmapino-section">
                                       
                                        <h2 class="section-header">Munting Mapino</h2>
                                        <div class="table-container">
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
                                    <!-- Repeat for other barangays -->

                                    <!-- Muzon Section -->
                                    <div class="barangay-section" id="muzon-section">
                                        <h2 class="section-header">Muzon</h2>
                                        <div class="table-container">
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
                                    <div class="barangay-section" id="palangue2-section">
                                        <h2 class="section-header">Palangue 2</h2>
                                        <div class="table-container">
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
                                    <div class="barangay-section" id="palangue3-section">
                                        <h2 class="section-header">Palangue 3</h2>
                                        <div class="table-container">
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
                                    <div class="barangay-section" id="palanguecentral-section">
                                        <h2 class="section-header">Palangue Central</h2>
                                        <div class="table-container">
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
                                    <div class="barangay-section" id="sabang-section">
                                        <h2 class="section-header">Sabang</h2>
                                        <div class="table-container">
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
                                    <div class="barangay-section" id="sanroque-section">
                                        <h2 class="section-header">San Roque</h2>
                                        <div class="table-container">
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
                                    <div class="barangay-section" id="santulan-section">
                                        <h2 class="section-header">Santulan</h2>
                                        <div class="table-container">
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
                                    <div class="barangay-section" id="sapa-section">
                                        <h2 class="section-header">Sapa</h2>
                                        <div class="table-container">
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
                                    <div class="barangay-section" id="timalanbalsahan-section">
                                        <h2 class="section-header">Timalan Balsahan</h2>
                                        <div class="table-container">
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
                                    <div class="barangay-section" id="timalanconcepcion-section">
                                        <h2 class="section-header">Timalan Concepcion</h2>
                                        <div class="table-container">
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

                        
                                </div>
                            </div>

                          
                                <!-- LIST BARANGAY -->
                                
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

<!-- BARANGAY DROPDOWN SCRIPT -->

<script>
    $(document).ready(function() {
        $('#barangaySearch').on('keyup', function() {
            var value = $(this).val().toLowerCase();
            $('#barangayDropdown option').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

        $('#barangayDropdown').on('change', function() {
            var selectedBarangay = $(this).val();
            $('.barangay-section').hide();
            if (selectedBarangay) {
                $('#' + selectedBarangay + '-section').show();
            }
        });
    });

    function toggleTable(id) {
        var table = document.getElementById(id);
        if (table.style.display === "none") {
            table.style.display = "block";
        } else {
            table.style.display = "none";
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
    <!-- AdminLTE for demo purposes POPUP-->
    {{-- <script src="{{ asset('/dist/js/demo.js') }}"></script> --}}
    <!-- Page specific script -->


    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Blood Type Distribution Chart
        const bloodTypeCtx = document.getElementById('bloodTypeChart').getContext('2d');
        new Chart(bloodTypeCtx, {
            type: 'bar',
            data: {
                labels: ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'],
                datasets: [{
                    label: 'Number of Donors',
                    data: [120, 90, 130, 80, 300, 30, 23, 2], // Replace with actual data
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Age Distribution Chart
        const ageDistributionCtx = document.getElementById('ageDistributionChart').getContext('2d');
        new Chart(ageDistributionCtx, {
            type: 'bar',
            data: {
                labels: ['18-25', '26-35', '36-45', '46-55', '56-65', '65+'],
                datasets: [{
                    label: 'Number of Donors',
                    data: [50, 80, 100, 70, 60, 30], // Replace with actual data
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

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
