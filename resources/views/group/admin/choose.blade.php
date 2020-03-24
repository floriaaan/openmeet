@extends('layouts.nav')

@section('content')

    <div class="container">
        <div class="card p-5 shadow-lg mx-auto">

            <p class="text-center lead">Quel groupe voulez-vous gérer?</p>
            <hr class="m-5">

            <div class="row justify-content-center">

                <form method="post" action="{{url('/groups/admin/')}}">
                    @csrf

                    <div class="input-group mt-2">

                        <div class="input-group-prepend">
                            <span class="input-group-text">Groupe</span>
                        </div>

                        <select class="form-control" name="pGroup">
                            @foreach($groupList as $group)
                                <option value="{{$group->id}}">{{$group->name}}</option>
                            @endforeach
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-primary">Valider</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
