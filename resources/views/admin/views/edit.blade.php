@extends('layouts.nav')

@section('title')
    Editer mes pages
@endsection

@section('content')
    <script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <form action="{{url('/admin/edit/views')}}" method="POST">
        @csrf

        <div class="container">

            <label for="mail">Page Mail</label>
            <div id="toolbar"></div>
            <textarea name="mail" id="mail" class="form-control" style="height: 40%!important;">
                {{$mail}}
            </textarea>
            <script>
                let editor = CKEDITOR.replace('mail');
                editor.config.height = '30vh';

            </script>


            <button type="submit" class="btn btn-primary ml-2 mt-2">Valider</button>
        </div>


    </form>
@endsection


