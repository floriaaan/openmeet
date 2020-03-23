@extends('layouts.index')

@section('title')
    Installation
@endsection

@section('body')

    <div class="container-fluid wall-white max-height">

        <div class="mx-auto w-50">
            <h1 class="openmeet-title text-center om-size" style="color:#007BFF;">OpenMeet</h1>

            <h2 class="display-4">Votre installation est prête.</h2>
            <p class="lead mt-1">{{ Setting('openmeet.name') }} est fonctionnel</p>
            <hr class="my-4">
            <p>Vous allez avoir accès à votre site, n'oubliez pas les coordonnées de connexion que vous venez
                d'entrer</p>
            <a class="btn btn-primary" href="/" role="button">Accéder à {{ Setting('openmeet.name') }}</a>

        </div>

    </div>

@endsection
