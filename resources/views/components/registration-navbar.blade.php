<div class="navbar bg-white">
    <div class="flex-1">
        <img src="\assets\img\logo.png" alt="logo" width="250" class="logo-img"></img>
    </div>
    <div class="flex-none">
        <ul class="menu menu-horizontal px-1">
            <li><a href="https://ppdb.binaamal.sch.id/">Beranda</a></li>
            <li><a href="https://ppdb.binaamal.sch.id/panduan_ppdb/">Panduan PPDB</a></li>
            <li><a href="#">SITE LINK</a></li>
            <li><a href="https://ppdb.binaamal.sch.id/kontak_kami/">KONTAK KAMI</a></li>
            <li><a href="https://ppdb.binaamal.sch.id/unduh_brosur/">UNDUH BROSUR</a></li>
            {{-- <li><button class="btn btn-success" onclick="window.location.href = '{{ route('login') }}'">LOGIN</button></li> --}}
            <li><a href="{{ route('login') }}"><button class="btn btn-sm btn-success">Login</button></a></li>
        </ul>
    </div>
    {{-- <div class="flex-none gap-2">
        <div class="dropdown dropdown-end">
            <button class="btn btn-square btn-ghost">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    class="inline-block w-5 h-5 stroke-current">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>
            <ul tabIndex={0}
                class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-gray-800 text-white rounded-box w-52 m-6">
                <li>
                    <a href="https://ppdb.binaamal.sch.id/">BERANDA</a>
                </li>
                <li>
                    <a>PANDUAN PPDB</a>
                </li>
                <li>
                    <details>
                        <summary>SITE LINK</summary>
                        <ul class="p-2 text-lg">
                            <li>
                                <a>YAYASAN BINA AMAL</a>
                            </li>
                        </ul>
                    </details>
                </li>
                <li>
                    <a>KONTAK KAMI</a>
                </li>
                <li>
                    <a>UNDUH BROSUR</a>
                </li>
                <li>
                    <a>LOGIN</a>
                </li>
            </ul>
        </div> --}}
</div>
{{-- <div class="flex-none">
        <button class="btn btn-square btn-ghost">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                class="inline-block w-5 h-5 stroke-current">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </div> --}}
</div>
