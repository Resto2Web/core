<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 d-flex align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.index') }}"><i class="fa fa-home"></i> Dashboard</a>
                    </li>
                    @yield('breadcrumbs')
                </ol>
            </div>
            <div class="col-sm-6 text-right">
                @yield('subheader')
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
