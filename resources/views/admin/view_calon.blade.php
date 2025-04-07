@extends('layouts.dashboard-layout')

@section('title', 'Admin Dashboard - View Calon Siswa')

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
            <div class="card-header">Calon Siswa Page</div>
            <div class="card-body">
                <h4 class="card-title"><strong>{{ $data->username }}</strong></h4>
                <h5 class="card-title mb-4"><strong>A. Data Siswa</strong></h5>
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
                        <b>NIK</b>
                    </div>
                    <div class="col-sm-8 col-md-8">
                        : {{ $data->nik }}
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-4 col-md-">
                        <b>Jenis Kelamin</b>
                    </div>
                    <div class="col-sm-8 col-md-8">
                        : @if ($data->jenis_kelamin_id == 1)
                            Laki-laki
                        @elseif ($data->jenis_kelamin_id == 2)
                            Perempuan
                        @else
                            Tidak diketahui
                        @endif
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-4 col-md-">
                        <b>Agama</b>
                    </div>
                    <div class="col-sm-8 col-md-8">
                        : {{ $data->agama }}
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-4 col-md-">
                        <b>No. KK</b>
                    </div>
                    <div class="col-sm-8 col-md-8">
                        : {{ $data->no_kk }}
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-4 col-md-">
                        <b>No. Akta Kelahiran</b>
                    </div>
                    <div class="col-sm-8 col-md-8">
                        : {{ $data->no_akta_kelahiran }}
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-4 col-md-">
                        <b>Tanggal Lahir</b>
                    </div>
                    <div class="col-sm-8 col-md-8">
                        : {{ \Carbon\Carbon::parse($data->tanggal_lahir)->translatedFormat('j F Y') }}
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-4 col-md-4">
                        <b>Sekolah Asal</b>

                    </div>
                    <div class="col-sm-8 col-md-8">
                        : {{ $data->sekolah_asal }}
                    </div>
                </div>
                <br>
                <h5 class="card-title mb-4"><strong>B. Data Alamat</strong></h5>
                <div class="row mt-4">
                    <div class="col-sm-4 col-md-4">
                        <b>Alamat Lengkap</b>

                    </div>
                    <div class="col-sm-8 col-md-8">
                        : {{ $data->alamat }}
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-4 col-md-4">
                        <b>Kabupaten</b>

                    </div>
                    <div class="col-sm-8 col-md-8">
                        : {{ $data->kabupaten }}
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-4 col-md-4">
                        <b>Kecamatan</b>

                    </div>
                    <div class="col-sm-8 col-md-8">
                        : {{ $data->kecamatan }}
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-4 col-md-4">
                        <b>Kelurahan</b>

                    </div>
                    <div class="col-sm-8 col-md-8">
                        : {{ $data->kelurahan }}
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-4 col-md-4">
                        <b>Kode Pos</b>

                    </div>
                    <div class="col-sm-8 col-md-8">
                        : {{ $data->kode_pos }}
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-4 col-md-4">
                        <b>RT</b>

                    </div>
                    <div class="col-sm-8 col-md-8">
                        : {{ $data->rt }}
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-4 col-md-4">
                        <b>RW</b>

                    </div>
                    <div class="col-sm-8 col-md-8">
                        : {{ $data->rw }}
                    </div>
                </div>
                <br>
                <h5 class="card-title mb-4"><strong>C. Data Orang Tua</strong></h5>
                <div class="row mt-4">
                    <div class="col-sm-4 col-md-4">
                        <b>Nama Ayah</b>

                    </div>
                    <div class="col-sm-8 col-md-8">
                        : {{ $data->nama_ayah }}
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-4 col-md-4">
                        <b>Nomor WA Ayah</b>

                    </div>
                    <div class="col-sm-8 col-md-8">
                        : {{ $data->wa_ayah }}
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-4 col-md-4">
                        <b>Nama Ibu</b>

                    </div>
                    <div class="col-sm-8 col-md-8">
                        : {{ $data->nama_ibu }}
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-4 col-md-4">
                        <b>Nomor WA Ibu</b>

                    </div>
                    <div class="col-sm-8 col-md-8">
                        : {{ $data->wa_ibu }}
                    </div>
                </div>
                <br>
                <h5 class="card-title mb-4"><strong>D. View Berkas</strong></h5>
                @if ($data->akta_kelahiran)
                    <div class="row mt-4">
                        <div class="col-sm-4 col-md-4">
                            <b>Akta Kelahiran</b>
                        </div>
                        <div class="col-sm-8 col-md-8">
                            : <a href="{{ Storage::url($data->akta_kelahiran) }}" target="_blank">View Akta Kelahiran</a>
                        </div>
                    </div>
                @endif

                @if ($data->kartu_keluarga)
                    <div class="row mt-4">
                        <div class="col-sm-4 col-md-4">
                            <b>Kartu Keluarga</b>
                        </div>
                        <div class="col-sm-8 col-md-8">
                            : <a href="{{ Storage::url($data->kartu_keluarga) }}" target="_blank">View Kartu Keluarga</a>
                        </div>
                    </div>
                @endif
                @if ($data->formulir_path)
                    <div class="row mt-4">
                        <div class="col-sm-4 col-md-4">
                            <b>Uploaded Formulir</b>
                        </div>
                        <div class="col-sm-8 col-md-8">
                            : <a href="{{ Storage::url($data->formulir_path) }}" target="_blank">View Formulir</a>
                        </div>
                    </div>
                @endif
            </div>
            <div class="card-footer d-flex justify-content-end">
                <form onsubmit="return verificationConfirmation(event);"
                    action="{{ route('diterima', ['id' => $data->id]) }}" method="post">
                    @csrf
                    <button class="btn btn-md btn-success">Terima</button>
                    <a href="/dataCalon" class="btn btn-light">Kembali</a>
                </form>
                <form id="rejectedForm" action="{{ route('ditolak', ['id' => $data->id]) }}" method="post"
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
                confirmButtonText: "Terima",
                cancelButtonText: "Tolak"
            }).then((result) => {
                if (result.isConfirmed) {
                    event.target.submit();
                } else {
                    document.getElementById('rejectedForm').submit();
                }
            });
        }
    </script>
@endsection
