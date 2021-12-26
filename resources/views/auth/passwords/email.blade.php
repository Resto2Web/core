@extends('resto2web::.layout.auth-layout')

@section('content')
    <div class="c-app flex-row align-items-center text-dark">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="card col-md-6">
                    <div class="card-body">
                        <h1 class="text-dark h3">{{ __('Reset Password') }}</h1>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}" class="form-validate">
                            @csrf
                            @honeypot

                            <div class="mb-3">
                                <label for="email" class="">{{ __('E-Mail Address') }}</label>

                                <div class="">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           name="email" value="{{ old('email') }}" required autocomplete="email"
                                           autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 mb-0">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
