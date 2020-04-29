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
    <li class="nav-item {{ \Request::is('admin') ? 'active' : '' }}">
        <a class="nav-link load" href="{{ route('admin.home') }}">
            <i class="fas fa-home"></i>
            <span>Home</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Cadastros
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ \Request::is('admin/users*') ? 'active' : '' }}">

        <a class="nav-link {{ \Request::is('admin/users/*') ? '' : 'collapsed' }}" href="#" data-toggle="collapse"
            data-target="#collapseUsers" aria-expanded="true" aria-controls="collapseUsers">
            <i class="fas fa-users"></i>
            <span>Usuários</span>
        </a>

        <div id="collapseUsers" class="collapse {{ \Request::is('admin/users*') ? 'show' : '' }}"
            aria-labelledby="headingUsers" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                <h6 class="collapse-header">Cadastro de usuários:</h6>

                <a class="collapse-item load {{ \Request::is('admin/users*') ? 'active' : '' }}"
                    href="{{ route('admin.users') }}">
                    Todos
                </a>

                <a class="collapse-item load" href="#">
                    Novo
                </a>
            </div>
        </div>
    </li>


    <li class="nav-item {{ \Request::is('admin/resume/*') ? 'active' : '' }}">

        <a class="nav-link {{ \Request::is('admin/resume/*') ? '' : 'collapsed' }}" href="#" data-toggle="collapse"
            data-target="#collapseResume" aria-expanded="true" aria-controls="collapseResume">
            <i class="fas fa-file-alt"></i>
            <span>Currículo</span>
        </a>

        <div id="collapseResume" class="collapse {{ \Request::is('admin/resume/*') ? 'show' : '' }}"
            aria-labelledby="headingResume" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manutenção do Currículo:</h6>

                <a class="collapse-item load {{ \Request::is('admin/resume/profile*') ? 'active' : '' }}"
                    href="{{ route('resume.profile') }}">
                    Perfil
                </a>

                <a class="collapse-item load {{ \Request::is('admin/resume/experience*') ? 'active' : '' }}"
                    href="{{ route('experience.index') }}">
                    Experiência
                </a>

                <a class="collapse-item load {{ \Request::is('admin/resume/education*') ? 'active' : '' }}"
                    href="{{ route('education.index') }}">
                    Formação
                </a>

            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
