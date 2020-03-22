@extends('layouts.nav')

@section('title')
    Supression
@endsection

@section('content')

    <div class="container p-5">
        <div class="card shadow-lg p-5 glow-danger">
            <h3 class="display-4 text-center">Vous ne pouvez pas supprimer <br> {{$user->fname}} {{$user->lname}}.</h3>

            <hr class="mx-5 my-3">

            <p class="lead p-1">En effet, {{$user->fname}} {{$user->lname}} est administrateur du site.</p>
            <p class="pl-3">Cependant, vous pouvez le deshériter de ses droits.</p>

            <hr class="mx-5 my-3">
            <div class="row justify-content-end">

                <a href="{{url('/admin')}}" class="btn btn-secondary mx-2"> <i class="fas fa-arrow-right"></i>
                    Retour</a>
                <a href="{{url('/admin/roles/')}}" class="btn btn-danger mx-2"> <i class="fas fa-user-times"></i>
                    Deshériter {{$user->fname}} {{$user->lname}}</a>

            </div>

        </div>
    </div>
@endsection
