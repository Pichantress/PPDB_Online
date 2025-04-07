@extends('layouts.dashboard-layout')


@section('title', 'Registrant Dashboard - Pembayaran Registrasi')

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
                <h4 class="card-title mb-4">Silahkan Lakukan Pembayaran dengan cara :</h4>
                <div class="row mb-4">
                    <div class="col-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Cara</th>
                                    <th>Keterangan</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1. Transfer bank ke Bank Mandiri</td>
                                    <td>
                                        <b>No Rekening</b><br>
                                        135 00 677 77 555<br>
                                        <b>A.n Yayasan Wakaf Bina Amal-SMP</b>
                                    </td>
                                    <td>Rp. 250.733,-</td>
                                </tr>
                                <tr>
                                    <td>2. Membayar langsung ke BMT<br>
                                        1. BMT Anda pusat Jl.menoreh utara raya no.1 Rt4 Rw4 sampangan<br>
                                        2. BMT Anda kyai saleh Kampus bina amal kyai saleh, Jl.Kyai saleh no.8 mugasari
                                        semarang<br>
                                        3. BMT ANDA SMIT Jl.Raya Gunungpati-Ungaran KM 1.5 Kel.Plalangan Semarang<br>
                                        4. BMT ANDA Cab. HARAPAN BUNDA(HARBUN) Jl.Kh Thohir Gg. Sunan Kalijaga X
                                        Pedurungan,Penggaron Kidul Kota Semarang

                                    <td>
                                        <b>Keterangan</b><br>
                                        Hari Senin - Jum'at : Pukul 08.00 - 14.30 WIB<br>
                                        Hari Sabtu (pekan 1 & 2) : Pukul 08.00 - 11.00 WIB
                                    </td>
                                    <td>Rp. 250.733,-</td>
                                </tr>
                            </tbody>
                        </table>
                        <a class="btn btn-primary inline-flex items-center px-4 py-2  border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'"
                            href="/viewUpload/{{ $data->id }}">Upload Bukti Pembayaran</a>
                    </div>
                </div>
            </div>
        </div>
    @endsection
