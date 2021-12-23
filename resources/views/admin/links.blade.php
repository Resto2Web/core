<li class="nav-item {{ request()->routeIs('admin.settings.index') ? 'active' : '' }}">
    <a href="{{ route('admin.settings.index') }}" class="nav-link">
            <span class="sidebar-icon fa-fw fa fa-cogs">
            </span>
        <span class="sidebar-text">Paramètres</span>
    </a>
</li>
<li class="nav-item {{ request()->routeIs('admin.theme.index') ? 'active' : '' }}">
    <a href="{{ route('admin.theme.index') }}" class="nav-link">
            <span class="sidebar-icon fa-fw fa fa-paint-brush">
            </span>
        <span class="sidebar-text">Thème</span>
    </a>
</li>

