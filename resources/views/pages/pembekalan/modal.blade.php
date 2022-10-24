
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
                                        <option value="{{ $i->id }}">{{ $i->singkatan }} - {{ $i->materi }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Level *</label>
                                <select name="level_id" id="level_id" class="form-control">
                                    @foreach ($level as $i)
                                        <option value="{{ $i->id }}">{{ $i->level }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
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

{{-- Modal Surat Penawaran --}}
@foreach ($data_pembekalan as $i)
<div id="suratPenawaran{{ $i->uuid }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-full-width">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Surat Penawaran</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('surat-penawaran.index') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">No. Surat *</label>
                                <input type="text" class="form-control" name="no_surat" id="no_surat">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Tanggal Surat *</label>
                                <input type="date" class="form-control" name="tgl_surat" id="tgl_surat">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Pembekalan *</label>
                                <select name="pembekalan_id" id="pembekalan_id" class="form-control">
                                    <option value="{{ $i->id }}">
                                        {{ $i->materi_pembekalan->materi }} ({{ $i->materi_pembekalan->singkatan }}) - {{ $i->level_pembekalan->level }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Bank *</label>
                                <select name="bank_id" id="bank_id" class="form-control">
                                    <option value="{{ $i->bank_id }}">{{ $i->bank->nama }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Perihal *</label>
                                <input type="text" name="perihal" id="perihal" class="form-control" value="{{ $i->metode_pembekalan->metode}} - {{ $i->materi_pembekalan->materi }} {{ $i->level_pembekalan->level }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Body Surat *</label>
                                {{-- <div id="snow-editor" style="height: 300px">
                                    @include('pages.pembekalan.body_surat_penawaran')
                                </div> --}}
                                <textarea name="body" class="form-control" id="body">
                                    @include('pages.pembekalan.body_surat_penawaran')
                                </textarea>
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

{{-- Modal Surat Penegasan --}}
<div id="suratPenegasan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Surat Penegasan</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
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


{{-- Modal Surat Penawaran yang belum diapprove --}}
<div id="notApproved" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-full-width">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Belum diapprove</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No. Surat</th>
                            <th>Tanggal Surat</th>
                            <th>Bank</th>
                            <th>Program Pembekalan</th>
                            <th>Level Pembekalan</th>
                            <th>Tanggal Pembekalan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($not_approved as $i)
                        <tr>
                            <td>{{ $i->no_surat }}</td>
                            <td>{{ $i->tgl_surat }}</td>
                            <td>{{ $i->bank->nama }}</td>
                            <td>Program Pembekalan</td>
                            <td>Level Pembekalan</td>
                            <td>Tanggal Pembekalan</td>
                            <td>
                                <a href="{{ url('surat-penawaran/view/'.$i->id) }}" target="_blank">
                                    <i class='mdi mdi-eye me-1'></i> View
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

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
