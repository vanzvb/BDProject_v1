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
            max-height: 300px;
            /* Adjust height as needed */
            overflow-y: auto;
            /* Enable vertical scrolling */
            margin-bottom: 20px;
            /* Space between tables */
        }

        .table {
            margin-bottom: 0;
            /* Remove margin at the bottom of the table */
        }

        .barangay-btn {
            width: 100%;
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        .summary-table th,
        .summary-table td {
            text-align: center;
        }

        .section-header {
            font-size: 1.5em;
            margin-bottom: 20px;
        }

        .card {
            margin-bottom: 1.5rem;
            /* Space between cards */
        }

        canvas {
            display: block;
            height: 400px;
            /* Set a fixed height */
            width: 100%;
            /* Full width of the parent container */
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
            justify-content: center;
            /* Center horizontally */
            align-items: center;
            /* Center vertically */
        }

        .card-img-top {
            width: 100%;
            /* Full width of the card */
            height: 450px;
            /* Fixed height */
            object-fit: cover;
            /* Cover the area, cropping if necessary */
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
                                <img src="{{ asset('images/welcome_img/blood_donate1.jpg') }}" class="card-img-top"
                                    alt="Card Image 1">
                                <div class="card-body">
                                    <h5 class="card-title"> Guide to Blood Donation</h5>
                                    <p class="card-text">Blood donation is a simple yet impactful way to save lives.
                                        This guide provides essential information on how to prepare for donating blood,
                                        what to expect during the process, and post-donation care.</p>
                                    <a href="#guideblood" class="btn btn-primary">Take me there</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card shadow">
                                <img src="images\welcome_img\doctor_guide.jpg" class="card-img-top" alt="Card Image 2">
                                <div class="card-body">
                                    <h5 class="card-title">Frequently Asked Questions</h5>
                                    <p class="card-text">Discover key information about blood donation with answers to
                                        common questions on eligibility, safety, and preparation. This guide ensures
                                        you’re well-informed for a smooth and impactful donation experience.</p>
                                    <a href="#faqblood" class="btn btn-primary">Take me there</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card shadow">
                                <img src="images\welcome_img\analytic_report.jpg" class="card-img-top"
                                    alt="Card Image 3">
                                <div class="card-body">
                                    <h5 class="card-title">Blood Donation Analytics </h5>
                                    <p class="card-text">Explore insights into blood donation patterns across different
                                        barangays. This analysis helps understand local donation trends and supports
                                        targeted efforts to meet community needs.</p>
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
                                    <h3 class="card-title"><i class="fas fa-question-circle"></i> Frequently Asked
                                        Questions</h3>
                                </div>
                                <div class="card-body">
                                    <div class="accordion" id="faqAccordion">
                                        <!-- First Row -->
                                        <div class="row">
                                            <div class="col-md-6 col-lg-4">
                                                <!-- Card 1 -->
                                                <div class="card faq-card">
                                                    <div class="card-header" id="headingOne">
                                                        <div class="accordion-header" data-bs-toggle="collapse"
                                                            data-bs-target="#collapseOne" aria-expanded="false"
                                                            aria-controls="collapseOne">
                                                            <span class="accordion-title">How often can I donate
                                                                blood?</span>
                                                            <i class="fas fa-plus accordion-icon"></i>
                                                        </div>
                                                    </div>
                                                    <div id="collapseOne" class="collapse"
                                                        aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                                                        <div class="card-body">
                                                            You must wait at least 56 days between donations of whole
                                                            blood and 112 days between Power Red donations.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-4">
                                                <!-- Card 2 -->
                                                <div class="card faq-card">
                                                    <div class="card-header" id="headingTwo">
                                                        <div class="accordion-header collapsed"
                                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                            aria-expanded="false" aria-controls="collapseTwo">
                                                            <span class="accordion-title">Who can donate blood?</span>
                                                            <i class="fas fa-plus accordion-icon"></i>
                                                        </div>
                                                    </div>
                                                    <div id="collapseTwo" class="collapse"
                                                        aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                                                        <div class="card-body">
                                                            Most people can donate blood if they are in good health.
                                                            Age, weight, and other factors may affect eligibility.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-4">
                                                <!-- Card 3 -->
                                                <div class="card faq-card">
                                                    <div class="card-header" id="headingThree">
                                                        <div class="accordion-header collapsed"
                                                            data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                            aria-expanded="false" aria-controls="collapseThree">
                                                            <span class="accordion-title">Does donating blood
                                                                hurt?</span>
                                                            <i class="fas fa-plus accordion-icon"></i>
                                                        </div>
                                                    </div>
                                                    <div id="collapseThree" class="collapse"
                                                        aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                                                        <div class="card-body">
                                                            Donating blood is usually painless. You may feel a slight
                                                            pinch when the needle is inserted, but discomfort is
                                                            minimal.
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
                                                        <div class="accordion-header collapsed"
                                                            data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                                            aria-expanded="false" aria-controls="collapseFour">
                                                            <span class="accordion-title">Can I donate if I have a
                                                                cold?</span>
                                                            <i class="fas fa-plus accordion-icon"></i>
                                                        </div>
                                                    </div>
                                                    <div id="collapseFour" class="collapse"
                                                        aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                                                        <div class="card-body">
                                                            If you have cold or flu symptoms, it is best to wait until
                                                            you are feeling better before donating blood.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-4">
                                                <!-- Card 5 -->
                                                <div class="card faq-card">
                                                    <div class="card-header" id="headingFive">
                                                        <div class="accordion-header collapsed"
                                                            data-bs-toggle="collapse" data-bs-target="#collapseFive"
                                                            aria-expanded="false" aria-controls="collapseFive">
                                                            <span class="accordion-title">How long does the donation
                                                                process take?</span>
                                                            <i class="fas fa-plus accordion-icon"></i>
                                                        </div>
                                                    </div>
                                                    <div id="collapseFive" class="collapse"
                                                        aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                                                        <div class="card-body">
                                                            The entire donation process typically takes about an hour,
                                                            including registration, medical history, donation, and
                                                            refreshments.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-4">
                                                <!-- Card 6 -->
                                                <div class="card faq-card">
                                                    <div class="card-header" id="headingSix">
                                                        <div class="accordion-header collapsed"
                                                            data-bs-toggle="collapse" data-bs-target="#collapseSix"
                                                            aria-expanded="false" aria-controls="collapseSix">
                                                            <span class="accordion-title">How is blood tested?</span>
                                                            <i class="fas fa-plus accordion-icon"></i>
                                                        </div>
                                                    </div>
                                                    <div id="collapseSix" class="collapse"
                                                        aria-labelledby="headingSix" data-bs-parent="#faqAccordion">
                                                        <div class="card-body">
                                                            Blood is tested for various diseases and conditions to
                                                            ensure it is safe for transfusion.
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
                                                        <div class="accordion-header collapsed"
                                                            data-bs-toggle="collapse" data-bs-target="#collapseSeven"
                                                            aria-expanded="false" aria-controls="collapseSeven">
                                                            <span class="accordion-title">Can I donate if I am on
                                                                medication?</span>
                                                            <i class="fas fa-plus accordion-icon"></i>
                                                        </div>
                                                    </div>
                                                    <div id="collapseSeven" class="collapse"
                                                        aria-labelledby="headingSeven" data-bs-parent="#faqAccordion">
                                                        <div class="card-body">
                                                            It depends on the medication. Consult with the blood bank to
                                                            confirm eligibility.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-4">
                                                <!-- Card 8 -->
                                                <div class="card faq-card">
                                                    <div class="card-header" id="headingEight">
                                                        <div class="accordion-header collapsed"
                                                            data-bs-toggle="collapse" data-bs-target="#collapseEight"
                                                            aria-expanded="false" aria-controls="collapseEight">
                                                            <span class="accordion-title">Can I donate blood if I am
                                                                pregnant?</span>
                                                            <i class="fas fa-plus accordion-icon"></i>
                                                        </div>
                                                    </div>
                                                    <div id="collapseEight" class="collapse"
                                                        aria-labelledby="headingEight" data-bs-parent="#faqAccordion">
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
                                                        <div class="accordion-header collapsed"
                                                            data-bs-toggle="collapse" data-bs-target="#collapseNine"
                                                            aria-expanded="false" aria-controls="collapseNine">
                                                            <span class="accordion-title">How often can I donate
                                                                platelets?</span>
                                                            <i class="fas fa-plus accordion-icon"></i>
                                                        </div>
                                                    </div>
                                                    <div id="collapseNine" class="collapse"
                                                        aria-labelledby="headingNine" data-bs-parent="#faqAccordion">
                                                        <div class="card-body">
                                                            Platelets can be donated more frequently than whole blood,
                                                            typically every 2 weeks.
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
                                        <h1 class="text-center mby-4"><strong>Barangay Analytics</strong></h1>
                                        <div class="form-group">
                                            <label for="barangayDropdown">Select Barangay:</label>
                                            <form action="{{ route('welcome') }}" method="GET">
                                                <select class="form-control" id="barangayDropdown" name="barangay">
                                                    {{-- <option value="">-- Select Barangay --</option> --}}
                                                    <option value="">All</option>
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
                                                </select>
                                                <button type="submit" class="btn btn-primary mt-2">Submit</button>
                                            </form>
                                        </div>

                                        <!-- Total Donors Card -->
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3>Total Donors Within Naic</h3>
                                                </div>
                                                <div class="card-body">
                                                    <h4>Total Donors</h4>
                                                    <p>{{ $totalActiveDonors }}</p> <!-- Total Donors -->
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
                                                    <p> {{ $totalMaleDonors }}</p> <!-- Total Male Donors Card -->
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
                                                    <p> {{ $totalFemaleDonors }}</p> <!-- Total Female Donors -->
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
            labels: @json(array_keys($bloodTypeCounts)),
            datasets: [{
                label: 'Number of Donors',
                data: @json(array_values($bloodTypeCounts)), // Replace with actual data
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
            labels: @json(array_keys($ageGroupCounts)),
            datasets: [{
                label: 'Number of Donors',
                data: @json(array_values($ageGroupCounts)), // Replace with actual data
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

<script></script>

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
