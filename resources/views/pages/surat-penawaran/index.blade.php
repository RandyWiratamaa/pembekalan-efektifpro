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
                                <form class="search-bar form-inline" method="get" action="{{ route('surat-penawaran.index') }}" >
                                    @csrf
                                    <label class="form-label">Daftar Sertifikasi</label>
                                    <div class="input-group">
                                        <select class="form-select" name="materi_id" id="search_materi" type="text" placeholder="Cari berdasarkan nama Bank">
                                            <option value="">-- All --</option>
                                            @foreach ($materi as $i)
                                            <option value="{{ $i->id }}">{{ $i->materi }} ({{ $i->kode }})</option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="btn waves-effect waves-light btn-primary">
                                            <i class="mdi mdi-magnify"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-sm-12">
                                <form class="search-bar form-inline" method="get" action="{{ route('surat-penawaran.index') }}" >
                                    @csrf
                                    <label class="form-label">Daftar Nama Bank</label>
                                    <div class="input-group">
                                        <select class="form-select" name="bank_id" id="search_bank" type="text" placeholder="Cari berdasarkan nama Bank">
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
                        <div class="row mt-2">
                            <div class="col-sm-12">
                                <form class="search-bar form-inline" method="get" action="{{ route('surat-penawaran.index') }}" >
                                    @csrf
                                    <label class="form-label">Daftar Nama Program Pembekalan</label>
                                    <div class="input-group">
                                        <select class="form-select" name="materi_id" id="materi_id" type="text" placeholder="Cari berdasarkan nama Program Pembekalan">
                                            <option value="">-- Cari berdasarkan nama Program Pembekalan --</option>
                                            @foreach ($materi as $i)
                                            <option value="{{ $i->id }}">{{ $i->materi }}</option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="btn waves-effect waves-light btn-primary">
                                            <i class="mdi mdi-magnify"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <form method="get" action="#" >
                                    @csrf
                                    <div class="col-sm-12 mb-1">
                                        <label class="form-label">Dari</label>
                                        <input type="date" name="dari" id="dari" class="form-control">
                                    </div>
                                    <div class="col-sm-12">
                                        <label class="form-label">Ke</label>
                                        <input type="date" name="ke" id="ke" class="form-control">
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
        <div class="col-9">
            <div class="card">
                <div class="card-body" >
                    <div class="card-widgets">
                        <a data-bs-toggle="collapse" href="#cardCollpase4" role="button" aria-expanded="false" aria-controls="cardCollpase4"><i class="mdi mdi-minus"></i></a>
                    </div>
                    <h4 class="header-title mb-0">Data Surat Penawaran</h4>
                    <div class="row">
                        <div class="col-sm-3 mt-2">
                            <a href="#" class="btn btn-soft-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#addSuratPenawaran"><i class='fe-plus me-1'></i>Tambah</a>
                        </div>
                    </div>
                    <div id="cardCollpase4" class="collapse show">
                        <div class="table-responsive pt-3" style="height: 600px">
                            <table class="table table-bordered table-centered mb-0" style="width:100%" id="sp">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center">No. Surat</th>
                                        <th class="text-center">Tanggal Surat</th>
                                        <th class="text-center">Bank</th>
                                        <th class="text-center">Program Pembekalan</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($surat_penawaran as $i)
                                    <tr>
                                        <td>{{ $i->no_surat }}</td>
                                        <td>{{ $i->tgl_surat->isoFormat('dddd, DD MMMM YYYY') }}</td>
                                        <td>{{ strtoupper($i->bank->nama) }}</td>
                                        <td>{{ strtoupper($i->materi_pembekalan->kode) }} - {{ strtoupper($i->materi_pembekalan->materi) }}</td>
                                        <td class="text-center">
                                            @if ($i->is_approved == 1)
                                                <span class="badge bg-success text-dark">Sudah diapprove</span>
                                            @else
                                                <span class="badge bg-warning text-dark">Belum diapprove</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-light dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class='mdi mdi-dots-horizontal font-18'></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    @php
                                                    $check_penegasan = DB::table('surat_penegasan')->where('no_surat_penawaran', $i->no_surat)->count() > 0;
                                                    $surat_penegasan = DB::table('surat_penegasan')->where('no_surat_penawaran', $i->no_surat)->first();
                                                    @endphp
                                                    @if ($check_penegasan)
                                                    <a href="{{ url('surat-penegasan/view/'.$surat_penegasan->id) }}" class="dropdown-item text-primary" target="_blank">
                                                        <i class='mdi mdi-file me-1'></i> Surat Penegasan
                                                    </a>
                                                    @else
                                                        @if ($i->is_approved != 0)
                                                        <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalAddPenegasan{{ $i->id }}">
                                                            <i class='mdi mdi-email-newsletter me-1 text-primary'></i> Buatkan Surat Penegasan
                                                        </a>
                                                        @endif
                                                    @endif
                                                    <a href="{{ url('surat-penawaran/view/'.$i->id) }}" class="dropdown-item" target="_blank">
                                                        <i class='mdi mdi-eye me-1 text-primary'></i> Review
                                                    </a>
                                                    @if ($i->is_approved == 1)
                                                    <a href="{{ url('surat-penawaran/generate-PDF/'.$i->id) }}" class="dropdown-item" target="_blank">
                                                        <i class='mdi mdi-download me-1 text-primary'></i> Simpan Surat Penawaran
                                                    </a>
                                                    @endif
                                                    @if ($i->is_approved == 0)
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalUpdatePenawaran{{ $i->id }}">
                                                        <i class='mdi mdi-lead-pencil me-1'></i> Edit
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item text-danger" href="#" data-bs-toggle="modal" data-bs-target="#modalHapusPenawaran{{ $i->id }}">
                                                        <i class='mdi mdi-trash-can me-1'></i> Delete
                                                    </a>
                                                    <a class="dropdown-item text-center text-dark bg-soft-success" href="#"  data-bs-toggle="modal" data-bs-target="#modalApprovePenawaran{{ $i->id }}">
                                                        Approve
                                                    </a>
                                                    @endif
                                                </div>
                                            </div>
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
@include('pages.surat-penawaran.modal')
@endsection

@once
    @push('javascript')
    

    <script type="text/javascript">
        $(".js-example-basic-multiple").select2();
    </script>

    <script>
        jQuery(document).ready(function(){
        //get Kota berdasarkan provinsi
            jQuery('select[name="bank_id"]').on('change', function()
            {
                var bank = jQuery(this).val();
                if(bank)
                {
                    jQuery.ajax({
                        url : '/pembekalan/getPic/' +bank,
                        type : "GET",
                        dataType : "json",
                        success:function(data)
                        {
                            jQuery('select[name="pic_id"]').empty();
                            jQuery.each(data, function(key, value){
                                console.log(value.id)
                                if(value.midle_name == null) {
                                    $('select[name="pic_id"]').append('<option value="'+ value.id +'">'+ value.first_name + ' ' + value.last_name + '</option>');
                                } else if(value.last_name == null) {
                                    $('select[name="pic_id"]').append('<option value="'+ value.id +'">'+ value.first_name + ' ' + value.midle_name + '</option>');
                                } else if(value.midle_name && value.last_name == null) {
                                    $('select[name="pic_id"]').append('<option value="'+ value.id +'">'+ value.first_name + '</option>');
                                } else {
                                    $('select[name="pic_id"]').append('<option value="'+ value.id +'">'+ value.first_name + ' ' + value.midle_name + ' ' + value.last_name + '</option>');
                                }
                            });
                        }
                    });
                }
                else
                {
                    $('select[name="pic_id"]').empty();
                }
            });
        })

        // JS Surat Penawaran
        $(document).on('change', '#jenis_id', function(){
            var jenis = $("#jenis_id option:selected").text();
            var materi = $("#materi_id option:selected").text();
            var trim_jenis = $.trim(jenis)
            var trim_materi = $.trim(materi)
            $('#perihal').val(trim_jenis + ' - Penawaran ' + trim_materi)
            $('#jenis_kelas').html(trim_jenis)
            $('#jenis_kelas2').html(trim_jenis)
        })

        $(document).on('change', '#materi_id', function(){
            var jenis = $("#jenis_id option:selected").text();
            var materi = $("#materi_id option:selected").text();
            var trim_jenis = $.trim(jenis)
            var trim_materi = $.trim(materi)
            $('#perihal').val(trim_jenis + ' - Penawaran ' + trim_materi)
            $('#materi_pembekalan').html(trim_materi)
            $('#jenis_kelas').html(trim_jenis)
            $('#materi_pembekalan2').html(trim_materi)
            $('#jenis_kelas2').html(trim_jenis)
        })
        $(document).on('change', '#metode_id', function(){
            var metode = $("#metode_id option:selected").text();
            var trim_metode = $.trim(metode)
            $('#metode_pembekalan').html(trim_metode)
        })

    </script>
    <script>
        $(document).ready(function() {
            $('#body').summernote();
        });
        $(document).ready(function() {
            $('.edit_body').summernote();
        });
        $(document).ready(function() {
            $('.surat_penegasan').summernote();
        });
    </script>

    <script type="text/javascript">
    $(function () {
      var table = $('#sp').DataTable({
          
      });
    });
    </script>
    @endpush
@endonce
