<table id="dataTable" class="table table-bordered animated flipInX">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pasien</th>
            <th>Jenkel</th>
            <th>Gol. Darah</th>
            <th>Tgl. Lahir</th>
            <th>Umur</th>
            <th>No. Hp</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($antrian as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->pasien->nm_pasien }}</td>
                <td>{{ $item->pasien->jenkel }}</td>
                <td>{{ $item->pasien->gol_darah }}</td>
                <td>{{ $item->pasien->tgl_lahir }}</td>
                <td>{{ $item->pasien->umur }}</td>
                <td>{{ $item->pasien->no_hp }}</td>
                <td>{{ $item->pasien->alamat }}</td>
            </tr>
        @endforeach
    </tbody>
    
</table>


<script>
    $(document).ready(function($) {
    $(".clickable-row").dblclick(function() {
        var href= $(this).data('id');
        Swal.fire({
        title: 'Silahkan Pilih',
        text: "Mau di Apakan Data Ini?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: 'success',
        cancelButtonColor: 'danger',
        cancelButtonText: 'Hapus',
        confirmButtonText: 'Ubah'
    }).then((result) => {
        if (result.value) {
            save_method="Ubah"
            $.ajax({
                url: "pasienDokter/"+href+"/edit", 
                type: 'GET',
                dataType: 'JSON',
                beforeSend: function() {
                    // lakukan sesuatu sebelum data dikirim
                    console.log(href);
                    },
                success: function(data) {
                    // lakukan sesuatu jika data sudah terkirim
                    $('#id').val(data.id);
                    $('#id_kelurahan').val(data.id_kelurahan); $('#id_kelurahan').trigger('change');
                    $('#id_jasa').val(data.id_jasa); $('#id_jasa').trigger('change');
                    $('#hari').val(data.hari);
                    $('#harga').val(data.harga);
                    $('.tampilModal').modal('show')
                    $('#judul').html('Silahkan Merubah Data')
                    $('#tombolForm').html('Ubah Data')
                }
            });
        }
        else if (result.dismiss === Swal.DismissReason.cancel) {
            var csrf_token=$('meta[name="csrf_token"]').attr('content');
            Swal.fire({
            title: 'Yakin ?',
            text: "Data akan dihapus permanen",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: 'success',
            cancelButtonColor: 'danger',
            confirmButtonText: 'Yakin',
            cancelButtonText: 'Batal'
            }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "pasienDokter/" + href,
                    type : "POST",
                    data : {'_method' : 'DELETE', '_token' :csrf_token},
                    success: function(response) {
                        console.log(response)
                        Swal.fire(
                                    'Dihapus!',
                                    'Data Berhasil Dihapus',
                                    'success'
                                )
                        $('#tampil').load('{{ route("pasienDokter.create") }}');
                    }
                })
            }
            })
        }
    })
    });
});
</script>

<script>
    $(document).ready( function () {
        $('#dataTable').DataTable();
    } );
</script>



