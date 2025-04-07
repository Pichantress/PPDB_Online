@extends('layouts.dashboard-layout')

@section('title', 'Registrant Dashboard - Edit Data')

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
        @if ($data->status_id == 1 || $data->status_id==2 || $data->status_id == 5)
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
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="card-title mb-4">Edit Profil</h4>
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
                <form class="forms-sample" method="POST" action="/editAcc">
                    @csrf
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username"
                            value="{{ $data->username }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama">Name</label>
                        <input type="text" class="form-control" id="nama" name="name" value="{{ $data->name }}"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin_id">Jenis Kelamin</label>
                        <select name="jenis_kelamin_id" id="jenis_kelamin_id" class="form-control" required>
                            <option value="1" {{ $data->jenis_kelamin_id == 1 ? 'selected' : '' }}>Laki-Laki
                            </option>
                            <option value="2" {{ $data->jenis_kelamin_id == 2 ? 'selected' : '' }}>Perempuan
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik"
                            value="{{ $data->nik }}" onkeypress="return isNumberKey(event)" required>
                    </div>
                    <div class="form-group">
                        <label for="agama">Agama</label>
                        <input type="text" class="form-control" id='agama' name='agama' value="islam" readonly>
                                {{-- <div class="radio">
                                    <label>
                                        <input type="radio" name="agama" value="islam"> Islam
                                    </label>
                                </div> --}}
                    </div>
                    <div class="form-group">
                        <label for="no_kk">No. KK</label>
                        <input type="text" class="form-control" id="no_kk" name="no_kk"
                            value="{{ $data->no_kk }}" onkeypress="return isNumberKey(event)" required >
                    </div>
                    <div class="form-group">
                        <label for="no_akta_kelahiran">No. Akta Kelahiran</label>
                        <input type="text" class="form-control" id="no_akta_kelahiran" name="no_akta_kelahiran"
                            value="{{ $data->no_akta_kelahiran }}" onkeypress="return isNumberKey(event)" required >
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                            value="{{ $data->tempat_lahir }}" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                            value="{{ $data->tanggal_lahir }}" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat Lengkap</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $data->alamat }}"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="kabupaten">Kabupaten</label>
                        <input type="text" class="form-control" id="kabupaten" name="kabupaten"
                            value="{{ $data->kabupaten }}" required>
                    </div>
                    <div class="form-group">
                        <label for="kecamatan">Kecamatan</label>
                        <input type="text" class="form-control" id="kecamatan" name="kecamatan"
                            value="{{ $data->kecamatan }}" required>
                    </div>
                    <div class="form-group">
                        <label for="kelurahan">Kelurahan</label>
                        <input type="text" class="form-control" id="kelurahan" name="kelurahan"
                            value="{{ $data->kelurahan }}" required>
                    </div>
                    <div class="form-group">
                        <label for="kode_pos">Kode Pos</label>
                        <input type="text" class="form-control" id="kode_pos" name="kode_pos"
                            value="{{ $data->kode_pos }}" required>
                    </div>
                    <div class="form-group">
                        <label for="rw">RW</label>
                        <input type="text" class="form-control" id="rw" name="rw"
                            value="{{ $data->rw }}" required>
                    </div>
                    <div class="form-group">
                        <label for="rt">RT</label>
                        <input type="text" class="form-control" id="rt" name="rt"
                            value="{{ $data->rt }}" required>
                    </div>
                    <div class="form-group">
                        <label for="sekolah_asal">Sekolah Asal</label>
                        <input type="text" class="form-control" id="sekolah_asal" name="sekolah_asal"
                            value="{{ $data->sekolah_asal }}" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_ayah">Nama Ayah</label>
                        <input type="text" class="form-control" id="nama_ayah" name="nama_ayah"
                            value="{{ $data->nama_ayah }}" required>
                    </div>
                    <div class="form-group">
                        <label for="wa_ayah">Nomor Whatsapp Ayah</label>
                        <input type="text" class="form-control" id="wa_ayah" name="wa_ayah" 
                            value="{{ $data->wa_ayah }}"  onkeypress="return isNumberKey(event)" required > 
                    </div>
                    <div class="form-group">
                        <label for="nama_ibu">Nama Ibu</label>
                        <input type="text" class="form-control" id="nama_ibu" name="nama_ibu"
                            value="{{ $data->nama_ibu }}" required >
                    </div>
                    <div class="form-group">
                        <label for="wa_ibu">Nomor Whatsapp Ibu</label>
                        <input type="text" class="form-control" id="wa_ibu" name="wa_ibu" 
                            value="{{ $data->wa_ibu }}"  onkeypress="return isNumberKey(event)" required >
                    </div>
                    
                    
                    
                    <button type="submit" class="btn btn-primary me-2">Edit</button>
                    <a href="/registrant" class="btn btn-light">Kembali</a>
                </form>

                <script>
                    function isNumberKey(evt) {
                        var charCode = (evt.which) ? evt.which : evt.keyCode;
                        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                            return false;
                        }
                        return true;
                    }
                </script>

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
