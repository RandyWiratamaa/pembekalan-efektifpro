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

        <link href="assets/libs/quill/quill.core.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/quill/quill.bubble.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/quill/quill.snow.css" rel="stylesheet" type="text/css" />

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
                            <!-- cta -->
                            <div class="row">
                                <div class="col-sm-3">
                                    <a href="#" class="btn btn-soft-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#addPembekalan"><i class='fe-plus me-1'></i>Tambah</a>
                                </div>
                                <div class="col-sm-9">
                                    <div class="float-sm-end mt-3 mt-sm-0">
                                        <div class="d-inline-block mb-3 mb-sm-0 me-sm-2">
                                            <form class="search-bar form-inline">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" placeholder="Search...">
                                                    <span class="mdi mdi-magnify"></span>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="dropdown d-inline-block">
                                            <button class="btn btn-light dropdown-toggle" type="button"
                                                data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="mdi mdi-filter-variant"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Due Date</a>
                                                <a class="dropdown-item" href="#">Added Date</a>
                                                <a class="dropdown-item" href="#">Assignee</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4" data-plugin="dragula" data-containers='["task-list-one", "task-list-two", "task-list-three"]'>
                                <div class="col">
                                    <a class="text-dark" data-bs-toggle="collapse" href="#todayTasks" aria-expanded="false" aria-controls="todayTasks">
                                        <h5 class="mb-0"><i class="mdi mdi-chevron-down font-18"></i> Today <span class="text-muted font-14">(10)</span></h5>
                                    </a>
                                    <div class="collapse show" id="todayTasks">
                                        <div class="card mb-0 shadow-none">
                                            <div class="card-body pb-0" id="task-list-one">
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
                                                            <td>{{ $i->hari_tanggal->isoFormat('dddd, DD-MMMM-Y') }}</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>{{ $i->mulai->isoFormat('HH:mm') }}</td>
                                                            <td>{{ $i->selesai->isoFormat('HH:mm') }}</td>
                                                            <td></td>
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

        <!-- task details -->
        {{-- <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none text-muted"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class='mdi mdi-dots-horizontal font-18'></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class='mdi mdi-attachment me-1'></i>Attachment
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class='mdi mdi-pencil-outline me-1'></i>Edit
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class='mdi mdi-content-copy me-1'></i>Mark as Duplicate
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:void(0);" class="dropdown-item text-danger">
                                        <i class='mdi mdi-delete-outline me-1'></i>Delete
                                    </a>
                                </div>
                            </div>

                            <div class="form-check float-start">
                                <input type="checkbox" class="form-check-input" id="completedCheck">
                                <label class="form-check-label" for="completedCheck">
                                    Mark as completed
                                </label>
                            </div>
                            <div class="clearfix"></div>
                            <hr class="my-2" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <h4>Detail</h4>

                            <div class="row">
                                <div class="col-6">
                                    <p class="mt-2 mb-1 text-muted">PIC</p>
                                    <div class="d-flex align-items-start">
                                        <img src="assets/images/users/user-9.jpg" alt="Arya S" class="rounded-circle me-2" height="24" />
                                        <div class="w-100">
                                            <h5 class="mt-1 font-size-14">
                                                Nama PIC
                                            </h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <p class="mt-2 mb-1 text-muted">Waktu Pelaksanaan</p>
                                    <div class="d-flex align-items-start">
                                        <i class='mdi mdi-calendar-month-outline font-18 text-success me-1'></i>
                                        <div class="w-100">
                                            <h5 class="mt-1 font-size-14">
                                                Hari ini, 08.00 - 10.00
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col">
                                    <div id="bubble-editor" style="height: 120px;">
                                        <p>This is a task description with markup support</p>
                                        <ul>
                                            <li>Select a text to reveal the toolbar.</li>
                                            <li>Edit rich document on-the-fly, so elastic!</li>
                                        </ul>
                                        <p>End of air-mode area</p>
                                    </div>
                                </div>
                            </div>
                            <!-- start attachments -->
                            <h5 class="mt-4 mb-2 font-size-16">Attachments</h5>
                            <div class="card mb-1 shadow-none border">
                                <div class="p-2">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <div class="avatar-sm">
                                                <span class="avatar-title badge-soft-primary text-primary rounded">
                                                    ZIP
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col ps-0">
                                            <a href="javascript:void(0);" class="text-muted fw-bold">Ubold-sketch-design.zip</a>
                                            <p class="mb-0 font-12">2.3 MB</p>
                                        </div>
                                        <div class="col-auto">
                                            <a href="javascript:void(0);" class="btn btn-link font-16 text-muted">
                                                <i class="dripicons-download"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-1 shadow-none border">
                                <div class="p-2">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <div class="avatar-sm">
                                                <span class="avatar-title badge-soft-primary text-primary rounded">
                                                    JPG
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col ps-0">
                                            <a href="javascript:void(0);" class="text-muted fw-bold">Dashboard-design.jpg</a>
                                            <p class="mb-0 font-12">3.25 MB</p>
                                        </div>
                                        <div class="col-auto">
                                            <a href="javascript:void(0);" class="btn btn-link font-16 text-muted">
                                                <i class="dripicons-download"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</div>
@include('pages.pembekalan.modal')
@endsection

@once
    @push('javascript')
    <script src="assets/libs/multiselect/js/jquery.multi-select.js"></script>
    <script src="assets/libs/select2/js/select2.min.js"></script>
    <script src="assets/libs/jquery-mockjax/jquery.mockjax.min.js"></script>
    <script src="assets/libs/devbridge-autocomplete/jquery.autocomplete.min.js"></script>
    <script src="assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>

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

    <script src="assets/libs/dropzone/min/dropzone.min.js"></script>
    <script src="assets/libs/dropify/js/dropify.min.js"></script>
    <script src="assets/js/pages/form-fileuploads.init.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

     <!-- Plugins js -->
     <script src="assets/libs/quill/quill.min.js"></script>

     <!-- Init js-->
     <script src="assets/js/pages/form-quilljs.init.js"></script>

    <script src="assets/libs/selectize/js/standalone/selectize.min.js"></script>
    <script src="assets/libs/mohithg-switchery/switchery.min.js"></script>

    <script type="text/javascript">
        $(".js-example-basic-multiple").select2();
    </script>

    {{-- <script type="text/javascript">
        $(function () {
          var table = $('.pic').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('pic.index') }}",
              columns: [
                    {data: 'nama', name: 'nama'},
                    {data: 'bank', name: 'bank.nama'},
                    {data: 'no_hp', name: 'no_hp'},
                    {data: 'bank', name: 'bank.alamat'},
                    {data: 'alamat_rumah', name: 'alamat_rumah'},
                    {data: 'email_pribadi', name: 'email_pribadi'},
                    {data: 'jabatan', name: 'jabatan'},
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
    </script> --}}
    <script>
        jQuery(document).ready(function(){
        //get Kota berdasarkan provinsi
            jQuery('select[name="bank"]').on('change', function()
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
    </script>
    <script>
        $(document).ready(function() {
            $('#body').summernote();
        });
    </script>
    @endpush
@endonce
