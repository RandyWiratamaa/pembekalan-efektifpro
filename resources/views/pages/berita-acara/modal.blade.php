@foreach ($berita_acara as $i)
<div id="editBeritaAcara{{ $i->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ubah {{ $page_name }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('berita-acara', $i->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Tanggal Surat *</label>
                                <input type="date" class="form-control" name="tanggal" id="tanggal" value="{{ $i->tanggal->isoFormat('YYYY-MM-DD') }}">
                            </div>
                        </div>
                        <input type="hidden" class="form-control" name="uuid" id="uuid" value="{{ $i->pembekalan_uuid }}">
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Body Surat *</label>
                                <textarea name="body" class="form-control ubah-berita-acara" id="berita-acara">
                                    {{ $i->body }}
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

@foreach ($berita_acara as $i)
<div id="modalHapusBeritaAcara{{ $i->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus {{ $page_name }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('berita-acara', $i->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('Delete')
                <div class="modal-body p-4">
                    <h4>
                        Apakah anda yakin akan menghapus Berita Acara : <br>
                        <b>{{ $i->pembekalan->bank->nama }}</b>
                        ({{ $i->pembekalan->materi_pembekalan->materi }}) ini ?
                    </h4>
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

@foreach ($berita_acara as $i)
<div id="approve{{ $i->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Approve {{ $page_name }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('berita-acara/approve', $i->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="modal-body p-4">
                    <div class="row">
                        <h3>Approve Berita Acara : </h3><br>
                            <h4><span class="text-dark"><strong>{{ $i->pembekalan->materi_pembekalan->kode }} - {{ $i->pembekalan->bank->nama }}</strong></span></h4>
                        <div class="col-12">
                            <label>Berita Acara ini diapprove oleh : </label>
                            <select name="approved_by" id="approved_by" class="form-control">
                                @foreach ($bpo as $j)
                                <option value="{{ $j->id }}">{{ $j->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <span class="text-muted">Setelah berita acara diapprove, Berita Acara tidak dapat diubah ataupun dihapus.</span>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info waves-effect waves-light">Approve</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@foreach ($berita_acara as $i)
<div id="kirim{{ $i->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Kirim {{ $page_name }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body p-4">
                    <div class="row">
                        <h3>Kirim Berita Acara : </h3><br>
                            <h4><span class="text-dark"><strong>{{ $i->pembekalan->materi_pembekalan->kode }} - {{ $i->pembekalan->bank->nama }}</strong></span></h4>
                        <div class="col-12">

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info waves-effect waves-light">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
