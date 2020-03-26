@extends('layouts.nav')

@section('title')
    Editer mes pages
@endsection

@section('content')
    <script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <form action="{{url('/admin/edit/views')}}" method="POST">
        @csrf

        <div class="container">

            <div class="row justify-content-around">
                <div class="lead">Modifier les pages</div>
                <a href="{{url('/admin')}}" class="btn btn-primary">
                    <i class="fas fa-arrow-right"></i>
                    Retour
                </a>
            </div>

            <hr class="mx-5 my-4">

            <div class="row">
                <div class="form-group w-100">
                    <label for="home" class="lead text-center">Page Accueil</label>
                    <textarea name="home" id="home" class="form-control" rows="25">{{$home}}</textarea>
                    <!--<script>
                        let editor = CKEDITOR.replace('mail');
                        editor.config.height = '30vh';

                    </script>-->
                </div>
            </div>
            <hr class="my-3 mx-5">
            <div class="row">
                <div class="form-group w-100">
                    <label for="mail" class="lead text-center">Page Mail</label>
                    <textarea name="mail" id="mail" class="form-control" rows="25">{{$mail}}</textarea>
                    <!--<script>
                        let editor = CKEDITOR.replace('mail');
                        editor.config.height = '30vh';

                    </script>-->
                </div>
            </div>


            <button type="submit" class="btn btn-primary ml-2 mt-2">Valider</button>
        </div>


    </form>
@endsection


