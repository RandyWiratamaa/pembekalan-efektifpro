{{-- Modal CRUD & Approve Surat Penawaran --}}

    {{-- Create --}}
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
                                    <input type="text" class="form-control" name="no_surat" id="no_surat" required
                                    value="{{ $kode_perusahaan }}.{{ $jenis_surat }}/{{ $no_urut }}/{{ $bulan }}/{{ now()->year }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">Tanggal Surat *</label>
                                    <input type="date" class="form-control" name="tgl_surat" id="tgl_surat" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">Penyelenggara</label>
                                    <select name="penyelenggara" id="penyelenggara" class="form-control" required>
                                        <option value="">-- Pilih --</option>
                                        @foreach ($penyelenggara as $j)
                                        <option value="{{ $j->id }}">{{ strtoupper($j->singkatan) }} - {{ ucwords($j->nama) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Bank *</label>
                                    <select name="bank_id" id="bank_id" class="form-control" required>
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
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">Jenis Kelas *</label>
                                    <select name="jenis_id" id="jenis_id" class="form-control" required>
                                        <option value="">-- Pilih Jenis Kelas --</option>
                                        @foreach ($jenis as $i)
                                        <option value="{{ $i->id }}">
                                            {{ ucwords($i->jenis) }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label class="form-label">Sertifikasi *</label>
                                    <select name="materi_id" id="materi_id" class="form-control" required>
                                        <option value="">-- Pilih Jenis Sertifikasi --</option>
                                        @foreach ($materi as $i)
                                        <option value="{{ $i->id }}">
                                            {{ ucwords($i->materi) }} ({{ strtoupper($i->kode) }})
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Metode *</label>
                                    <select name="metode_id" id="metode_id" class="form-control" required>
                                        <option value="">-- Pilih --</option>
                                        @foreach ($metode as $l)
                                        <option value="{{ $l->id }}">
                                            {{ ucwords($l->metode) }}
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

    {{-- Update --}}
    @foreach ($surat_penawaran as $i)
    <div id="modalUpdatePenawaran{{ $i->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-full-width">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah {{ $page_name }}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('surat-penawaran', $i->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body p-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">No. Surat *</label>
                                    <input type="text" class="form-control" name="no_surat" id="no_surat"
                                    value="{{ $i->no_surat }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">Tanggal Surat *</label>
                                    <input type="date" class="form-control" name="tgl_surat" id="tgl_surat" value="{{ $i->tgl_surat->isoFormat('YYYY-MM-DD') }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">Penyelenggara</label>
                                    <select name="penyelenggara" id="penyelenggara" class="form-control" required>
                                        <option value="">-- Pilih --</option>
                                        @foreach ($penyelenggara as $j)
                                        <option value={{ $j->id }} @if($j->id == $i->penyelenggara_id) selected @endif>{{ strtoupper($j->singkatan) }} - {{ ucwords($j->nama) }}</option>
                                        @endforeach
                                    </select>
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
                                        <option value={{ $j->id }} @if($j->id == $i->bank_id) selected @endif>{{ $j->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">PIC *</label><br>
                                    <select name="pic_id" id="pic_id" class="form-control" required>
                                        <option value="{{ $i->pic_id }}">
                                            @if ($i->pic->midle_name == '')
                                                {{ $i->pic->first_name }} {{ $i->pic->last_name }}
                                            @elseif ($i->pic->last_name == '')
                                                {{ $i->pic->first_name }} {{ $i->pic->midle_name }}
                                            @elseif ($i->pic->midle_name == '' && $i->pic->last_name == '')
                                                {{ $i->pic->first_name }}
                                            @else
                                                {{ $i->pic->first_name }} {{ $i->pic->midle_name }} {{ $i->pic->last_name }}
                                            @endif
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">Jenis *</label>
                                    <select name="jenis_id" id="jenis_id" class="form-control">
                                        @foreach ($jenis as $j)
                                        <option value={{ $j->id }} @if($j->id == $i->jenis_id) selected @endif>
                                            {{ ucwords($j->jenis) }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label class="form-label">Sertifikasi *</label>
                                    <select name="materi_id" id="materi_id" class="form-control">
                                        <option value="">-- Pilih Jenis Sertifikasi  {{ $i->materi_id }} --</option>
                                        @foreach ($materi as $m)
                                        <option value={{ $m->id }} @if($m->id == $i->materi_id) selected @endif>
                                            {{ strtoupper($m->kode) }} - {{ strtoupper($m->materi) }}
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Metode *</label>
                                    <select name="metode_id" id="metode_id" class="form-control">
                                        @foreach ($metode as $j)
                                        <option value={{ $j->id }} @if($j->id == $i->metode_id) selected @endif>
                                            {{ ucwords($j->metode) }}
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
                                    <input type="text" name="perihal" id="perihal" class="form-control" value="{{ $i->perihal }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Body Surat *</label>
                                    <textarea name="edit_body" class="form-control edit_body" id="edit_body">
                                        {{-- @include('pages.surat-penawaran.body_surat_penawaran') --}}
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
                        <button type="submit" class="btn btn-info waves-effect waves-light">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach

    {{-- Delete --}}
    @foreach ($surat_penawaran as $i)
    <div id="modalHapusPenawaran{{ $i->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus {{ $page_name }}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('surat-penawaran', $i->id) }}" method="POST" enctype="multipart/form-data">
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

    {{-- Approve --}}
    @foreach ($surat_penawaran as $i)
    <div id="modalApprovePenawaran{{ $i->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah {{ $page_name }}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('surat-penawaran/approve', $i->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body p-4">
                        <div class="row">
                            <h3>Approve Surat Penawaran dengan No. Surat : </h3><br>
                                <h4><span class="text-dark"><strong>{{ $i->no_surat }}</strong></span></h4>
                            <div class="col-12">
                                <label>Surat Penawaran ini diapprove oleh : </label>
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
{{-- End of Modal CRUD & Approve Surat Penawaran --}}

@foreach ($surat_penawaran as $i)
<div id="modalAddPenegasan{{ $i->id }}" class="modal fade penegasan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-full-width">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Buat Surat Penegasan</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('surat-penegasan.store') }}" method="POST" enctype="multipart/form-data">
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
                                <input type="date" class="form-control" name="tgl_surat" id="tgl_surat" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Penyelenggara *</label>
                                <select name="penyelenggara" id="penyelenggara" class="form-control" required>
                                    <option value="{{ $i->penyelenggara_id }}">
                                        {{ strtoupper($i->penyelenggara->singkatan) }} - {{ ucwords($i->penyelenggara->nama) }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <input type="hidden" class="form-control" name="no_surat_penawaran" id="no_surat_penawaran" value="{{ $i->no_surat }}" readonly>
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
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label">PIC *</label><br>
                                <select name="pic_id" id="pic_id" class="form-control" required>
                                    @if ($i->pic->midle_name == null)
                                    <option value="{{ $i->pic_id }}">{{ $i->pic->first_name }}  {{ $i->pic->last_name }}</option>
                                    @elseif ($i->pic->last_name == null)
                                    <option value="{{ $i->pic_id }}">{{ $i->pic->first_name }}  {{ $i->pic->midle_name }}</option>
                                    @elseif ($i->pic->midle_name && $i->pic->last_name == null)
                                    <option value="{{ $i->pic_id }}">{{ $i->pic->first_name }}</option>
                                    @else
                                    <option value="{{ $i->pic_id }}">{{ $i->pic->first_name }}  {{ $i->pic->midle_name }}  {{ $i->pic->last_name }}</option>
                                    @endif
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
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label">Tanggal Mulai *</label>
                                <input type="date" class="form-control" name="tanggal_mulai" id="tanggal_mulai_pembekalan" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label">Tanggal Selesai *</label>
                                <input type="date" class="form-control" name="tanggal_selesai" id="tanggal_selesai_pembekalan" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label">Jenis Kelas *</label>
                                <select name="jenis_id" id="jenis_id" class="form-control" required>
                                    <option value="{{ $i->jenis_id }}">
                                        {{ ucwords($i->jenis_pembekalan->jenis) }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Sertifikasi *</label>
                                <select name="materi_id" id="materi_penegasan" class="form-control">
                                    <option value="{{ $i->materi_id }}">
                                        {{ $i->materi_pembekalan->materi }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label">Metode *</label>
                                <select name="metode_id" id="metode_penegasan" class="form-control">
                                    <option value="{{ $i->metode_id }}">
                                        {{ $i->metode_pembekalan->metode }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col md-1">
                            <div class="mb-3">
                                <label class="form-label">Jam Mulai</label>
                                <input type="time" name="mulai" id="mulai" class="form-control" required>
                            </div>
                        </div>
                        <div class="col md-1">
                            <div class="mb-3">
                                <label class="form-label">Jam Selesai</label>
                                <input type="time" name="selesai" id="selesai" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="col-mb-3">
                                <label class="form-label">Investasi /Batch</label>
                                <input type="text" name="investasi" id="investasi" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="min_peserta" value="35">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Perihal *</label>
                                <input type="text" name="perihal" id="perihal_surat_penegasan" class="form-control"
                                value="{{ ucwords($i->jenis_pembekalan->jenis) }} - Penegasan {{ $i->materi_pembekalan->materi }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Body Surat *</label>
                                <textarea name="body_penegasan" class="form-control surat_penegasan" id="penegasan">
                                    @include('pages.surat-penegasan.body_surat_penegasan')
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
