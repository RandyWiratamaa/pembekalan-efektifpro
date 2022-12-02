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
                            <li class="breadcrumb-item active">{{ $page_name }}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{ $page_name }}</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mt-3">
                            <h5 class="mb-2">Laporan per Bulan</h5>
                            <ul class="nav nav-pills navtab-bg nav-justified">
                                @foreach ($bulan as $bln => $key )
                                <li class="nav-item">
                                    <a href="#{{ $key }}" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                        {{ $key }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                            <div class="tab-content">
                                @foreach ($bulan as $bln => $key )
                                <div class="tab-pane" id="{{ $key }}">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="text-center">
                                                <th>Program Pembekalan</th>
                                                <th>Bank</th>
                                                <th>Tanggal</th>
                                                <th>Pengajar</th>
                                                <th>Surat Penawaran</th>
                                                <th>Surat Penegasan</th>
                                                <th>Berita Acara</th>
                                                <th>Invoice</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pembekalan as $i)
                                            @if($i->tanggal_mulai->isoFormat('MMMM') == $key)
                                            <tr>
                                                <td>{{ $i->materi_pembekalan->kode }}</td>
                                                <td>{{ $i->bank->nama }}</td>
                                                <td>
                                                    {{ $i->tanggal_mulai->isoFormat('DD MMMM YYYY') }} &
                                                    {{ $i->tanggal_selesai->isoFormat('DD MMMM YYYY') }}
                                                </td>
                                                <td>{{ $i->pengajar->nama }}</td>
                                                <td>
                                                    <a href="{{ asset('assets/surat-penawaran/'.$i->surat_penegasan->surat_penawaran->dokumen) }}" target="_blank">
                                                        {{ $i->surat_penegasan->no_surat_penawaran }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ asset('assets/surat-penegasan/'.$i->surat_penegasan->dokumen) }}" target="_blank">
                                                        {{$i->surat_penegasan->no_surat }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ asset('assets/berita-acara/'.$i->berita_acara->dokumen) }}" target="_blank">
                                                        {{ $i->berita_acara->dokumen }}
                                                    </a>
                                                </td>
                                                <td></td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
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
