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
        <style>
            /* .fc-event{
                width: 150px !important;
            } */
            /* .fc-axis {
                display: none;
            } */
        </style>
        {{-- <link rel="stylesheet" href="https://uicdn.toast.com/calendar/latest/toastui-calendar.min.css" /> --}}
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
                            <div class="row mt-4" data-plugin="dragula" data-containers='["task-list-one", "task-list-two", "task-list-three"]'>
                                <div class="col">
                                    <div class="collapse show" id="todayTasks">
                                        <div class="card mb-0 shadow-none">
                                            <div class="card-body pb-0" id="task-list-one">
                                                <div class="row">
                                                    <div class="col-12 mb-2">
                                                        <div id="calendar"></div>
                                                        {{-- <div id="tui_calendar"></div> --}}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 mt-2">
                                                        <table class="table table-bordered table-centered mb-0 client" style="width:100%" id="btn-editable">
                                                            <thead class="table-light">
                                                                <tr class="text-center">
                                                                    <th>Bank</th>
                                                                    <th>Sertifikasi</th>
                                                                    <th>Level</th>
                                                                    <th>Tanggal</th>
                                                                    <th>Jumlah Peserta</th>
                                                                    <th>Pengajar</th>
                                                                    <th>Link Zoom</th>
                                                                    <th>Durasi Pelatihan</th>
                                                                    <th>Jam Mulai (WIB)</th>
                                                                    <th>Jam Selesai (WIB)</th>
                                                                    <th>PIC</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($data_pembekalan as $i)
                                                                <tr>
                                                                    <td>{{ $i->bank->nama }}</td>
                                                                    <td>{{ $i->materi_pembekalan->materi }} ({{ $i->materi_pembekalan->singkatan }})</td>
                                                                    <td>{{ $i->level_pembekalan->level }}</td>
                                                                    <td>{{ $i->hari_tanggal->isoFormat('dddd, DD MMMM Y') }}</td>
                                                                    <td></td>
                                                                    <td>{{ $i->pengajar->nama }}</td>
                                                                    <td></td>
                                                                    <td>{{ $i->uuid }}</td>
                                                                    <td>{{ $i->mulai->isoFormat('HH:mm') }}</td>
                                                                    <td>{{ $i->selesai->isoFormat('HH:mm') }}</td>
                                                                    <td>{{ $i->pic->nama }}</td>
                                                                    <td>
                                                                        <div class="dropdown d-inline-block">
                                                                            <button class="btn btn-light dropdown-toggle" type="button"
                                                                                data-bs-toggle="dropdown" aria-haspopup="true"
                                                                                aria-expanded="false">
                                                                                <i class='mdi mdi-dots-horizontal font-18'></i>
                                                                            </button>
                                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                                {{-- <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#suratPenawaran{{ $i->bank_id }}">
                                                                                    Surat Penawaran
                                                                                </a> --}}
                                                                                <a class="dropdown-item" href="{{ url('surat-penawaran/show/'.$i->id) }}" target="_blank">
                                                                                    Surat Penawaran
                                                                                </a>
                                                                                <a class="dropdown-item" href="{{ url('surat-penegasan/show/'.$i->id) }}" target="_blank">
                                                                                    Surat Penegasan
                                                                                </a>
                                                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#dataPeserta">
                                                                                    Peserta Pembekalan
                                                                                </a>
                                                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#beritaAcara{{ $i->bank_id }}">
                                                                                    Berita Acara
                                                                                </a>
                                                                                <div class="dropdown-divider"></div>
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
    <script src="{{ asset('assets/js/calendar/toastui-calendar.min.js') }}"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            var pembekalan = @json($events)

            var calendar = $('#calendar').fullCalendar({
                editable: true,
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
                    // $(element).css('width','50px');
                    if (event.allDay === 'true') {
                        event.allDay = true;
                    } else {
                        event.allDay = true;
                    }
                },
            });
        });

    </script>

    {{-- Toast UI Calendar --}}
    {{-- <script>
        const Calendar = window.tui.Calendar;
        const calendar = new Calendar('#tui_calendar', {
            defaultView: 'month'
        });
    </script> --}}
    @endpush
@endonce
