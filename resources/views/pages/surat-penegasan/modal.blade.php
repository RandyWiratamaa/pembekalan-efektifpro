@foreach ($surat_penegasan as $i)
<div id="editSuratPenegasan{{ $i->id }}" class="modal fade penegasan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-full-width">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Buat Surat Penegasan</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('surat-penegasan', $i->pembekalan_uuid) }}" method="POST" enctype="multipart/form-data">
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
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Penyelenggara *</label>
                                @foreach ($penyelenggara as $j)
                                    <option value={{ $j->id }} @if($j->id == $i->penyelenggara_id) selected @endif>
                                        {{ strtoupper($j->singkatan) }}{{ ucwords($j->nama) }}
                                    </option>
                                @endforeach
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
                                    @foreach ($pic as $j)
                                    <option value={{ $j->id }} @if($j->id == $i->pembekalan->pic_id) selected @endif>
                                        {{-- {{ $j->nama }} --}}
                                        @if ($j->midle_name == null)
                                        {{ $j->first_name }}  {{ $j->last_name }}
                                        @elseif ($j->last_name == null)
                                        {{ $j->first_name }}  {{ $j->midle_name }}
                                        @elseif ($j->midle_name && $j->last_name == null)
                                        {{ $j->first_name }}
                                        @else
                                        {{ $i->pic->first_name }}  {{ $i->pic->midle_name }}  {{ $i->pic->last_name }}
                                        @endif
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label">Pengajar *</label>
                                <select name="pengajar_id" id="pengajar_id" class="form-control">
                                    @foreach ($pengajar as $j)
                                    <option value={{ $j->id }} @if($j->id == $i->pembekalan->pengajar_id) selected @endif>
                                        {{ $j->nama }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label">Tanggal Mulai *</label>
                                <input type="date" class="form-control" name="tanggal_mulai" id="tanggal_mulai" value="{{ $i->pembekalan->tanggal_mulai->isoFormat('YYYY-MM-DD') }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label">Tanggal Selesai *</label>
                                <input type="date" class="form-control" name="tanggal_selesai" id="tanggal_selesai" value="{{ $i->pembekalan->tanggal_selesai->isoFormat('YYYY-MM-DD') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Sertifikasi *</label>
                                <select name="materi_id" id="materi_id" class="form-control">
                                    @foreach ($materi as $j)
                                    <option value={{ $j->id }} @if($j->id == $i->pembekalan->materi_id) selected @endif>
                                        {{ $j->materi }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label">Metode *</label>
                                <select name="metode_id" id="metode_id" class="form-control">
                                    @foreach ($metode as $j)
                                    <option value={{ $j->id }} @if($j->id == $i->pembekalan->metode_id) selected @endif>
                                        {{ $j->metode }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col md-1">
                            <div class="mb-3">
                                <label class="form-label">Jam Mulai</label>
                                <input type="time" name="mulai" id="mulai" class="form-control" value="{{ $i->pembekalan->mulai->isoFormat('HH:mm') }}">
                            </div>
                        </div>
                        <div class="col md-1">
                            <div class="mb-3">
                                <label class="form-label">Jam Selesai</label>
                                <input type="time" name="selesai" id="selesai" class="form-control" value="{{ $i->pembekalan->selesai->isoFormat('HH:mm') }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="col-mb-3">
                                <label class="form-label">Investasi /Batch</label>
                                <input type="text" name="investasi" id="investasi" class="form-control" value="{{ $i->pembekalan->investasi }}">
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

@foreach ($surat_penegasan as $i)
<div id="approve{{ $i->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ubah {{ $page_name }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('surat-penegasan/approve', $i->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="modal-body p-4">
                    <div class="row">
                        <h3>Approve Surat Penegasan dengan No. Surat : </h3><br>
                            <h4><span class="text-dark"><strong>{{ $i->no_surat }}</strong></span></h4>
                        <div class="col-12">
                            <label>Surat Penegasan ini diapprove oleh : </label>
                            <select name="approved_by" id="approved_by" class="form-control">
                                @foreach ($bpo as $j)
                                <option value="{{ $j->id }}">{{ $j->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info waves-effect waves-light">Approve</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@foreach ($surat_penegasan as $i)
<div id="hapusSuratPenegasan{{ $i->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus {{ $page_name }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('surat-penegasan', $i->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('Delete')
                <div class="modal-body p-4">
                    <h4>Apakah anda yakin akan menghapus data {{ $i->no_surat }} ini ? </h4>
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
