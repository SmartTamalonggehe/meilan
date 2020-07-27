@extends('Admin.layout.default')

@section('judul','Dashboard')

@section('dashboard','active')

@section('isi')
<div class="row mt-3">
    <div class="col-12 col-lg-6 col-xl-4">
      <div class="card">
      <div class="card-body">
          <p class="text-white mb-0">Jumlah Pasien</p>
           <div class="">
           <h4 class="mb-0 py-3">403 <span class="float-right"><i class="fa fa-home"></i></span></h4>
           </div>
        </div>
      </div>
     </div>


     <div class="col-12 col-lg-6 col-xl-4">
      <div class="card">
      <div class="card-body">
          <p class="text-white mb-0">Jumlah Dokter</p>
           <div class="">
           <h4 class="mb-0 py-3">10 <span class="float-right"><i class="fa fa-search"></i></span></h4>
           </div>
        </div>
      </div>
     </div>

   </div>
   <!--End Row-->
     
 
@endsection

@push('scripts')
    <!-- Chart js -->
 <script src="{{ asset('admin/plugins/Chart.js/Chart.min.js') }}"></script>
 <!-- Index2 js -->
 <script src="{{ asset('admin/js/dashboard-property-listing.js') }}"></script>  
@endpush