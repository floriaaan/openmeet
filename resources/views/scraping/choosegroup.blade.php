@extends('layouts.nav')

@section('content')
    <div class="container-fluid flex-column align-self-center align-items-center justify-content-center">
        <div class="container flex-column align-self-center align-items-center justify-content-center">
            <form method="post" action="/frommeetup/group">
                @csrf
                <input type="text" placeholder="Entrez le lien de la page de votre groupe sur meetup.com" class="input-group-text w-75 text-center align-self-center" name="url">
                <div>
                    <button type="submit" class="btn btn-primary w-75">Confirmer</button>
                </div>
            </form>
        </div>
    </div>

@endsection
