@extends('layouts.nav')

@section('title')
    Rôles
@endsection

@section('content')

    <form action="{{url('/admin/roles')}}" method="POST">
        @csrf

        <div class="container p-5">
            <div class="row justify-content-end">
                <a class="btn btn-link mx-2"
                   href="{{url('/admin')}}">
                    Retour
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <div class="card shadow-lg p-3">
                <h3 class="text-center mt-2 display-4">Rôles de <br> {{$user->fname}} {{$user->lname}}</h3>
                <hr class="mx-3 my-5">

                <div class="form-group p-4">

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" @if($user->isadmin) checked @endif name="admin" class="custom-control-input" id="admin">
                        <label class="custom-control-label" for="admin">Administrateur du site</label>
                    </div>
                </div>
                <hr class="mx-3 my-5">

                <div class="row justify-content-end">
                    <button type="submit" class="btn btn-primary mx-2">
                        Changer les rôles de {{$user->fname}} {{$user->lname}}
                    </button>
                </div>

            </div>

        </div>
        <input type="hidden" name="user" value="{{$user->id}}">
    </form>

@endsection
