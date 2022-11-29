@foreach ($data_peserta as $i)
<div id="invite-peserta{{ $i->id }}" class="modal fade" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Kirim Invitation Link
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('pembekalan/invitation/'.$i->pembekalan->uuid) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Email Kantor</label>
                                <input type="text" name="email_kantor" id="email_kantor" class="form-control" value="{{ $i->email_kantor }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Email Pribadi</label>
                                <input type="text" name="email_pribadi" id="email_pribadi" class="form-control" value="{{ $i->email_pribadi }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info waves-effect waves-light">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@foreach ($data_peserta as $i)
<div id="modalEditPeserta{{ $i->id }}" class="modal fade" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Ubah data peserta
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('peserta/'.$i->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Nama *</label>
                                <input type="text" name="nama" id="nama" class="form-control" value="{{ $i->nama }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">NIK</label>
                                <input type="text" name="nik" id="nik" class="form-control" value="{{ $i->nik }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Jabatan</label>
                                <input type="text" name="jabatan" id="jabatan" class="form-control" value="{{ $i->jabatan }}" placeholder="Jabatan Peserta">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">No. HP *</label>
                                <input type="text" name="nohp" id="nohp" class="form-control" value="{{ $i->nohp }}" placeholder="No. Handphone / Whatsapp">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin</label>
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
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Email Kantor</label>
                                <input type="text" name="email_kantor" id="email_kantor" class="form-control" value="{{ $i->email_kantor }}" placeholder="Email Kantor">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Email Pribadi</label>
                                <input type="text" name="email_pribadi" id="email_pribadi" class="form-control" value="{{ $i->email_pribadi }}" placeholder="Email Pribadi">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <input type="text" name="alamat" id="alamat" class="form-control" value="{{ $i->alamat }}" placeholder="Alamat Peserta">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="uuid" id="uuid" class="form-control" value="{{ $i->uuid }}">
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

@foreach ($data_peserta as $i)
<div id="modalHapusPeserta{{ $i->id }}" class="modal fade" tabindex="-3" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus {{ $page_name }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('peserta', $i->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('Delete')
                <div class="modal-body p-4">
                    <h4>Apakah anda yakin akan menghapus data {{ $i->nama }} ini ? </h4>
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

<div id="addPembekalan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data {{ $page_name }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('pembekalan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label class="form-label">Program Pembekalan *</label>
                                <select name="materi_id" id="materi_id" class="form-control">
                                    @foreach ($materi as $i)
                                        <option value="{{ $i->id }}">{{ $i->kode }} - {{ $i->materi }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Level *</label>
                                <select name="level_id" id="level_id" class="form-control">
                                    @foreach ($level as $i)
                                        <option value="{{ $i->id }}">{{ $i->level }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Bank *</label>
                                <select name="bank" id="bank" class="form-control">
                                    <option value="-"> -- Pilih Bank -- </option>
                                    @foreach ($bank as $i)
                                    <option value="{{ $i->id }}">{{ $i->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">PIC *</label>
                                <select name="pic_id" id="pic_id" class="form-control">

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Hari / Tanggal *</label>
                                <input type="date" name="hari_tanggal" id="hari_tanggal" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Jam Mulai *</label>
                                <input type="time" name="mulai" id="basic-datepicker" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Jam Selesai *</label>
                                <input type="time" name="selesai" id="basic-datepicker" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Min. Peserta *</label>
                                <input type="text" name="min_peserta" class="form-control" id="jabatan" placeholder="Min. Peserta">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Investasi /Batch *</label>
                                <input type="text" name="investasi" class="form-control" id="jabatan" placeholder="Investasi /Batch">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Metode Pembekalan</label>
                                <select name="metode_id" id="metode_id" class="form-control">
                                    <option value="-"> -- Pilih Metode Pembekalan -- </option>
                                    @foreach ($metode as $i)
                                    <option value="{{ $i->id }}">{{ $i->metode }}</option>
                                    @endforeach
                                </select>
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

{{-- Modal Berita Acara --}}
@foreach ($data_pembekalan as $i)
<div id="beritaAcara{{ $i->uuid }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Buat {{ $page_name }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('berita-acara.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Tanggal Surat *</label>
                                <input type="date" class="form-control" name="tanggal" id="tanggal">
                            </div>
                        </div>
                        <input type="hidden" class="form-control" name="uuid" id="uuid" value="{{ $i->uuid }}">
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Body Surat *</label>
                                <textarea name="body" class="form-control sn-berita-acara" id="berita-acara">
                                    @include('pages.berita-acara.body')
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Absensi</label>
                                <div id="previewImage"></div>
                                <input type="file" name="absensi" class="form-control image" id="absensi">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Dokumentasi</label>
                                <div id="previewDokumentasi"></div>
                                <input type="file" name="dokumentasi" class="form-control dokumentasi" id="dokumentasi">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info waves-effect waves-light">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

{{-- Modal Peserta Pembekalan --}}
@foreach ($data_pembekalan as $i)
<div id="modalPeserta{{ $i->uuid }}" class="modal fade" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Peserta Pembekalan {{ $i->bank->nama }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {{-- @if ($peserta->isEmpty())
            <div class="col-sm-3 mt-2">
                <a href="#" class="btn btn-soft-info waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#import{{ $i->uuid }}"><i class='fe-plus me-1'></i>Import Excel</a></span>
            </div>
            <form action="{{ route('peserta.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Nama *</label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Lengkap">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">NIK</label>
                                <input type="text" name="nik" id="nik" class="form-control" placeholder="NIK">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Jabatan</label>
                                <input type="text" name="jabatan" id="jabatan" class="form-control" placeholder="Jabatan Peserta">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">No. HP *</label>
                                <input type="text" name="nohp" id="nohp" class="form-control" placeholder="No. Handphone / Whatsapp">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin</label>
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
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Email Kantor</label>
                                <input type="text" name="email_kantor" id="email_kantor" class="form-control" placeholder="Email Kantor">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Email Pribadi</label>
                                <input type="text" name="email_pribadi" id="email_pribadi" class="form-control" placeholder="Email Pribadi">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat Peserta">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="uuid" id="uuid" class="form-control" value="{{ $i->uuid }}">
                    <div class="pull-left">
                        <em class="text-danger">* harus diisi</em>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info waves-effect waves-light">Simpan</button>
                </div>
            </form>
            @else --}}
            <div class="modal-body p-4">
                <div class="row">
                    <div class="col-sm-2 mt-2">
                        <a href="#" class="btn btn-soft-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#tambahPeserta{{ $i->uuid }}"><i class='fe-plus me-1'></i>Tambah</a>
                    </div>
                    <div class="col-sm-3 mt-2">
                        <a href="#" class="btn btn-soft-info waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#import{{ $i->uuid }}"><i class='fe-upload me-1'></i>Import Excel</a></span>
                    </div>
                </div>
                <div class="table-responsive pt-3" style="height: 600px">
                    Jumlah Peserta : <span id="jml_peserta{{ $i->uuid }}"></span>
                    <table class="table table-bordered table-centered mb-0 client" style="width:100%" id="btn-editable">
                        <thead class="table-light">
                            <tr class="text-center">
                                <th>Nama</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="data-peserta{{ $i->uuid }}">

                        </tbody>
                    </table>
                </div>
            </div>
            {{-- @endif --}}
        </div>
    </div>
</div>
@endforeach

{{-- Modal Tambah Peserta Pembekalan --}}
@foreach ($data_pembekalan as $i)
<div id="tambahPeserta{{ $i->uuid }}" class="modal fade" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Peserta Pembekalan</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('peserta.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Nama *</label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Lengkap">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">NIK</label>
                                <input type="text" name="nik" id="nik" class="form-control" placeholder="NIK">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Jabatan</label>
                                <input type="text" name="jabatan" id="jabatan" class="form-control" placeholder="Jabatan Peserta">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">No. HP *</label>
                                <input type="text" name="nohp" id="nohp" class="form-control" placeholder="No. Handphone / Whatsapp">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin</label>
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
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Email Kantor</label>
                                <input type="text" name="email_kantor" id="email_kantor" class="form-control" placeholder="Email Kantor">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Email Pribadi</label>
                                <input type="text" name="email_pribadi" id="email_pribadi" class="form-control" placeholder="Email Pribadi">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat Peserta">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="uuid" id="uuid" class="form-control" value="{{ $i->uuid }}">
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
@endforeach

{{-- Modal Import Peserta Pelatihan --}}
@foreach ($data_pembekalan as $i)
<div id="import{{ $i->uuid }}" class="modal fade" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Import</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="card">
                <div class="card-body">
                    <small class="text-danger">Pastikan urutan header file excel seperti contoh berikut : </small>
                    <table class="table table-bordered table-centered mb-0 client" style="width:100%" id="btn-editable">
                        <thead class="table-light">
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nama</th>
                                <th>No. HP</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <form action="{{ route('peserta.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">File Excel *</label>
                                <input type="file" name="file" id="file" class="form-control" placeholder="File Excel">
                            </div>
                            <input type="text" class="form-control" name="uuid" value="{{ $i->uuid }}">
                        </div>
                    </div>
                    <div class="pull-left">
                        <em class="text-danger">* harus diisi</em>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info waves-effect waves-light">Import  </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

{{-- Modal Update Pelatihan --}}
@foreach ($data_pembekalan as $i)
<div id="update{{ $i->uuid }}" class="modal fade" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Pembekalan {{ $i->materi_pembekalan->materi }} ({{ $i->materi_pembekalan->kode }}) - {{ $i->bank->nama }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <small><em>Tanggal Pelatihan : {{ $i->tanggal_mulai->isoFormat('dddd, DD MMMM YYYY') }} & {{ $i->tanggal_selesai->isoFormat('dddd, DD MMMM YYYY') }}</em></small>
            <form action="{{ url('pembekalan', $i->uuid) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Link Zoom *</label>
                                <input type="text" name="zoom" id="zoom" class="form-control" placeholder="Link Zoom">
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
@endforeach

{{-- @if ($count_peserta == true) --}}
    {{-- Modal Invitation Link --}}
    {{-- @foreach ($data_peserta as $i)
    <div id="invite{{ $i->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Kirim Invitation Link
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('pembekalan/invitation/'.$i->pembekalan->uuid) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body p-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Email Kantor</label>
                                    <input type="text" name="email_kantor" id="email_kantor" class="form-control" value="{{ $i->email_kantor }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Email Pribadi</label>
                                    <input type="text" name="email_pribadi" id="email_pribadi" class="form-control" value="{{ $i->email_pribadi }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info waves-effect waves-light">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach

    @foreach ($data_peserta as $i)
    <div id="modalEditPeserta{{ $i->id }}" class="modal fade" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Ubah data peserta
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('peserta/'.$i->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body p-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Nama *</label>
                                    <input type="text" name="nama" id="nama" class="form-control" value="{{ $i->nama }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">NIK</label>
                                    <input type="text" name="nik" id="nik" class="form-control" value="{{ $i->nik }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Jabatan</label>
                                    <input type="text" name="jabatan" id="jabatan" class="form-control" value="{{ $i->jabatan }}" placeholder="Jabatan Peserta">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">No. HP *</label>
                                    <input type="text" name="nohp" id="nohp" class="form-control" value="{{ $i->nohp }}" placeholder="No. Handphone / Whatsapp">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Jenis Kelamin</label>
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
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Email Kantor</label>
                                    <input type="text" name="email_kantor" id="email_kantor" class="form-control" value="{{ $i->email_kantor }}" placeholder="Email Kantor">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Email Pribadi</label>
                                    <input type="text" name="email_pribadi" id="email_pribadi" class="form-control" value="{{ $i->email_pribadi }}" placeholder="Email Pribadi">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Alamat</label>
                                    <input type="text" name="alamat" id="alamat" class="form-control" value="{{ $i->alamat }}" placeholder="Alamat Peserta">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="uuid" id="uuid" class="form-control" value="{{ $i->uuid }}">
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

    @foreach ($data_peserta as $i)
    <div id="modalHapusPeserta{{ $i->id }}" class="modal fade" tabindex="-3" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus {{ $page_name }}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('peserta', $i->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('Delete')
                    <div class="modal-body p-4">
                        <h4>Apakah anda yakin akan menghapus data {{ $i->nama }} ini ? </h4>
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
{{-- @endif --}}

@foreach ($data_pembekalan as $i)
<div id="done{{ $i->uuid }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ $i->bank->nama }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('pembekalan/done', $i->uuid) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="modal-body p-4">
                    <h4>Apakah Pembekalan {{ $i->materi_pembekalan->materi }} ({{ $i->materi_pembekalan->kode }}) sudah selesai ?? </h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-info waves-effect waves-light">Ya</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

{{-- Modal Invoice --}}
@foreach ($data_pembekalan as $i)
<div id="invoice{{ $i->uuid }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Invoice</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('invoice.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">No. Invoice *</label>
                                <input type="text" class="form-control" name="no_invoice" id="no_invoice"
                                value="{{ $no_urut }}/{{ $kd_surat }}/{{ $bulan }}/{{ now()->year }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Tanggal *</label>
                                <input type="date" class="form-control" name="tanggal" id="tanggal"
                                min="{{ $i->tanggal_mulai->isoFormat('YYYY-MM-DD') }}"
                                max="{{ $i->tanggal_selesai->addDays(30)->isoFormat('YYYY-MM-DD') }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Bank *</label>
                                <select name="bank_id" id="bank_id" class="form-control">
                                    <option value="{{ $i->bank->id }}">{{ $i->bank->nama }}</option>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" name="uuid" id="uuid" value="{{ $i->uuid }}">
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Perihal</label>
                                <input type="text" name="perihal" id="perihal{{ $i->uuid }}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Body Surat *</label>
                                <textarea name="invoice" class="form-control sn-invoice" id="invoice">
                                    @include('pages.invoice.body')
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Upload Invoice</label>
                                <input type="file" name="up_invoice" id="up_invoice" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">E-Faktur</label>
                                <input type="file" name="faktur_pajak" id="faktur_pajak" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer float-start">
                    @php
                            $adaBA = DB::table('berita_acara')->where('pembekalan_uuid', $i->uuid)->count() > 0;
                        @endphp
                        @if ($adaBA)
                            <button type="submit" class="btn btn-info waves-effect waves-light">Simpan</button>
                        @else
                            <small class="text-danger">Berita Acara tidak tersedia, <br>
                                Terbitkan Berita Acara terlebih dahulu.
                            </small>
                        @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
