@extends('layouts.nav')

@section('content')

    <div class="container-fluid">
        <div class="card rounded shadow-lg mb-3 mx-auto h-100" style="width: 95%">
            <div class="row no-gutters">
                <div class="col-md-4 m-auto" style="overflow: hidden;">
                    @if($group->picname != null)
                        <img src="{{url('/storage/upload/image/'.$group->picrepo.'/'.$group->picname)}}"
                             class="card-img hvr-grow" alt="Photo de {{$group->name}}">
                    @else
                        <small class="p-3 blockquote-footer">Pas de photo</small>
                    @endif


                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title display-4">{{$group->name}}</h5>
                        @if($group->desc != null)<h5
                            class="text-muted ml-3 blockquote-footer">{{$group->desc}}</h5>@endif
                        <hr class="mx-4 my-4">

                        <div class="h-50 p-3" style="height: 40vh!important; overflow-y: scroll!important;">


                            @foreach($listEvent as $event)
                                <a href="{{url('/events/show')}}/{{$event->id}}"
                                   style="text-decoration: none; color: inherit;">
                                    <div class="p-4 shadow-sm mt-2">
                                        <h5>{{$event->name}}</h5>
                                        <p class="text-muted">{{$event->description}}</p>
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
                            @endforeach
                        </div>


                        <div class="d-flex justify-content-between px-5 mt-4">
                            <p class="card-text"><small class="text-muted">Créé le {{$group->datecreate}}</small></p>
                            <div class="float-right mr-5">
                                @if($issubscribed != null && $issubscribed)
                                    <a class="btn btn-danger" style="color: #fff"
                                       onclick="event.preventDefault();document.getElementById('toggleSubscription').submit();">
                                        <i class="fas fa-minus"></i> Se désabonner
                                    </a>

                                    <form id="toggleSubscription" action="{{url('/groups/subscribe/remove')}}"
                                          method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="event" value="{{$group->id}}">
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
                                        <input type="hidden" name="event" value="{{$group->id}}">
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
