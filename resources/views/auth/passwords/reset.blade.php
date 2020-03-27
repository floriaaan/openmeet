@extends('layouts.index')

@section('title')
    Réinitialisation du mot de passe
@endsection

@section('body')
    <div class="h-100 w-100 wall-white text-center">

        <div class="p-5">
            <form method="POST" action="{{ route('password.update') }}" class="form-signin">
                @csrf

                <a href="{{ url('/') }}" class="no-hover">
                    <img class="mb-4" src="/assets/logo.svg" alt="" width="72" height="72">
                </a>
                <h1 class="h3 mb-3 font-weight-normal">Réinitialiser le mot de passe</h1>
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <label for="email">{{ __('Adresse mail') }}</label>


                <input id="email" type="email"
                       class="form-control @error('email') is-invalid @enderror" name="email"
                       value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror


                <div class="form-group row mt-3">
                    <div class="col-lg-6">
                        <label for="password">{{ __('Mot de passe') }}</label>
                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror"
                               name="password" required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="col-lg-6">
                        <label for="password-confirm">{{ __('Confirmer le mot de passe') }}</label>

                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                               required autocomplete="new-password">

                    </div>


                </div>


                <button type="submit" class="btn btn-xl rounded-pill btn-primary mt-4">
                    {{ __('Réinitialiser') }}
                </button>

                <p class="mt-5 mb-3 text-muted">&copy; OpenMeet - 2020</p>
            </form>
        </div>
    </div>

@endsection
@section('css')

    <style>

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;

        }

        .h-100 {
            height: 100vh !important;
        }

        .form-signin {
            width: 100%;
            max-width: 720px;
            padding: 5px;
            margin: auto;
        }

        .form-signin .checkbox {
            font-weight: 400;
        }

        .form-signin .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }

        .form-signin .form-control:focus {
            z-index: 2;
        }

    </style>
@endsection
