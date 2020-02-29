@extends('layouts.index')

@section('body')
    <div class="max-height wall-white text-center">

        <form method="POST" action="{{ route('register') }}" class="form-signin">
            @csrf

            <img class="mb-4" src="/assets/logo.svg" alt="" width="72"
                 height="72">
            <h1 class="h3 mb-3 font-weight-normal">Inscription</h1>

            <div class="form-group row">
                <div class="col-lg-6">
                    <label for="fname">{{ __('Prénom') }}</label>

                    <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname"
                           value="{{ old('fname') }}" required autocomplete="fname" autofocus>

                    @error('fname')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="col-lg-6">
                    <label for="lname">{{ __('Nom de famille') }}</label>


                    <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname"
                           value="{{ old('lname') }}" required autocomplete="lname" autofocus>

                    @error('lname')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                </div>

            </div>


            <div class="form-group ">
                <label for="bdate">{{ __('Date de naissance') }}</label>


                <input id="bdate" type="date" class="form-control @error('bdate') is-invalid @enderror" name="bdate"
                       value="{{ old('bdate') }}" required autocomplete="bdate" autofocus>
                <small id="warnAge" class="form-text text-muted">Personnes majeures uniquement.
                    &#128286;</small>

                @error('bdate')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror

            </div>


            <div class="form-group ">
                <label for="email">{{ __('Adresse mail') }}</label>

                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror

            </div>

            <div class="form-group row">
                <div class="col-lg-6">
                    <label for="password">{{ __('Mot de passe') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
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


            <button type="submit" class="btn btn-primary w-50">
                {{ __('Register') }}
            </button>
            <div class="mt-3">
                @if (Route::has('login'))
                    <a class="btn btn-link" href="{{ route('login') }}">
                        {{ __('Se connecter') }}
                    </a>
                @endif
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('J\'ai oublié mon mot de passe') }}
                    </a>
                @endif

            </div>


            <p class="mt-5 mb-3 text-muted">&copy; OpenMeet - 2020</p>
        </form>
    </div>

@endsection

@section('css')

    <style>

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
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

