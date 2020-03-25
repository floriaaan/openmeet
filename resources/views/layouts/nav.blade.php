@extends('layouts.index')

@section('body')



    <div class="navbar navbar-expand-lg navbar-light navbar-custom fixed-top justify-content-between"
         style="z-index: 5000">
        <a class="navbar-brand" href="/">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 406.372 404.994"
                 class="d-inline-block align-top">
                <g id="logo-open" transform="translate(-0.412 -0.754)">
                    <g id="Groupe_1" data-name="Groupe 1" transform="translate(81.465 183.268)" opacity="0.1">
                        <path id="Tracé_1" data-name="Tracé 1"
                              d="M469.52,471.468c-15.329-3.224-99.512,64.972-118.5,81.847a5.453,5.453,0,0,1-7.243,0c-18.989-16.875-103.171-85.071-118.5-81.847l27.089-15.1L347.4,514.1l95.031-57.729Z"
                              transform="translate(-225.28 -456.37)" fill="var(--openmeet)"/>
                    </g>
                    <path id="Tracé_2" data-name="Tracé 2"
                          d="M446.9,252.832l-.275,12.216c-.315-.244,8.118-20.885.275-27.3-6.1-4.992-7.925-26.627-21.88-38.3-6.642-5.556.776,7.786-8.461,0l-20.307-9.23H378.7C375,141.372,323.053,93.853,258.409,89.351h-.027c-58.253,4.037-109.455,60.709-121.7,107.639-.089.329-.173.662-.253.99q-1.825.688-3.7,1.47a125.043,125.043,0,0,0-33.914,21.107l-27.63,17.194c-6.865-17.794-8.575-39.287-1.274-64.617A203.851,203.851,0,0,1,165.98,67.675l-.107-.075A201.99,201.99,0,0,1,197.03,54.744l.444-.142,1.332-.413A203.145,203.145,0,0,1,258.2,45.37h.417a202.328,202.328,0,0,1,92.4,22.181l-.182.124A203.851,203.851,0,0,1,446.9,173.134C456.936,207.931,460.893,232.156,446.9,252.832Z"
                          transform="translate(-54.812 -44.615)" fill="var(--openmeet)" opacity="0.25"/>
                    <g id="Groupe_4" data-name="Groupe 4" transform="translate(110.987 213.367)" opacity="0.1">
                        <path id="Tracé_5" data-name="Tracé 5"
                              d="M291.76,694.349l.182-.124c12.012-8.162,37.671-17.825,92.416-21.657h.027c58.267-4.054,109.468-60.727,121.711-107.656.089-.329.173-.662.253-.99q1.825-.688,3.7-1.47l33.914-21.107,27.63-17.194c6.865,17.794,8.575,39.287,1.275,64.617A203.084,203.084,0,0,1,384.58,716.531h-.417a202.329,202.329,0,0,1-92.4-22.181Z"
                              transform="translate(-291.76 -524.15)" fill="var(--openmeet)"/>
                    </g>
                    <g id="Groupe_5" data-name="Groupe 5" transform="translate(10.375 194.778)" opacity="0.3">
                        <path id="Tracé_6" data-name="Tracé 6"
                              d="M80.854,482.463c.04-.058.076-.115.12-.173,9.135,7.474,25.312,20.871,53.133,44.323a.25.25,0,0,0,0,.058C137.815,575.518,193.755,644.794,258.4,649.3h.027c54.763,3.832,80.408,13.5,92.42,21.657l.107.076.075.049A202,202,0,0,1,319.8,683.885l-.444.142-1.332.413a203.144,203.144,0,0,1-59.386,8.819h-.417A203.083,203.083,0,0,1,69.93,565.5C59.889,530.7,66.884,503.139,80.854,482.463Z"
                              transform="translate(-65.193 -482.29)" fill="var(--openmeet)"/>
                    </g>
                    <path id="Tracé_7" data-name="Tracé 7"
                          d="M839.165,469.43c-.315-.244-2.953-2.278-10.8-8.69-9.135-7.474-25.312-20.871-53.133-44.323l-4-3.357,4,3.3,53.257,44.207Z"
                          transform="translate(-447.33 -249.025)" fill="#007bea"/>
                    <path id="Tracé_8" data-name="Tracé 8"
                          d="M26,377.666l4.632-2.882,27.63-17.194,33.914-21.107,3.952-2.46,13.358-8.313"
                          transform="translate(-14.254 -181.649)" fill="none"/>
                    <path id="Tracé_9" data-name="Tracé 9"
                          d="M155.775,310.632a36.511,36.511,0,0,1-5.773-8.34,12.367,12.367,0,0,0-2.056-.315h-.031a34.383,34.383,0,0,0-4.108.178c-32.009,3.033-111.156,44.8-86.359,130.824a202.052,202.052,0,0,1-14.237-65.989c-1.994-33.492,2.7-59.71,11.644-77.992,19.952-40.788,36.6-66.5,71.615-20.9C131.236,274.027,156.836,304.433,155.775,310.632Z"
                          transform="translate(-42.346 -154.994)" fill="var(--openmeet)"/>
                    <path id="Tracé_10" data-name="Tracé 10"
                          d="M274.438,374.594a34.382,34.382,0,0,0-4.108.178A16.845,16.845,0,0,1,274.438,374.594Z"
                          transform="translate(-168.86 -227.611)" fill="#afafef"/>
                    <path id="Tracé_141" data-name="Tracé 141"
                          d="M44.869,0A44.869,44.869,0,1,1,0,44.869,44.869,44.869,0,0,1,44.869,0Z"
                          transform="translate(66.85 30.09)" fill="var(--openmeet)"/>
                    <path id="Tracé_11" data-name="Tracé 11"
                          d="M815.889,366.989a202.052,202.052,0,0,1-14.237,65.989c24.8-86.026-54.35-127.79-86.368-130.823a34.37,34.37,0,0,0-4.108-.178h-.018a12.37,12.37,0,0,0-2.056.315,35.952,35.952,0,0,1-5.773,8.34c-1.061-6.217,24.535-36.6,29.309-42.533,35.015-45.6,51.663-19.89,71.616,20.9C813.184,307.279,817.883,333.5,815.889,366.989Z"
                          transform="translate(-409.559 -154.994)" fill="var(--openmeet)"/>
                    <path id="Tracé_12" data-name="Tracé 12"
                          d="M688.816,505.683h0a203.829,203.829,0,0,1-71.269,90.4q-1.665,1.177-3.353,2.327h0c-10.658,5.928-19.575,8.828-26.835,9.49-10.129.919-17.066-2.513-21.1-8.206-7.993-11.248-4.614-31.316,7.842-43.963q1.661-1.465,3.277-2.984h0c34.9-32.608,55.229-79.276,44.62-108.016a102.92,102.92,0,0,0-9.716-20.871h0c-17.878,24.952-72.939,33.665-98.633,58.617-6.124,5.946-10.462,8.078-13.322,7.589,7.078-1.177,5.4-18.158,0-33.15h0c3.393-9.432,8.26-18.078,13.322-21.506,14.388-9.721,59.062-32.044,76.824-52.054a35.988,35.988,0,0,0,5.835-8.491l1.985-.164h.027a34.409,34.409,0,0,1,4.108.178C634.466,377.892,713.613,419.657,688.816,505.683Z"
                          transform="translate(-296.723 -227.699)" fill="var(--openmeet)" opacity="0.8"/>
                    <path id="Tracé_13" data-name="Tracé 13"
                          d="M70.067,505.421a203.785,203.785,0,0,0,71.256,90.426q1.665,1.177,3.353,2.327c10.658,5.928,19.575,8.833,26.84,9.494,10.129.919,17.066-2.513,21.1-8.206,7.993-11.248,4.614-31.316-7.842-43.963q-1.661-1.466-3.277-2.984h0c-34.9-32.608-55.229-79.276-44.62-108.016a102.7,102.7,0,0,1,9.716-20.871c17.878,24.952,72.939,33.665,98.637,58.617,6.124,5.946,10.458,8.078,13.322,7.589-7.083-1.177-5.4-18.162,0-33.154-3.393-9.432-8.26-18.078-13.322-21.506-14.388-9.721-59.062-32.044-76.824-52.054a36.511,36.511,0,0,1-5.773-8.34,12.354,12.354,0,0,0-2.056-.315h-.031a34.408,34.408,0,0,0-4.108.178C124.4,377.63,45.252,419.4,70.067,505.421Z"
                          transform="translate(-54.893 -227.565)" fill="var(--openmeet)" opacity="0.9"/>
                    <path id="Tracé_14" data-name="Tracé 14"
                          d="M494.423,592.954c-7.083-1.177-5.4-18.162,0-33.154C499.823,574.792,501.506,591.778,494.423,592.954Z"
                          transform="translate(-290.825 -330.602)" fill="var(--openmeet)" opacity="0.8"/>
                    <circle id="Ellipse_3" data-name="Ellipse 3" cx="44.869" cy="44.869" r="44.869"
                            transform="translate(250.607 30.09)" fill="var(--openmeet)"/>
                    <path id="Tracé_15" data-name="Tracé 15" d="M621.53,170.05Z"
                          transform="translate(-364.102 -113.929)" fill="#108eff"/>
                    <path id="Tracé_16" data-name="Tracé 16"
                          d="M666.45,778.614a39.523,39.523,0,0,1,3.277-2.984Q668.111,777.149,666.45,778.614Z"
                          transform="translate(-389.074 -450.588)" fill="#38b0f9"/>
                    <path id="Tracé_17" data-name="Tracé 17"
                          d="M760.333,873.5q-1.825,1.092-3.593,2.069,1.692-1.146,3.353-2.327Z"
                          transform="translate(-439.269 -504.852)" fill="#38b0f9"/>
                </g>
            </svg>

        <!--<img src="/assets/logo.svg" width="40" height="40" class="d-inline-block align-top"
                 alt="{{ Setting('openmeet.name') }}">-->
            <span
                class="ml-2 openmeet-title openmeet-nav text-center text-primary">{{ Setting('openmeet.name') }}</span>
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
                            <img
                                src="{{url('/storage/upload/image/'.auth()->user()->picrepo.'/'.auth()->user()->picname)}}"
                                class="img-thumbnail rounded-circle"
                                style="height: 40px; width: 40px">
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
                        <a class="dropdown-item" href="{{ url('/user/') }}"><i class="fas fa-user"></i> Mon
                            profil</a>
                        <div class="dropdown-divider"></div>
                        <h6 class="dropdown-header">Participations</h6>
                        <a class="dropdown-item" href="{{ url('/user/groups/') }}"><i class="fas fa-users"></i> Mes
                            groupes</a>
                        <a class="dropdown-item" href="{{ url('/user/events') }}"> <i class="fas fa-handshake"></i> Mes
                            événements</a>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ url('/logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="fas fa-user-lock"></i> Déconnexion
                        </a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>

                        @if(!empty((new \App\Group)->getByAdmin(auth()->id())))
                            <div class="dropdown-divider"></div>
                            <h6 class="dropdown-header">Modération de groupe</h6>
                            <a class="dropdown-item" href="{{url('/groups/admin/')}}">
                                <i class="fas fa-tools"></i>
                                Panneau de modération
                            </a>
                        @endif

                        @if(auth()->user()->isadmin)
                            <div class="dropdown-divider"></div>
                            <h6 class="dropdown-header">Administration</h6>
                            <a class="dropdown-item" href="{{url('/admin/')}}">
                                <i class="fas fa-tools"></i>
                                Panneau d'administration
                            </a>
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
                    @if(!empty($notifsnav))
                        <a class="nav-link" href="#" id="navDrop" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-lg fa-bell"></i>
                            <span
                                class="badge badge-pill badge-danger openmeet-badge">{{count((new \App\Notification)->getAllUser(auth()->id()))}}</span>
                        </a>
                        <div class="dropdown-menu" style="padding: 0" aria-labelledby="navDrop">
                            <div class="card-header">
                                Notifications
                            </div>
                            @foreach($notifsnav as $notif)
                                @if($notif->type=='mes')
                                    <a class="dropdown-item" href="{{url('/messages/')}}">
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
                                    <a class="dropdown-item" href="{{url('/groups/show/'.$notif->concerned)}}">
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
                                @elseif($notif->type=='rep')
                                    <a class="dropdown-item" href="{{url('/admin/reports/show/'.$notif->concerned)}}">
                                        <h6 class="dropdown-header mb-1 font-weight-bold">
                                            <i class="fas fa-shield-alt text-primary"></i> {{$notif->title}}</h6>
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
                                    <a class="dropdown-item" href="{{url('/events/show/'.$notif->concerned)}}">
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

                                <a href="{{ url('/notifications/')}}"
                                   class="btn btn-primary btn-icon-split w-100">
                                <span class="icon text-white-50">
                                    <i class="fas  fa-arrow-right"></i>
                                </span>
                                    <span class="text ml-2">Accéder aux notifications</span>
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
                                <p class="lead">Aucune notification.</p>

                            </div>
                            <div class="card-footer">

                                <a href="{{ url('/notifications/')}}"
                                   class="btn btn-primary btn-icon-split w-100">
                                <span class="icon text-white-50">
                                    <i class="fas  fa-arrow-right"></i>
                                </span>
                                    <span class="text ml-2">Accéder aux notifications</span>
                                </a>
                            </div>
                        </div>

                    @endif
                </div>
            @endif

            @if(auth()->check())

                @if((new \App\Message)->getCountUnread(auth()->id()) != 0)
                    <a class="nav-link" href="{{url('/messages')}}" style="margin-right: -25px">
                        <i class="fas fa-lg fa-envelope"></i>
                        <span
                            class="badge badge-pill badge-danger"
                            style="top:-12px; right: 7px; position: relative">
                            {{(new \App\Message)->getCountUnread(auth()->id())}}
                        </span>
                    </a>
                @else
                    <a class="nav-link" href="{{url('/messages')}}">
                        <i class="far fa-lg fa-envelope"></i>
                    </a>
                @endif




            @endif

            @if(auth()->check())
                <a class="nav-link" href="{{url('/groups/list')}}">
                    <i class="fas fa-lg fa-users"></i>
                </a>

            @endif

            @if (auth()->check())
                <div class="dropleft nav-responsive-patch ml-1">
                    <a class="nav-link" href="#" id="navDrop" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-lg fa-plus"></i>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navDrop">
                        <a class="dropdown-item" href="/groups/create"><i class="fas fa-users"></i> Créer un groupe</a>
                        <a class="dropdown-item" href="/events/create"><i class="fas fa-handshake"></i> Créer un
                            évenement</a>
                    </div>
                </div>
            @endif

            <button class="ml-1 btn-link border-0 nav-responsive-patch nav-responsive-patch2" onclick="displayForm()"
                    style="background-color: initial;">
                <i class="fas fa-lg fa-search"></i>
            </button>

            <form method="POST" action="{{url('/search')}}" class="d-none nav-responsive-patch nav-responsive-patch2"
                  id="searchForm">
                @csrf
                <input type="text" name="search" id="search" required class="form-control openmeet-search">


            </form>
        </div>
    </div>

    @if(Session::has('error'))
        <div class="alert alert-danger">
            {{Session::get('error')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" id="alert-close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="mt-nav">
        @yield('content')
    </div>

    <footer class="footer navbar-custom mt-auto py-3 fixed-bottom">
        <div class="container">
            <span class="text-muted">&copy; OpenMeet - 2020 | <a href="{{url('/legal/cgu')}}" class="btn-link">Conditions générales d'utilisation</a></span>
        </div>
    </footer>
    <div class="mt-nav"></div>

@endsection


