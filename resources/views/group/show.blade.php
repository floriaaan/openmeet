@extends('layouts.nav')

@section('title')
    {{$group->name}}
@endsection

@section('content')

    <div class="container-fluid">
        <a class="btn btn-link float-right mr-5"
           href="{{url('/groups/list')}}">
            Retour
            <i class="fas fa-arrow-right"></i>
        </a>
        <hr class="m-4">
        <div class="card rounded shadow-lg mb-3 mx-auto h-100" style="width: 95%">
            <div class="row no-gutters">
                <div class="col-md-4 m-auto" style="overflow: hidden;">
                    @if($group->picname != null)
                        <img src="{{url('/storage/upload/image/'.$group->picrepo.'/'.$group->picname)}}"
                             class="card-img hvr-grow" alt="Photo de {{$group->name}}">
                    @else
                        <small class="p-3 blockquote-footer">Pas de photo</small>
                    @endif
                    <hr class="mx-5 my-2">
                    <div class="pl-5 pb-5 pt-3">

                        @forelse($tags as $tag)
                            @if($tag != '')
                                <a onclick="event.preventDefault();document.getElementById('form-{{$tag}}').submit();">
                                    <span class="badge badge-secondary">{{$tag}}</span>
                                </a>

                                <form id="form-{{$tag}}" action="{{url('/search')}}" method="post" class="d-none">
                                    @csrf
                                    <input type="hidden" name="search" value="{{$tag}}">
                                </form>
                            @endif
                        @empty
                            <span>Aucun tag</span>
                        @endforelse

                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title display-4">{{$group->name}}</h5>
                        @if($group->desc != null)<p
                            class="text-muted ml-3 blockquote-footer">{!! str_replace('\\n','<br>',$group->desc) !!}</p>@endif
                        <hr class="mx-4 my-4">

                        <div class="h-50 p-3" style="height: 30vh!important; overflow-y: scroll!important;">


                            @forelse($listEvent as $event)
                                <a href="{{url('/events/show')}}/{{$event->id}}"
                                   style="text-decoration: none; color: inherit;">
                                    <div class="p-4 shadow-sm mt-2">
                                        <h5>{{$event->name}}</h5>
                                        <p class="text-muted">{!!str_replace('\n','</p><p class="text-muted">',$event->description)!!}</p>
                                        @if($event->datefrom <= date('Y-m-d H:i:s') && $event->dateto > date('Y-m-d H:i:s'))
                                            <span class="badge badge-primary glow-primary">En cours</span>
                                        @endif
                                        <p style="text-transform: capitalize">
                                            à {{$event->numstreet}} {{$event->street}}</p>
                                        <p>{{$event->zip}} - {{$event->city}}</p>
                                        <hr class="my-3 mx-5">
                                        <small class="text-muted">
                                            aura lieu le
                                            <cite>{{strftime("%A %d %b %Y",strtotime($event->datefrom))}}
                                                à {{strftime("%R",strtotime($event->datefrom))}}</cite>
                                        </small>
                                        @if($event->dateto != null)
                                            <br>
                                            <small class="text-muted">
                                                jusqu'au <cite>{{strftime("%A %d %b %Y",strtotime($event->dateto))}}
                                                    à {{strftime("%R",strtotime($event->dateto))}}</cite>
                                            </small>
                                        @endif
                                    </div>
                                </a>
                            @empty
                                @if((new \App\Group)->getAdmin($group->id)->id == auth()->id())
                                    <div class="p-3 shadow-sm mt-2">
                                        <div class="card-body text-center">
                                            <p class="lead">Il n'y a pas encore d'événements</p>
                                        </div>
                                        <div class="row justify-content-center">
                                            <a href="{{url('/events/create')}}"
                                               class="btn btn-primary mx-auto">
                                                Créer votre premier événement
                                            </a>
                                        </div>
                                    </div>
                                @else
                                    <div class="p-1 shadow-sm mt-2">
                                        <div class="card-body text-center lead">
                                            Le groupe n'a pas encore d'événement.
                                        </div>
                                    </div>
                                @endif
                            @endforelse
                        </div>

                        <hr class="mx-4 my-2">

                        <div class="px-5 pt-2">
                            <small>Membres : {{ (new \App\Subscription)->countGroup($group->id) }}</small>
                            <small class="blockquote-footer">
                                Administrateur
                                : <a
                                    href="{{url('/user/show/'.$group->admin)}}">
                                    {{ (new \App\Group)->getAdmin($group->id)->fname }} {{ (new \App\Group)->getAdmin($group->id)->lname }}
                                </a>
                                <a href="{{url('/messages/user/'.$group->admin)}}">
                                    <span class="badge badge-secondary">Contacter</span>
                                </a>
                            </small>
                        </div>


                        <div class="d-flex justify-content-between px-5 mt-4">
                            <p class="card-text"><small class="text-muted">Créé le {{$group->datecreate}}</small></p>
                            <div class="float-right mr-5">
                                @if($group->admin == auth()->id())
                                    <div class="row justify-content-end">
                                        <small class="text-muted blockquote-footer m-1">
                                            Vous êtes administrateur du groupe.
                                        </small>
                                        <a href="{{url('/groups/delete/'.$group->id)}}" class="btn btn-danger m-1">
                                            <i class="fas fa-trash-alt"></i>
                                            Supprimer {{$group->name}}
                                        </a>
                                        <a href="{{url('/groups/edit/'.$group->id)}}" class="btn btn-primary m-1">
                                            <i class="fas fa-pencil-alt"></i>
                                            Modifier {{$group->name}}
                                        </a>
                                    </div>

                                @elseif($issubscribed ?? '' != null && $issubscribed ?? '')
                                    <a class="btn btn-danger" style="color: #fff"
                                       onclick="event.preventDefault();document.getElementById('toggleSubscription').submit();">
                                        <i class="fas fa-minus"></i> Se désabonner
                                    </a>

                                    <form id="toggleSubscription" action="{{url('/groups/subscribe/remove')}}"
                                          method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="group" value="{{$group->id}}">
                                        <input type="hidden" name="user" value="{{auth()->id()}}">
                                    </form>
                                @else
                                    <a class="btn btn-primary" style="color: #fff"
                                       onclick="event.preventDefault();document.getElementById('toggleSubscription').submit();">
                                        <i class="fas fa-plus"></i> S'abonner
                                    </a>

                                    <form id="toggleSubscription" action="{{url('/groups/subscribe/add')}}"
                                          method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="group" value="{{$group->id}}">
                                        <input type="hidden" name="user" value="{{auth()->id()}}">
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('css')

    <style>
        .blockquote-footer {
            font-size: initial !important;
        }
    </style>
@endsection
