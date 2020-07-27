<div class="row mt-3">
    @if (!$noUrutSekarang)
    <div class="col-12 col-sm-12 col-lg-12 col-xl-12">
        <div class="card">
          <div class="card-body">
            <div class="">
              <h1 class="text-center">Belum Ada Antrian</h1>
            </div>
        </div>
        </div>
    </div>
    @else
    
    
    <div class="col-12 col-sm-3 col-lg-3 col-xl-3">
      <div class="card">
          @if (!$noUrutSebelumnya)
              
          @else
            <div class="card-body">
                <div class="">
                    <button type="button" id="sebelumnya" class="btn btn-light waves-effect waves-light py-4 mt-3 mb-2 btn-block "><i class="fa fa-minus-circle"></i> Sebelumnya </button>
                </div>
                <hr>
                <p class="mb-0 mt-2 text-white small-font">{{ $noUrutSebelumnya->pasien->nm_pasien }}</p>
            </div>
            @endif
        </div>
    </div>
    <div class="col-12 col-sm-6 col-lg-6 col-xl-6">
      <div class="card">
      <div class="card-body">
          <p class="text-white text-center bold mb-0">No Antrian</p>
           <div class="antri">
           <h3 class="mb-0 py-3 text-center" id="noAntri">{{ $noUrutSekarang->no_antri }}</h3>
           </div>
           <hr>
          <p class="mb-0 mt-2 text-white small-font">Pasien: {{ $noUrutSekarang->pasien->nm_pasien }}</p>
        </div>
      </div>
    </div>
  
    <div class="col-12 col-sm-3 col-lg-3 col-xl-3">
      <div class="card">
        @if (!$noUrutSelanjutnya)
              
        @else
        <div class="card-body">
            <div class="">
              <button type="button" id="selanjutnya" class="btn btn-light waves-effect waves-light py-4 mt-3 mb-2 btn-block "><i class="fa fa-plus-circle"></i> Selanjutnya </button>
            </div>
            <hr>
            <p class="mb-0 mt-2 text-white small-font">Pasien: {{ $noUrutSelanjutnya->pasien->nm_pasien }}</p>
        </div>
        @endif
      </div>
    </div>

    
  </div>

  <div class="card">
    <div class="card-header">Data Pasien</div>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{ $noUrutSekarang->pasien->nm_pasien }}</h5>
        <p class="card-text">{{ $noUrutSekarang->pasien->alamat }}</p>
      </div>
       <ul class="list-group list-group-flush list shadow-none">
        <li class="list-group-item d-flex justify-content-between align-items-center">Umur: {{ $noUrutSekarang->pasien->umur }} </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">Jenis Kelamin: {{ $noUrutSekarang->pasien->jenkel }}</li>
        <li class="list-group-item d-flex justify-content-between align-items-center">Golongan Darah: {{ $noUrutSekarang->pasien->gol_darah }}</li>
      </ul>
    </div>

        </div>
      </div><!--End Row-->
    </div>
  </div>

  @endif
  
  <script>
    $(document).ready(function(){ 
     //  Tombol Sebelumnya
      $('#sebelumnya').click(function(){
        let url="{{ route('sebelumnya') }}"
        $.ajax({
          url: url, 
          });
          $('#noAntri').load('{{ route("showNoUrut") }}');
          console.log(url)
         
      })
     //  Tombol Selanjutnya
      $('#selanjutnya').click(function(){
        let url="{{ route('selanjutnya') }}"
        $.ajax({
          url: url, 
          });
          $('#noAntri').load('{{ route("showNoUrut") }}');
          console.log(url)
      })
    })
  </script>