@extends('layouts.dashboard-layout')

@section('title', 'Registrant Dashboard - Upload Formulir')

@section('navItem')
    <li class="nav-item">
        <a class="nav-link collapsed" href="/formulir/{{ Auth::user()->id }}">
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
        @if ($data->status_id == 5)
            <div class="alert alert-danger">
                <strong>Kesalahan Data!</strong> Silahkan upload ulang formulir.
            </div>
        @elseif ($data->formulir_path)
            <div class="alert alert-success">
                <strong>Success!</strong> Formulir Berhasil diupload. Klik lihat formulir untuk melihatnya.
            </div>
        @elseif ($data->status_id==1)
            <div class="alert alert-warning">
                <strong>Warning!</strong> Upload Formulir yang sudah ditandatangani dan pastikan tipe file adalah
                pdf,jpg,jpeg,png.
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Upload Formulir</h4>
                @if (session('success'))
                    {{-- <div class="alert alert-success">
                        {{ session('success') }}
                    </div> --}}
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <form id="uploadForm" method="POST" action="{{ route('formulir.upload') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="formulir_upload">Upload Formulir yang Sudah Ditandatangani</label>
                        <input type="file" class="form-control" id="formulir_upload" name="formulir_upload" required>
                    </div>
                    <p
                        style="
                    line-height: 18.75pt;
                    background-color: #ffffff;
                ">
                        <span style="font-family: Poppins; font-size: 9pt; color: #c0392b">* Tipe File = pdf, jpg, jpeg,
                            png; Ukuran File max 5MB</span>
                    </p>
                    <div class="d-flex items-center justify-content-end mt-4">
                        <button type="submit" class="btn btn-success me-2">Upload</button>
                        <a href="{{ route('registrant', ['username' => Auth::user()->username]) }}"
                            class="btn btn-light">Kembali</a>
                    </div>
                </form>
                @if ($data->formulir_path)
                    <div class="row mt-4">
                        <div class="col-sm-4 col-md-4">
                            <b>Formulir</b>
                        </div>
                        <div class="col-sm-8 col-md-8">
                            : <a href="{{ Storage::url($data->formulir_path) }}" target="_blank">Lihat Formulir</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
