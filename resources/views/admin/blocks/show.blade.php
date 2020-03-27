@extends('layouts.nav')

@section('content')

    <div class="container">
        <div class="card shadow-sm p-5 mt-2">

            <div class="card-title display-4">
                Blocage #{{$block['target']->id}}

            </div>
            <hr class="mx-1">

            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">Concerné</div>
                    <div class="col-lg-8">{{$block['target']->fname}} {{$block['target']->lname}}</div>
                </div>
                <hr class="mx-3">
                <div class="row">
                    <div class="col-lg-4">Emetteur</div>
                    <div class="col-lg-8">{{$block['blocker']->fname}} {{$block['blocker']->lname}}</div>
                </div>
                <hr class="mx-3 my-4">
                <div class="row">
                    <div class="col-lg-4">Description</div>
                    <div class="col-lg-8">{{$block['block']->description}}</div>
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
                       href="{{url('/admin/blocks/delete/'. $block['block']->id)}}">
                        <i class="fas fa-trash"></i>
                        Supprimer le Blocage
                    </a>

                </div>
                <div class="mx-2">
                    <a class="btn btn-danger" style="color: white"
                       href="{{url('/admin/users/delete/'. $block['target']->id)}}">
                        <i class="fas fa-trash"></i>
                        Supprimer {{$block['target']->fname}} {{$block['target']->lname}}
                    </a>

                </div>
            </div>

        </div>
    </div>
@endsection
