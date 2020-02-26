@extends('base.index')

@section('body')

    <div class="container-fluid wall-white max-height">

        <div class="mx-auto w-50">
            <h1 class="openmeet-title text-center openmeet-color om-size">OpenMeet</h1>

            <h2 class="display-4">Votre installation est prête.</h2>
            <p class="lead mt-1">{{ config('openmeet.name') }} est fonctionnel</p>
            <hr class="my-4">
            <p>Vous allez avoir accès à votre site, n'oubliez pas les coordonnées de connexion que vous venez
                d'entrer</p>
            <a class="btn btn-openmeet" href="/" role="button">Accéder à {{ config('openmeet.name')  }}</a>

        </div>

    </div>

@endsection
