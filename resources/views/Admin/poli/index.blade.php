@extends('Admin.layout.default')

@section('judul','Poli')

@section('poli','active show')

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
                            <th>Nama Poli</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- End Row-->

@include('Admin.poli.form')

@endsection

@section('scripts')

<script>
var table=$('#dataTable').DataTable({
            ajax: "{{ route('poli.data') }}",
            columns: [
                { data: 'id', name: 'id' },
                { data: 'nm_poli', name: 'nm_poli' },
                { data: 'aksi' },
            ]
        });

</script>

<script>
    $('#tambah').click(function(){
        save_method="add"
        $('.modal-title').html('Menambah Data Poli')
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
              url="{{ route('Poli.store') }}"
              method="POST"
              pesan=round_success_noti_tambah()
              aksi=""  
          } else {
              url="Poli/"+id
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
              $('#nm_poli').val('');
              table.ajax.reload();
              pesan
          }
          });
          console.log(url)
        });
    });
</script>


@endsection
