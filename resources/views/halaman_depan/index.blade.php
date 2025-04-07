@extends('layouts.index')

@section('title', 'Alur Pendaftaran - Pendaftaran Online Siswa Baru Bina Amal')

@section('main')
    <style>
        .tab-content {
            display: none;
        }

        .active-tab {
            display: block;
        }
    </style>
    <!-- Masthead-->
    @include('components.halaman_utama/header')
    <section class="page-section ">
        <div
            class="container bg-white bg-white shadow-sm sm:rounded-lg overflow-hidden border border-solid border-base-300 p-3 ">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <ul>
                        <li>{{ Session::get('success') }}</li>
                    </ul>
                </div>
            @endif
            @include('components/registration-tab')
            <hr class="w-full border-t border-base-300">
            <div>
                {{-- <p>{{ $registrationStatus }}</p>
                @if (!$registrationClosed) --}}
                {{-- <div class="alert alert-danger" role="alert">
                        Pendaftaran telah ditutup.
                    </div> --}}
                {{-- @else --}}
                @if ($registrationStatus == 'Pendaftaran belum dibuka')
                    <div class="alert alert-warning" role="alert">
                        {{ $registrationStatus }}
                    </div>
                @elseif($registrationClosed)
                    <div class="alert alert-danger" role="alert">
                        Pendaftaran telah ditutup.
                    </div>
                @elseif(!$registrationClosed)
                    <div id="regisForm" class="tab-content active-tab">
                        @include('components/registration-form')
                    </div>
                @endif
                <div id='regisInform' class="tab-content">
                    @include('components/halaman_utama/informTab')
                </div>
                <div id='syaratRegis' class="tab-content">
                    @include('components/halaman_utama/syaratRegis')
                </div>
                <div id='biaya' class="tab-content">
                    @include('components/halaman_utama/biaya')
                </div>
                <div id='kontak' class="tab-content">
                    @include('components/halaman_utama/kontak')
                </div>
                <div id='unitLain' class="tab-content">
                    @include('components/halaman_utama/unitLain')
                </div>
            </div>
        </div>
    </section>
@endsection
