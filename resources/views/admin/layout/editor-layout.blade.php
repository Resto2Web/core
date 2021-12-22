<!doctype html>
<html lang="{{ app()->getLocale() }}">
@include('resto2web-admin::layout.base.htmlHeader')
<body class="h-100">
@yield('content')
@include('resto2web-admin::layout.base.htmlFooter')
</body>
</html>
