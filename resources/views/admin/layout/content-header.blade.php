<nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-light ps-0 pe-2 pb-0">
    <div class="container-fluid px-0">
        <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('home') }}" class="nav-link"><i class="fa fa-eye"></i> Voir le site</a>
                </li>
            </ul>
            <!-- Navbar links -->
            <ul class="navbar-nav align-items-center">

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        Support <i class="far fa-question-circle"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        SUPPORT CLIENT
                    </div>
                </li>
                <li class="nav-item dropdown ms-lg-3">
                    <a class="nav-link dropdown-toggle pt-1 px-0" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        <div class="media d-flex align-items-center">
                            <img class="avatar rounded-circle"
                                 src="{{ Auth::user()->avatar_url }}"
                                 alt="{{ Auth::user()->full_name }}">
                            <div class="media-body ms-2 text-dark align-items-center d-none d-lg-block">
                                <span class="mb-0 font-small fw-bold text-gray-900">{{ Auth::user()->full_name }}</span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dashboard-dropdown dropdown-menu-end mt-2 py-1">
                        <div role="separator" class="dropdown-divider my-1"></div>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <form method="POST" id="logout-form" action="{{ route('logout') }}">
                                @csrf
                            </form>
                            <i class="fa fa-sign-out dropdown-icon me-2"></i>
                            {{ __('Déconnexion') }}
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="row pt-3">
    <div class="col-sm-6 d-flex align-items-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.index') }}"><i class="fa fa-home"></i> Dashboard</a>
            </li>
            @yield('breadcrumbs')
        </ol>
    </div>
    <div class="col-sm-6 text-end">
        @yield('subheader')
    </div>
</div>
