<div id="addSuratPenawaran" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-full-width">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Buat {{ $page_name }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('surat-penawaran.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">No. Surat *</label>
                                <input type="text" class="form-control" name="no_surat" id="no_surat"
                                value="{{ $kode_perusahaan }}.{{ $jenis_surat }}/{{ $no_urut }}/{{ $bulan }}/{{ now()->year }}">
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
                                <label class="form-label">Bank *</label>
                                <select name="bank_id" id="bank_id" class="form-control">
                                    <option value="">-- Pilih Bank --</option>
                                    @foreach ($bank as $j)
                                    <option value="{{ $j->id }}">{{ $j->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">PIC *</label><br>
                                <select name="pic_id" id="pic_id" class="form-control" required>
                                </select>
                                <small class="text-danger"><em>Pilih Bank terlebih dahulu </em></small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Sertifikasi *</label>
                                <select name="materi_id" id="materi_id" class="form-control">
                                    {{-- <option value="">-- Pilih Jenis Sertifikasi --</option>     --}}
                                    @foreach ($materi as $i)
                                    <option value="{{ $i->id }}">
                                        {{ $i->materi }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Level *</label>
                                <select name="level_id" id="level_id" class="form-control">
                                    @foreach ($level as $l)
                                    <option value="{{ $l->id }}">
                                        {{ $l->level }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Metode *</label>
                                <select name="metode_id" id="metode_id" class="form-control">
                                    @foreach ($metode as $l)
                                    <option value="{{ $l->id }}">
                                        {{ $l->metode }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Perihal *</label>
                                <input type="text" name="perihal" id="perihal" class="form-control" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Body Surat *</label>
                                <textarea name="body" class="form-control" id="body">
                                    @include('pages.surat-penawaran.body_surat_penawaran')
                                </textarea>
                            </div>
                        </div>
                    </div>

                    <div class="pull-left">
                        <em class="text-danger">* harus diisi</em>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info waves-effect waves-light">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@foreach ($surat_penawaran as $i)
<div id="addSuratPenegasan{{ $i->id }}" class="modal fade penegasan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-full-width">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Buat Surat Penegasan</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('surat-penawaran.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">No. Surat *</label>
                                <input type="text" class="form-control" name="no_surat" id="no_surat"
                                value="{{ $kode_perusahaan }}.{{ $jenis_penegasan }}/{{ $no_penegasan }}/{{ $bulan }}/{{ now()->year }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Tanggal Surat *</label>
                                <input type="date" class="form-control" name="tgl_surat" id="tgl_surat">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Bank *</label>
                                <select name="bank_id" id="bank_id" class="form-control">
                                    <option value="{{ $i->bank_id }}">{{ $i->bank->nama }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">PIC *</label><br>
                                <select name="pic_id" id="pic_id" class="form-control" required>
                                    <option value="{{ $i->pic_id }}">{{ $i->pic->nama }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Pengajar *</label>
                                <select name="pengajar_id" id="pengajar_id" class="form-control">
                                    @foreach ($pengajar as $j)
                                    <option value="{{ $j->id }}">
                                        {{ $j->nama }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Tanggal Pembekalan *</label>
                                <input type="date" class="form-control" name="hari_tanggal" id="hari_tanggal">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Sertifikasi *</label>
                                <select name="materi_id" id="materi_id" class="form-control">
                                    <option value="{{ $i->materi_id }}">
                                        {{ $i->materi_pembekalan->materi }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label">Level *</label>
                                <select name="level_id" id="level_id" class="form-control">
                                    <option value="{{ $i->Level_id }}">
                                        {{ $i->level_pembekalan->level }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label">Metode *</label>
                                <select name="metode_id" id="metode_id" class="form-control">
                                    <option value="{{ $i->metode_id }}">
                                        {{ $i->metode_pembekalan->metode }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col md-1">
                            <div class="mb-3">
                                <label class="form-label">Jam Mulai</label>
                                <input type="time" name="mulai" id="mulai" class="form-control">
                            </div>
                        </div>
                        <div class="col md-1">
                            <div class="mb-3">
                                <label class="form-label">Jam Selesai</label>
                                <input type="time" name="selesai" id="selesai" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="col-mb-3">
                                <label class="form-label">Investasi /Batch</label>
                                <input type="text" name="investasi" id="investasi" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Perihal *</label>
                                <input type="text" name="perihal" id="perihal" class="form-control" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Body Surat *</label>
                                <textarea name="body_penegasan" class="form-control" id="body_penegasan">
                                    @include('pages.surat-penawaran.body_surat_penawaran')
                                </textarea>
                            </div>
                        </div>
                    </div>

                    <div class="pull-left">
                        <em class="text-danger">* harus diisi</em>
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

