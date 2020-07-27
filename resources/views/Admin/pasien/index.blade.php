@extends('Admin.layout.default')

@section('judul','Pasien')

@section('pasien','active show')

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
                            <th>No Pengenal</th>
                            <th>Nama Pasien</th>
                            <th>Jenis Kelamin</th>
                            <th>Gol. Darah</th>
                            <th>No. HP</th>
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

@include('Admin.pasien.form')

@endsection

@section('scripts') 
 {{-- <script>
     $(document).ready(function() {
         $('.single-select').select2();
       });
 </script> --}}

<script>
var table=$('#dataTable').DataTable({
            ajax: "{{ route('pasien.index') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'no_pengenal', name: 'no_pengenal' },
                { data: 'nm_pasien', name: 'nm_pasien' },
                { data: 'jenkel', name: 'jenkel' },
                { data: 'gol_darah', name: 'gol_darah' },
                { data: 'no_hp', name: 'no_hp' },
                { data: 'aksi' },
            ]
        });
</script>

<script>
    $('#tambah').click(function(){
        save_method="add"
        $('.modal-title').html('Menambah Data')
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
              url="{{ route('pasien.store') }}"
              method="POST"
              pesan=round_success_noti_tambah()
              aksi=""  
          } else {
              url="pasien/"+id
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
              $('#no_pengenal').val('');
              $('#jenis_p').val('');
              $('#nm_pasien').val('');
              $('#jenkel').val('');
              $('#gol_darah').val('');
              $('#tempat').val('');
              $('#tgl_lahir').val('');
              $('#alamat').val('');
              $('#umur').val('');
              $('#no_hp').val('');
              $('#alamat').val('');
              table.ajax.reload();
              pesan
          }
          });
          console.log(url)
        });
    });
</script>


@endsection
