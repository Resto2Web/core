<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="x-ua-compatible" content="ie=edge">
    {!! app('seotools')->generate() !!}

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="/images/logos/favicon.png">
    <link rel="stylesheet" href="{{ mix('/app/css/app.css') }}">
    @livewireStyles

</head>

<body class="">
@include('resto2web::app.layout.loader')
@include('resto2web::app.layout.header')
@yield('content')
@include('resto2web::app.layout.footer')
@livewireScripts

<script src="{{mix('/app/js/manifest.js')}}"></script>
<script src="{{mix('/app/js/vendor.js')}}"></script>
<script src="{{mix('/app/js/app.js')}}"></script>
<script src="https://kit.fontawesome.com/01333c9585.js" crossorigin="anonymous"></script>
@stack('scripts')
</body>
</html>
