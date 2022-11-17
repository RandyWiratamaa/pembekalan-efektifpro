@foreach ($surat_penegasan as $i)
<div id="editSuratPenegasan{{ $i->id }}" class="modal fade penegasan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-full-width">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Buat Surat Penegasan</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">No. Surat *</label>
                                <input type="text" class="form-control" name="no_surat" id="no_surat"
                                value="{{ $i->no_surat }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Tanggal Surat *</label>
                                <input type="date" class="form-control" name="tgl_surat" id="tgl_surat" value="{{ $i->tgl_surat->isoFormat('YYYY-MM-DD') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Bank *</label>
                                <select name="bank_id" id="bank_id" class="form-control">
                                    @foreach ($bank as $j)
                                    <option value={{ $j->id }} @if($j->id == $i->bank_id) selected @endif>{{ $j->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">PIC *</label><br>
                                <select name="pic_id" id="pic_id" class="form-control" required>
                                    {{-- <option value="{{ $i->pic_id }}">{{ $i->pic->nama }}</option> --}}
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Pengajar *</label>
                                <select name="pengajar_id" id="pengajar_id" class="form-control">
                                    {{-- @foreach ($pengajar as $j)
                                    <option value="{{ $j->id }}">
                                        {{ $j->nama }}
                                    </option>
                                    @endforeach --}}
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
                                    {{-- <option value="{{ $i->materi_id }}">
                                        {{ $i->materi_pembekalan->materi }}
                                    </option> --}}
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label">Metode *</label>
                                <select name="metode_id" id="metode_id" class="form-control">
                                    {{-- <option value="{{ $i->metode_id }}">
                                        {{ $i->metode_pembekalan->metode }}
                                    </option> --}}
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

                    <input type="hidden" name="min_peserta" value="35">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Perihal *</label>
                                <input type="text" name="perihal" id="perihal" class="form-control" value="{{ $i->perihal }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Body Surat *</label>
                                <textarea name="body_penegasan" class="form-control body_penegasan" id="body_penegasan">
                                    {{ $i->body }}
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
