@extends('layouts.nav')

@section('content')
    <div class="container-fluid flex-column align-items-center justify-content-center">
        <div class="container flex-column align-items-center justify-content-center">
            <form method="post" action="/frommeetup/event">
                @csrf
                <input type="text" placeholder="Entrez le lien de la page de votre évènement sur meetup.com" class="w-75 input-group-text" name="url">
                <div>
                    <button type="submit" class="btn btn-primary w-75">Confirmer</button>
                </div>
            </form>
        </div>
    </div>

@endsection
