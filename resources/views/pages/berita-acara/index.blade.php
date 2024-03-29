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
                                <form class="search-bar form-inline" method="get" action="{{ route('berita-acara.index') }}" >
                                    @csrf
                                    <label class="form-label">Daftar Nama Bank</label>
                                    <div class="input-group">
                                        <select class="form-select" name="bank_id" id="bank_id" type="text" placeholder="Cari berdasarkan nama Bank">
                                            <option value="">-- Cari berdasarkan nama Bank --</option>
                                            @foreach ($bank as $i)
                                            <option value="{{ $i->id }}">{{ $i->nama }}</option>
                                            @endforeach
                                        </select>
                                        <button type="submit" id="bankSearch" class="btn waves-effect waves-light btn-primary">
                                            <i class="mdi mdi-magnify"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-sm-12">
                                <form class="search-bar form-inline" method="get" action="{{ route('berita-acara.index') }}" >
                                    @csrf
                                    <label class="form-label">Daftar Nama Program Pembekalan</label>
                                    <div class="input-group">
                                        <select class="form-select" name="materi_id" id="materi_id" type="text" placeholder="Cari berdasarkan nama Program Pembekalan">
                                            <option value="">-- Cari berdasarkan nama Program Pembekalan --</option>
                                            @foreach ($materi as $i)
                                            <option value="{{ $i->id }}">{{ $i->materi }}</option>
                                            @endforeach
                                        </select>
                                        <button type="submit" id="pembekalanSearch" class="btn waves-effect waves-light btn-primary">
                                            <i class="mdi mdi-magnify"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <form method="get" action="{{ route('berita-acara.index') }}" >
                                    @csrf
                                    <div class="col-sm-12 mb-1">
                                        <label class="form-label">Dari</label>
                                        <input type="date" name="start_date" id="start_date" class="form-control" value="{{ \Carbon\Carbon::now()->format('m/d/Y') }}">
                                    </div>
                                    <div class="col-sm-12">
                                        <label class="form-label">Ke</label>
                                        <input type="date" name="end_date" id="end_date" class="form-control" value="{{ \Carbon\Carbon::now()->format('m/d/Y') }}">
                                    </div>
                                    <button type="submit" class="btn btn-sm waves-effect waves-light btn-primary mt-1 float-end" id="dateSearch">
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
                <div class="card-body">
                    <div class="card-widgets">
                        <a data-bs-toggle="collapse" href="#cardCollpase4" role="button" aria-expanded="false" aria-controls="cardCollpase4"><i class="mdi mdi-minus"></i></a>
                    </div>
                    <h4 class="header-title mb-0">Data {{ $page_name }}</h4>
                    <div id="cardCollpase4" class="collapse show">
                        <div class="table-responsive pt-3" style="height: 600px">
                            <table class="table table-bordered table-centered mb-0 client" style="width:100%" id="tb_beritaAcara">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center">Tanggal</th>
                                        <th class="text-center">Bank</th>
                                        <th class="text-center">Program Pembekalan</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Ket.</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($berita_acara as $i)
                                    <tr>
                                        <td>{{ $i->tanggal->isoFormat('dddd, DD MMMM YYYY') }}</td>
                                        <td>{{ $i->pembekalan->bank->nama }}</td>
                                        <td>{{ $i->pembekalan->materi_pembekalan->materi }}</td>
                                        <td class="text-center">
                                            @if ($i->is_approved == 1)
                                                <span class="badge bg-success text-dark">Sudah diapprove</span>
                                            @else
                                                <span class="badge bg-warning text-dark">Belum diapprove</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if ($i->status == 1)
                                                <span class="badge bg-success">Sudah dikirim</span>
                                            @else
                                                <span class="badge bg-danger text-dark">Belum dikirim</span>
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
                                                    @if ($i->is_approved == 0)
                                                    <a href="{{ url('berita-acara/view/'.$i->id) }}" class="dropdown-item" target="_blank">
                                                        <i class='mdi mdi-eye me-1'></i> Review
                                                    </a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editBeritaAcara{{ $i->id }}">
                                                        <i class='mdi mdi-lead-pencil me-1'></i> Edit
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item text-danger" href="#" data-bs-toggle="modal" data-bs-target="#hapusBeritaAcara{{ $i->id }}">
                                                        <i class='mdi mdi-trash-can me-1'></i> Delete
                                                    </a>
                                                    <a class="dropdown-item text-center text-dark bg-soft-success" href="#" data-bs-toggle="modal" data-bs-target="#approve{{ $i->id }}">
                                                        Approve
                                                    </a>
                                                    @else
                                                    <a href="{{ url('berita-acara/generate-PDF/'.$i->id) }}" class="dropdown-item" target="_blank">
                                                        <i class='mdi mdi-download me-1'></i> Simpan Berita Acara
                                                    </a>
                                                    <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#kirim{{ $i->id }}">
                                                        <i class='mdi mdi-send me-1'></i> Kirim ke PIC
                                                    </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('pages.berita-acara.modal')
@endsection

@once
    @push('javascript')
    

    <script>
        $(document).ready(function(){
            $('.ubah-berita-acara').summernote();

            var table = $('#tb_beritaAcara').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('berita-acara.index') }}",
                    type:"GET",
                    data: function(d){
                        _token            = '{{ csrf_token() }}',
                        d.banksearch = $('#bank_id').val();
                        d.pembekalansearch = $('#materi_id').val();
                        d.start_date = $('#start_date').val();
                        d.end_date = $('#end_date').val();
                    }
            },
                columns: [
                    {data: 'tanggal', name: 'tanggal'},
                    {data: 'bank', name: 'pembekalan.bank.nama'},
                    {data: 'materi_pembekalan', name: 'pembekalan.materi_pembekalan.materi'},
                    {data: 'is_approved', name: 'is_approved',
                        "render": function (data, type, row) {
                            if(row.is_approved == '1') {
                                return `<span class="badge bg-success">Sudah diapproved</span>`;
                            } else {
                                return `<span class="badge bg-danger text-dark">Belum diapproved</span>`;
                            }
                        }
                    },
                    {data: 'status', name: 'status',
                        "render": function(data, type, row){
                            if(row.status == '1') {
                                return `<span class="badge bg-success">Sudah dikirim</span>`;
                            } else {
                                return `<span class="badge bg-danger text-dark">Belum dikirim</span>`;
                            }
                        }
                    },
                    {data: 'action', name: 'action', orderable: false, searchable: false,
                        "render": function(data, type, row){
                            if(row.is_approved == '1') {
                                return `
                                    <div class="dropdown d-inline-block">
                                        <button class="btn btn-light dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class='mdi mdi-dots-horizontal font-18'></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="{{ url('berita-acara/generate-PDF/` + row.id + `') }}" class="dropdown-item" target="_blank">
                                                <i class='mdi mdi-download me-1'></i> Simpan Berita Acara
                                            </a>
                                            <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#kirim` + row.id + `">
                                                <i class='mdi mdi-send me-1'></i> Kirim ke PIC
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
                                            <a href="{{ url('berita-acara/view/` + row.id + `') }}" class="dropdown-item" target="_blank">
                                                <i class='mdi mdi-eye me-1'></i> Review
                                            </a>
                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editBeritaAcara` + row.id + `">
                                                <i class='mdi mdi-lead-pencil me-1'></i> Edit
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item text-danger" href="#" data-bs-toggle="modal" data-bs-target="#modalHapusBeritaAcara` + row.id + `">
                                                <i class='mdi mdi-trash-can me-1'></i> Delete
                                            </a>
                                            <a class="dropdown-item text-center text-dark bg-soft-success" href="#" data-bs-toggle="modal" data-bs-target="#approve` + row.id + `">
                                                Approve
                                            </a>
                                        </div>
                                    </div>`;
                            }
                        }
                    }
                ]
            })

        // $('#bank_id').on('change',function(){
        //     table.draw();
        // });

        // $('#materi_id').on('change',function(){
        //     table.draw();
        // });

        // $('#start_date').on('change',function(){
        //     table.draw();
        // });

        // $('#end_date').on('change',function(){
        //     table.draw();
        // });

        $('#bankSearch').on('click', function(){
            table.draw();
        });

        $('#pembekalanSearch').on('click', function(){
            table.draw();
        });

        $('#searchDate').on('click', function(){
            $('#tb_beritaAcara').DataTable().draw(true);
        });
    });

        $(document).on('change', '.image', function(){
            var filesCount = $(this)[0].files.length;
			var textbox = $(this).prev();
			if (filesCount === 1) {
                var fileName = $(this).val().split('\\').pop();
                textbox.text(fileName);
			} else {
			    textbox.text(filesCount + ' files selected');
			}
            if (typeof (FileReader) != "undefined") {
                var dvPreview = $("#previewImage");
                dvPreview.html("");
                $($(this)[0].files).each(function () {
                    var file = $(this);
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var img = $("<img />");
                        img.attr("style", "width: 300px; padding: 5px");
                        img.attr("src", e.target.result);
                        dvPreview.append(img);
                    }
                    reader.readAsDataURL(file[0]);
                });
            } else {
                alert("This browser does not support HTML5 FileReader.");
            }
        });

        $(document).on('change', '.dokumentasi', function(){
            var filesCount2 = $(this)[0].files.length;
			var textbox2 = $(this).prev();
			if (filesCount2 === 1) {
                var fileName2 = $(this).val().split('\\').pop();
                textbox2.text(fileName2);
			} else {
			    textbox2.text(filesCount2 + ' files selected');
			}
            if (typeof (FileReader) != "undefined") {
                var dvPreview2 = $("#previewDokumentasi");
                dvPreview2.html("");
                $($(this)[0].files).each(function () {
                    var file2 = $(this);
                    var reader2 = new FileReader();
                    reader2.onload = function (e) {
                        var img2 = $("<img />");
                        img2.attr("style", "width: 300px; padding: 5px");
                        img2.attr("src", e.target.result);
                        dvPreview2.append(img2);
                    }
                    reader2.readAsDataURL(file2[0]);
                });
            } else {
                alert("This browser does not support HTML5 FileReader.");
            }
        });
    </script>
    @endpush
@endonce
