@extends('layouts.index')

@section('title')
    Réinitialisation du mot de passe
@endsection

@section('body')
    <div class="h-100 w-100 wall-white text-center mx-auto">
        @if (session('status'))
            <div class="alert alert-success mx-3" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="p-5 mt-5">


            <form method="POST" action="{{ route('password.email') }}" class="form-signin">
                @csrf
                <a href="{{ url('/') }}" class="no-hover">
                    <img class="mb-4" src="/assets/logo.svg" alt="" width="72" height="72">
                </a>
                <h1 class="h3 mb-3 font-weight-normal">Réinitialisation du mot de passe</h1>

                <div class="form-group mt-5">
                    <label for="email">{{ __('Adresse mail') }}</label>

                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                </div>

                <button type="submit" class="btn btn-xl rounded-pill btn-primary w-50 mt-4">
                    {{ __('Envoyer un mail') }}
                </button>
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
