@extends('layouts.index')

@section('body')

    <nav class="navbar navbar-expand-lg navbar-light bg-light d-flex justify-content-between">
        <a class="navbar-brand" href="/">
            <img src="/assets/logo.svg" width="40" height="40" class="d-inline-block align-top"
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
                    @if(auth()->user()->picname != null)
                        <a class="nav-link dropdown-toggle" href="#" id="navDrop" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <img src="./{{ auth()->user()->picrepo }}/{{ auth()->user()->picname }}">
                        </a>
                    @else
                        <a class="nav-link dropdown-toggle" href="#" id="navDrop" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-circle"></i>
                        </a>

                    @endif
                    <div class="dropdown-menu" aria-labelledby="navDrop">
                        <h6 class="dropdown-header">
                            Bienvenue {{ auth()->user()->fname }} {{ auth()->user()->lname }}</h6>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ url('/logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            Déconnexion
                        </a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>

                        @if(auth()->user()->isadmin)
                            <div class="dropdown-divider"></div>
                            <h6 class="dropdown-header">Administration</h6>
                            <a class="dropdown-item" href="/Admin">Panneau d'administration</a>
                        @endif

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

            <div class="dropdown" style="padding-right: 5em;">
                @if(!empty($notifications))

                <a class="nav-link dropdown-toggle" href="#" id="navDrop" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell"></i>
                    {{count($notifications)}}
                </a>
                <div class="dropdown-menu" aria-labelledby="navDrop">
                        @foreach($notifications as $notif)
                            @if($notif->type=='mes')
                                <a class="dropdown-item"  href="#">
                                    <p style="font-weight: bold">{{$notif->title}}</p>
                                    <p>{{$notif->content}}</p>
                                    <span style="color: gray;text-decoration: underline;font-size: small">{{$notif->date}}</span>
                                </a>
                            @endif
                            @if($notif->type=='sub')
                                    <a class="dropdown-item"  href="#">
                                        <p style="font-weight: bold">{{$notif->title}}</p>
                                        <p>{{$notif->content}}</p>
                                        <span style="color: gray;text-decoration: underline;font-size: small">{{$notif->date}}</span>
                                    </a>
                            @endif
                        @endforeach
                    @else
                            <a class="nav-link dropdown-toggle" href="#" id="navDrop" role="button" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                <i class="far fa-bell"></i>
                            </a>
                    @endif
                </div>
            </div>
        </div>
    </nav>
    @yield('content')

@endsection
