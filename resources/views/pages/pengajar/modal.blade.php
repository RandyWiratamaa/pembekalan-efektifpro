{{-- Modal tambah data PIC --}}
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


{{-- Modal ubah data PIC --}}
{{-- @foreach ($pic as $i)
<div id="editPIC{{ $i->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data {{ $page_name }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Nama Depan PIC *</label>
                                <input type="text" name="nama_depan" class="form-control" id="nama" placeholder="Nama Depan PIC">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 ml-1">
                                <label class="form-label">Nama Tengah PIC</label>
                                <input type="text" name="nama_tengah" class="form-control" id="nama" placeholder="Nama Tengah PIC">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Nama Belakang PIC</label>
                                <input type="text" name="nama_belakang" class="form-control" id="nama" placeholder="Nama Belakang PIC">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">No. Hp / Whatsapp *</label>
                                <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="No. Handphone / Whatsapp">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" id="basic-datepicker" class="form-control" placeholder="Basic datepicker">
                            </div>
                        </div>
                        <div class="col-md-4">
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
                                <label class="form-label">Jabatan *</label>
                                <input type="text" name="jabatan" class="form-control" id="jabatan" placeholder="Jabatan">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Bank *</label>
                                <select name="bank_id" id="selectize-select" class="form-control">
                                    @foreach ($bank as $i)
                                    <option value="{{ $i->id }}">{{ $i->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Alamat Kantor</label>
                                <textarea class="form-control" name="alamat_kantor" id="alamat_kantor" placeholder="Alamat Kantor"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Alamat Rumah</label>
                                <textarea class="form-control" name="alamat_rumah" id="alamat_rumah" placeholder="Alamat Rumah"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Email Pribadi *</label>
                                <input type="email" name="email_pribadi" class="form-control" id="email_pribadi" placeholder="Email Pribadi">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Email Kantor *</label>
                                <input type="email" name="email_kantor" class="form-control" id="email_kantor" placeholder="Email Kantor">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Photo PIC</label>
                                <input type="file" data-plugins="dropify" data-height="300" />
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
@endforeach --}}

{{-- Modal hapus data PIC --}}
{{-- @foreach ($pic as $i)
<div id="deletePIC{{ $i->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Data {{ $page_name }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('pic', $i->id) }}" method="POST" enctype="multipart/form-data">
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
@endforeach --}}
