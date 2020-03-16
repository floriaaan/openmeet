@extends('layouts.nav')

@section('title')
    Mon profil
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="p-3">
                    <div class="card shadow-lg p-3">
                        @if($user->picname != null)
                            <div class="overflow-hidden">
                                <img
                                    alt="Photo de {{$user->fname}} {{$user->lname}}"
                                    src="{{url('/storage/upload/image/'.$user->picrepo.'/'.$user->picname)}}"
                                    class="card-img hvr-grow">
                            </div>
                        @else
                            <small class="blockquote-footer">Pas de photo.</small>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{$user->fname}} {{$user->lname}}</h5>
                            @if($user->id == auth()->id())
                                <h5 class="text-muted">{{$user->email}}</h5>
                            @endif
                            <hr class="my-4 mx-3">
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
                <div class="p-3">
                    <div class="card shadow-sm p-3">
                        <div class="card-body">
                            <h5 class="card-title">Groupes de {{$user->fname}}</h5>
                        </div>

                        <ul class="list-group">
                            @forelse($groups as $group)
                                <li class="list-group-item"><a
                                        href="{{url('/groups/show/'.$group->id)}}">{{$group->name}}</a></li>
                            @empty
                                <li class="list-group-item">Aucun groupe</li>
                            @endforelse
                        </ul>
                    </div>


                    <div class="card mt-5 shadow-sm p-3">
                        <div class="card-body">
                            <h5 class="card-title">Evenements de {{$user->fname}}</h5>
                        </div>

                        <ul class="list-group">
                            @forelse($events as $event)
                                <li class="list-group-item"><a
                                        href="{{url('/events/show/'.$event->id)}}">{{$event->name}}</a></li>
                            @empty
                                <li class="list-group-item">Aucun événement</li>
                            @endforelse
                        </ul>
                    </div>

                </div>
            </div>


        </div>
    </div>

@endsection

@section('css')

    <style>

    </style>

@endsection
