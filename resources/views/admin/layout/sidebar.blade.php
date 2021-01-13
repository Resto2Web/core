<aside class="main-sidebar sidebar-dark-primary">
    <a href="{{ route('admin.index') }}" class="brand-link d-flex align-items-center">
{{--        <img src="/images/logos/lynx.png" alt="" class="brand-image">--}}
        <i class="fa fa-hat-chef fa-2x brand-image"></i>
        <span class="brand-text font-weight-light "> Resto2Web</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2 ">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @includeIf('resto2web-admin::menu-links')
                @include('resto2web-admin::links')
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

