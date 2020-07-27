@extends('Admin.layout.default')

@section('judul','Dokter')

@section('dokter','active show')

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
                <table id="dataTable" class="table table-bordered animated flipInX">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Poli</th>
                            <th>Nama Dokter</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
      </div>
    </div>
</div>
<!-- End Row-->

@include('Admin.dokter.form')

@endsection

@section('scripts') 
 {{-- <script>
     $(document).ready(function() {
         $('.single-select').select2();
       });
 </script> --}}

<script>
var table=$('#dataTable').DataTable({
            ajax: "{{ route('Dokter.index') }}",
            columns: [
                { data: 'id', name: 'id' },
                { data: 'nm_poli', name: 'nm_poli' },
                { data: 'nm_dokter', name: 'nm_dokter' },
                { data: 'jenkel', name: 'jenkel' },
                { data: 'alamat', name: 'alamat' },
                { data: 'aksi' },
            ]
        });

</script>

<script>
    $('#tambah').click(function(){
        save_method="add"
        $('.modal-title').html('Menambah Data Dokter')
        $('#tombolForm').html('Simpan Data')
        $('#formKu').trigger("reset");
        console.log(save_method)
    })

    $(document).ready(function () {
        $("#formKu").on('submit',function(e){
          e.preventDefault();
          var id = $('#id').val();
          var dataKu = $('#formKu').serialize();
          if (save_method=="add") { 
              url="{{ route('Dokter.store') }}"
              method="POST"
              pesan=round_success_noti_tambah()
              aksi=""  
          } else {
              url="Dokter/"+id
              method="PUT"
              pesan=round_success_noti_ubah()
              aksi=$('#tampilModal').modal('hide')
          }
          $.ajax({
          url: url,
          type: method,
          data: dataKu, 
          success: function(response) {
              console.log(response)
              aksi
              $('#id').val('');
              $('#id_poli').val('');
              $('#nm_dokter').val('');
              $('#alamat').val('');
              $('#email').val('');
              $('#password').val('');
              table.ajax.reload();
              pesan
          }
          });
          console.log(url)
        });
    });
</script>


@endsection
