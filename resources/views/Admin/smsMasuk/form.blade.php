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
                    {{-- @method('PUT') --}}
                    <div class="form-group">
                        <label for="nm_poli">Nama Poli</label>
                        <input type="hidden" class="form-control" name="id" id="id">
                        <input type="text" class="form-control" name="nm_poli" id="nm_poli" required>
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