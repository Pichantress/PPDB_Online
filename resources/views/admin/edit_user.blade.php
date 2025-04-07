@extends('layouts.dashboard-layout')

@section('title', 'Admin Dashboard - Edit Admin')

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
                <h4 class="card-title mb-4">Edit data Admin</h4>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="forms-sample" method="POST" action="/editUser">
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
                        <label for="password">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password" required autofocus
                                autocomplete="password">
                            <button type="button" id="togglePassword" class="btn btn-outline-secondary">
                                <i class="fas fa-eye" id="eyeIcon"></i>
                            </button>
                        </div>
                    </div>
                    <script>
                        document.getElementById("togglePassword").addEventListener("click", function() {
                            const passwordInput = document.getElementById("password");
                            if (passwordInput.type === "password") {
                                passwordInput.type = "text";
                            } else {
                                passwordInput.type = "password";
                            }
                        });
                    </script>
                    <button type="submit" class="btn btn-primary me-2">Edit</button>
                    <a href="/admin" class="btn btn-light">Kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection
