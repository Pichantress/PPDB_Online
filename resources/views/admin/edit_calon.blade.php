@extends('layouts.dashboard-layout')

@section('title', 'Admin Dashboard - Edit Calon')

@section('navItem')
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('datainformasi') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Informasi</span>
        </a>
        <a class="nav-link collapsed" href="{{ route('datapendaftar') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data Pendaftar</span>
        </a>
        <a class="nav-link collapsed" href="{{ route('dataPembayaran') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pembayaran</span>
        </a>
        <a class="nav-link collapsed" href="{{ route('datacalon') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data Calon Siswa</span>
        </a>
        <a class="nav-link collapsed" href="{{ route('datasiswa') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data Siswa</span>
        </a>
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
                <h4 class="card-title mb-4">Edit data calon siswa</h4>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="forms-sample" method="POST" action="/editCalon">
                    @csrf
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <div class="form-group">
                        <label for="username">username</label>
                        <input type="text" class="form-control" id="username" name="username"
                            value="{{ $data->username }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama">Name</label>
                        <input type="text" class="form-control" id="nama" name="name" value="{{ $data->name }}"
                            required>
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
                        <input type="text" class="form-control" id="wa_ayah" name="wa_ayah" disabled
                            value="{{ $data->wa_ayah }}" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_ibu">Nama Ibu</label>
                        <input type="text" class="form-control" id="nama_ibu" name="nama_ibu"
                            value="{{ $data->nama_ibu }}" required>
                    </div>
                    <div class="form-group">
                        <label for="wa_ibu">Nomor Whatsapp Ibu</label>
                        <input type="text" class="form-control" id="wa_ibu" name="wa_ibu" disabled
                            value="{{ $data->wa_ibu }}" required>
                    </div>
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik"
                            value="{{ $data->nik }}" onkeypress="return isNumberKey(event)" required>
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
                        <label for="no_kk">No. KK</label>
                        <input type="text" class="form-control" id="no_kk" name="no_kk"
                            value="{{ $data->no_kk }}" onkeypress="return isNumberKey(event)" required>
                    </div>
                    <div class="form-group">
                        <label for="no_akta_kelahiran">No. Akta Kelahiran</label>
                        <input type="text" class="form-control" id="no_akta_kelahiran" name="no_akta_kelahiran"
                            value="{{ $data->no_akta_kelahiran }}" onkeypress="return isNumberKey(event)" required>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Edit</button>
                    <a href="/dataCalon" class="btn btn-light">Kembali</a>
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
            </div>
        </div>
    </div>
@endsection
