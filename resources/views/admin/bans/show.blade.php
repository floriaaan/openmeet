@extends('layouts.nav')

@section('content')

    <div class="container">
        <div class="card shadow-sm p-5 mt-2">

            <div class="card-title display-4">
                Bannissement #{{$ban['banned']->id}}

            </div>

            <hr class="mx-1">

            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">Concerné</div>
                    <div class="col-lg-8">{{$ban['banned']->fname}} {{$ban['banned']->lname}}</div>
                </div>
                <hr class="mx-3">
                <div class="row">
                    <div class="col-lg-4">Emetteur</div>
                    <div class="col-lg-8">{{$ban['banisher']->name}}</div>
                </div>
                <hr class="mx-3 my-4">
                <div class="row">
                    <div class="col-lg-4">Description</div>
                    <div class="col-lg-8">{{$ban['ban']->description}}</div>
                </div>

            </div>

            <hr class="mx-1">
            <div class="mt-3 d-flex justify-content-end">
                <div class="mx-2">
                    <a class="btn btn-primary" href="{{url('/admin')}}">
                        <i class="fas fa-times"></i> Annuler
                    </a>
                </div>
                <div class="mx-2">
                    <a class="btn btn-danger" style="color: white"
                       href="{{url('/admin/bans/delete/'. $ban['ban']->id)}}">
                        <i class="fas fa-trash"></i>
                        Supprimer le Bannissement
                    </a>

                </div>
                <div class="mx-2">
                    <a class="btn btn-danger" style="color: white"
                       href="{{url('/admin/users/delete/'. $ban['banned']->id)}}">
                        <i class="fas fa-trash"></i>
                        Supprimer {{$ban['banned']->fname}} {{$ban['banned']->lname}}
                    </a>

                </div>
            </div>

        </div>
    </div>
@endsection
