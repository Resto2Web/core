<!doctype html>
<html lang="{{ app()->getLocale() }}">
@include('resto2web-admin::layout.base.htmlHeader')
<body class="">
@include('resto2web-admin::layout.header')
@include('resto2web-admin::layout.sidebar')
<div class="content">
    @include('resto2web-admin::layout.content-header')
    @yield('content')
    @include('resto2web-admin::layout.footer')
</div>
@include('resto2web-admin::layout.base.htmlFooter')
</body>
</html>
