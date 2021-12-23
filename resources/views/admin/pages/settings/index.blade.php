@extends('resto2web-admin::layout.layout')
@section('breadcrumbs')
    <li class="breadcrumb-item active">
        Paramètres
    </li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card border-none">
                <div class="card-header">
                    <h5 class="card-title mb-0">Paramètres</h5>
                </div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action" href="{{ route('admin.settings.general') }}" role="button" >
                        <div class="d-flex align-items-center">
                            <div class="pr-3">
                                <h5>
                                    <i class="text-muted fa fa-fw fa-sliders fa-fw"></i>
                                </h5>
                            </div>
                            <div class="">
                                <h5>Paramètres généraux</h5>
                                <p class="mb-0"></p>
                            </div>
                        </div>
                    </a>
                    <a class="list-group-item list-group-item-action" href="{{ route('admin.settings.menu') }}" role="button" >
                        <div class="d-flex align-items-center">
                            <div class="pr-3">
                                <h5>
                                    <i class="text-muted fa fa-fw fa-sliders fa-fw"></i>
                                </h5>
                            </div>
                            <div class="">
                                <h5>Paramètres de menu & de commande</h5>
                                <p class="mb-0"></p>
                            </div>
                        </div>
                    </a>
                    <a class="list-group-item list-group-item-action" href="{{ route('admin.qrcode') }}" role="button" >
                        <div class="d-flex align-items-center">
                            <div class="pr-3">
                                <h5>
                                    <i class="text-muted fa fa-fw fa-qrcode fa-fw"></i>
                                </h5>
                            </div>
                            <div class="">
                                <h5>QR Code pour l'application</h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <br>


@endsection
