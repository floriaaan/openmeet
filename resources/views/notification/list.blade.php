@extends('layouts.nav')

@section('content')

    <div class="container p-5 h-100">

        <h3 class="display-4">Toutes vos notifications </h3>


        <form id="readall" action="{{ url('/notifications/read') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
        <button class="btn btn-link float-right mr-5"
                onclick="event.preventDefault();document.getElementById('readall').submit();">
            Tout lire
            <i class="fas fa-arrow-right"></i>
        </button>

        <hr class="my-5 mx-5">

        @foreach($notifications as $notif)
            @if($notif->type == 'mes')
                <a href="/messages/" style="text-decoration: none; color:inherit;">
                    <div class="card rounded hvr-grow shadow mt-2 mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <div class="justify-content-center mx-auto">

                                    <i class="fas fa-envelope text-primary fa-lg"></i>

                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{$notif->title}}</h5>
                                    <h6 class="text-muted">{{$notif->content}}</h6>
                                    <hr class="mx-4 my-4">
                                    <footer class="blockquote-footer">
                                        <small class="text-muted">
                                            envoyé à {{strftime("%R",strtotime($notif->date))}},
                                            le <cite>{{strftime("%A %d %b %Y",strtotime($notif->date))}}</cite>
                                        </small>
                                    </footer>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            @elseif($notif->type == 'sub')
                <a href="/groups/show/{{$notif->concerned}}" style="text-decoration: none; color:inherit;">
                    <div class="card rounded hvr-grow shadow mt-2 mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <div class="justify-content-center mx-auto">

                                    <i class="fas fa-users text-primary fa-lg"></i>

                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{$notif->title}}</h5>
                                    <h6 class="text-muted">{{$notif->content}}</h6>
                                    <hr class="mx-4 my-4">
                                    <footer class="blockquote-footer">
                                        <small class="text-muted">
                                            créé à {{strftime("%R",strtotime($notif->date))}},
                                            le <cite>{{strftime("%A %d %b %Y",strtotime($notif->date))}}</cite>
                                        </small>
                                    </footer>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            @elseif($notif->type == 'eve')
                <a href="/events/show/{{$notif->concerned}}" style="text-decoration: none; color:inherit;">
                    <div class="card rounded hvr-grow shadow mt-2 mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <div class="justify-content-center mx-auto">

                                    <i class="fas fa-handshake text-primary fa-lg"></i>

                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{$notif->title}}</h5>
                                    <h6 class="text-muted">{{$notif->content}}</h6>
                                    <hr class="mx-4 my-4">
                                    <footer class="blockquote-footer">
                                        <small class="text-muted">
                                            créé à {{strftime("%R",strtotime($notif->date))}},
                                            le <cite>{{strftime("%A %d %b %Y",strtotime($notif->date))}}</cite>
                                        </small>
                                    </footer>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            @endif

        @endforeach
    </div>
@endsection

@section('css')

    <style>
        .hvr-grow {
            display: flex !important;
        }
    </style>
@endsection
