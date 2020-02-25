@extends('index')

@section('titre')
    OpenMeet - Installation
@endsection

@section('body')
    <div class="container-fluid">
        <div class="mx-auto w-50">
            {!! Form::open(['url' => url('Install')]) !!}
            @csrf
            <h1 class="openmeet-title text-center h1 my-5 text-primary">OpenMeet</h1>
            <div class="form-group">
                {!! Form::label('iName', 'Nom du site', ['class' =>'control-label']) !!}
                {!! Form::text('iName', $value = null, ['class' => 'form-control', 'placeholder' => 'Nom du site']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('iColor', 'Couleur primaire', ['class' =>'control-label']) !!}
                {!! Form::color('iColor', $value='#007BFF', ['class' => 'form-control']) !!}
            </div>
            <hr>
            <div class="form-group row">
                <div class="col-lg-6">
                    {!! Form::label('iUser', "Nom d'utilisateur administrateur", ['class' =>'control-label']) !!}
                    {!! Form::text('iUser', $value = 'admin', ['class' => 'form-control']) !!}
                </div>

                <div class="col-lg-6">
                    {!! Form::label('iPass', 'Mot de passe administrateur', ['class' =>'control-label']) !!}
                    {!! Form::password('iPass', ['class' => 'form-control', 'type' => 'password']) !!}
                </div>
            </div>

            {!! Form::submit('Installer OpenMeet', ['class' => 'btn btn-primary mt-4 pull-right'] ) !!}

            {!! Form::close() !!}
        </div>

    </div>
@endsection

