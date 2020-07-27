{{-- <!-- Passing BASE URL to AJAX -->
<input id="url" type="hidden" value="{{ \Request::url() }}"> --}}

<!-- MODAL SECTION -->
<div class="modal fade" id="tampilModal">
    <div class="modal-dialog">
        <div class="modal-content bg-warnaku border-primary animated jackInTheBox">
            <div class="modal-header border-light-2">
                <h5 class="modal-title text-white"></h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div> 
            <div class="modal-body">
                <form method="POST" id="formKu">
                    @csrf 
                    <input type="hidden" class="form-control" name="id" id="id">
                    <div class="form-group">
                        <label for="id_poli">Poli</label>
                        <select class="form-control single-select" name="id_poli" id="id_poli" required>
                            @foreach ($poli as $item)
                                <option value="{{ $item->id }}">{{ $item->nm_poli }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nm_dokter">Nama Dokter</label>
                        <input type="text" class="form-control" name="nm_dokter" id="nm_dokter" required>
                    </div>
                    <div class="form-group">
                        <label for="jenkel">Jenis Kelamin : </label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenkel" id="Laki-laki" value="Laki-laki" checked>
                            <label class="form-check-label" for="Laki-laki">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenkel" id="Perempuan" value="Perempuan">
                            <label class="form-check-label" for="Perempuan">Perempuan</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" class="form-control" name="password" id="password" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" name="alamat" id="alamat" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" id="tombolForm" class="btn btn-light px-5"><i class="icon-lock"></i> Simpan</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer border-light-2">
                <button type="button" class="btn btn-link text-white pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
            </div>
        </div>
    </div>
</div>

