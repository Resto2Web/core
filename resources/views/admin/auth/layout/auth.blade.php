<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="x-ua-compatible" content="ie=edge">
    {!! app('seotools')->generate() !!}

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="/images/logos/favicon.png">
    <link rel="stylesheet" href="{{ mix('css/admin.css','/vendor/admin') }}">
    @livewireStyles
</head>
<body class="bg-primary h-100" style="min-height: 100vh">
@yield('content')

<script src="{{ mix('js/manifest.js','/vendor/admin')}}"></script>
<script src="{{ mix('js/vendor.js','/vendor/admin')}}"></script>
<script src="{{ mix('js/admin.js','/vendor/admin')}}"></script>
<script src="https://kit.fontawesome.com/5573a6d434.js" crossorigin="anonymous"></script>

@livewireScripts
@notify_render
@stack('scripts')

</body>
</html>
