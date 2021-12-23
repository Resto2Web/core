<!doctype html>
<html lang="{{ app()->getLocale() }}">
@include('resto2web-admin::layout.base.htmlHeader')
<body class="bg-primary h-100" style="min-height: 100vh">
@yield('content')
@include('resto2web-admin::layout.base.htmlFooter')
</body>
</html>
