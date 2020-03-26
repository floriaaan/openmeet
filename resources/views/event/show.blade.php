@extends('layouts.nav')

@section('title')
    {{$event->name}}
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

                <div class="card-body">
                    <div class="media mb-3">
                        @if($event->picname != null)
                            <img
                                src="{{url('/storage/upload/image/'.$event->picrepo.'/'.$event->picname)}}"
                                class="mr-3 hvr-grow" alt="Photo"
                                width="auto" height="100px">
                        @endif
                        <div class="media-body">
                            <h5 class="card-title display-4">{{$event->name}}</h5>
                            @if($event->description != null)
                                <h5 class="text-muted ml-3 blockquote-footer">{!! str_replace('\\n','<br>',$event->description) !!}</h5>
                            @endif
                        </div>
                    </div>

                    @if($event->datefrom <= date('Y-m-d H:i:s') && $event->dateto > date('Y-m-d H:i:s'))
                        <span class="badge badge-primary glow-primary">En cours</span>
                    @endif
                    <small class="text-muted">
                        Participants : {{(new \App\Participation)->getCount($event->id)}}
                    </small>

                    <hr class="mx-4 my-4">

                    <div id="map" class="p-1">


                    </div>


                    <div class="row justify-content-around">
                        <div id="socialshare" class="p-3 mx-5">
                            {!! Share::page(url('/event/show'.'/'.$event->id), 'Evenement '.Setting('openmeet.title', 'OpenMeet'), ['class' =>'list-group-item'], '<ul class="list-group list-group-horizontal">', '</ul>')
                                ->facebook()
                                ->twitter()
                                ->linkedin('Extra linkedin summary can be passed here')
                                ->whatsapp() !!}
                        </div>
                        <div class="p-4">
                            <div class="media">
                                <i class="fas fa-2x fa-map-marked-alt mr-3 text-primary"></i>
                                <div class="media-body">
                                    <span
                                        class="mt-0 lead">{{$event->numstreet}} {{$event->street}} à {{$event->city}}</span>
                                </div>
                            </div>
                        </div>


                    </div>
                    <hr class="mx-5 my-2">

                    <div class="row mt-2">
                        <div class="col-lg-6">
                            <footer class="blockquote-footer">
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


                            </footer>
                        </div>

                        <div class="col-lg-6">
                            <div class="row justify-content-end">
                                @if((new \App\Group)->getAdmin($event->group)->id == auth()->id())
                                    <a href="{{url('/events/edit/'.$event->id)}}" class="btn btn-primary mx-2 my-2">
                                        <i class="fas fa-pencil-alt"></i>
                                        Modifier l'évenement
                                    </a>
                                    <a href="{{url('/events/delete/'.$event->id)}}" class="btn btn-danger mx-2 my-2">
                                        <i class="fas fa-trash-alt"></i>
                                        Supprimer l'évenement
                                    </a>
                                @endif
                                <div class="mx-2 my-2">
                                    @if($isparticipating ?? '' != null && $isparticipating ?? '')
                                        <a class="btn btn-danger" style="color: #fff"
                                           onclick="event.preventDefault();document.getElementById('toggleParticipation').submit();">
                                            <i class="fas fa-times"></i> Ne participe plus
                                        </a>

                                        <form id="toggleParticipation" action="{{url('/events/participate/remove')}}"
                                              method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="event" value="{{$event->id}}">
                                            <input type="hidden" name="user" value="{{auth()->id()}}">
                                        </form>
                                    @else
                                        <a class="btn btn-success" style="color: #fff"
                                           onclick="event.preventDefault();document.getElementById('toggleParticipation').submit();">
                                            <i class="fas fa-check"></i> Participer
                                        </a>

                                        <form id="toggleParticipation" action="{{url('/events/participate/add')}}"
                                              method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="event" value="{{$event->id}}">
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

    </div>

@endsection

@section('js')
    <script src="{{url('/js/map.js')}}"></script>

    <script>
        displayMap();
    </script>

    <script>
        @if($event->posx != null && $event->posy != null)
        displayEvent({{$event->posx}}, {{$event->posy}});
        @endif
    </script>
@endsection

@section('css')

    <style>
        .blockquote-footer {
            font-size: initial !important;
        }

        #socialshare ul {
            list-style-type: none;
        }

        #map {
            height: 250px;
            width: 100%;
        }
    </style>
@endsection
