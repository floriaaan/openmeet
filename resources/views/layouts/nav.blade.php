@extends('layouts.index')

@section('body')

    <nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-between">
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
                        <a class="nav-link" href="#" id="navDrop" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <img src="./{{ auth()->user()->picrepo }}/{{ auth()->user()->picname }}">
                        </a>
                    @else
                        <a class="nav-link" href="#" id="navDrop" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-lg fa-user-circle"></i>
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
                    <a class="nav-link" href="#" id="navDrop" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        Connexion / Inscription
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navDrop">
                        <a class="dropdown-item" href="/login">Connexion</a>
                        <a class="dropdown-item" href="/register">Inscription</a>
                    </div>
                @endif
            </div>

            <div class="dropleft">
                @if(!empty($notifications))
                    <a class="nav-link" href="#" id="navDrop" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-lg fa-bell"></i>
                    </a>
                    <div class="dropdown-menu" style="padding: 0" aria-labelledby="navDrop">
                        <div class="card-header">
                            Notifications
                        </div>
                        @foreach($notifications as $notif)
                            @if($notif->type=='mes')
                                <a class="dropdown-item" href="#">
                                    <h6 class="dropdown-header mb-1 font-weight-bold">
                                        <i class="fas fa-envelope text-primary"></i> {{$notif->title}}</h6>
                                    <p class="text-muted font-weight-light">{{$notif->content}}</p>
                                    <hr class="my-4">
                                    <footer class="blockquote-footer">
                                        <small class="text-muted">
                                            reçu à {{strftime("%R",strtotime($notif->date))}},
                                            le <cite>{{strftime("%A %d %b %Y",strtotime($notif->date))}}</cite>
                                        </small>
                                    </footer>
                                </a>

                            @elseif($notif->type=='sub')
                                <a class="dropdown-item" href="#">
                                    <h6 class="dropdown-header mb-1 font-weight-bold">
                                        <i class="fas fa-users text-primary"></i> {{$notif->title}}</h6>
                                    <p class="text-muted font-weight-light">{{$notif->content}}</p>
                                    <hr class="my-4">
                                    <footer class="blockquote-footer">
                                        <small class="text-muted">
                                            créé à {{strftime("%R",strtotime($notif->date))}},
                                            le <cite>{{strftime("%A %d %b %Y",strtotime($notif->date))}}</cite>
                                        </small>
                                    </footer>
                                </a>
                            @elseif($notif->type=='eve')
                                <a class="dropdown-item" href="#">
                                    <h6 class="dropdown-header mb-1 font-weight-bold">
                                        <i class="fas fa-handshake text-primary"></i> {{$notif->title}}</h6>
                                    <p class="text-muted font-weight-light">{{$notif->content}}</p>
                                    <hr class="my-4">
                                    <footer class="blockquote-footer">
                                        <small class="text-muted">
                                            créé à {{strftime("%R",strtotime($notif->date))}},
                                            le <cite>{{strftime("%A %d %b %Y",strtotime($notif->date))}}</cite>
                                        </small>
                                    </footer>
                                </a>
                            @endif
                            <div class="dropdown-divider"></div>
                        @endforeach
                        <div class="card-footer">

                            <a href="{{ url('/Notifications/') .'/' .auth()->user()->id }}"
                               class="btn btn-primary btn-icon-split w-100">
                                <span class="icon text-white-50">
                                    <i class="fas fa-arrow-right"></i>
                                </span>
                                <span class="text ml-2">Tout voir</span>
                            </a>
                        </div>
                        @else
                            <a class="nav-link" href="#" id="navDrop" role="button"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                <i class="far fa-bell fa-lg"></i>
                            </a>
                        @endif
                    </div>
            </div>
        </div>
    </nav>
    @yield('content')

@endsection
