@extends('group.admin.groups.resources.views.layouts.nav')

@section('title')
    Groupes
@endsection

@section('content')
    <div class="container-fluid p-5">
        <div class="card-columns">


            @foreach($listGroups as $group)


                <div class="card rounded shadow mt-2 mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-4" style="overflow: hidden">

                            @if($group->picname != null)
                                <img src="{{url('/storage/upload/image/'.$group->picrepo.'/'.$group->picname)}}"
                                     class="card-img hvr-grow" alt="Photo de {{$group->name}}">
                            @else
                                <small class="p-3 blockquote-footer">Pas de photo</small>
                            @endif
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{$group->name}}</h5>
                                <h6 class="text-muted">{{$group->desc}}</h6>
                                <hr class="mx-4 my-4">
                                <p class="card-text"><small class="text-muted">Créé le {{$group->datecreate}}</small>
                                </p>
                            </div>
                            <div class="">
                                <a href="{{url('/groups/show/')}}/{{$group->id}}"
                                   class="btn btn-primary float-right mr-5 mb-3">Voir {{$group->name}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection

@section('css')
    <style>
        .card-columns {
            column-count: 2;
        }

        .card-img {
            width: auto !important;
            height: 275px;
        }
    </style>
@endsection
