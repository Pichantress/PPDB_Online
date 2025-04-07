<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Nav Item - Dashboard for Admin -->
    @if(Auth::user()->usertype === 'admin')
        <li class="nav-item active">
            <a class="nav-link" href="/admin">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

    <!-- Nav Item - Dashboard for Registrant -->
    @elseif(Auth::user()->usertype === 'registrant')
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('registrant', ['username' => Auth::user()->username]) }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Nav Item - Pages Collapse Menu -->
    @yield('navItem')

</ul>
<!-- End of Sidebar -->
