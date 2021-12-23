<ul class="nav flex-column pt-3 pt-md-0">
    <li class="nav-item">
        <a href="{{ route('admin.index') }}" class="d-flex mb-3 align-items-center">
            {{--            <span class="sidebar-icon me-3">--}}
            {{--                <img src="{{ asset('images/brand/light.svg') }}" height="20" width="20" alt="Volt Logo">--}}
            {{--            </span>--}}
            <span class="mt-1 ms-1 sidebar-text">
                <h3 class="mb-0">Resto2Web</h3>
            </span>
        </a>
    </li>

    <li class="nav-item {{ request()->routeIs('admin.index') ? 'active' : '' }}">
        <a href="{{ route('admin.index') }}" class="nav-link">
            <span class="sidebar-icon fa-fw fa fa-home">
            </span>
            <span class="sidebar-text">{{ __('Dashboard') }}</span>
        </a>
    </li>
    @includeIf('resto2web-admin::menu-links')
    @include('resto2web-admin::links')
</ul>
