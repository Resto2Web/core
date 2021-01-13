@extends('resto2web-admin::app.layout.layout')
@section('breadcrumbs')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.settings.index') }}">Paramètres</a>
    </li>
    <li class="breadcrumb-item active">
        QR Code
    </li>
@endsection

@section('content')
    @include('resto2web-admin::app.pages.settings.partials.topMenu')

    <div class="card">
        <div class="card-body">
            <img src="{{ $qrCode->writeDataUri() }}" class="img-fluid" alt="">
            <br>
            {{ $url }}
        </div>
    </div>

@endsection
