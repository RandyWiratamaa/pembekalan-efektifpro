@extends('layouts.main')

@once
    @push('css')

    @endpush
@endonce

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Efektifpro</a></li>
                            <li class="breadcrumb-item active">File Manager</li>
                        </ol>
                    </div>
                    <h4 class="page-title">File Manager</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mt-3">
                            <h5 class="mb-2">Surat Penawaran</h5>
                            <div class="row mx-n1 g-0">
                                @foreach ($surat_penawaran as $i)
                                <div class="col-xl-3 col-lg-6">
                                    <div class="card m-1 shadow-none border">
                                        <div class="p-2">
                                            <div class="row align-items-center">
                                                <div class="col-auto pe-0">
                                                    <div class="avatar-sm">
                                                        <span class="avatar-title bg-soft-success text-secondary rounded">
                                                            <i class="mdi mdi-file-pdf-outline font-20 text-dark"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    @if ($i->dokumen == '')
                                                    <a href="{{ route('surat-penawaran.index') }}" class="fw-normal" style="color:red">Dokumen belum disimpan</a>
                                                    @else
                                                    <a href="{{ asset('assets/surat-penawaran/'.$i->dokumen) }}" target="_blank" class="fw-normal" style="color:blue">{{ $i->no_surat }}</a>
                                                    @endif
                                                    <p class="mb-0 font-13"> {{ strtoupper($i->materi_pembekalan->kode) }} - {{ $i->bank->nama }}</p>
                                                    <span>
                                                        <small class="float-end text-muted">{{ $i->tgl_surat->isoFormat('dddd, DD MMMM YYYY') }}</small>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="mt-3">
                            <h5 class="mb-2">Surat Penegasan</h5>
                            <div class="row mx-n1 g-0">
                                @foreach($surat_penegasan as $i)
                                <div class="col-xl-3 col-lg-6">
                                    <div class="card m-1 shadow-none border">
                                        <div class="p-2">
                                            <div class="row align-items-center">
                                                <div class="col-auto pe-0">
                                                    <div class="avatar-sm">
                                                        <span class="avatar-title bg-soft-success text-secondary rounded">
                                                            <i class="mdi mdi-file-pdf-outline text-dark font-20"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    @if ($i->dokumen == '')
                                                    <a href="{{ route('surat-penegasan.index') }}" class="fw-normal" style="color:red">Dokumen belum disimpan</a>
                                                    @else
                                                    <a href="{{ asset('assets/surat-penegasan/'.$i->dokumen) }}" target="_blank" class="fw-normal" style="color:blue">{{ $i->no_surat }}</a>
                                                    @endif
                                                    <p class="mb-0 font-13"> {{ strtoupper($i->pembekalan->materi_pembekalan->kode) }} - {{ $i->bank->nama }}</p>
                                                    <span>
                                                        <small class="float-end text-muted">{{ $i->tgl_surat->isoFormat('dddd, DD MMMM YYYY') }}</small>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="mt-3">
                            <h5 class="mb-2">Berita Acara</h5>
                            <div class="row mx-n1 g-0">
                                @foreach ($berita_acara as $i)
                                <div class="col-xl-3 col-lg-6">
                                    <div class="card m-1 shadow-none border">
                                        <div class="p-2">
                                            <div class="row align-items-center">
                                                <div class="col-auto pe-0">
                                                    <div class="avatar-sm">
                                                        <span class="avatar-title bg-soft-success text-secondary rounded">
                                                            <i class="mdi mdi-file-pdf-outline font-20 text-dark"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    @if ($i->dokumen == '')
                                                    <a href="{{ route('berita-acara.index') }}" class="fw-normal" style="color:red">Dokumen belum disimpan</a>
                                                    @else
                                                    <a href="{{ asset('assets/berita-acara/'.$i->dokumen) }}" target="_blank" class="fw-normal" style="color:blue">{{ $i->dokumen }}</a>
                                                    @endif
                                                    <p class="mb-0 font-13"> {{ strtoupper($i->pembekalan->materi_pembekalan->kode) }} - {{ $i->pembekalan->bank->nama }}</p>
                                                    <span>
                                                        <small class="float-end text-muted">{{ $i->tanggal->isoFormat('dddd, DD MMMM YYYY') }}</small>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@once
    @push('javascript')

    @endpush
@endonce
