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


@extends('layouts.welcometest')


<body>

    
    <div>
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


                        <div class="col-lg-6 offset-lg-0">
                            <!-- FAQ SECTION -->
                            <div class="card shadow mt-4">
                                <div class="card-header bg-info text-white">
                                    <h3 class="card-title"><i class="fas fa-question-circle"></i> Frequently Asked
                                        Questions</h3>
                                </div>
                                <div class="card-body">
                                    <div class="accordion" id="faqAccordion">
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <div class="accordion-header" data-toggle="collapse"
                                                    data-target="#collapseOne" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                    <span class="accordion-title">How often can I donate blood?</span>
                                                    <i class="fas fa-plus accordion-icon"></i>
                                                </div>
                                            </div>
                                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                                data-parent="#faqAccordion">
                                                <div class="card-body">
                                                    You must wait at least 56 days between donations of whole blood and
                                                    112 days between Power Red donations.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingTwo">
                                                <div class="accordion-header collapsed" data-toggle="collapse"
                                                    data-target="#collapseTwo" aria-expanded="false"
                                                    aria-controls="collapseTwo">
                                                    <span class="accordion-title">Who can donate blood?</span>
                                                    <i class="fas fa-plus accordion-icon"></i>
                                                </div>
                                            </div>
                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                                data-parent="#faqAccordion">
                                                <div class="card-body">
                                                    Most people can donate blood if they are in good health. Age,
                                                    weight, and other factors may affect eligibility.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingThree">
                                                <div class="accordion-header collapsed" data-toggle="collapse"
                                                    data-target="#collapseThree" aria-expanded="false"
                                                    aria-controls="collapseThree">
                                                    <span class="accordion-title">Does donating blood hurt?</span>
                                                    <i class="fas fa-plus accordion-icon"></i>
                                                </div>
                                            </div>
                                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                                data-parent="#faqAccordion">
                                                <div class="card-body">
                                                    Donating blood is usually painless. You may feel a slight pinch when
                                                    the needle is inserted, but discomfort is minimal.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingFour">
                                                <div class="accordion-header collapsed" data-toggle="collapse"
                                                    data-target="#collapseFour" aria-expanded="false"
                                                    aria-controls="collapseFour">
                                                    <span class="accordion-title">Can I donate if I have a cold?</span>
                                                    <i class="fas fa-plus accordion-icon"></i>
                                                </div>
                                            </div>
                                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                                                data-parent="#faqAccordion">
                                                <div class="card-body">
                                                    If you have cold or flu symptoms, it is best to wait until you are
                                                    feeling better before donating blood.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingFive">
                                                <div class="accordion-header collapsed" data-toggle="collapse"
                                                    data-target="#collapseFive" aria-expanded="false"
                                                    aria-controls="collapseFive">
                                                    <span class="accordion-title">How long does the donation process
                                                        take?</span>
                                                    <i class="fas fa-plus accordion-icon"></i>
                                                </div>
                                            </div>
                                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                                                data-parent="#faqAccordion">
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
                                <div class="card-header bg-info text-white">
                                    <h3 class="card-title"><i class="fas fa-chart-bar"></i> Blood Donation Analytics
                                    </h3>
                                </div>
                                <!-- /.card-barangays-->
                                <div class="card-body">
                                    <div id="analyticsAccordion">

                                        <div class="row">
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

                                        </div>
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



<footer class="main-footer p-3">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
</footer>


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







</html>
