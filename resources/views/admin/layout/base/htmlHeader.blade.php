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
