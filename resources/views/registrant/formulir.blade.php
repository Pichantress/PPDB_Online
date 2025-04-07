@extends('layouts.dashboard-layout')

@section('title', 'Registrant Dashboard - Formulir')


@section('navItem')
    <li class="nav-item">
        <a class="nav-link collapsed" href="/formulir/{{ $data->id }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Download Formulir</span>
        </a>
        <a class="nav-link collapsed" href="{{ route('formulir.upload.form') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Upload Formulir</span>
        </a>
        @if ($data->status_id == 1 || $data->status_id == 2 || $data->status_id == 5)
            <a class="nav-link collapsed" href="javascript:void(0);" style="pointer-events: none; opacity: 0.6;">
                <i class="fas fa-fw fa-folder"></i>
                <span>Pembayaran Registrasi</span>
            </a>
        @else
            <a class="nav-link collapsed" href="/pembayaran/{{ $data->id }}">
                <i class="fas fa-fw fa-folder"></i>
                <span>Pembayaran Registrasi</span>
            </a>
        @endif

    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
@endsection
@section('main')
    <div class="col-12 grid-margin stretch-card">
        <div class="alert alert-warning">
            <strong>Warning!</strong> Pastikan data anda sudah benar.
        </div>
        <div class="card">

            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">

                    <h4 class="card-title mb-4">Formulir Pendaftaran</h4>
                    <form class="forms-sample" onsubmit="return registrationConfirmation(event);" method="POST"
                        action="{{ route('formulir.download') }}">
                        @csrf
                        <div class="d-flex items-center justify-content-end mt-4">
                            <button
                                class="btn btn-success me-2 inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'"
                                type="submit">Download</button>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $item)
                                        <li>{{ $item }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                </div>

                <h5 class="card-title mb-4">A. Data Siswa</h5>
                <div class="form-group mt-4">
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="name"
                                value="{{ $data->name }}" required autofocus autocomplete="name" readonly>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <label for="alamat">Alamat Lengkap</label>
                            <input type="text" class="form-control" id="alamat" name="alamat"
                                value="{{ $data->alamat }}" required autofocus autocomplete="alamat" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-4">
                    <label for="jenis_kelamin_id">Jenis Kelamin</label>
                    <div class="mt-2">
                        <select name="jenis_kelamin_id" id="jenis_kelamin_id" class="form-control" required>
                            <option value="1" {{ $data->jenis_kelamin_id == 1 ? 'selected' : '' }}>Laki-Laki
                            </option>
                            <option value="2" {{ $data->jenis_kelamin_id == 2 ? 'selected' : '' }}>Perempuan
                            </option>
                        </select>
                    </div>
                </div>
                <div class="form-group mt-4">
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required
                                autofocus autocomplete="tempat_lahir" value="{{ $data->tempat_lahir }}" readonly>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                placeholder="YYYY-MM-DD" value="{{ old('tanggal_lahir', $data->tanggal_lahir) }}" required
                                autofocus autocomplete="tanggal_lahir" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-4">
                    <div class="row">
                        <div class="col-sm-4 col-md-4">
                            <label for="no_kk">No. KK</label>
                            <input type="text" class="form-control" id="no_kk" name="no_kk" required autofocus
                                autocomplete="no_kk" onkeypress="return isNumberKey(event)" value="{{ $data->no_kk }}"
                                readonly>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <label for="nik">NIK</label>
                            <input type="text" class="form-control" id="nik" name="nik" required autofocus
                                autocomplete="nik" onkeypress="return isNumberKey(event)" value="{{ $data->nik }}"
                                readonly>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <label for="no_akta">No. Akta Kelahiran</label>
                            <input type="text" class="form-control" id="no_akta" name="no_akta" required autofocus
                                autocomplete="no_akta" onkeypress="return isNumberKey(event)"
                                value="{{ $data->no_akta_kelahiran }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-4">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <label for="agama">Agama</label>
                            <input type="text" class="form-control" id="agama" name="agama"
                                value="{{ $data->agama }}" readonly>
                        </div>
                    </div>
                </div>
                <h5 class="card-title mb-4">B. Data Sekolah Asal</h5>
                <div class="form-group mt-4">
                    <label for="sekolah_asal">Sekolah Asal</label>
                    <input type="text" class="form-control" id="sekolah_asal" name="sekolah_asal"
                        value="{{ $data->sekolah_asal }}" required autofocus autocomplete="sekolah_asal" readonly>
                </div>
                <div class="form-group mt-4">
                    <label for="alamat_sekolah">Alamat Sekolah Asal</label>
                    <input type="text" class="form-control" id="alamat_sekolah" name="alamat_sekolah" required
                        autofocus autocomplete="sekolah_asal">
                </div>
                <h5 class="card-title mb-4">C. Data Orang Tua</h5>
                <div class="form-group mt-4">
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <label for="nama_ayah">Nama Ayah</label>
                            <input type="text" class="form-control" id="nama_ayah" name="nama_ayah"
                                value="{{ $data->nama_ayah }}" required autofocus autocomplete="nama_ayah" readonly>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <label for="wa_ayah">Nomor Whatsapp Ayah</label>
                            <input type="text" class="form-control" id="wa_ayah" name="wa_ayah"
                                value="{{ $data->wa_ayah }}" required autofocus autocomplete="wa_ayah"
                                onkeypress="return isNumberKey(event)" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-4">
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <label for="nama_ibu">Nama Ibu</label>
                            <input type="text" class="form-control" id="nama_ibu" name="nama_ibu"
                                value="{{ $data->nama_ibu }}" required autofocus autocomplete="nama_ibu" readonly>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <label for="wa_ibu">Nomor Whatsapp Ibu</label>
                            <input type="text" class="form-control" id="wa_ibu" name="wa_ibu"
                                value="{{ $data->wa_ibu }}" required autofocus autocomplete="wa_ibu"
                                onkeypress="return isNumberKey(event)" readonly>
                        </div>
                    </div>
                </div>
                <script>
                    function isNumberKey(evt) {
                        var charCode = (evt.which) ? evt.which : evt.keyCode;
                        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                            return false;
                        }
                        return true;
                    }
                </script>
                </form>

                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                <script>
                    function registrationConfirmation(event) {
                        event.preventDefault();

                        Swal.fire({
                            title: "Pastikan Data Anda Sudah Benar",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#28a745",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Download",
                            cancelButtonText: "Batal"
                        }).then((willDelete) => {
                            if (willDelete.isConfirmed) {
                                event.target.submit();
                            } else {
                                swal("Dibatalkan!");
                            }
                        });
                    }
                </script>

            </div>
        </div>
    </div>
@endsection
