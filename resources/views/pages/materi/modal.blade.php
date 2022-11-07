{{-- Modal Tambah Data Bank --}}
<div id="addMateri" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data {{ $page_name }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('materi_pembekalan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Kode Pelatihan *</label>
                                <input type="text" name="kode" class="form-control" id="kode" placeholder="Kode Pelatihan">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label class="form-label">Program Pelatihan *</label>
                                <input type="text" name="nama" class="form-control" id="nama" placeholder="Program Pelatihan">
                            </div>
                        </div>
                    </div>
                    <div class="pull-left">
                        <em class="text-danger">* harus diisi</em>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-info waves-effect waves-light">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
