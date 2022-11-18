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
        <div class="col-xl-12">
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
                    <div class="card">
                        <div class="card-body">
                            <div class="card-widgets">
                                <a data-bs-toggle="collapse" href="#tableJadwal" role="button" aria-expanded="false" aria-controls="tableJadwal">
                                    <i class="mdi mdi-minus"></i>
                                </a>
                            </div>
                            <h4>Schedule Pembekalan</h4>
                            <div id="tableJadwal" class="collapse show">
                                <div class="table-responsive pt-3" style="height: 600px">
                                    <table class="table table-bordered table-centered mb-0 client" style="width:100%" id="btn-editable">
                                        <thead class="table-light">
                                            <tr class="text-center">
                                                <th>Bank</th>
                                                <th>Sertifikasi</th>
                                                <th>Tanggal</th>
                                                <th>Pengajar</th>
                                                <th>Link Zoom</th>
                                                <th>Durasi Pelatihan</th>
                                                <th>PIC</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data_pembekalan as $i)
                                            <tr>
                                                <td>{{ $i->bank->nama }}</td>
                                                <td>{{ $i->materi_pembekalan->materi }} ({{ $i->materi_pembekalan->kode }})</td>
                                                <td>
                                                    {{ $i->hari_tanggal->isoFormat('dddd, DD MMMM Y') }}
                                                    ({{ $i->mulai->isoFormat('HH:mm') }} - {{ $i->selesai->isoFormat('HH:mm') }} WIB)
                                                </td>
                                                <td>{{ $i->pengajar->nama }}</td>
                                                <td class="text-center">
                                                    @if ($i->link_zoom == '')
                                                    <button class="btn btn-xs btn-primary" data-bs-toggle="modal" data-bs-target="#update{{ $i->uuid }}">
                                                        Insert Link Zoom
                                                    </button>
                                                    @else
                                                    <a href="{{ $i->link_zoom }}" target="_blank">
                                                    {{ $i->link_zoom }}
                                                    @endif
                                                </td>
                                                <td></td>
                                                <td>{{ $i->pic->nama }}</td>
                                                <td>
                                                    <div class="dropdown d-inline-block">
                                                        <button class="btn btn-light dropdown-toggle" type="button"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class='mdi mdi-dots-horizontal font-18'></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" id="dataPeserta" data-id="{{ $i->uuid }}">
                                                                Peserta Pembekalan
                                                            </a>
                                                            <a class="dropdown-item">
                                                                Surat Penawaran
                                                            </a>
                                                            <a class="dropdown-item">
                                                                Sura Penegasan
                                                            </a>
                                                            <a class="dropdown-item" id="beritaAcara" data-id="{{ $i->uuid }}">
                                                                Berita Acara
                                                            </a>
                                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#beritaAcara{{ $i->uuid }}">
                                                                Berita Acara2
                                                            </a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="{{ url('pembekalan/detail/'.$i->uuid) }}">
                                                                Detail
                                                            </a>
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
</div>
@include('pages.pembekalan.modal')
@endsection

@once
    @push('javascript')
    <script src="{{ asset('assets/js/moment.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            var pembekalan = @json($events)

            var calendar = $('#calendar').fullCalendar({
                editable: false,
                selectable: true,
                default: true,
                eventBackgroundColor: '#ff291095',
                defaultView: "month",
                header:{
                    left:'prev,next today',
                    center:'title',
                    right:'month,agendaWeek,agendaDay'
                },
                eventLimit: true,
                events: pembekalan,
                textColor: 'black',
                displayEventTime: false,
                eventRender: function (event, view, info) {
                    if (event.allDay === 'true') {
                        event.allDay = true;
                    } else {
                        event.allDay = true;
                    }
                },
            });
        });

    </script>

    <script>
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
                    console.log(res)
                    $.each(res, function(idk,val){
                    //     sub_total = parseInt(val.menu.harga * val.qty)
                        data_peserta.append(`
                            <tr>
                                <td>${val.nama}</td>
                                <td></td>
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
            console.log(idx);
            var berita_acara = $('#beritaAcara'+idx)
            // berita_acara.html('')
            $.ajax({
                url:"{{ url('pembekalan/getDetail') }}/"+idx,
                method:'get',
                success:function(res){
                    $('#nama_program1').text(res.metode_pembekalan.metode + ' ' + res.materi_pembekalan.materi + ' - ' + res.materi_pembekalan.kode)
                    $('#nama_program2').text(res.metode_pembekalan.metode + ' ' + res.materi_pembekalan.materi + ' - ' + res.materi_pembekalan.kode)
                    $('#pengajar').text(res.pengajar.nama)
                    $('#tgl_pembekalan').text(res.hari_tanggal)
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
            $('#berita-acara').summernote();
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
