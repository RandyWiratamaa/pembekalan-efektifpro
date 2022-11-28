@extends('layouts.main')

@once
    @push('css')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link href="assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/dropify/css/dropify.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/mohithg-switchery/switchery.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
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
                        <div class="row mt-2">
                            <div class="col-12">
                                <form method="get" action="#" >
                                    @csrf
                                    <div class="col-sm-12">
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
                            <h5 class="header-title mb-2">Schedule Pembekalan</h5>
                            <div id="tableJadwal" class="collapse show">
                                <div class="table-responsive pt-3">
                                    <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="text-center">Bank</th>
                                                <th class="text-center">Sertifikasi</th>
                                                <th class="text-center">Tanggal</th>
                                                <th class="text-center">Pengajar</th>
                                                <th class="text-center">Link Zoom</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">PIC</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data_pembekalan as $i)
                                            <tr>
                                                <td>{{ $i->bank->nama }}</td>
                                                <td>
                                                    {{ $i->materi_pembekalan->materi }} <br>
                                                    ({{ $i->materi_pembekalan->kode }})
                                                </td>
                                                <td>
                                                    @if ($i->tanggal_mulai == $i->tanggal_selesai)
                                                    {{ $i->tanggal_mulai->isoFormat('dddd, DD MMMM Y') }} <br>
                                                    ({{ $i->mulai->isoFormat('HH:mm') }} - {{ $i->selesai->isoFormat('HH:mm') }} WIB)
                                                    @elseif ($i->tanggal_mulai->isoFormat('MMMM') == $i->tanggal_selesai->isoFormat('MMMM'))
                                                    {{ $i->tanggal_mulai->isoFormat('dddd') }} ,{{ $i->tanggal_selesai->isoFormat('dddd') }} <br>
                                                    {{ $i->tanggal_mulai->isoFormat('D') }} & {{ $i->tanggal_selesai->isoFormat('D MMMM YYYY') }} <br>
                                                    ({{ $i->mulai->isoFormat('HH:mm') }} - {{ $i->selesai->isoFormat('HH:mm') }} WIB)
                                                    @else
                                                    {{ $i->tanggal_mulai->isoFormat('dddd, DD MMMM Y') }} & {{ $i->tanggal_selesai->isoFormat('dddd, DD MMMM Y') }}
                                                    ({{ $i->mulai->isoFormat('HH:mm') }} - {{ $i->selesai->isoFormat('HH:mm') }} WIB)
                                                    @endif
                                                </td>
                                                <td>{{ $i->pengajar->nama }}</td>
                                                <td>
                                                    @if ($i->link_zoom == '')
                                                    <button class="btn btn-xs btn-primary" data-bs-toggle="modal" data-bs-target="#update{{ $i->uuid }}">
                                                        Insert Link Zoom
                                                    </button>
                                                    @else
                                                    <a href="{{ $i->link_zoom }}" target="_blank">
                                                    {{ $i->link_zoom }}
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if ($i->is_done == '0')
                                                    <button class="btn btn-xs btn-primary" data-bs-toggle="modal" data-bs-target="#done{{ $i->uuid }}">
                                                        Done
                                                    </button>
                                                    @else
                                                    <button class="btn btn-xs btn-success" disabled data-bs-toggle="modal" data-bs-target="#update{{ $i->uuid }}">
                                                        Telah Selesai
                                                    </button>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($i->midle_name == '')
                                                        {{ $i->pic->first_name }} {{ $i->pic->last_name }}
                                                    @elseif ($i->last_name == '')
                                                        {{ $i->pic->first_name }} {{ $i->pic->midle_name }}
                                                    @elseif ($i->last_name == '' && $i->midle_name == '')
                                                        {{ $i->pic->first_name }}
                                                    @else
                                                        {{ $i->pic->first_name }} {{ $i->pic->midle_name }} {{ $i->pic->last_name }}
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="dropdown d-inline-block">
                                                        <button class="btn btn-light dropdown-toggle" type="button"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class='mdi mdi-dots-horizontal font-18'></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            @php
                                                                $check_berita_acara = DB::table('berita_acara')->where('pembekalan_uuid', $i->uuid)->count() > 0;
                                                            @endphp
                                                            @if (!$check_berita_acara)
                                                            <a class="dropdown-item" id="beritaAcara" data-id="{{ $i->uuid }}">
                                                                Buatkan Berita Acara
                                                            </a>
                                                            <a class="dropdown-item">
                                                                Surat Penawaran
                                                            </a>
                                                            <a class="dropdown-item">
                                                                Surat Penegasan
                                                            </a>
                                                            @endif
                                                            <a class="dropdown-item" id="dataPeserta" data-id="{{ $i->uuid }}">
                                                                <i class='mdi mdi-account me-1'></i> Peserta Pembekalan
                                                            </a>
                                                            <a class="dropdown-item" href="{{ url('pembekalan/detail/'.$i->uuid) }}">
                                                                <i class='mdi mdi-send me-1'></i> Kirim Email Invitation
                                                            </a>
                                                            @if ($i->is_done == true)
                                                            <a class="dropdown-item" id="invoice" data-id="{{ $i->uuid }}">
                                                                <i class='mdi mdi-file me-1'></i> Terbitkan Invoice
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
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="card-widgets">
                        <a data-bs-toggle="collapse" title="minimize" href="#calendarJadwal" role="button" aria-expanded="false" aria-controls="calendarJadwal">
                            <i class="mdi mdi-minus"></i>
                        </a>
                    </div>
                    <h4>Calendar</h4>
                    <div id="calendarJadwal" class="collapse show">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('pages.pembekalan.modal')
@endsection

@once
    @push('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

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
    <script src="{{ asset('assets/js/moment.js') }}"></script>

    <script src="assets/js/pages/datatables.init.js"></script>
    <script src="assets/js/app.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            var pembekalan = @json($events);

            var calendar = $('#calendar').fullCalendar({
                editable: false,
                selectable: false,
                default: false,
                defaultView: "month",
                header:{
                    left:'prev,next today',
                    center:'title',
                    right:'month,agendaWeek,agendaDay'
                },
                eventRender: function (event, view, info) {
                    if (event.allDay === 'true') {
                        event.allDay = true;
                    } else {
                        event.allDay = true;
                    }
                },
                eventLimit: true,
                events: pembekalan,
                displayEventTime: true,

            });
        });

    </script>

    <script>
        // var check = $check_berita_acara
        // $(function () {
        //     var table = $('#tb-schedule').DataTable({
        //       processing: true,
        //       serverSide: true,
        //       ajax: "{{ route('pembekalan.index') }}",
        //       columns: [
        //             {data: 'bank', name: 'bank.nama'},
        //             {data: 'materi_pembekalan', name: 'materi_pembekalan.materi'},
        //             {data: 'tanggal_mulai', name: 'tanggal_mulai'},
        //             {data: 'pengajar', name: 'pengajar.nama'},
        //             {data: 'link_zoom', name: 'link_zoom',
        //                 "render": function(data, type, row){
        //                     if(row.link_zoom == null){
        //                         return `<button class="btn btn-xs btn-primary" data-bs-toggle="modal" data-bs-target="#update` + row.uuid+ `">
        //                                     Insert Link Zoom
        //                                 </button>`;
        //                     } else {
        //                         return `<a href="` + row.link_zoom + `" target="_blank">` + row.link_zoom + `</a>`;
        //                     }
        //                 }
        //             },
        //             {data: 'pic', name: 'pic.first_name'},
        //             {data: 'action', name: 'action',
        //                 "render": function (data, type, row) {

        //                     if (row.is_done == '1'){
        //                         return `
        //                             <div class="dropdown d-inline-block">
        //                                 <button class="btn btn-light dropdown-toggle" type="button"
        //                                     data-bs-toggle="dropdown" aria-haspopup="true"
        //                                     aria-expanded="false">
        //                                     <i class='mdi mdi-dots-horizontal font-18'></i>
        //                                 </button>
        //                                 <div class="dropdown-menu dropdown-menu-end">
        //                                     <a class="dropdown-item" id="dataPeserta" data-id="` + row.uuid + `">
        //                                         <i class='mdi mdi-account me-1'></i> Peserta Pembekalan
        //                                     </a>
        //                                     <a class="dropdown-item" href="{{ url('pembekalan/detail/'.` + row.uuid + `) }}">
        //                                         <i class='mdi mdi-send me-1'></i> Kirim Email Invitation
        //                                     </a>
        //                                     <a class="dropdown-item" id="invoice" data-id="` + row.uuid + `">
        //                                         <i class='mdi mdi-file me-1'></i> Terbitkan Invoice
        //                                     </a>
        //                                 </div>
        //                             </div>`;
        //                     } else {
        //                         return `
        //                             <div class="dropdown d-inline-block">
        //                                 <button class="btn btn-light dropdown-toggle" type="button"
        //                                     data-bs-toggle="dropdown" aria-haspopup="true"
        //                                     aria-expanded="false">
        //                                     <i class='mdi mdi-dots-horizontal font-18'></i>
        //                                 </button>
        //                                 <div class="dropdown-menu dropdown-menu-end">
        //                                     <a class="dropdown-item" id="beritaAcara" data-id="` + row.uuid + `">
        //                                         Buatkan Berita Acara
        //                                     </a>
        //                                     <a class="dropdown-item">
        //                                         Surat Penawaran
        //                                     </a>
        //                                     <a class="dropdown-item">
        //                                         Surat Penegasan
        //                                     </a>
        //                                     <a class="dropdown-item" id="dataPeserta" data-id="` + row.uuid + `">
        //                                         <i class='mdi mdi-account me-1'></i> Peserta Pembekalan
        //                                     </a>
        //                                     <a class="dropdown-item" href="{{ url('pembekalan/detail/'.` + row.uuid + `) }}">
        //                                         <i class='mdi mdi-send me-1'></i> Kirim Email Invitation
        //                                     </a>`
        //                                 `</div>
        //                             </div>`;
        //                     }
        //                 }
        //             }
        //       ]
        //     });
        // });

        $(document).on('click', '#dataPeserta', function() {
            var idx = $(this).attr('data-id')
            $('#peserta'+idx).modal('show');
            // console.log(idx);
            var data_peserta = $('#data-peserta'+idx)
            data_peserta.html('')
            $.ajax({
                url:"{{ url('peserta') }}/"+idx,
                method:'get',
                success:function(res){
                    $('#jml_peserta'+idx).text(res.length)
                    // console.log(res)
                    $.each(res, function(idk,val){
                    //     sub_total = parseInt(val.menu.harga * val.qty)
                        // console.log(val.id)
                        data_peserta.append(`
                            <tr>
                                <td>${val.nama}</td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-soft-info text-dark" data-bs-toggle="modal" data-bs-target="#editPeserta${val.id}">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a class="btn btn-sm btn-soft-danger text-dark" data-bs-toggle="modal" data-bs-target="#hapusPeserta${val.id}">
                                        <i class="fas fa-trash"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                        `)
                    })
                },
                error: function(xhr, status, error) {
                    // alert(xhr.responseText);
                    alert("error")
                }
            })
        });

        $(document).on('click', '#beritaAcara', function() {
            var idx = $(this).attr('data-id')
            $('#beritaAcara'+idx).modal('show');

            var berita_acara = $('#beritaAcara'+idx)
            // berita_acara.html('')
            $.ajax({
                url:"{{ url('pembekalan/getDetail') }}/"+idx,
                method:'get',
                success:function(res){
                    $('#nama_program1').text(res.metode_pembekalan.metode + ' ' + res.materi_pembekalan.materi + ' - ' + res.materi_pembekalan.kode)
                    $('#nama_program2').text(res.metode_pembekalan.metode + ' ' + res.materi_pembekalan.materi + ' - ' + res.materi_pembekalan.kode)
                    $('#pengajar').text(res.pengajar.nama)
                    $('#tgl_pembekalan').text(res.tanggal_mulai)
                    $('#lokasi').text(res.metode_pembekalan.metode)
                    $('#investasi1').text(res.investasi)
                    $('#investasi2').text(res.investasi)
                    $('#investasi3').text(res.investasi)
                    console.log(res)
                },
                error: function(xhr, status, error) {
                    alert(xhr.responseText);
                    // alert("error")
                }
            })
        });

        $(document).on('click', '#invoice', function(){
            var idx = $(this).attr('data-id')
            $('#invoice'+idx).modal('show');
            console.log(idx);
            var  invoice = $('#invoice'+idx)
            $.ajax({
                url:"{{ url('pembekalan/getDetail') }}/"+idx,
                method:'get',
                success:function(res){
                    console.log(moment().format('LLLL'))
                    $('#perihal'+idx).val('Invoice' + ' - ' + '(' + res.metode_pembekalan.metode + ')' + ' Pembekalan ' + res.materi_pembekalan.kode)
                    $('#val-bank'+idx).text(res.bank.nama)
                    $('#val-program'+idx).text(res.metode_pembekalan.metode + ' ' + res.materi_pembekalan.materi)
                    $('#val-tanggal'+idx).text(moment(res.tanggal_mulai).format('DD MMMM YYYY') + ' & ' + moment(res.tanggal_selesai).format('DD MMMM YYYY'))
                    $('#val-nomor'+idx).text(res.surat_penegasan.no_surat)
                },
                error: function(xhr, status, error) {
                    alert(xhr.responseText)
                }
            })
        });

        jQuery(document).ready(function(){
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
                                $('select[name="pic_id"]').append('<option value="'+ key +'">'+ value + '</option>');
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


        $(document).ready(function() {
            $('.sn-berita-acara').summernote();
        });

        $(document).ready(function() {
            $('.sn-invoice').summernote();
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

        function currency(val){
            bilangan = val;
            var number_string = bilangan.toString(),
                sisa    = number_string.length % 3,
                rupiah  = number_string.substr(0, sisa),
                ribuan  = number_string.substr(sisa).match(/\d{3}/g);
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            return "Rp. "+rupiah
        }
    </script>

    @endpush
@endonce
