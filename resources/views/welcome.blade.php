<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Naic Rural Health Unit</title>
    <link rel="icon" href="{{ asset('images/welcome_img/RHU_LOGO.ico') }}" type="image/x-icon">


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
           
    height: 330px; /* Fixed height for the image */
    object-fit: cover; /* Ensures the image covers the area */
    max-width: 490px; /* Max width constraint */
    display: block; /* Removes inline spacing */
    margin: 0 auto; /* Centers the image horizontally */
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
                                <img src="{{ asset('images/welcome_img/bd_rafiki.png') }}" class="card-img-top"
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
                                <img src="images\welcome_img\question_rafiki.png" class="card-img-top" alt="Card Image 2">
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
                                <img src="images\welcome_img\analytic_rafiki.png" class="card-img-top"
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
                                                    <option value="">All</option>
                                                    <option value="Bagong Kalsada"
                                                        {{ old('barangay', request('barangay')) == 'Bagong Kalsada' ? 'selected' : '' }}>
                                                        Bagong Kalsada</option>
                                                    <option value="Balsahan"
                                                        {{ old('barangay', request('barangay')) == 'Balsahan' ? 'selected' : '' }}>
                                                        Balsahan</option>
                                                    <option value="Bancaan"
                                                        {{ old('barangay', request('barangay')) == 'Bancaan' ? 'selected' : '' }}>
                                                        Bancaan</option>
                                                    <option value="Bucana Malaki"
                                                        {{ old('barangay', request('barangay')) == 'Bucana Malaki' ? 'selected' : '' }}>
                                                        Bucana Malaki</option>
                                                    <option value="Bucana Sasahan"
                                                        {{ old('barangay', request('barangay')) == 'Bucana Sasahan' ? 'selected' : '' }}>
                                                        Bucana Sasahan</option>
                                                    <option value="Calubcob"
                                                        {{ old('barangay', request('barangay')) == 'Calubcob' ? 'selected' : '' }}>
                                                        Calubcob</option>
                                                    <option value="Capt. C. Nazareno (Poblacion)"
                                                        {{ old('barangay', request('barangay')) == 'Capt. C. Nazareno (Poblacion)' ? 'selected' : '' }}>
                                                        Capt. C. Nazareno (Poblacion)</option>
                                                    <option value="Gombalza (Poblacion)"
                                                        {{ old('barangay', request('barangay')) == 'Gombalza (Poblacion)' ? 'selected' : '' }}>
                                                        Gombalza (Poblacion)</option>
                                                    <option value="Halang"
                                                        {{ old('barangay', request('barangay')) == 'Halang' ? 'selected' : '' }}>
                                                        Halang</option>
                                                    <option value="Humbac"
                                                        {{ old('barangay', request('barangay')) == 'Humbac' ? 'selected' : '' }}>
                                                        Humbac</option>
                                                    <option value="Ibayo Estacion"
                                                        {{ old('barangay', request('barangay')) == 'Ibayo Estacion' ? 'selected' : '' }}>
                                                        Ibayo Estacion</option>
                                                    <option value="Ibayo Silangan"
                                                        {{ old('barangay', request('barangay')) == 'Ibayo Silangan' ? 'selected' : '' }}>
                                                        Ibayo Silangan</option>
                                                    <option value="Kanluran Rizal"
                                                        {{ old('barangay', request('barangay')) == 'Kanluran Rizal' ? 'selected' : '' }}>
                                                        Kanluran Rizal</option>
                                                    <option value="Latoria"
                                                        {{ old('barangay', request('barangay')) == 'Latoria' ? 'selected' : '' }}>
                                                        Latoria</option>
                                                    <option value="Labac"
                                                        {{ old('barangay', request('barangay')) == 'Labac' ? 'selected' : '' }}>
                                                        Labac</option>
                                                    <option value="Mabolo"
                                                        {{ old('barangay', request('barangay')) == 'Mabolo' ? 'selected' : '' }}>
                                                        Mabolo</option>
                                                    <option value="Malainen Bago"
                                                        {{ old('barangay', request('barangay')) == 'Malainen Bago' ? 'selected' : '' }}>
                                                        Malainen Bago</option>
                                                    <option value="Malainen Luma"
                                                        {{ old('barangay', request('barangay')) == 'Malainen Luma' ? 'selected' : '' }}>
                                                        Malainen Luma</option>
                                                    <option value="Maquina"
                                                        {{ old('barangay', request('barangay')) == 'Maquina' ? 'selected' : '' }}>
                                                        Maquina</option>
                                                    <option value="Molino"
                                                        {{ old('barangay', request('barangay')) == 'Molino' ? 'selected' : '' }}>
                                                        Molino</option>
                                                    <option value="Munting Mapino"
                                                        {{ old('barangay', request('barangay')) == 'Munting Mapino' ? 'selected' : '' }}>
                                                        Munting Mapino</option>
                                                    <option value="Muzon"
                                                        {{ old('barangay', request('barangay')) == 'Muzon' ? 'selected' : '' }}>
                                                        Muzon</option>
                                                    <option value="Palangue 2"
                                                        {{ old('barangay', request('barangay')) == 'Palangue 2' ? 'selected' : '' }}>
                                                        Palangue 2</option>
                                                    <option value="Palangue 3"
                                                        {{ old('barangay', request('barangay')) == 'Palangue 3' ? 'selected' : '' }}>
                                                        Palangue 3</option>
                                                    <option value="Palangue Central"
                                                        {{ old('barangay', request('barangay')) == 'Palangue Central' ? 'selected' : '' }}>
                                                        Palangue Central</option>
                                                    <option value="Sabang"
                                                        {{ old('barangay', request('barangay')) == 'Sabang' ? 'selected' : '' }}>
                                                        Sabang</option>
                                                    <option value="San Roque"
                                                        {{ old('barangay', request('barangay')) == 'San Roque' ? 'selected' : '' }}>
                                                        San Roque</option>
                                                    <option value="Santulan"
                                                        {{ old('barangay', request('barangay')) == 'Santulan' ? 'selected' : '' }}>
                                                        Santulan</option>
                                                    <option value="Sapa"
                                                        {{ old('barangay', request('barangay')) == 'Sapa' ? 'selected' : '' }}>
                                                        Sapa</option>
                                                    <option value="Timalan Balsahan"
                                                        {{ old('barangay', request('barangay')) == 'Timalan Balsahan' ? 'selected' : '' }}>
                                                        Timalan Balsahan</option>
                                                    <option value="Timalan Concepcion"
                                                        {{ old('barangay', request('barangay')) == 'Timalan Concepcion' ? 'selected' : '' }}>
                                                        Timalan Concepcion</option>
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
                                                <li class="list-group-item"><strong>Do stay hydrated</strong>: Drink plenty of water before and after donating to keep your body hydrated to avoid experiencing lightheadedness or fatigue.</li>
                                                <li class="list-group-item"><strong>Do eat a healthy meal</strong>: Have a balanced meal with iron-rich foods before donating to maintain energy levels.</li>
                                                <li class="list-group-item"><strong>Do get plenty of rest</strong>: Ensure you're well-rested and relaxed before donating to avoid feeling lightheaded, faint, or weak during or after the process.</li>
                                                <li class="list-group-item"><strong>Do wear comfortable clothing</strong>: Wear a shirt with sleeves that can be easily rolled up for the donation process.</li>
                                                <li class="list-group-item"><strong>Do follow post-donation care</strong>: Rest for a few minutes after donating, avoid heavy lifting, and have a snack to replenish your energy</li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <h4 class="mb-3"><i class="fas fa-times-circle text-danger"></i> Don'ts
                                                of Blood Donation:</h4>
                                            <ul class="list-group">
                                                <li class="list-group-item"><strong>Don’t donate on an empty stomach</strong>: Skipping meals before donating can lead to dizziness or fainting.</li>
                                                <li class="list-group-item"><strong>Don’t smoke or drink alcohol</strong>: Avoid smoking and alcohol consumption before and immediately after donating.</li>
                                                <li class="list-group-item"><strong>Don’t engage in strenuous activities:</strong> Refrain from heavy exercise or physical labor for at least 24 hours after donating.</li>
                                                <li class="list-group-item"><strong>Don’t hide medical conditions</strong>: Be honest about your health history and any medications you're taking.</li>
                                                <li class="list-group-item"><strong>Don’t donate if you're feeling unwell</strong>: If you feel sick, tired, or have a recent infection, postpone your donation until you're fully recovered.</li>
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
                                                            A healthy individual may donate every three months.
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
                                                            Blood donors must be <strong>18-65</strong> years old, weigh at least <strong>50</strong> kg, be in good health with normal hemoglobin and blood pressure levels, and must not have engaged in risky behaviors, with intervals of 3 months for men and 4 months for women between donations.
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
                                                            The whole process of blood donation, from the registration up to the recovery, will only take an average of 30 minutes.
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
                                                            <span class="accordion-title">Can a person who has tattoo or body piercing still donate blood?</span>
                                                            <i class="fas fa-plus accordion-icon"></i>
                                                        </div>
                                                    </div>
                                                    <div id="collapseSix" class="collapse"
                                                        aria-labelledby="headingSix" data-bs-parent="#faqAccordion">
                                                        <div class="card-body">
                                                            If the tattooing procedure or the piercing was done a year ago, he/she may donate. This is also applicable to acupuncture, and other procedures involving needles.
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
                                                            <span class="accordion-title">Will donating blood make a person weak?</span>
                                                            <i class="fas fa-plus accordion-icon"></i>
                                                        </div>
                                                    </div>
                                                    <div id="collapseSeven" class="collapse"
                                                        aria-labelledby="headingSeven" data-bs-parent="#faqAccordion">
                                                        <div class="card-body">
                                                            No, it will not make you weak. Donating 450cc will not cause any ill effects or weakness. The human body has the capacity to compensate with the new fluid volume. Further, the bone marrow is stimulated to produce new blood cells which in turn makes the blood forming organs function more effectively.
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
                                                            <span class="accordion-title">Will I contract disease through blood donation?</span>
                                                            <i class="fas fa-plus accordion-icon"></i>
                                                        </div>
                                                    </div>
                                                    <div id="collapseEight" class="collapse"
                                                        aria-labelledby="headingEight" data-bs-parent="#faqAccordion">
                                                        <div class="card-body">
                                                            No, we use sterile, disposable needles and syringes.
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
                                                            <span class="accordion-title">What should I do before donating blood?</span>
                                                            <i class="fas fa-plus accordion-icon"></i>
                                                        </div>
                                                    </div>
                                                    <div id="collapseNine" class="collapse"
                                                        aria-labelledby="headingNine" data-bs-parent="#faqAccordion">
                                                        <div class="card-body">
                                                            Drink plenty of water, eat a balanced meal rich in iron, get a good night's sleep, and avoid alcohol or smoking before donating.
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
