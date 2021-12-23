<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="x-ua-compatible" content="ie=edge">
    {!! app('seotools')->generate() !!}

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="/images/logos/favicon.png">
    <link rel="stylesheet" href="{{ mix('/css/theme1.css',"/vendor/theme1") }}">
    @livewireStyles

</head>

<body class="">
@include('resto2web::layout.loader')
@include('resto2web::layout.header')
@yield('content')
@include('resto2web::layout.footer')
@livewireScripts

<script src="{{mix('/js/manifest.js',"/vendor/theme1")}}"></script>
<script src="{{mix('/js/vendor.js',"/vendor/theme1")}}"></script>
<script src="{{mix('/js/theme1.js',"/vendor/theme1")}}"></script>
<script src="https://kit.fontawesome.com/01333c9585.js" crossorigin="anonymous"></script>
@stack('scripts')
</body>
</html>
