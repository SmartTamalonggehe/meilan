<div class="btn-group m-1">
    <button type="button" data-id= {{ $model->id }} id="ubah" class="btn btn-light waves-effect waves-light" > <i class="fa fa-pencil"></i> <span>Ubah</span> </button>

<button type="button" href="Poli/{{ $model->id }}" id="hapus" class="btn btn-light waves-effect waves-light"> <i class="fa fa fa-trash-o"></i> <span>Delete</span> </button>
</div>


<script>
    // Tampilkan Modal Edit
    $('button#ubah').on('click',function(e){
        e.preventDefault();
        save_method="Ubah"
        var id = $(this).data('id');
        var href = $(this).attr('href');
            $.ajax({
                url: "Poli/"+id+"/edit",
                type: 'GET',
                dataType: 'JSON',
                beforeSend: function() {
                    // lakukan sesuatu sebelum data dikirim
                    console.log("Haiii")
                    },
                success: function(data) {
                    // lakukan sesuatu jika data sudah terkirim
                    $('#id').val(data.id);
                    $('#nm_poli').val(data.nm_poli);
                    $('#tampilModal').modal('show')
                    $('.modal-title').html('Silahkan Merubah Data')
                    $('#tombolForm').html('Ubah Data')
                }
            });
            console.log(error.data)
    });   
</script>
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
                    table.ajax.reload();
                }
            });
        }
        })
        console.log(csrf_token)
    })
</script>