
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
<div id="beritaAcara" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Berita Acara</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        </div>
    </div>
</div>

@foreach ($data_pembekalan as $i)
{{-- Modal Peserta Pembekalan --}}
<div id="peserta" class="modal fade" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Peserta Pembekalan</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @if ($peserta->isEmpty())
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
            @else
            <div class="modal-body p-4">
                <div class="row">
                    <div class="col-sm-3 mt-2">
                        <a href="#" class="btn btn-soft-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#tambahPeserta{{ $i->uuid }}"><i class='fe-plus me-1'></i>Tambah</a>
                    </div>
                </div>
                <div class="table-responsive pt-3" style="height: 600px">
                    Jumlah Peserta : <span id="jml_peserta"></span>
                    <table class="table table-bordered table-centered mb-0 client" style="width:100%" id="btn-editable">
                        <thead class="table-light">
                            <tr class="text-center">
                                <th>Nama</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="data-peserta">

                        </tbody>
                    </table>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endforeach


@foreach ($data_pembekalan as $i)
{{-- Modal Tambah Peserta Pembekalan --}}
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


{{-- Modal Berita Acara --}}
<div id="penawaran" class="modal fade" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Berita Acara</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        </div>
    </div>
</div>

@foreach ($data_pembekalan as $i)
{{-- Modal Update Pelatihan --}}
<div id="update{{ $i->uuid }}" class="modal fade" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Pembekalan {{ $i->materi_pembekalan->materi }} ({{ $i->materi_pembekalan->kode }}) - {{ $i->bank->nama }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <small><em>Tanggal Pelatihan : {{ $i->hari_tanggal->isoFormat('dddd, DD MMMM YYYY') }}</em></small>
            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf
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
