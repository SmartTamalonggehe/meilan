<div class="btn-group m-1">
    <button type="button" data-id= {{ $model->id }} id="ubah" class="btn btn-light waves-effect waves-light" > <i class="fa fa-pencil"></i> <span>Ubah</span> </button>

<button type="button" href="pasien/{{ $model->id }}" id="hapus" class="btn btn-light waves-effect waves-light"> <i class="fa fa fa-trash-o"></i> <span>Delete</span> </button>
</div>

<script>
    // Tampilkan Modal Edit
    $('button#ubah').on('click',function(e){
        e.preventDefault();
        save_method="Ubah"
        var id = $(this).data('id');
        var href = $(this).attr('href');
            $.ajax({
                url: "pasien/"+id+"/edit", 
                type: 'GET',
                dataType: 'JSON',
                beforeSend: function() {
                    // lakukan sesuatu sebelum data dikirim
                    console.log("Haiii")
                    },
                success: function(data) {
                    // lakukan sesuatu jika data sudah terkirim
                    $('#id').val(data.id);
                    $('#no_pengenal').val(data.no_pengenal);
                    $('#jenis_p').val(data.jenis_p);
                    $('#nm_pasien').val(data.nm_pasien);
                    if (data.jenkel == 'Laki-laki') {
                        $('input:radio[name=jenkel][value="Laki-laki"]').prop('checked', true)
                    } else {
                        $('input:radio[name=jenkel][value="Perempuan"]').prop('checked', true)
                    }
                    $('#gol_darah').val(data.gol_darah);
                    $('#tempat').val(data.tempat);
                    $('#tgl_lahir').val(data.tgl_lahir);
                    $('#alamat').val(data.alamat);
                    $('#umur').val(data.umur);
                    $('#no_hp').val(data.no_hp);
                    $('#alamat').val(data.alamat);
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
