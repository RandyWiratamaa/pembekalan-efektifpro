{{-- Modal tambah data Pengajar --}}
<div id="addPengajar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data {{ $page_name }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('pengajar.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Nama *</label>
                                <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Pengajar">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" name="email" class="form-control" id="email" placeholder="Email Pengajar">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">No. Hp / Whatsapp</label>
                                <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="No. Handphone / Whatsapp">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin *</label>
                                <div class="form-check">
                                    <input type="radio" id="customRadio1" name="jenkel" class="form-check-input" value="laki-laki">
                                    <label class="form-check-label" for="customRadio1">Laki-laki</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" id="customRadio2" name="jenkel" class="form-check-input" value="perempuan">
                                    <label class="form-check-label" for="customRadio2">Perempuan</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Photo</label>
                                <input type="file" name="photo" data-plugins="dropify" data-height="300" />
                            </div>
                        </div>
                    </div>
                    <div class="pull-left">
                        <em class="text-danger">* harus diisi</em>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info waves-effect waves-light">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal ubah data Pengajar --}}
@foreach ($data as $i)
<div id="editPengajar{{ $i->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ubah Data {{ $page_name }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('pengajar', $i->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Nama *</label>
                                <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Pengajar" value="{{ $i->nama }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" name="email" class="form-control" id="email" placeholder="Email Pengajar" value="{{ $i->email }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">No. Hp / Whatsapp</label>
                                <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="No. Handphone / Whatsapp" value="{{ $i->no_hp }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin *</label>
                                <div class="form-check">
                                    <input type="radio" id="customRadio1" name="jenkel" class="form-check-input" value="laki-laki">
                                    <label class="form-check-label" for="customRadio1">Laki-laki</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" id="customRadio2" name="jenkel" class="form-check-input" value="perempuan">
                                    <label class="form-check-label" for="customRadio2">Perempuan</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Photo</label>
                                <input type="file" name="photo" data-plugins="dropify" data-height="300" />
                            </div>
                        </div>
                    </div>
                    <div class="pull-left">
                        <em class="text-danger">* harus diisi</em>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info waves-effect waves-light">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@foreach ($data as $i)
<div id="deletePengajar{{ $i->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Data {{ $page_name }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('pengajar', $i->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('Delete')
                <div class="modal-body p-4">
                    <h4>Apakah anda yakin akan menghapus data {{ $i->nama }} ini ?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-info waves-effect waves-light">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
