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
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <div class="card-widgets">
                        <a data-bs-toggle="collapse" href="#search" role="button" aria-expanded="false" aria-controls="search"><i class="mdi mdi-minus"></i></a>
                    </div>
                    <h5 class="header-title mb-2">Filter Data</h5>
                    <div id="search" class="collapse show">
                        <div class="row">
                            <div class="col-sm-12">
                                <form class="search-bar form-inline" method="get" action="#" >
                                    @csrf
                                    <label class="form-label">Daftar Nama Bank</label>
                                    <div class="input-group">
                                        <select class="form-select" name="bank_id" id="bank_id" type="text" placeholder="Cari berdasarkan nama Bank">
                                            <option value="">-- Cari berdasarkan nama Bank --</option>
                                            @foreach ($bank as $i)
                                            <option value="{{ $i->id }}">{{ $i->nama }}</option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="btn waves-effect waves-light btn-primary">
                                            <i class="mdi mdi-magnify"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-2">
                            <div class="col-sm-12">
                                <form class="search-bar form-inline" method="get" action="#" >
                                    @csrf
                                    <label class="form-label">Status</label>
                                    <div class="input-group">
                                        <select class="form-select" name="is_done" id="is_done" type="text" placeholder="Cari berdasarkan nama Bank">
                                            <option value="">-- ALL --</option>
                                            <option value="0">BELUM SELESAI</option>
                                            <option value="1">TELAH SELESAI</option>
                                        </select>
                                        <button type="submit" class="btn waves-effect waves-light btn-primary">
                                            <i class="mdi mdi-magnify"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-2">
                            <div class="col-12">
                                <form method="get" action="{{ route('invoice.index') }}" >
                                    @csrf
                                    <div class="col-sm-12 mb-1">
                                        <label class="form-label">Dari</label>
                                        <input type="date" name="start_date" class="form-control">
                                    </div>
                                    <div class="col-sm-12">
                                        <label class="form-label">Ke</label>
                                        <input type="date" name="end_date" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-sm waves-effect waves-light btn-primary mt-1 float-end">
                                        <i class="mdi mdi-magnify"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-widgets">
                                <a data-bs-toggle="collapse" href="#tableJadwal" role="button" aria-expanded="false" aria-controls="tableJadwal">
                                    <i class="mdi mdi-minus"></i>
                                </a>
                            </div>
                            <h5 class="header-title mb-2">Daftar Invoice</h5>
                            <div id="tableJadwal" class="collapse show">
                                <div class="table-responsive pt-3">
                                    <table id="tb-invoice" class="table table-bordered table-centered mb-0 bank" style="width:100%">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="text-center">No. Invoice</th> 
                                                <th class="text-center">Tanggal</th>
                                                <th class="text-center">Bank</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('pages.invoice.modal')
@endsection

@once
    @push('javascript')
       
    <script>
        $(function () {
            var table = $('#tb-invoice').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('invoice.index') }}",
              columns: [
                    {data: 'no_invoice', name: 'no_invoice'},
                    {data: 'tanggal', name: 'tanggal'},
                    {data: 'bank', name: 'pembekalan.bank.nama'},
                    {data: 'action', name: 'action',
                        "render": function (data, type, row) {

                            if (row.is_approved == '0'){
                                return `
                                    <div class="dropdown d-inline-block">
                                        <button class="btn btn-light dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class='mdi mdi-dots-horizontal font-18'></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalEditInvoice` + row.id + `">
                                                <i class='mdi mdi-pencil me-1 text-primary'></i> Edit
                                            </a>
                                            <a class="dropdown-item text-danger" href="#" data-bs-toggle="modal" data-bs-target="#modalHapusInvoice` + row.id + `">
                                                <i class='mdi mdi-trash-can me-1'></i> Delete
                                            </a>
                                            <a class="dropdown-item text-center text-dark bg-soft-success" href="#"  data-bs-toggle="modal" data-bs-target="#modalApproveInvoice` + row.id + `">
                                                Approve
                                            </a>
                                        </div>
                                    </div>`;
                            } else {
                                return `
                                    <div class="dropdown d-inline-block">
                                        <button class="btn btn-light dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class='mdi mdi-dots-horizontal font-18'></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="{{ url('invoice/generate-PDF/` + row.id + `') }}" class="dropdown-item" target="_blank">
                                                <i class='mdi mdi-download text-primary me-1'></i> Simpan Invoice
                                            </a>
                                            <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalKirimInvoice` + row.id + `">
                                                <i class='mdi mdi-send text-primary me-1'></i> Kirim Invoice
                                            </a>
                                        </div>
                                    </div>`;
                            }
                        }
                    }
              ]
            });
        });

        $(document).ready(function() {
            $('.sn-edit-invoice').summernote();
        });
    </script>

    @endpush
@endonce
