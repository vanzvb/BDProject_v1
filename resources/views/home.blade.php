@extends('layouts.adminlte')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}
    <!-- Content Header (Page header) -->

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Welcome {{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <html>
<head>
    <title>Profile</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

     <!-- Include FontAwesome for the user icon -->
     <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
     <style>
         .profile-card {
             display: flex;
             align-items: center;
             padding: 50px;
         }
         .profile-info {
             flex: 1;
             margin-left: 60px;
         }
         .profile-info p {
             font-size: 1.3em; /* Enlarging the text */
         }
         .profile-img {
             width: 150px;
             height: 150px;
             background-color: #f8f9fa;
             border-radius: 50%;
             display: flex;
             align-items: center;
             justify-content: center;
             font-size: 5em;
             color: #6c757d;
         }
         .card-title {
             font-size: 2em;
         }
      </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><strong>Donor Profile</strong></h3>
            </div>
            <div class="card-body profile-card">
              <div class="profile-img">
                  <i class="fas fa-user"></i> <!-- FontAwesome user icon -->
              </div>
              <div class="profile-info">
                  <div class="row">
                      <div class="col-md-6">
                          <p><strong>Email :</strong> {{ $email }}</p>
                          <p><strong>Blood Type :</strong> {{ $bloodType }}</p>
                          <p><strong>Age :</strong> {{ $age }}</p>
                          <p><strong>Gender :</strong> {{ $gender }}</p>
                          <p><strong>Donor Status :</strong> </p>
                          <p><strong>Donation History :</strong>  </p>
                      </div>
                      <div class="col-md-6">
                          <p><strong>Civil Status :</strong> {{ $civilStatus }}</p>
                          <p><strong>Nationality :</strong> {{ $nationality }}</p>
                          <p><strong>Occupation :</strong> {{ $occupation }}</p>
                          <p><strong>Address :</strong> {{ $address }}</p>
                          <p><strong>Contact Info :</strong> {{ $contactInfo }}</p>

                      </div>
                  </div>
                  {{-- <div class="row mt-4">
                      <div class="col-md-12">
                          <a href="#" class="btn btn-primary">Edit Profile</a>
                          <a href="#" class="btn btn-secondary">Another Action</a>
                      </div>
                  </div> --}}
                
              </div>
            
        </div>
    </div>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
     <!-- Include FontAwesome for the user icon -->
     <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
    
    
    
        {{-- <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Profile</h5>
                  
                  <p class="card-text">
                    Email : {{ $email }}
                  </p>
                  <p>Blood Type: {{ $bloodType }}</p>
                  <p>Age: {{ $age }}</p>
                  <p>Gender: {{ $gender }}</p>
                  <p>Civil Status: {{ $civilStatus }}</p>
                  <p>Nationality: {{ $nationality }}</p>
                  <p>Occupation: {{ $occupation }}</p>
                  <p>Address: {{ $address }}</p>
                  <p>Contact Info: {{ $contactInfo }}</p>
                  <a href="#" class="card-link">Card link</a>
                  <a href="#" class="card-link">Another link</a>
                </div>
            </div>
    
            <div class="card card-primary card-outline">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
    
                <p class="card-text">
                  Some quick example text to build on the card title and make up the bulk of the card's
                  content.
                </p>
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
              </div>
            </div><!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <h5 class="m-0">Featured</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Special title treatment</h6>
    
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
    
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Featured</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Special title treatment</h6>
    
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content --> --}}
    

@endsection
