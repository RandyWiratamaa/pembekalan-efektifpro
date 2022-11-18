@extends('layouts.main')

@once
    @push('css')

    @endpush
@endonce

@section('content')
{{-- @php
    die($surat_penegasan)
@endphp --}}
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Efektifpro</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pembekalan</a></li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                </div>
                <h4 class="page-title">{{ $page_name }}</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-8 col-lg-6">
            <div class="card d-block">
                <div class="card-body">
                    {{-- <div class="dropdown float-end">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="dripicons-dots-3"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-pencil me-1"></i>Edit</a>
                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-delete me-1"></i>Delete</a>
                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-email-outline me-1"></i>Invite</a>
                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-exit-to-app me-1"></i>Leave</a>
                        </div>
                    </div> --}}
                    <h3 class="mt-0 font-20">
                        {{ $detail_pembekalan->bank->nama }} - {{ $detail_pembekalan->materi_pembekalan->materi }}
                    </h3>
                    <div class="badge bg-secondary text-light mb-3">Ongoing</div>

                    <h5>Data Peserta</h5>
                    <table class="table table-bordered table-centered mb-0" style="width:100%">
                        <thead>
                            <tr class="text-center">
                                <th>No.</th>
                                <th>Nama</th>
                                <th>No. HP</th>
                                <th>Email</th>
                                <th>Kirim Invitation</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peserta as $key => $i)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $i->nama }}</td>
                                <td>(+62) {{ $i->nohp }}</td>
                                <td>{{ strtolower($i->email_kantor) }}</td>
                                <td class="text-center">
                                    <a href="#" class="text-danger" data-bs-toggle="modal" data-bs-target="#invite{{ $i->id }}">
                                        <i class='fe-chevrons-right me-1'></i>Kirim <i class='fe-chevrons-left me-1'></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>

                    <div class="mb-4">
                        <h5>PIC</h5>
                        <div class="text-uppercase">
                            <a href="#" class="badge badge-soft-primary me-1">Tags</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h5>Tanggal</h5>
                                <p>{{ $detail_pembekalan->hari_tanggal->isoFormat('dddd, DD MMMM YYYY') }}
                                    <small class="text-muted">{{ $detail_pembekalan->mulai->isoFormat('HH:mm') }} - {{ $detail_pembekalan->selesai->isoFormat('HH:mm') }} WIB
                                    </small>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div id="tooltips-container">
                        <h5>Pengajar : {{ $detail_pembekalan->pengajar->nama }}</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-3">Document</h5>
                    <div class="card mb-1 shadow-none border">
                        <div class="p-2">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="avatar-sm">
                                        <span class="avatar-title badge-soft-primary text-primary rounded">
                                            PNG
                                        </span>
                                    </div>
                                </div>
                                <div class="col ps-0">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#suratPenegasan{{ $surat_penegasan->id }}" class="text-muted fw-bold">Modal Surat Penegasan </a>
                                </div>
                                <div class="col-auto">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#suratPenegasan{{ $surat_penegasan->id }}" class="text-muted fw-bold">
                                        <i class="dripicons-document"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-1 shadow-none border">
                        <div class="p-2">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="avatar-sm">
                                        <span class="avatar-title badge-soft-primary text-primary rounded">
                                            PNG
                                        </span>
                                    </div>
                                </div>
                                <div class="col ps-0">
                                    <a href="{{ url('surat-penegasan/view/'.$surat_penegasan->id) }}" target="_blank" class="text-muted fw-bold">Surat Penegasan</a>
                                </div>
                                <div class="col-auto">
                                    <a href="{{ url('surat-penegasan/view/'.$surat_penegasan->id) }}" target="_blank" class="btn btn-link btn-lg text-muted">
                                        <i class="dripicons-document"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-0 shadow-none border">
                        <div class="p-2">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="avatar-sm">
                                        <span class="avatar-title badge-soft-primary text-primary rounded">
                                            BA
                                        </span>
                                    </div>
                                </div>
                                <div class="col ps-0">
                                    <a href="javascript:void(0);" class="text-muted fw-bold">Berita Acara</a>
                                </div>
                                <div class="col-auto">
                                    <a href="javascript:void(0);" class="btn btn-link btn-lg text-muted">
                                        <i class="dripicons-document"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@include('pages.pembekalan.modal')
@endsection

@once
    @push('javascript')

    @endpush
@endonce
