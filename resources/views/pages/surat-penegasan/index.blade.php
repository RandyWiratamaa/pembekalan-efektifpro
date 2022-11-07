@extends('layouts.main')

@once
    @push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/dropify/css/dropify.min.css" rel="stylesheet') }}" type="text/css" />
    <link href="{{ asset('assets/libs/mohithg-switchery/switchery.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/multiselect/css/multi-select.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/select2/css/select2.min.css" rel="stylesheet') }}" type="text/css" />
    <link href="{{ asset('assets/libs/selectize/css/selectize.bootstrap3.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css" />

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
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-widgets">
                        <a data-bs-toggle="collapse" href="#cardCollpase4" role="button" aria-expanded="false" aria-controls="cardCollpase4"><i class="mdi mdi-minus"></i></a>
                    </div>
                    <h4 class="header-title mb-0">Data {{ $page_name }}</h4>
                    <div id="cardCollpase4" class="collapse show">
                        <div class="table-responsive pt-3" style="height: 600px">
                            <table class="table table-bordered table-centered mb-0 client" style="width:100%" id="btn-editable">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center">No. Surat</th>
                                        <th class="text-center">Tanggal Surat</th>
                                        <th class="text-center">Bank</th>
                                        <th class="text-center">Program Pembekalan</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Ket.</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($surat_penegasan as $i)
                                    <tr>
                                        <td>{{ $i->no_surat }}</td>
                                        <td>{{ $i->tgl_surat->isoFormat('dddd, DD MMMM YYYY') }}</td>
                                        <td>{{ $i->bank->nama }}</td>
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
                                                    <a href="{{ url('surat-penegasan/view/'.$i->id) }}" class="dropdown-item" target="_blank">
                                                        <i class='mdi mdi-eye me-1'></i> Review
                                                    </a>
                                                    @if ($i->is_approved == 0)
                                                    <a class="dropdown-item">
                                                        Edit
                                                    </a>
                                                    <a class="dropdown-item">
                                                        Another Action
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item">
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

@endsection

@once
    @push('javascript')
    <script src="{{ asset('assets/libs/multiselect/js/jquery.multi-select.js') }}"></script>
    <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery-mockjax/jquery.mockjax.min.js') }}"></script>
    <script src="{{ asset('assets/libs/devbridge-autocomplete/jquery.autocomplete.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>

    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>

    <script src="{{ asset('assets/libs/dropzone/min/dropzone.min.js') }}"></script>
    <script src="{{ asset('assets/libs/dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-fileuploads.init.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script src="{{ asset('assets/libs/selectize/js/standalone/selectize.min.js') }}"></script>
    <script src="{{ asset('assets/libs/mohithg-switchery/switchery.min.js') }}"></script>

    <script type="text/javascript">
        $(".js-example-basic-multiple").select2();
    </script>

    {{-- <script type="text/javascript">
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
