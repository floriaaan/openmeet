@extends('layouts.nav')

@section('title')
    Importer depuis Meetup.com
@endsection

@section('content')

    <div class="container">
        <div class="card mt-5 shadow-lg p-3">
            <form method="post" class="mx-auto w-100" action="{{url('/frommeetup/event')}}">
                <input type="text" placeholder="Entrez le lien de la page de votre groupe sur meetup.com"
                       class="form-control text-center" name="url">

                <hr class="m-5">

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Confirmer</button>
                </div>
            </form>
        </div>
    </div>


@endsection
