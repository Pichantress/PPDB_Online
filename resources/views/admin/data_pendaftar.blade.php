@extends('layouts.dashboard-layout')

@section('title', 'Admin Dashboard - Data Pendaftar')

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
        <h1 class="h3 mb-2 text-gray-800">Data Pendaftar</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List Pendaftar</h6>
            </div>
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
                <div class="accordion" id="accordionExample">
                    @foreach ($data as $year => $registrants)
                        <div class="card">
                            <div class="card-header" id="heading{{ $year }}">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapse{{ $year }}" aria-expanded="true"
                                        aria-controls="collapse{{ $year }}">
                                        Tahun Ajaran {{ $year }}
                                    </button>
                                </h2>
                            </div>

                            <div id="collapse{{ $year }}" class="collapse"
                                aria-labelledby="heading{{ $year }}" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Username</th>
                                                    <th>Nama</th>
                                                    <th>NIK</th>
                                                    <th>Action</th>
                                                    <th>Action</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($registrants as $item)
                                                    @php
                                                        $rowClass = '';
                                                        if ($item->status_id == 3) {
                                                            $rowClass = 'table-warning';
                                                        } elseif ($item->status_id == 4 || $item->status_id==6) {
                                                            $rowClass = 'table-success';
                                                        } elseif ($item->status_id == 5 || $item->status_id == 7) {
                                                            $rowClass = 'table-danger';
                                                        }
                                                    @endphp
                                                    <tr class="{{ $rowClass }}">
                                                        <td>{{ $item->username }}</td>
                                                        <td>{{ $item->name }}</td>
                                                        <td>{{ $item->nik }}</td>
                                                        <td><a href="/viewData/{{ $item->id }}"
                                                                class="btn btn-sm btn-primary">View</a></td>
                                                        <td><a href="/editData/{{ $item->id }}"
                                                                class="btn btn-sm btn-warning">Edit</a></td>
                                                        <td>
                                                            <form onsubmit="return deleteConfirmation(event);"
                                                                action="/hapusData/{{ $item->id }}" method="post">
                                                                @csrf
                                                                <button class="btn-sm btn-danger"
                                                                    type="submit">Hapus</button>
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
                    @endforeach
                </div>
                <div class="mt-4">
                    <h5>Keterangan Warna Tabel:</h5>
                    <ul>
                        <li><span class="badge badge-warning">Pending</span> - Menandakan bahwa data calon siswa
                            belum diverifikasi sepenuhnya.</li>
                        <li><span class="badge badge-success">Lulus</span> - Menandakan bahwa calon siswa dinyatakan lulus.
                        </li>
                        <li><span class="badge badge-danger">Rejected</span> - Menandakan bahwa terdapat kesalahan pada data calon siswa .</li>
                    </ul>
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
