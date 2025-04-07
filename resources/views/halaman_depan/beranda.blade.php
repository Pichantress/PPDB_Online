@extends('layouts.index')

@section('title', 'Pendaftaran Online Siswa Baru Bina Amal')

@section('main')
    <style>
        .rounded-box {
            padding: 4px;
            font-family: Poppins;
            font-size: 12pt;
            color: #ffffff;
            display: flex;
            justify-content: left;
            align-items: left;
            text-align: left;
            width: 100%;
            height: 200px;
            border-radius: 0px 0px 0px 0px;
            -webkit-border-radius: 0px 0px 0px 0px;
            -moz-border-radius: 0px 0px 0px 0px;
            background: #10b0d8;
            background: linear-gradient(327deg, #10b0d8 50%, #2fb187 80%);
            background: -webkit-linear-gradient(327deg, #10b0d8 50%, #2fb187 80%);
            background: -moz-linear-gradient(327deg, #10b0d8 50%, #2fb187 80%);
        }

        .text {
            font-family: Poppins;
            font-size: 16pt;
            color: #ffffff;
            text-align: left;
        }

        h1 {
            font-family: Poppins;
            font-size: 24pt;
            font-weight: bold;
            color: #ffffff;

        }

        h4 {
            font-family: Poppins;
            font-weight: normal;
            color: #ffffff;

        }
    </style>
    <section class="page-section">
        <div class="rounded-box">
            <div class="container">
                <div class="text">
                    <br />
                    <h1>Penerimaan Peserta Didik Baru SMPIT Bina Amal</h1>
                    <h4>Lembaga Pendidik Islam Terpadu Bina Amal Tahun Ajaran 2023/2024</h4>
                    <br />
                    <a class="btn btn-primary" href="/">Daftar Sekarang</a>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-7">
                <span class="bold" style="font-size:28px !important;">Selamat Datang di Website Resmi PPDB Bina Amal
                    Semarang</span>
                <hr class="border-t border-base-300" style="width:50%;">
            </div>
            <div class="col-md-6 col-sm-6" style="height: 400px; overflow-y: auto;">
                <div class="fes2-text-cont">
                    <p>Yayasan Wakaf Bina Amal adalah Lembaga dakwah yang menjadi bagian integral dari dakwah ummat,
                        untuk dapat
                        memberikan kontribusi positif kepada bangsa dan negara, terutama dalam melahirkan SDM
                        berkualitas yaitu
                        generasi mandiri yang memiliki karakter robbani. Fokus utama Yayasan Wakaf Bina Amal adalah
                        Bidang
                        Pendidikan.
                        <br>
                        Alhamdulillah, berkat rahmat Allah SWT, Yayasan Wakaf Bina Amal yang didirikan sejak tahun
                        2001,beralamat di
                        Jalan Kyai Saleh no.8 Mugasari Semarang Selatan, memiliki banyak unit Pendidikan yaitu kampus 1
                        ( PAUDIT
                        dan
                        SDIT Bina Amal), kampus 2 (SMPIT dan SMAIT Bina Amal yang menggunakan sistem pembelajaran
                        Boarding
                        scholl/asrama dalam Pondok Pesantren Tahfidz Bina Amal) ) , kampus 3 (TKIT dan SDIT Bina Amal
                        02) dan
                        kampus
                        4 (PAUDIT Bina Amal 03) dan kampus 5 (TKIT dan SDIT Bina Amal 04).
                    </p>
                    <p>
                        Bina Amal menjawab kebutuhan masyarakat yang mencari pendidikan terbaik buat putra putrinya yang
                        berkesinambungan dari jenjang PAUD hingga SMA. Dengan tenaga pengajar yang sebagian besar
                        terdiri dari
                        generasi muda yang memiliki semangat untuk terus belajar terlebih menghadapi tantangan revolusi
                        industri
                        4.0
                        dan society 5.0, maka Bina Amal siap menjadi bagian sebagai pelopor perubahan dan pembangun
                        peradaban
                        bangsa
                        Indonesia.
                    </p>

                </div>
            </div>
            <div class="col-md-6 col-sm-6" style="position: relative;">
                <img src="{{ asset('halaman_depan/assets/images') }}" alt="logo" class="logo-img"
                    style="max-height: 100%; object-fit: cover; width: 100%;">
            </div>
        </div>
        <section class="page-section">
            <div style="text-align: center;">
                <h1 class="bg-title">MENGAPA MEMILIH BINA AMAL</h1>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4 card mx-auto" style="text-align: center;">
                        <a class="btn-primary" href="#!"><i class="fa fa-3x fa-graduation-cap"
                                style="margin: 10px"></i></a>
                        <h3 class="card-title">LULUSAN</h3>
                        <div class="card-body">
                            Lulusan Sekolah Islam Terpadu Bina Amal diharapkan
                            1. Memiliki 10 Karakter Pribadi Muslim,
                            2. Mampu membaca al Qur’an dengan tartil dan hafal al Qur’an sesuai target di jenjangnya (di
                            PPTQ
                            Bina Amal ada program takhasus untuk menghafal 30 juz),
                            3.Mencapai ketuntasan belajar secara akademik,
                            4.Mengembangkan bakat dan minat dengan maksimal dan berprestasi
                            5.Memiliki kemampuan berbahasa Arab dan Inggris
                            6.Memiliki kematangan menghadapi tantangan masa depan, Menjadi calon pemimpin yang meiliki
                            IMTAQ,
                            IPTEK, dan berdaya saing
                            7.Menjadi pribadi religius yang berjiwa Pancasila dan mencintai NKRI.
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 card mx-auto" style="text-align: center;">
                        <a class="btn-primary" href="#!"><i class="fa fa-3x fa-home" style="margin: 10px"></i></a>
                        <h3 class="card-title">LINGKUNGAN</h3>
                        <div class="card-body">
                            Sekolah Islam Terpadu Bina Amal menghadirkan lingkungan yang Islami, kondusif untuk kegiatan
                            belajar
                            mengajar serta memenuhi prinsip K3( kebersihan, keindahan dan ketertiban).
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 card mx-auto" style="text-align: center;">
                        <a class="btn-primary" href="#!"><i class="fa fa-3x fa-child" style="margin: 10px"></i></a>
                        <h3 class="card-title">SDM</h3>
                        <div class="card-body">
                            Sumber Daya Manusia Bina Amal terdiri dari pengajar yang sesuai dengan kompetensinya yaitu
                            kompetensi paedagogik, kepribadian, sosial dan professional. Tenaga pengajar merupakan lulusan
                            dari
                            perguruan tinggi negeri dan swasta, jurusan pendidikan dan syariah, dengan jumlah yang memenuhi
                            kebutuhan siswa.
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 card mx-auto" style="text-align: center;">
                        <a class="btn-primary" href="#!"><i class="fa fa-3x fa-building" style="margin: 10px"></i></a>
                        <h3 class="card-title">FASILITAS</h3>
                        <div class="card-body">
                            Sekolah Islam Terpadu Bina Amal memiliki sarana prasarana yang memadai guna mendukung proses
                            pendidikan, yaitu ruang kelas ber LCD masjid, ruang UKS, Bina Mart/Kantin, Lapangan bermain,
                            Lapangan olahraga, laboratorium komputer, SSLC (Samsung Smart Learning Center), Laboratorium
                            IPA,
                            serta ruang kelas dengan fasilitas.
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 card mx-auto" style="text-align: center;">
                        <a class="btn-primary" href="#!"><i class="fa fa-3x fa-star" style="margin: 10px"></i></a>
                        <h3 class="card-title">KURIKULUM</h3>
                        <div class="card-body">
                            Kurikulum Bina Amal menggunakan kurikulum Nasional (K-13 dan kurikulum Merdeka), Kurikulum JSIT,
                            Kemenag dan ke khasan Bina Amal(Tahsin Metode Qiraati dan Tahfidz) dengan mengedepankan kualitas
                            dalam proses perencanaan dan pelaksanaannya.
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 card mx-auto" style="text-align: center;">
                        <a class="btn-primary" href="#!"><i class="fa fa-3x fa-lightbulb" style="margin: 10px"></i></a>
                        <h3 class="card-title">KEUNGGULAN</h3>
                        <div class="card-body">
                            Sekolah Islam Terpadu Bina Amal, memiliki beberapa program unggulan seperti penerapan Pendidikan
                            Karakter Islami melalui kegiatan Bina Pribadi Islam, pembelajaran Al-Qur’an dengan metode
                            Qiroati,
                            program Tahasus, dan program ekstrakurikuler baik itu akademik maupun non akademik.
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
 @endsection
