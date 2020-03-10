@extends('layouts.nav')

@section('content')
    <div class="container ">
        @foreach($events as $event)
            <div class="card rounded shadow mt-2 mb-3">
                <div class="row no-gutters">
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{$event->name}}</h5>
                            <h6 class="text-muted">{{$event->description}}</h6>
                            <hr class="mx-4 my-4">
                            <h6 class="text-muted">{{$event->datefrom}}</h6>
                            <h6 class="text-muted">{{$event->dateto}}</h6>
                            <h6 class="text-muted">{{$event->country}}</h6>
                            <h6 class="text-muted">{{$event->city}},{{$event->zip}},{{$event->numstreet}}  {{$event->street}}</h6>
                            <hr class="mx-4 my-4">
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
