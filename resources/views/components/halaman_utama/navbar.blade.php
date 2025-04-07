<nav class="navbar bg-white navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('halaman_depan/assets/logo.png') }}" alt="logo" width="250" class="logo-img"></img>
        </a>
        <button class="navbar-toggler text-uppercase font-weight-bold bg-white text-white rounded" type="button"
            data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive"
            aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars fa-lg text-black"></i>
        </button>
        <div class="collapse navbar-collapse text-white" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                        href="/beranda">BERANDA</a></li>
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                        href="/lokasi">LOKASI</a></li>
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                        href="/">PENDAFTARAN</a></li>
                <li class="nav-item mx-0 mx-lg-1">
                    @guest
                        <a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('auth') }}">Login</a>
                    @endguest
                </li>
            </ul>
        </div>
    </div>
</nav>
