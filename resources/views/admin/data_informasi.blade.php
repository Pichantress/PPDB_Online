@extends('layouts.dashboard-layout')

@section('title', 'Admin Dashboard - Informasi')

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
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tabel Informasi</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a class="btn btn-primary" href="/tambahInfo">Tambah Informasi</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Agenda</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->start_date)->translatedFormat('j F Y') }} - {{ \Carbon\Carbon::parse($item->end_date)->translatedFormat('j F Y') }}</td>
                                    <td>{{ $item->Agenda }}</td>
                                    {{-- <td><a href="/editInfo/{{ $item->id }}" class="btn btn-sm btn-warning">EDIT</a></td> --}}
                                    <td>
                                        <form onsubmit="return deleteConfirmation(event);" action="/hapusInfo/{{ $item->id }}" method="post">
                                            @csrf
                                            <button class="btn-sm btn-danger" type="submit">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    function deleteConfirmation(event) {
        event.preventDefault();

        Swal.fire({
            title: "Yakin hapus Data?",
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Hapus",
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
