@extends('layouts.main')

@once
    @push('css')
        <link href="assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css" rel="stylesheet" type="text/css" />
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
                        <li class="breadcrumb-item active"><a href="javascript: void(0);">{{ $page_name }}</a></li>
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
                    <div class="card-widgets">
                        <a data-bs-toggle="collapse" href="#tableBank" role="button" aria-expanded="false" aria-controls="tableBank"><i class="mdi mdi-minus"></i></a>
                    </div>
                    <h4 class="header-title mb-0">Data Bank</h4>
                    <div id="tableBank" class="collapse show">
                        <div class="table-responsive pt-3">
                            <button type="button" class="btn btn-soft-success waves-effect waves-light mb-2" data-bs-toggle="modal" data-bs-target="#addBank">Tambah</button>
                            <table class="table table-bordered table-centered mb-0 bank" style="width:100%" id="bank">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center">Nama Bank</th>
                                        <th class="text-center">Jenis Bank</th>
                                        <th class="text-center">Alamat</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Kota</th>
                                        <th class="text-center">Kode Pos</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('pages.bank.modal')

@endsection

@once
    @push('javascript')
    <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
    <script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>

    <script type="text/javascript">
        $(function () {
          var table = $('#bank').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('bank.index') }}",
              columns: [
                    {data: 'nama', name: 'nama'},
                    {data: 'jenis_bank', name: 'jenis_bank.jenis'},
                    {data: 'alamat', name: 'alamat'},
                    {data: 'email', name: 'email'},
                    {data: 'kota', name: 'kota'},
                    {data: 'kode_pos', name: 'kode_pos'},
                    {data: 'action', name: 'action', orderable: false, searchable: false,
                        "render": function (data, type, row) {
                            return `<div class="dropdown text-center">
                                        <a href="#" class="dropdown-toggle card-drop arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-horizontal m-0 text-muted h3"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editBank` + row.id + `"><i class="fas fa-edit"></i> Edit </a>
                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#deleteBank` + row.id + `"><i class="fas fa-trash"></i> Delete</a>
                                        </div>
                                    </div>`;
                        }
                    }
              ]
            });
        });
    </script>
    @endpush
@endonce
