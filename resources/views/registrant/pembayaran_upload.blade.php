@extends('layouts.dashboard-layout')

@section('title', 'Registrant Dashboard - Upload Bukti Pembayaran')

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
        <div class="card">
            @if ($data->status_id == 7)
                <div class="alert alert-danger">
                    <strong>Kesalahan Data!</strong> Silahkan upload ulang bukti pembayaran.
                </div>
            @elseif ($data->bukti_pembayaran_path)
                <div class="alert alert-success">
                    <strong>Success!</strong> Formulir Berhasil diupload. Klik lihat bukti pembayaran untuk melihatnya.
                </div>
            @else
                <div class="alert alert-warning">
                    <strong>Warning!</strong> Upload bukti pembayaran dan pastikan tipe file adalah
                    jpg,jpeg,png.
                </div>
            @endif
            <div class="card-body">
                <h4 class="card-title mb-4">Upload Bukti Pembayaran</h4>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="forms-sample" method="POST" action="{{ route('uploadBukti', ['id' => $data->id]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <div class="form-group">
                        <label for="username">username</label>
                        <input type="text" class="form-control" id="username" name="username"
                            value="{{ $data->username }}" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Name</label>
                        <input type="text" class="form-control" id="nama" name="name" value="{{ $data->name }}"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Upload Bukti Pembayaran</label>
                        <input type="file" class="form-control" id="payment" name="payment" required>
                    </div>
                    <p
                        style="
                    line-height: 18.75pt;
                    background-color: #ffffff;
                ">
                        <span style="font-family: Poppins; font-size: 9pt; color: #c0392b">* Tipe File = pdf, jpg, jpeg,
                            png; Ukuran File max 5MB</span>
                    </p>
                    <button type="submit" class="btn btn-success me-2">Upload</button>
                    <a href="{{ route('registrant', ['username' => Auth::user()->username]) }}"
                        class="btn btn-light">Kembali</a>
                </form>
                @if ($data->bukti_pembayaran_path)
                    <div class="row mt-4">
                        <div class="col-sm-4 col-md-4">
                            <b>Bukti Pembayaran</b>
                        </div>
                        <div class="col-sm-8 col-md-8">
                            : <a href="{{ Storage::url($data->bukti_pembayaran_path) }}" target="_blank">Lihat
                                Bukti Pembayaran</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
