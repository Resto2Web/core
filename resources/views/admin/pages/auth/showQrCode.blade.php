@extends('resto2web-admin::.layout.layout')
@section('breadcrumbs')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.settings.index') }}">Paramètres</a>
    </li>
    <li class="breadcrumb-item active">
        QR Code
    </li>
@endsection

@section('content')
    @include('resto2web-admin::.pages.settings.partials.topMenu')

    <div class="card">
        <div class="card-body">
            <img src="https://chart.googleapis.com/chart?cht=qr&chs=300x300&chl={{
    json_encode([
            'url' => $url
        ]) }}" class="img-fluid" alt="">
            <br>
            {{ $url }}
        </div>
    </div>

@endsection
