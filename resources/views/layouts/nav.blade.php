@extends('layouts.index')

@section('body')

    <div class="navbar navbar-expand-lg navbar-light navbar-custom fixed-top justify-content-between"
         style="z-index: 5000">
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

        <div class="collapse navbar-collapse flex-row-reverse " id="navToggle">

            <div class="dropleft nav-responsive-patch ml-1">
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
                            <i class="fas fa-user-lock"></i> Déconnexion
                        </a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>

                        @if(auth()->user()->isadmin)
                            <div class="dropdown-divider"></div>
                            <h6 class="dropdown-header">Administration</h6>
                            <a class="dropdown-item" href="/admin"><i class="fas fa-tools"></i> Panneau d'administration</a>
                        @endif

                    </div>
                @else
                    <a class="nav-link" href="#" id="navDrop" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-lg fa-user-circle"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navDrop">
                        <a class="dropdown-item" href="/login"><i class="fas fa-user-lock"></i> Connexion</a>
                        <a class="dropdown-item" href="/register"><i class="fas fa-user-plus"></i> Inscription</a>
                    </div>
                @endif
            </div>

            @if(auth()->check())
                <div class="dropleft nav-responsive-patch ml-1">
                    @if(!empty($notifications))
                        <a class="nav-link" href="#" id="navDrop" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-lg fa-bell"></i>
                            <span class="badge badge-pill badge-danger openmeet-badge">{{count($notifications)}}</span>
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

                                <a href="{{ url('/notifications/') .'/' .auth()->user()->id }}"
                                   class="btn btn-primary btn-icon-split w-100">
                                <span class="icon text-white-50">
                                    <i class="fas  fa-arrow-right"></i>
                                </span>
                                    <span class="text ml-2">Tout voir</span>
                                </a>
                            </div>
                        </div>
                    @else
                        <a class="nav-link" href="#" id="navDrop" role="button"
                           data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="far fa-bell fa-lg"></i>
                        </a>
                        <div class="dropdown-menu">
                            <div class="card-body">
                                <p class="lead mx-auto">Aucune notification.</p>

                            </div>

                        </div>

                    @endif
                </div>
            @endif

            @if (auth()->check())
            <div class="dropleft nav-responsive-patch ml-1">
                <a class="nav-link" href="#" id="navDrop" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-lg fa-plus"></i>
                </a>

                <div class="dropdown-menu" aria-labelledby="navDrop">
                    <a class="dropdown-item" href="/groups/create"><i class="fas fa-users"></i> Créer un groupe</a>
                    <a class="dropdown-item" href="/evenements/create"><i class="fas fa-handshake"></i> Créer un évenement</a>
                </div>
            </div>
            @endif

            <button class="ml-1 btn-link border-0 nav-responsive-patch nav-responsive-patch2" onclick="displayForm()" style="background-color: initial;">
                <i class="fas fa-lg fa-search"></i>
            </button>

            <form method="POST" action="{{url('/search')}}" class="d-none nav-responsive-patch nav-responsive-patch2" id="searchForm">
                @csrf
                <input type="text" name="search" id="search" required class="form-control openmeet-search">


            </form>
        </div>
    </div>

    @if(Session::has('error'))
        <div class="alert alert-danger">
            {{Session::get('error')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="mt-nav">
    @yield('content')
    </div>

    <footer class="footer navbar-custom mt-auto py-3 fixed-bottom">
        <div class="container">
            <span class="text-muted">&copy; OpenMeet - 2020</span>
        </div>
    </footer>
    <div class="mt-nav"></div>
@endsection

@section('js')
    <script>

        function displayForm() {
            if ($('#searchForm').hasClass('d-none')) {
                $('#searchForm').removeClass('d-none');
                $('#search').focus();
            } else {
                $('#searchForm').addClass('d-none');
            }
        }

    </script>
@endsection