@extends('app.layouts.auth-layout')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center text-dark">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body py-5 justify-content-center d-flex text-center">
                        <div class="col-md-8">
                            <h1 class="h3">Créer un compte</h1>
                            <p>Créez un compte dès maintenant pour récolter des points et profiter de nos récompenses !</p>
                            <form method="POST" action="{{ route('register') }}" class="form-validate">
                                @include('admin.layout.alerts')
                                @csrf
                                @honeypot
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name" class="sr-only col-form-label text-md-right">{{ __('Name') }}</label>
                                            <div class="">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text">
                                            <i class="fa fa-user"></i>
                                        </span></div>
                                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name',$name ?? '') }}" required autocomplete="name" autofocus placeholder="Nom">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="email" class="col-md-4 col-form-label sr-only text-md-right">{{ __('E-Mail Address') }}</label>

                                            <div class="">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text">
                                            <i class="fa fa-envelope"></i>
                                        </span></div>
                                                    <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email',$email ?? '') }}" required autocomplete="email">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="password" class="sr-only col-form-label text-md-right">{{ __('Password') }}</label>
                                            <div class="">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text">
                                            <i class="fa fa-lock"></i>
                                        </span></div>
                                                    <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password" placeholder="{{ __('Password') }}">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="password-confirm" class="sr-only col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text">
                                            <i class="fa fa-check-double"></i>
                                        </span></div>
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" equalTo="#password" required autocomplete="new-password">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-0">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-12 py-1">
                                        <a href="{{ route('social-login','facebook') }}" class="btn btn-block btn-facebook">S'inscrire avec Facebook</a>
                                    </div>
                                    <div class="col-12 py-1">
                                        <a href="{{ route('social-login','google') }}" class="btn btn-block btn-google">S'inscrire avec Google</a>
                                    </div>
                                </div>
                            </form>
                            <div class="row text-center">
                                <div class="col-12">
                                    <hr>
                                    <a href="{{ route('login') }}" class="py-2">Me connecter</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
