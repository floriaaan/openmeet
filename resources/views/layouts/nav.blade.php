@extends('layouts.index')

@section('body')

    <nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-between">
        <a class="navbar-brand" href="/">
            <img src="/assets/logo.svg" width="50" height="50" class="d-inline-block align-top"
                 alt="{{ Setting('openmeet.name') }}">
            <span
                class="ml-2 openmeet-title openmeet-nav text-center openmeet-color">{{ Setting('openmeet.name') }}</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navToggle"
                aria-controls="navToggle" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse flex-row-reverse" id="navToggle">

            <div class="dropleft">
                @if (auth()->check())
                    <a class="nav-link dropdown-toggle" href="#" id="navDrop" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        {{ auth()->user()->fname }} {{ auth()->user()->lname }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navDrop">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="{{ url('/logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            Déconnexion
                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                @else
                    <a class="nav-link dropdown-toggle" href="#" id="navDrop" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        Connexion / Inscription
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navDrop">
                        <a class="dropdown-item" href="/login">Connexion</a>
                        <a class="dropdown-item" href="/register">Inscription</a>
                    </div>
                @endif
            </div>

        </div>
    </nav>
    @yield('content')

@endsection
