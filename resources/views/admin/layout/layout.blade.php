<!doctype html>
<html lang="{{ app()->getLocale() }}">
@include('resto2web-admin::layout.base.htmlHeader')
<body class="hold-transition layout-fixed sidebar-mini">
<div class="wrapper">
    @include('resto2web-admin::.layout.header')
    @include('resto2web-admin::.layout.sidebar')
    <div class="content-wrapper">
        @include('resto2web-admin::.layout.content-header')
        <section class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
    </div>
    @include('resto2web-admin::.layout.footer')
</div>
@include('resto2web-admin::layout.base.htmlFooter')
</body>
</html>
