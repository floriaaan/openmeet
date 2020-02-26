@extends('index')

@section('titre')
    OpenMeet - Installation
@endsection

@section('body')
    <div class="max-height wall-white">
        <div class="container-fluid">
            <div class="mx-auto w-50">
                {!! Form::open(['url' => '/Install']) !!}
                <h1 class="openmeet-title text-center openmeet-color">OpenMeet</h1>
                <div class="form-group {!! $errors->has('iName') ? 'is_invalid' : '' !!}">
                    {!! Form::label('iName', 'Nom du site', ['class' =>'control-label']) !!}
                    {!! Form::text('iName', $value = null, ['class' => 'form-control', 'placeholder' => 'Nom du site']) !!}
                    {!! $errors->first('iName', '<small class="text-danger">Le champ Nom du site est incorrect.</small>') !!}
                </div>

                <div class="form-group {!! $errors->has('iColor') ? 'is_invalid' : '' !!}">
                    {!! Form::label('iColor', 'Couleur primaire', ['class' =>'control-label']) !!}
                    {!! Form::color('iColor', $value='#007BFF', ['class' => 'form-control']) !!}

                </div>
                <hr>
                <div class="form-group row">

                    <div class="col-lg-6 {!! $errors->has('iUser') ? 'is_invalid' : '' !!}">
                        {!! Form::label('iUser', "Nom d'utilisateur administrateur", ['class' =>'control-label']) !!}
                        {!! Form::text('iUser', $value = 'admin', ['class' => 'form-control']) !!}
                        {!! $errors->first('iUser', '<small class="text-danger">Le champ Nom d\'utilisateur est incorrect.</small>') !!}
                    </div>


                    <div class="col-lg-6 {!! $errors->has('iPass') ? 'is_invalid' : '' !!}">
                        {!! Form::label('iPass', 'Mot de passe administrateur', ['class' =>'control-label']) !!}
                        {!! Form::password('iPass', ['class' => 'form-control', 'type' => 'password']) !!}
                        {!! $errors->first('iPass', '<small class="text-danger">Le champ Mot de passe est incorrect.</small>') !!}
                    </div>

                </div>
                <div class="form-group">
                    {!! Form::label('iMail', "Adresse mail administrateur", ['class' =>'control-label']) !!}
                    {!! Form::email('iMail', $value = null, ['class' => 'form-control']) !!}
                    {!! $errors->first('iMail', '<small class="text-danger">Le champ Adresse mail est incorrect.</small>') !!}
                </div>

                {!! Form::submit('Installer OpenMeet', ['class' => 'btn btn-primary mt-4 pull-right'] ) !!}

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
