@extends('resto2web-admin::app.layout.layout')
@section('breadcrumbs')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.settings.index') }}">Paramètres</a>
    </li>
    <li class="breadcrumb-item active">
        Paramètres généraux
    </li>
@endsection

@section('content')
    @include('resto2web-admin::app.pages.settings.partials.topMenu')
    <form action="{{ route('admin.settings.general') }}" method="post" class="form-validate">
        @method("PATCH")
        @csrf
        @include('resto2web-admin::app.layout.alerts')

        <div class="row">
            <div class="col-md-6">

                <div class="card">
                    <div class="card-header">
                        <h4>Paramètres généraux</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            {!! Form::label('email','Email du restaurant') !!}
                            {!! Form::email('email',$settings->email, ['class'=> 'form-control','required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('phoneNumber','Numéro de téléphone du restaurant') !!}
                            {!! Form::text('phoneNumber',$settings->phoneNumber, ['class'=> 'form-control']) !!}
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Enregister les modifications</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">

                <div class="card">
                    <div class="card-header">
                        <h4>Liens sociaux</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            {!! Form::label('email','Email du restaurant') !!}
                            {!! Form::text('email',$settings->facebook_url, ['class'=> 'form-control']) !!}
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Enregister les modifications</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
