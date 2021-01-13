@extends('resto2web-admin::auth.layout.auth')
@section('content')
    <div class="d-flex w-100" style="min-height: 100vh">
        <div class="container align-self-center">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card-group">
                        <div class="card p-4">
                            <div class="card-body">
                                <h1>{{ __('Login') }}</h1>
                                <p class="text-muted">Connectez-vous à votre compte Resto2Web</p>
                                    <a href="//resto2web.test/login/sso?sso=resto.test" class="btn btn-secondary">Me connecter</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
