<table id="dataTable" class="table table-bordered animated flipInX">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Dokter</th>
            <th>Nama Pasien</th>
            <th>Status</th>
            <th>No. Antri</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($antrian as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->dokter->nm_dokter }}</td>
                <td>{{ $item->pasien->nm_pasien }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->no_antri }}</td>
                <td>
                    <button type="button" href="antrian/{{ $item->id }}" id="hapus" class="btn btn-light waves-effect waves-light"> <i class="fa fa fa-trash-o"></i> <span>Delete</span> </button>
                </td>
            </tr>
        @endforeach
    </tbody>
    
</table>


<script>
    // Tampilkan Sweet Alert
    $('button#hapus').on('click',function(e){
        e.preventDefault();
        var href = $(this).attr('href');
        var csrf_token=$('meta[name="csrf_token"]').attr('content');
        Swal.fire({
        title: 'Yakin menghapus data ini?',
        text: "Data akan diahapus secara permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yakin!',
        cancelButtonText: 'Tidak!',
        }).then((result) => {
        if (result.value) {
            $.ajax({
                url: href,
                type : "POST",
                data : {'_method' : 'DELETE', '_token' :csrf_token},
                success: function(response) {
                    console.log(response)
                    Swal.fire(
                                'Dihapus!',
                                'Data berhasil dihapus.',
                                'success'
                                )
                    $('#tampil').load('{{ route("antrian.create") }}');
                }
            });
        }
        })
        console.log(csrf_token)
    })
</script>

<script>
    $(document).ready( function () {
        $('#dataTable').DataTable();
    } );
</script>



