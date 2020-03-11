@extends('layouts.nav')

@section('content')

    <div class="container-fluid p-5">
        <h3 class="display-4">Groupes correspondants à : {{$search}}</h3>
        <hr class="my-3 mx-5">
        <div class="card-columns">


            @foreach($groups as $group)
                <a href="{{url('/groups/show')}}/{{$group->id}}" style="text-decoration: none; color: inherit;">
                    <div class="p-3">
                        <div class="card rounded hvr-grow shadow-sm">

                            @if($group->picname != null)
                                <img src="{{url('/storage/upload/image/'.$group->picrepo.'/'.$group->picname)}}"
                                     class="card-img" alt="Photo de {{$group->name}}">
                            @else
                                <small class="p-3 blockquote-footer">Pas de photo</small>
                            @endif


                            <div class="card-body">
                                <h5 class="card-title">{{$group->name}}</h5>
                                <p class="card-text">{{$group->desc}}</p>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <h3 class="display-4">Evenements correspondants à : {{$search}}</h3>
        <hr class="my-3 mx-5">
        <div class="card-columns">


            @foreach($events as $event)
                <a href="{{url('/events/show')}}/{{$event->id}}" style="text-decoration: none; color: inherit;">
                    <div class="p-3">
                        <div class="card rounded shadow-sm hvr-grow">
                            <div class="card-body">
                                <h5 class="card-title">{{$event->name}}</h5>
                                <p class="card-text">{{$event->description}}</p>
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
                        </div>
                    </div>
                </a>
            @endforeach


        </div>
    </div>

@endsection

@section('js')

    <script>

    </script>
@endsection

@section('css')


@endsection
