@extends('layouts.nav')

@section('title')
    Mon profil
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="p-3">
                    <div class="card shadow-lg p-3" style="width: 22rem;">
                        @if($user->picname != null)
                            <img
                                alt="Photo de {{$user->fname}} {{$user->lname}}"
                                src="{{$user->picrepo}}/{{$user->picname}}"
                                class="">
                        @else
                            <small class="blockquote-footer">Pas de photo.</small>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{$user->email}}</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of
                                the card's content.</p>
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item">
                                Membre
                                de {{(new \App\Subscription)->countByUser($user->id)}} {{str_plural('groupe', (new \App\Subscription)->countByUser($user->id))}}
                            </li>
                            <li class="list-group-item">
                                <small class="blockquote-footer">Administrateur
                                    de {{count((new \App\Group)->getByAdmin($user->id))}} {{str_plural('groupe', count((new \App\Group)->getByAdmin($user->id)))}}
                                </small>
                            </li>

                        </ul>
                        @if($user->id != auth()->id())
                            <div class="card-body">
                                <a href="{{url('/user/report/'.$user->id)}}" class="card-link text-warning">Signaler</a>
                            </div>
                        @endif
                    </div>
                </div>

            </div>

            <div class="col-lg-9">
                <div class="p-5">
                    Groupes et événements
                </div>
            </div>


        </div>
    </div>

@endsection
