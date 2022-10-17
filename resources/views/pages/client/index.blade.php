@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Efektifpro</a></li>
                        <li class="breadcrumb-item active"><a href="javascript: void(0);">{{ $page_name }}</a></li>
                    </ol>
                </div>
                <h4 class="page-title">{{ $page_name }}</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <!-- Portlet card -->
            <div class="card">
                <div class="card-body">
                    <div class="card-widgets">
                        <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                        <a data-bs-toggle="collapse" href="#cardCollpase4" role="button" aria-expanded="false" aria-controls="cardCollpase4"><i class="mdi mdi-minus"></i></a>
                    </div>
                    <h4 class="header-title mb-0">Data Client</h4>
                    <div id="cardCollpase4" class="collapse show">
                        <div class="table-responsive pt-3">
                            <button type="button" class="btn btn-soft-success waves-effect waves-light mb-2" data-bs-toggle="modal" data-bs-target="#addClient">Tambah</button>
                            <table class="table table-centered table-nowrap table-borderless mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Client</th>
                                        <th>Alamat</th>
                                        <th>Kota</th>
                                        <th>Kode Pos</th>
                                        <th>No. Telp</th>
                                        <th>PIC</th>
                                        <th>Jabatan PIC</th>
                                        <th>Kerjasama</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>PT. Bank Danamon Indonesia, Tbk</td>
                                        <td>Jl. HR. Rasuna Said Blok C No. 10 Setiabudi</td>
                                        <td>Jakarta Selatan</td>
                                        <td>12930</td>
                                        <td></td>
                                        <td>Ibu. Fenny Adiani</td>
                                        <td>HR Learning Development</td>
                                        <td class="text-center"><span class="badge bg-success text-dark p-1">Sudah</span></td>
                                    </tr>
                                    <tr>
                                        <td>PT. Bank Danamon Indonesia, Tbk</td>
                                        <td>Jl. HR. Rasuna Said Blok C No. 10 Setiabudi</td>
                                        <td>Jakarta Selatan</td>
                                        <td>12930</td>
                                        <td></td>
                                        <td>Ibu. Fenny Adiani</td>
                                        <td>HR Learning Development</td>
                                        <td class="text-center"><span class="badge bg-danger text-dark p-1">Belum</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('pages.client.modal')

@endsection
