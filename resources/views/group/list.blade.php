@extends('layouts.nav')

@section('content')
    <div class="container ">
        @foreach($listGroups as $group)
            <div class="card rounded shadow mt-2 mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4" style="overflow: hidden">
                        <img src="{{url('/storage/upload/image/'.$group->picrepo.'/'.$group->picname)}}"
                             class="card-img hvr-grow" alt="Photo de {{$group->name}}">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{$group->name}}</h5>
                            <p class="card-text">Prochain événement : <span></span></p>
                            <p class="card-text"><small class="text-muted">Créé le {{$group->datecreate}}</small></p>
                        </div>
                        <div class="">
                            <a href="{{url('/groups/show/')}}/{{$group->id}}"
                               class="btn btn-primary float-right mr-5">Voir {{$group->name}}</a>
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
            height: 200px;
        }
    </style>
@endsection
