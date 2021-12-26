@extends('resto2web::.layout.auth-layout')
@section('content')
    <div class="c-app flex-row align-items-center text-dark py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card-group">
                        <div class="card p-4">
                            <div class="card-body bg-white text-center">
                                <h1>{{ __('Login') }}</h1>
                                                                @include('resto2web::.layout.alerts')
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <form method="POST" action="{{ route('login') }}" class="form-validate">
                                            @csrf
                                            @honeypot
                                            <div class="mb-3">
                                                <div class="input-group">
                                                    <label for="email" class="sr-only">{{__('Email')}}</label>
                                                    <div class="input-group-prepend"><span class="input-group-text">
                                            <i class="fa fa-user"></i>
                                        </span></div>
                                                    <input class="form-control" id="email" type="email" name="email" required placeholder="{{__('Email')}}">
                                                </div>
                                            </div>
                                            <div class="mb-3">

                                                <div class="input-group ">
                                                    <label for="password" class="sr-only">{{__('Password')}}</label>
                                                    <div class="input-group-prepend"><span class="input-group-text">
                                            <i class="fa fa-lock"></i>
                                        </span></div>
                                                    <input class="form-control" id="password" type="password" required name="password" placeholder="{{__('Password')}}">
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" {{ old('remember') ? 'checked' : '' }} class="custom-control-input" id="remember" name="remember">
                                                    <label class="custom-control-label" for="remember">{{ __('Remember Me') }}</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <button class="btn btn-primary btn-block" type="submit">{{ __('Login') }}</button>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row text-center">
                                                <div class="col-12">
                                                    <a href="{{ route('password.request') }}" class="mb-3 small">Mot de passe oublié?</a>
                                                </div>
                                                <div class="col-12">
                                                    <a href="{{ route('register') }}" class="">Créer un compte</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
