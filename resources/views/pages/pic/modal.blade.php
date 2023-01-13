{{-- Modal tambah data PIC --}}
<div id="addPIC" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data {{ $page_name }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Nama Depan PIC *</label>
                                <input type="text" name="nama_depan" class="form-control" id="nama" placeholder="Nama Depan PIC">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 ml-1">
                                <label class="form-label">Nama Tengah PIC</label>
                                <input type="text" name="nama_tengah" class="form-control" id="nama" placeholder="Nama Tengah PIC">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Nama Belakang PIC</label>
                                <input type="text" name="nama_belakang" class="form-control" id="nama" placeholder="Nama Belakang PIC">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">No. Hp / Whatsapp *</label>
                                <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="No. Handphone / Whatsapp">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" id="basic-datepicker" class="form-control" placeholder="Basic datepicker">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin *</label>
                                <div class="form-check">
                                    <input type="radio" id="customRadio1" name="jenkel" class="form-check-input" value="laki-laki">
                                    <label class="form-check-label" for="customRadio1">Laki-laki</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" id="customRadio2" name="jenkel" class="form-check-input" value="perempuan">
                                    <label class="form-check-label" for="customRadio2">Perempuan</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Jabatan *</label>
                                <input type="text" name="jabatan" class="form-control" id="jabatan" placeholder="Jabatan">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Bank *</label>
                                <select name="bank_id" id="selectize-select" class="form-control">
                                    @foreach ($bank as $i)
                                    <option value="{{ $i->id }}">{{ $i->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Alamat Rumah</label>
                                <textarea class="form-control" name="alamat_rumah" id="alamat_rumah" placeholder="Alamat Rumah"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Email Pribadi *</label>
                                <input type="email" name="email_pribadi" class="form-control" id="email_pribadi" placeholder="Email Pribadi">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Email Kantor *</label>
                                <input type="email" name="email_kantor" class="form-control" id="email_kantor" placeholder="Email Kantor">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Photo PIC</label>
                                <input type="file" data-plugins="dropify" data-height="300" />
                            </div>
                        </div>
                    </div>
                    <div class="pull-left">
                        <em class="text-danger">* harus diisi</em>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info waves-effect waves-light">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- Modal ubah data PIC --}}
@foreach ($pic as $i)
<div id="editPIC{{ $i->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data {{ $page_name }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('pic', $i->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Nama Depan PIC *</label>
                                <input type="text" name="nama_depan" class="form-control" id="nama_depan" value="{{ $i->first_name }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 ml-1">
                                <label class="form-label">Nama Tengah PIC</label>
                                <input type="text" name="nama_tengah" class="form-control" id="nama" value="{{ $i->midle_name }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Nama Belakang PIC</label>
                                <input type="text" name="nama_belakang" class="form-control" id="nama" value="{{ $i->last_name }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">No. Hp / Whatsapp *</label>
                                <input type="text" name="no_hp" id="no_hp" class="form-control" value="{{ $i->no_hp }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" id="basic-datepicker" class="form-control" @if($i->tgl_lahir != null)  value="{{ $i->tgl_lahir->isoFormat('YYYY-MM-DD') }}" @endif>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin *</label>
                                <div class="form-check">
                                    <input type="radio" id="customRadio1" name="jenkel" class="form-check-input" value="laki-laki">
                                    <label class="form-check-label" for="customRadio1">Laki-laki</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" id="customRadio2" name="jenkel" class="form-check-input" value="perempuan">
                                    <label class="form-check-label" for="customRadio2">Perempuan</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Jabatan *</label>
                                <input type="text" name="jabatan" class="form-control" id="jabatan" value="{{ $i->jabatan }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Bank *</label>
                                <select name="bank_id" id="selectize-select" class="form-control">
                                    @foreach ($bank as $j)
                                    <option value={{ $j->id }} @if($j->id == $i->bank_id) selected @endif>{{ $j->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Alamat Rumah</label>
                                <textarea class="form-control" name="alamat_rumah" id="alamat_rumah" placeholder="Alamat Rumah">
                                    {{ $i->alamat_rumah }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Email Pribadi *</label>
                                <input type="email" name="email_pribadi" class="form-control" id="email_pribadi" value="{{ $i->email_pribadi }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Email Kantor *</label>
                                <input type="email" name="email_kantor" class="form-control" id="email_kantor" value="{{ $i->email_kantor }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Photo PIC</label>
                                <input type="file" data-plugins="dropify" data-height="300" />
                            </div>
                        </div>
                    </div>
                    <div class="pull-left">
                        <em class="text-danger">* harus diisi</em>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info waves-effect waves-light">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

{{-- Modal hapus data PIC --}}
@foreach ($pic as $i)
<div id="deletePIC{{ $i->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Data {{ $page_name }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('pic', $i->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('Delete')
                <div class="modal-body p-4">
                    <h4>Apakah anda yakin akan menghapus data {{ $i->nama }} ini ?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-info waves-effect waves-light">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach


@once
    @push('javascript')    

    <script type="text/javascript">
        $(function () {
          var table = $('.pic').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('pic.index') }}",
              columns: [
                    {data: 'first_name', name: 'first_name',
                        "render": function (data, type, row) {
                            if(row.midle_name == null) {
                                return row.first_name + ' ' + row.last_name
                            } else if(row.last_name == null) {
                                return row.first_name + ' ' + row.midle_name
                            } else if (row.midle_name && row.last_name == null) {
                                return row.first_name
                            } else {
                                return row.first_name + ' ' + row.midle_name + ' ' + row.last_name
                            }
                        }
                    },
                    {data: 'nama_bank', name: 'bank.nama'},
                    {data: 'no_hp', name: 'no_hp'},
                    {data: 'alamat_bank', name: 'bank.alamat'},
                    {data: 'alamat_rumah', name: 'alamat_rumah'},
                    {data: 'email_pribadi', name: 'email_pribadi'},
                    {data: 'jabatan', name: 'jabatan'},
                    {data: 'action', name: 'action', orderable: false, searchable: false,
                        "render": function (data, type, row) {
                            return `<div class="dropdown text-center">
                                        <a href="#" class="dropdown-toggle card-drop arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-horizontal m-0 text-muted h3"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#view` + row.id + `"><i class="fas fa-eye"></i> View</a>
                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editPIC` + row.id + `"><i class="fas fa-edit"></i> Edit </a>
                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#deletePIC` + row.id + `"><i class="fas fa-trash"></i> Delete</a>
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
