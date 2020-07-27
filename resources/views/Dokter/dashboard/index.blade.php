@extends('Dokter.layout.default')

@section('judul','Dashboard')

@section('dashboard','active')

@section('isi')

<div id="noAntri"></div>



 
@endsection

@push('scripts')
    <!-- Chart js -->
 <script src="{{ asset('admin/plugins/Chart.js/Chart.min.js') }}"></script>
 <!-- Index2 js -->
 <script src="{{ asset('admin/js/dashboard-property-listing.js') }}"></script>
     
 <script>
   $('#noAntri').load('{{ route("showNoUrut") }}'); 
 </script>

 
@endpush