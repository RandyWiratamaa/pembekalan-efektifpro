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
                        <a data-bs-toggle="collapse" href="#tableBank" role="button" aria-expanded="false" aria-controls="tableBank"><i class="mdi mdi-minus"></i></a>
                    </div>
                    <h4 class="header-title mb-0">Data Bank</h4>
                    <div id="tableBank" class="collapse show">
                        <div class="table-responsive pt-3">
                            <button type="button" class="btn btn-soft-success waves-effect waves-light mb-2" data-bs-toggle="modal" data-bs-target="#addBPO">Tambah</button>
                            <table class="table table-bordered table-centered mb-0 bank" style="width:100%" id="bpo">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Jabatan</th>
                                        <th class="text-center">Tanda Tangan</th>
                                        <th class="text-center">Photo</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bpo as $i)
                                    <tr>
                                        <td>{{ $i->nama }}</td>
                                        <td>{{ $i->email }}</td>
                                        <td>{{ $i->jabatan }}</td>
                                        <td class="text-center">
                                            <img src="{{ asset('assets/signature/'. $i->signature) }}" alt="" style="width: 150px">
                                        </td>
                                        <td></td>
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

@include('pages.bpo.modal')

@endsection

@once
    @push('javascript')
    <script type="text/javascript">
        $(function () {
          var table = $('#bpo').DataTable({
            
          });
        });
    </script>
    @endpush
@endonce
