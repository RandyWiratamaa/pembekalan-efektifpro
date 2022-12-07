@foreach ($data as $i)
<div id="modalEditInvoice{{ $i->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ubah Data {{ $page_name }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('invoice', $i->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">No. Surat *</label>
                                <input type="text" class="form-control" name="no_surat" id="no_surat"
                                value="{{ $i->no_surat }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">No. Invoice *</label>
                                <input type="text" class="form-control" name="no_invoice" id="no_invoice" value="{{ $i->no_invoice }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Tanggal *</label>
                                <input type="date" class="form-control" name="tanggal" id="tanggal" value="{{ $i->tanggal->isoFormat('YYYY-MM-DD') }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Jatuh Tempo *</label>
                                <input type="date" class="form-control" name="jatuh_tempo" id="jatuh_tempo" value="{{ $i->jatuh_tempo->isoFormat('YYYY-MM-DD') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Bank *</label>
                                <select name="bank_id" id="bank_id" class="form-control">
                                    <option value="{{ $i->bank_id }}">{{ $i->bank->nama }}</option>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" name="uuid" id="uuid" value="{{ $i->uuid }}">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label class="form-label">Perihal</label>
                                <input type="text" name="perihal"class="form-control"
                                value="{{ $i->perihal }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Body Surat *</label>
                                <textarea name="invoice" class="form-control sn-edit-invoice" id="invoice">
                                    {{ $i->body }}
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info waves-effect waves-light">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@foreach ($data as $i)
<div id="modalHapusInvoice{{ $i->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus {{ $page_name }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('invoice', $i->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('Delete')
                <div class="modal-body p-4">
                    <h4>Apakah anda yakin akan menghapus data {{ $i->no_invoice }} ini ? </h4>
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

@foreach ($data as $i)
<div id="modalApproveInvoice{{ $i->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Approve {{ $page_name }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('invoice/approve', $i->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="modal-body p-4">
                    <div class="row">
                        <h3>Approve Invoice : </h3><br>
                            <h4><span class="text-dark"><strong>{{ $i->no_invoice }} - {{ $i->pembekalan->bank->nama }}</strong></span></h4>
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
                    <span class="text-muted">Setelah invoice diapprove, Invoice tidak dapat diubah ataupun dihapus.</span>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info waves-effect waves-light">Approve</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@foreach ($data as $i)
<div id="modalKirimInvoice{{ $i->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Kirim {{ $page_name }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('invoice/send-email/'.$i->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body p-4">
                    <div class="row">
                        <h4 class="text-center"><strong>No: {{ $i->no_invoice }}</strong></h4>
                        <h5 class="text-center">{{ $i->pembekalan->materi_pembekalan->materi }} | {{ $i->pembekalan->bank->nama }}</h5>
                        <div class="col-12">
                            <input type="text" name="email_pic" class="form-control" value="{{ $i->pembekalan->pic->email_kantor }}">
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
