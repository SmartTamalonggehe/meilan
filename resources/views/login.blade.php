<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <meta name="csrf_token" content="{{csrf_token()}}">
  <title>Login</title>
  <!--favicon-->
  <link rel="icon" href="{{ asset('adminTemplate/images/favicon.ico') }}" type="image/x-icon">
  <!-- notifications css -->
  <link rel="stylesheet" href="{{ asset('adminTemplate/plugins/notifications/css/lobibox.min.css') }}"/>
  <!--Select Plugins-->
  <link href="{{ asset('adminTemplate/plugins/select2/css/select2.min.css') }}" rel="stylesheet"/>
  <!-- simplebar CSS-->
  <link href="{{ asset('adminTemplate/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="{{ asset('adminTemplate/css/bootstrap.min.css') }}" rel="stylesheet"/>
  <!--Data Tables -->
  <link href="{{ asset('adminTemplate/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('adminTemplate/plugins/bootstrap-datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
  <!-- animate CSS-->
  <link href="{{ asset('adminTemplate/css/animate.css') }}" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="{{ asset('adminTemplate/css/icons.css') }}" rel="stylesheet" type="text/css"/>
  <!-- Sidebar CSS-->
  <link href="{{ asset('adminTemplate/css/sidebar-menu.css') }}" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="{{ asset('adminTemplate/css/app-style.css') }}" rel="stylesheet"/>
  
</head>

<body class="bg-theme bg-theme8">

    <!-- start loader -->
       <div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" ><div class="loader"></div></div></div></div>
       <!-- end loader -->
    
    <!-- Start wrapper-->
     <div id="wrapper">
    
     <div class="loader-wrapper"><div class="lds-ring"><div></div><div></div><div></div><div></div></div></div>
        <div class="card card-authentication1 mx-auto my-5">
            <div class="card-body">
             <div class="card-content p-2">
              <div class="card-title text-uppercase text-center py-3">Login</div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                  <div class="form-group">
                  <label for="email" class="sr-only">Username</label>
                   <div class="position-relative has-icon-right">
                      <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus class="form-control input-shadow" placeholder="Enter Username">
                      <div class="form-control-position">
                          <i class="icon-user"></i>
                      </div>
                   </div>
                   @error('email') 
                    <span class="danger">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group">
                  <label for="password" class="sr-only">Password</label>
                   <div class="position-relative has-icon-right">
                      <input id="password" type="password" name="password" required autocomplete="current-password" class="form-control input-shadow" placeholder="Enter Password">
                      <div class="form-control-position">
                          <i class="icon-lock"></i>
                      </div>
                   </div>
                   @error('password') 
                    <span class="danger">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                <div class="form-row">
                 <div class="form-group col-6">
                   <div class="icheck-material-white">
                    <input type="checkbox" id="user-checkbox" checked="" />
                    <label for="user-checkbox">Remember me</label>
                  </div>
                 </div>
                 <div class="form-group col-6 text-right">
                 </div>
                </div>
                 <button type="submit" class="btn btn-light btn-block">Sign In</button>                 
                 </form>
              </div>
             </div>

    

@include('Dokter.layout.footer')