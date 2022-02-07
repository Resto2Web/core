<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="x-ua-compatible" content="ie=edge">
    {!! app('seotools')->generate() !!}

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="/images/logos/favicon.png">
    <link rel="stylesheet" href="{{ mix('/css/theme1.css',"/vendor/".$theme) }}">
    @livewireStyles
    <style>
        :root {
         --bs-primary: {{ app(\Resto2web\Core\Settings\ThemeSettings::class)->primary_color }};
         --bs-primary-rgb: {{ implode(', ',sscanf(app(\Resto2web\Core\Settings\ThemeSettings::class)->primary_color, "#%02x%02x%02x")) }};
         --bs-secondary: {{ app(\Resto2web\Core\Settings\ThemeSettings::class)->secondary_color }};
         --bs-secondary-rgb: {{ implode(', ',sscanf(app(\Resto2web\Core\Settings\ThemeSettings::class)->secondary_color, "#%02x%02x%02x")) }};
        }
    </style>

</head>

<body class="">
@include('resto2web::layout.loader')
@include('resto2web::layout.header')
@yield('content')
@include('resto2web::layout.footer')
@livewireScripts

<script src="{{mix('/js/manifest.js',"/vendor/{$theme}")}}"></script>
<script src="{{mix('/js/vendor.js',"/vendor/{$theme}")}}"></script>
<script src="{{mix("/js/{$theme}.js","/vendor/{$theme}")}}"></script>
<script src="https://kit.fontawesome.com/01333c9585.js" crossorigin="anonymous"></script>
@stack('scripts')
</body>
</html>
