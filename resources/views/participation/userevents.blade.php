@extends('layouts.nav')

@section('content')
    <div class="container ">
        @foreach($listEvents as $event)
            <div class="card rounded shadow mt-2 mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4" style="overflow: hidden">
                        <img src="{{url('/storage/upload/image/'.$event->picrepo.'/'.$event->picname)}}"
                             class="card-img hvr-grow" alt="Photo de {{$event->name}}">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{$event->name}}</h5>
                            <h6 class="text-muted">{{$event->desc}}</h6>
                            <hr class="mx-4 my-4">
                            <p class="card-text mt-1">Prochain événement : <span></span></p>
                            <p class="card-text"><small class="text-muted">Créé le {{$event->datecreate}}</small></p>
                        </div>
                        <div class="">
                            <a href="{{url('/groups/show/')}}/{{$event->id}}"
                               class="btn btn-primary float-right mr-5 mb-3">Voir {{$event->name}}</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection

@section('css')
    <style>
        .card-img {
            width: auto !important;
            height: 275px;
        }
    </style>
@endsection
