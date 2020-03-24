@extends('layouts.nav')

@section('title')
    Signalement
@endsection

@section('content')

    <div class="container">
        <div class="card shadow-sm p-5 mt-2">

            <div class="card-title display-4">
                Signalement #{{$report['report']->id}}

            </div>
            @if($report['report']->isread)
                <span class="badge badge-success">Traité</span>
            @else
                <span class="badge badge-danger">Non traité</span>
            @endif
            <hr class="mx-1">

            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">Concerné</div>
                    <div class="col-lg-8">{{$report['concerned']->fname}} {{$report['concerned']->lname}}</div>
                </div>
                <hr class="mx-3">
                <div class="row">
                    <div class="col-lg-4">Emetteur</div>
                    <div class="col-lg-8">{{$report['sender']->fname}} {{$report['sender']->lname}}</div>
                </div>
                <hr class="mx-3 my-4">
                <div class="row">
                    <div class="col-lg-4">Description</div>
                    <div class="col-lg-8">{{$report['report']->description}}</div>
                </div>

            </div>

            <hr class="mx-1">
            <div class="mt-3 d-flex justify-content-end">
                <div class="mx-2">
                    <a class="btn btn-secondary" href="{{url('/admin')}}">
                        <i class="fas fa-times"></i> Annuler
                    </a>
                </div>
                <div class="mx-2">
                    <a class="btn btn-danger" style="color: white"
                       href="{{url('/admin/reports/delete/'. $report['report']->id)}}">
                        <i class="fas fa-trash"></i>
                        Supprimer le signalement
                    </a>

                </div>
                <div class="mx-2">
                    <a class="btn btn-warning" style="color: white"
                       href="{{url('/admin/users/delete/'. $report['concerned']->id)}}">
                        <i class="fas fa-radiation-alt"></i>
                        Désactiver {{$report['concerned']->fname}} {{$report['concerned']->lname}}
                    </a>

                </div>
            </div>

        </div>
    </div>
@endsection
