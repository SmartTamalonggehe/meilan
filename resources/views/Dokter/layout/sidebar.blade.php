<body class="bg-theme bg-theme7">
  

  
  <!-- start loader -->
     <div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" ><div class="loader"></div></div></div></div>
<!-- Start wrapper-->
<div id="wrapper">

    <!--Start sidebar-wrapper-->
    <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
      <div class="brand-logo">
       <a href="index.html">
        <img src="{{ asset('adminTemplate/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        <h5 class="logo-text">RS. UMUM DOK 2</h5>
      </a>
    </div>
    <div class="user-details">
     <div class="media align-items-center user-pointer collapsed" data-toggle="collapse" data-target="#user-dropdown">
       <div class="avatar"><img class="mr-3 side-user-img" src="https://via.placeholder.com/110x110" alt="user avatar"></div>
        <div class="media-body">
        <h6 class="side-user-name">{{ Auth::user()->name }}</h6>
       </div>
        </div>
      <div id="user-dropdown" class="collapse"> 
       <ul class="user-setting-menu">
             {{-- <li><a href="javaScript:void();"><i class="icon-user"></i>  My Profile</a></li>
             <li><a href="javaScript:void();"><i class="icon-settings"></i> Setting</a></li> --}}
       <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="icon-power"></i> Logout</a></li>
       </ul>
      </div>
       </div>
    <ul class="sidebar-menu">
       <li class="sidebar-header">MENU UTAMA</li>
        <li class="@yield('dashboard')">
          <a href="{{ route('dokter') }}" class="waves-effect">
            <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="@yield('pasien')">
          <a href="{{ route('pasienDokter.index') }}" class="waves-effect">
            <i class="zmdi zmdi-layers"></i><span>Pasien</span>
          </a>
        </li>
     </ul>
    </div>
    <!--End sidebar-wrapper-->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
  </form>