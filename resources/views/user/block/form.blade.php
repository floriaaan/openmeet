@extends('layouts.nav')

@section('title')
    Bloquer
@endsection

@section('content')

    <div class="container">
        <form action="{{url('/user/block')}}" class="" method="POST">
            @csrf
            <div class="card shadow-lg mx-auto">
                <h5 class="display-4 p-3 ml-4 ">Bloquer {{$target->fname}} {{$target->lname}}</h5>

                <hr class="mx-5 my-3">
                <div class="form-group mx-5">
                    <label for="description">
                        Décrivez-nous pourquoi vous bloquez cette personne :
                        <small>(30 caractères minimums)</small>
                    </label>
                    <textarea class="form-control @error('description') is-invalid @enderror"
                              id="description"
                              name="description"
                              rows="10"
                              required>{{old('description')}}</textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <hr class="mx-5 my-3">


                <div class="row justify-content-end p-3">
                    <button type="submit" class="btn btn-primary mr-3 w-25">
                        Envoyer
                    </button>

                </div>
            </div>
            <input type="hidden" name="blocker" value="{{auth()->id()}}">
            <input type="hidden" name="target" value="{{$target->id}}">
        </form>
    </div>

@endsection
