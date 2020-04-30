<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <div class="m-0 sidebar-logo">
        <a class="d-flex align-items-center justify-content-center" href="{{ route('admin.home') }}">
            <div class="sidebar-brand-icon">
                <img src="{{ asset('img/top_logo_transparent_background.png') }}" alt="" height="110px">
            </div>
        </a>
    </div>


    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ \Request::is('/') ? 'active' : '' }}">
        <a class="nav-link load" href="{{ route('admin.home') }}">
            <i class="fas fa-home"></i>
            <span>Home</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Gestão do site
    </div>

    <li class="nav-item {{ \Request::is('resume/profile*') ? 'active' : '' }}">
        <a class="nav-link load" href="{{ route('resume.profile') }}">
            <i class="fas fa-id-badge"></i>
            <span>Perfil</span>
        </a>
    </li>

    <li class="nav-item {{ \Request::is('resume/experience*') ? 'active' : '' }}">
        <a class="nav-link load" href="{{ route('experience.index') }}">
            <i class="fas fa-briefcase"></i>
            <span>Experiência</span>
        </a>
    </li>

    <li class="nav-item {{ \Request::is('resume/education*') ? 'active' : '' }}">
        <a class="nav-link load" href="{{ route('education.index') }}">
            <i class="fas fa-graduation-cap"></i>
            <span>Formação</span>
        </a>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
