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
            <div class="card">
                <div class="card-body">
                    <div class="card-widgets">
                        <a data-bs-toggle="collapse" href="#tablePengajar" role="button" aria-expanded="false" aria-controls="tableBank"><i class="mdi mdi-minus"></i></a>
                    </div>
                    <h4 class="header-title mb-0">Data {{ $page_name }}</h4>
                    <div id="tablePengajar" class="collapse show">
                        <div class="table-responsive pt-3">
                            <button type="button" class="btn btn-soft-success waves-effect waves-light mb-2" data-bs-toggle="modal" data-bs-target="#addPengajar">Tambah</button>
                            <table class="table table-bordered table-centered mb-0 pengajar" style="width:100%" id="btn-editable">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">No.HP / Whatsapp</th>
                                        <th>Action</th>
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
@include('pages.pengajar.modal')
@endsection

@once
    @push('javascript')    

    <script type="text/javascript">
        $(function () {
          var table = $('.pengajar').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('pengajar.index') }}",
              columns: [
                    {data: 'nama', name: 'nama'},
                    {data: 'email',
                        "render" : function(data, type, row) {
                            if(row.email == null) {
                                return 'Email belum tersedia';
                            } else {
                                return  row.email
                            }
                        }
                    },
                    {data: 'no_hp',
                        "render" : function(data, type, row) {
                            if(row.no_hp == null) {
                                return 'No. HP belum tersedia';
                            } else {
                                return  row.no_hp
                            }
                        }
                    },
                    {data: 'action', name: 'action', orderable: false, searchable: false,
                        "render": function (data, type, row) {
                            return `<div class="dropdown text-center">
                                        <a href="#" class="dropdown-toggle card-drop arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-horizontal m-0 text-muted h3"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editPengajar` + row.id + `"><i class="fas fa-edit"></i> Edit </a>
                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#deletePengajar` + row.id + `"><i class="fas fa-trash"></i> Delete</a>
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
