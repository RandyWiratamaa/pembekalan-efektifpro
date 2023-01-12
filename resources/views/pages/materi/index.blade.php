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
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <div class="card-widgets">
                        <a data-bs-toggle="collapse" href="#tableMateri" role="button" aria-expanded="false" aria-controls="tableMateri"><i class="mdi mdi-minus"></i></a>
                    </div>
                    <h4 class="header-title mb-0">Data {{ $page_name }}</h4>
                    <div id="tableMateri" class="collapse show">
                        <div class="table-responsive pt-3">
                            <button type="button" class="btn btn-soft-success waves-effect waves-light mb-2" data-bs-toggle="modal" data-bs-target="#addMateri">Tambah</button>
                            <table class="table table-bordered table-centered mb-0 materi_pembekalan" style="width:100%" id="materi_pembekalan">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center">Kode</th>
                                        <th class="text-center">Pelatihan</th>
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
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-widgets">
                        <a data-bs-toggle="collapse" href="#tableJenis" role="button" aria-expanded="false" aria-controls="tableJenis"><i class="mdi mdi-minus"></i></a>
                    </div>
                    <h4 class="header-title mb-0">Data Jenis Pembekalan</h4>
                    <div id="tableJenis" class="collapse show">
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered table-centered mb-0 jenis_pembekalan" style="width:100%" id="jenis_pembekalan">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center">Jenis</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jenis as $i)
                                    <tr class="text-center">
                                        <td>{{ ucwords($i->jenis) }}</td>
                                        <td>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="card-widgets">
                        <a data-bs-toggle="collapse" href="#tableLevel" role="button" aria-expanded="false" aria-controls="tableLevel"><i class="mdi mdi-minus"></i></a>
                    </div>
                    <h4 class="header-title mb-0">Level Pembekalan</h4>
                    <div id="tableLevel" class="collapse show">
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered table-centered mb-0 level_pembekalan" style="width:100%" id="level_pembekalan">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center">Level</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($level as $i)
                                    <tr class="text-center">
                                        <td>{{ ucwords($i->level) }}</td>
                                        <td>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('pages.materi.modal')

@endsection

@once
    @push('javascript')
    
    <script type="text/javascript">
        $(function () {
          var table = $('#materi_pembekalan').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('materi_pembekalan.index') }}",
              columns: [
                    {data: 'kode', name: 'kode'},
                    {data: 'materi', name: 'materi',
                        "render": function($data,type,row){
                            return row.materi.toUpperCase()
                        }
                    },
                    {data: 'action', name: 'action', orderable: false, searchable: false,
                        "render": function (data, type, row) {
                            return `<div class="dropdown text-center">
                                        <a href="#" class="dropdown-toggle card-drop arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-horizontal m-0 text-muted h3"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editMateri` + row.id + `"><i class="fas fa-edit"></i> Edit </a>
                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#deleteMateri` + row.id + `"><i class="fas fa-trash"></i> Delete</a>
                                        </div>
                                    </div>`;
                        }
                    }
              ]
            });
        });
    </script>

     <script type="text/javascript">
        $(function () {
          var table = $('#jenis_pembekalan').DataTable({
            
            });
        });
    </script>

    <script type="text/javascript">
        $(function () {
        var table = $('#level_pembekalan').DataTable({
            
            });
        });
    </script>
    @endpush
@endonce
