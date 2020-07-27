{{-- <div class="modal fade" id="tampilModal">
    <div class="modal-dialog">
        <div class="modal-content bg-warnaku border-primary animated jackInTheBox">
            <div class="modal-header border-light-2">
                <h5 id="judul" class="modal-title text-white"></h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div> 
            <div class="modal-body">
                <form id="formKu" method="POST"> 
                    @csrf
                    <input type="hidden" name="id" id="id">            
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="col-md-12 mb-2">
                                <label for="id_dokter">Dokter</label>
                                <select name="id_dokter" id="id_dokter" class="form-control single-select" required>
                                    @foreach ($dokter as $item)
                                        <option value="{{ $item->id }}">{{ $item->nm_dokter }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Tidak Boleh Kosong
                                </div>
                            </div><!--end col-->
                            <div class="col-md-12 mb-2">
                                <label for="id_pasien">Pasien</label>
                                <select name="id_pasien" id="id_pasien" class="form-control single-select" required>
                                    @foreach ($pasien as $item)
                                        <option value="{{ $item->id }}">{{ $item->nm_pasien }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Tidak Boleh Kosong
                                </div>
                            </div><!--end col-->
                        </div><!--end form-row-->
                    </div>
                    <div class="form-group">
                        <button type="submit" id="tombolForm" class="btn btn-light px-5"><i class="icon-lock"></i> Simpan</button>
                    </div>
                    </div>
                </form>
                <div class="modal-footer border-light-2">
                    <button type="button" class="btn btn-link text-white pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                </div>
            </div>
            
        </div>
    </div>
</div> --}}



