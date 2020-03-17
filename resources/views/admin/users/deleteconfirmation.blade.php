@extends('layouts.nav')

@section('content')

    <div class="container p-5">

        <div class="card shadow-lg p-3" style="opacity: 0.8">

            <h3 class="display-4 text-center mt-4">Voulez-vous vraiment supprimer {{$user->fname}} {{$user->lname}} ?</h3>
            <hr class="mx-3 my-5">
            <p class="lead p-5">Cette action est irréversible. Etes-vous vraiment sûr de vouloir faire ceci?</p>

            <div class="mt-3 d-flex justify-content-end">
                <div class="mx-2">
                    <a class="btn btn-primary" href="{{url('/admin')}}">
                        <i class="fas fa-times"></i> Annuler
                    </a>
                </div>
                <div class="mx-2">
                    <a class="btn btn-danger" style="color: white"
                       onclick="event.preventDefault();document.getElementById('confirm').submit();">
                        <i class="fas fa-trash"></i> Confirmer
                    </a>
                    <form id="confirm" action="{{ url('/admin/users/delete') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                        <input type="hidden" name="user" value="{{$user->id}}">
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
