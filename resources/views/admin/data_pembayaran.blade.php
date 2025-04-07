@extends('layouts.dashboard-layout')

@section('title', 'Admin Dashboard - View Pembayaran')

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
            <div class="card-header">Detail Pembayaran</div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <h5 class="card-title">{{ $data->username }}</h5>
                <div class="row mt-4">
                    <div class="col-sm-4 col-md-">
                        <b>Nama</b>
                    </div>
                    <div class="col-sm-8 col-md-8">
                        : {{ $data->name }}
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-4 col-md-">
                        <b>Tanggal Upload</b>
                    </div>
                    <div class="col-sm-8 col-md-8">
                        : {{ \Carbon\Carbon::parse($data->tanggal_upload)->translatedFormat('j F Y') }}
                    </div>
                </div>
                
                @if ($data->file_path)
                    <div class="row mt-4">
                        <div class="col-sm-4 col-md-4">
                            <b>Bukti Pembayaran</b>
                        </div>
                        <div class="col-sm-8 col-md-8">
                            : <a href="{{ Storage::url($data->file_path) }}" target="_blank">View
                                Bukti Pembayaran</a>
                        </div>
                    </div>
                @else
                    Tidak ada bukti pembayaran
                @endif
            </div>
            <div class="card-footer d-flex justify-content-end">
                <form onsubmit="return verificationConfirmation(event);"
                    action="{{ route('markAsAccepted', ['id' => $data->registrant_id]) }}" method="post">
                    @csrf
                    <button class="btn btn-md btn-success">Verifikasi</button>
                    <a href="/dataPembayaran" class="btn btn-light">Kembali</a>
                </form>
                <form id="RejectedForm" action="{{ route('markAsRejected', ['id' => $data->registrant_id]) }}" method="post"
                    style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        function verificationConfirmation(event) {
            event.preventDefault();

            Swal.fire({
                title: "Verified Data?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#28a745",
                cancelButtonColor: "#d33",
                confirmButtonText: "Verified",
                cancelButtonText: "Not Verified"
            }).then((result) => {
                if (result.isConfirmed) {
                    event.target.submit();
                } else {
                    document.getElementById('RejectedForm').submit();
                }
            });
        }
    </script>
@endsection
