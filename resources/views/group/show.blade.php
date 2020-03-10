@extends('layouts.nav')

@section('content')

    <div class="container-fluid">
        <div class="card rounded shadow-lg mb-3 mx-auto h-100" style="width: 95%">
            <div class="row no-gutters">
                <div class="col-md-4 m-auto" style="overflow: hidden;">

                    <img src="{{url('/storage/upload/image/'.$group->picrepo.'/'.$group->picname)}}"
                         class="card-img hvr-grow" alt="Photo de {{$group->name}}">

                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title display-4">{{$group->name}}</h5>
                        @if($group->desc != null)<h5 class="text-muted ml-3">{{$group->desc}}</h5>@endif
                        <hr class="mx-4 my-4">

                        <div class="h-50 p-3" style="height: 40vh!important; overflow-y: scroll!important;">


                            @foreach($listEvent as $event)
                                <div class="p-4 shadow-sm mt-2">
                                    <h5>{{$event->name}}</h5>
                                    <p class="text-muted">{{$event->description}}</p>
                                    <p style="text-transform: capitalize">à {{$event->numstreet}} {{$event->street}}</p>
                                    <p>{{$event->zip}} - {{$event->city}}</p>
                                    <hr class="my-3 mx-5">
                                    <p class="text-muted">De {{$event->datefrom}} à {{$event->dateto}}</p>
                                </div>
                            @endforeach
                        </div>


                        <div class="d-flex justify-content-between px-5 mt-4">
                            <p class="card-text"><small class="text-muted">Créé le {{$group->datecreate}}</small></p>
                            <a href="{{url('/groups/subscribe/')}}/{{$group->id}}"
                               class="btn btn-primary ">S'abonner</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

