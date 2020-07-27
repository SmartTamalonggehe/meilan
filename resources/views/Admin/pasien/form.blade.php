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
                    <div class="form-row">
                        <div class="col-md-6 mb-2">
                            <label for="no_pengenal">No. Pengenal</label>
                            <input type="text" class="form-control" name="no_pengenal" id="no_pengenal" required>
                        </div><!--end col-->
                        <div class="col-md-6 mb-2">
                            <label for="jenis_p">Jenis Pengenal</label>
                            <select class="form-control single-select" name="jenis_p" id="jenis_p" required>
                                <option value="KTP">KTP</option>
                                <option value="SIM">SIM</option>
                                <option value="Kartu Pelajar">Kartu Pelajar</option>
                            </select>
                        </div><!--end col-->
                        <div class="col-md-12 mb-2">
                            <label for="nm_pasien">Nama Pasien</label>
                            <input type="text" class="form-control" name="nm_pasien" id="nm_pasien" required>
                        </div>
                        <div class="col-md-12 mt-3 mb-2">
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
                        <div class="col-sm-4">
                            <label for="gol_darah">Gol Darah</label>
                        <select class="form-control single-select" name="gol_darah" id="gol_darah" required>
                            <option value="A">A</option>
                            <option value="AB">AB</option>
                            <option value="B">B</option>
                            <option value="O">O</option>
                        </select>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="tempat">Tempat</label>
                            <input type="text" class="form-control" name="tempat" id="tempat" required>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="tgl_lahir">Tgl. Lahir</label>
                            <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" required>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="umur">Umur</label>
                            <input type="number" class="form-control" name="umur" id="umur" required>
                        </div>
                        <div class="col-md-8 mb-2">
                            <label for="no_hp">No. Hp</label>
                            <input type="text" class="form-control" name="no_hp" id="no_hp" required>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="alamat" required>
                        </div>
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

