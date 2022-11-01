
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

{{-- Modal Peserta Pembekalan --}}
<div id="dataPeserta" class="modal fade" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Peserta Pembekalan</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table>

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
