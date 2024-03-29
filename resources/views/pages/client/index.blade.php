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
                        <a data-bs-toggle="collapse" href="#cardCollpase4" role="button" aria-expanded="false" aria-controls="cardCollpase4"><i class="mdi mdi-minus"></i></a>
                    </div>
                    <h4 class="header-title mb-0">Data Client</h4>
                    <div id="cardCollpase4" class="collapse show">
                        <div class="table-responsive pt-3">
                            <button type="button" class="btn btn-soft-success waves-effect waves-light mb-2" data-bs-toggle="modal" data-bs-target="#addClient">Tambah</button>
                            <table class="table table-bordered table-centered mb-0 client" style="width:100%" id="btn-editable">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center">Client</th>
                                        <th class="text-center">Alamat</th>
                                        <th class="text-center">Kota</th>
                                        <th class="text-center">Kode Pos</th>
                                        <th class="text-center">No. Telp</th>
                                        <th class="text-center">PIC</th>
                                        <th class="text-center">Jabatan PIC</th>
                                        <th class="text-center">Kerjasama</th>
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

@include('pages.client.modal')


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
          var table = $('.client').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('client.index') }}",
              columns: [
                    {data: 'nama', name: 'nama'},
                    {data: 'alamat', name: 'alamat'},
                    {data: 'kota', name: 'kota'},
                    {data: 'kode_pos', name: 'kode_pos'},
                    {data: 'no_telp', name: 'no_telp'},
                    {data: 'pic', name: 'pic'},
                    {data: 'jabatan_pic', name: 'jabatan_pic'},
                    {data: 'kerjasama', name: 'kerjasama',
                        "render": function (data, type, row) {
                            if (row.kerjasama == '1') {
                                return `<div class="text-center">
                                            <span class="badge bg-success text-dark p-1">Sudah</span>
                                        </div>`;
                            } else {
                                return `<div class="text-center">
                                            <span class="badge bg-danger text-dark p-1">Belum</span>
                                        </div>`;
                            }
                        }
                    },
                    {data: 'action', name: 'action', orderable: false, searchable: false,
                        "render": function (data, type, row) {
                            if (row.kerjasama == '1') {
                                return `<div class="dropdown text-center">
                                            <a href="#" class="dropdown-toggle card-drop arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-horizontal m-0 text-muted h3"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit` + row.id + `"><i class="fas fa-edit"></i> Edit </a>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete` + row.id + `"><i class="fas fa-trash"></i> Delete</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#kirimEmail` + row.id + `">Kirim Email</a>
                                            </div>
                                        </div>`;
                            } else {
                                return `<div class="dropdown text-center">
                                            <a href="#" class="dropdown-toggle card-drop arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-horizontal m-0 text-muted h3"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit` + row.id + `"><i class="fas fa-edit"></i> Edit </a>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete` + row.id + `"><i class="fas fa-trash"></i> Delete</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#kirimPenawaran` + row.id + `">Kirim Surat Penawaran</a>
                                            </div>
                                        </div>`;
                            }
                        }
                    }
              ]
          });
        });
    </script>
    @endpush
@endonce
