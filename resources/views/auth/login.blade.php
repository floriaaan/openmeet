@extends('layouts.index')

@section('body')

    <div class="h-100 w-100 wall-white text-center mx-auto">

        <div class="p-5 mt-5">
            <form method="POST" action="{{ route('login') }}" class="form-signin">
                @csrf

                <a href="{{ url('/') }}" class="no-hover">
                    <img class="mb-4" src="/assets/logo.svg" alt="" width="72" height="72">
                </a>
                <h1 class="h3 mb-3 font-weight-normal">Connexion</h1>

                <label for="email" class="sr-only">{{ __('Adresse e-mail') }}</label>
                <input type="email" id="email" name="email"
                       class="form-control @error('email') is-invalid @enderror"
                       placeholder="{{ __('Adresse e-mail') }}" value="{{ old('email') }}" required
                       autofocus autocomplete="email">


                <label for="password" class="sr-only">{{ __('Mot de passe') }}</label>
                <input type="password" id="password" name="password"
                       class="form-control @error('email') is-invalid @enderror"
                       placeholder="{{ __('Mot de passe') }}" required value="{{ old('password') }}">

                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror

                <div class="form-check my-1 mt-3">
                    <input class="form-check-input" type="checkbox" name="remember"
                           id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Se souvenir de moi') }}
                    </label>
                </div>

                <button type="submit" class="btn btn-xl rounded-pill btn-primary mt-4">
                    {{ __('Connexion') }}
                </button>
                <div class="mt-3">
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('J\'ai oublié mon mot de passe') }}
                        </a>
                    @endif
                    @if (Route::has('register'))
                        <a class="btn btn-link" href="{{ route('register') }}">
                            {{ __('S\'inscrire') }}
                        </a>
                    @endif
                </div>

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
            max-width: 440px;
            padding: 15px;
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

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
@endsection
