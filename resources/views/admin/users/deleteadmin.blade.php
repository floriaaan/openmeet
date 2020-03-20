@extends('layouts.nav')

@section('title')
    Supression
@endsection

@section('content')

    <div class="container p-5">
        <div class="card shadow-lg p-3">
            <h3 class="display-4">Vous ne pouvez pas supprimer un administrateur.</h3>

            <hr class="mx-5 my-3">
            <a href="{{url('/admin')}}" class="btn btn-link"> <i class="fas fa-arrow-right"></i> Retour</a>
        </div>
    </div>
@endsection
