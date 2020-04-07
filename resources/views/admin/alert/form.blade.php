@extends('layouts.nav')

@section('title')
    Créer une alerte
@endsection

@section('content')

    <div class="container p-2">
        <form action="{{url('/admin/alert')}}" method="post">
            @csrf
            <div class="card shadow-lg p-5">

                <div class="form-group my-2">
                    <label for="title">
                        Titre de l'alerte
                    </label>
                    <input type="text" class="form-control form-control-lg" name="title" id="title" required>
                </div>

                <div class="form-group my-2">
                    <label for="link">
                        Lien de l'alerte (optionnel)
                    </label>
                    <input type="text" class="form-control" name="link" id="link">
                </div>

                <div class="form-group mt-2">
                    <label for="content">
                        Contenu de l'alerte
                    </label>
                    <textarea rows="5" class="form-control" name="content" id="content" required></textarea>
                </div>

                <hr class="mx-3 my-4">

                <div class="row">

                    <div class="col-lg-6 justify-content-center">
                        <p class="text-center">📌 Emplacement de l'alerte</p>
                        <hr class="mx-4 my-1">

                        <div class="custom-control custom-checkbox my-4">
                            <input type="checkbox" class="custom-control-input" id="home" name="home">
                            <label class="custom-control-label" for="home">Page Accueil 🏡</label>
                        </div>

                        <div class="custom-control custom-checkbox my-4">
                            <input type="checkbox" class="custom-control-input" id="group" name="group">
                            <label class="custom-control-label" for="group">Page Groupe 👨‍👩‍👧‍👦</label>
                        </div>

                        <div class="custom-control custom-checkbox my-4">
                            <input type="checkbox" class="custom-control-input" id="groupList" name="groupList">
                            <label class="custom-control-label" for="groupList">Page Liste des groupes 📚</label>
                        </div>

                        <div class="custom-control custom-checkbox my-4">
                            <input type="checkbox" class="custom-control-input" id="event" name="event">
                            <label class="custom-control-label" for="event">Page Evenement 📒</label>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <p class="text-center">🔴 Couleur de l'alerte</p>
                        <hr class="mx-4 my-1">

                        <div class="custom-control custom-radio my-5">
                            <input type="radio" id="success" value="success" name="color" class="custom-control-input">
                            <label class="custom-control-label" for="success">
                                <span class="alert alert-success" role="alert">
                                   Une alerte verte!
                                </span>
                            </label>
                        </div>
                        <div class="custom-control custom-radio my-5">
                            <input type="radio" id="warning" value="warning" name="color" class="custom-control-input" checked>
                            <label class="custom-control-label" for="warning">
                                <span class="alert alert-warning" role="alert">
                                    Une alerte jaune!
                                </span>
                            </label>
                        </div>
                        <div class="custom-control custom-radio mt-5 mb-3">
                            <input type="radio" id="info" value="info" name="color" class="custom-control-input">
                            <label class="custom-control-label w-100" for="info">
                                <span class="alert alert-info" role="alert">
                                    Une alerte bleue!
                                </span>
                            </label>
                        </div>

                    </div>

                </div>

                <hr class="mx-5 my-2">

                <div class="row justify-content-end">
                    <button type="submit" class="btn btn-primary mx-2">Créer une alerte</button>
                </div>


            </div>
        </form>
    </div>

@endsection

@section('css')
    <style>
        .card {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }
    </style>
@endsection
