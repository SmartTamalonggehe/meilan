@extends('Admin.layout.default')

@section('judul','Antrian')

@section('Antrian','active show')

@section('isi')
<!-- Start Row-->
<div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header"><i class="fa fa-table"></i> Data @yield('judul')<div class="btn-group float-sm-right">
          <button type="button" id="tambah" class="btn btn-light waves-effect waves-light"  data-toggle="modal" data-target="#tampilModal" data-target="#modal-animation-12"><i class="fa fa-plus-circle"></i> Tambah Data @yield('judul')</button>
        </div>
    </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="tampil"></div>
            </div>
        </div>
      </div>
    </div>
</div>
<!-- End Row-->

@include('Admin.antrian.form')

@endsection

@section('scripts')

<script>
    $('.single-select').select2();
</script>


<script>
    $(document).ready(function(){
        $('#tampil').load('{{ route("antrian.create") }}');
        $('#tampil').attr('class', 'tampil  ' + 'zoomInRight' + '  animated');
    });
</script>

{{-- Tambah Data --}}
<script>

    $('#tambah').click(function(){
        save_method="add"
        $('#judul').html('From Tambah Data')
        $('#tombolForm').html('Simpan Data')
        $('#formKu').trigger("reset");
        $('.tampilModal').modal('show')
        $("#id_dokter").val('').trigger('change');
        $("#id_pasien").val('').trigger('change');
        console.log(save_method)
    });

    $(document).ready(function () {
        $("#formKu").on('submit',function(e){
          e.preventDefault();
          var id = $('#id').val();
          var dataKu = $('#formKu').serialize();
          if (save_method=="add") { 
              url="{{ route('antrian.store') }}"
              method="POST"
          } else {
              url="antrian/"+id
              method="PUT"
          }
          $.ajax({
          url: url,
          type: method,
          data: dataKu, 
          success: function(response) {
              const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    onOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                if (save_method=="add") {                     
                    Toast.fire({
                        icon: 'success',
                        title: 'Data Berhasil Ditambahkan'
                    })
                } else {
                    Toast.fire({
                        icon: 'success',
                        title: 'Data Berhasil Diubah'
                    })
                    aksi=$('.tampilModal').modal('hide')
                }
              $('#id').val('');
              $("#id_dokter").val('').trigger('change');
              $("#id_pasien").val('').trigger('change');
              $('#tampil').load('{{ route("antrian.create") }}');
            //   pesan
          }
          });
          console.log(save_method)
        });
    });

</script>

@endsection