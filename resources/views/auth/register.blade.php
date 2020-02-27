@extends('base.index')

@section('body')
    <div class="max-height wall-white">
        <div class="container-fluid">
            <div class="card mx-auto w-50">

                <img src="/assets/logo.svg" width="100" height="100" class="d-inline-block align-top mx-auto my-3"
                     alt="{{ Setting('openmeet.name') }}">
                <div class="openmeet-title openmeet-color openmeet-nav text-center">
                    {{ Setting('openmeet.name') }}
                </div>

                <div class="card-body">
                    {!! Form::open(['url' => '/register']) !!}

                    <div class="form-group row">


                        <div class="col-lg-6">
                            {!! Form::label('rFName', 'Prénom', ['class' =>'control-label']) !!}
                            {!! Form::text('rFName', $value = null, ['class' => 'form-control', 'placeholder' => 'Jean']) !!}
                            {!! $errors->first('rFName', '<small class="text-danger">Le champ Prénom est incorrect.</small>') !!}
                        </div>

                        <div class="col-lg-6">
                            {!! Form::label('rLName', 'Nom de famille', ['class' =>'control-label']) !!}
                            {!! Form::text('rLName', $value = null, ['class' => 'form-control', 'placeholder' => 'Dupont']) !!}
                            {!! $errors->first('rLName', '<small class="text-danger">Le champ Nom de famille est incorrect.</small>') !!}
                        </div>

                    </div>

                    <div class="form-group">
                        {!! Form::label('rBDate', 'Date de naissance', ['class' =>'control-label']) !!}
                        {!! Form::date('rBDate', date('Y-m-d'), ['class' => 'form-control', 'type' => 'password']) !!}
                        {!! $errors->first('rLName', '<small class="text-danger">Le champ Date de naissance est incorrect. Vous devez avoir plus de 18 ans</small>') !!}
                    </div>

                    <hr>
                    <div class="form-group">

                        {!! Form::label('mail', "Adresse mail", ['class' =>'control-label']) !!}
                        {!! Form::email('mail', $value = null, ['class' => 'form-control', 'placeholder' => 'jean.dupont@email.fr']) !!}
                        {!! $errors->first('mail', '<small class="text-danger">Le champ Adresse mail est incorrect.</small>') !!}


                    </div>
                    <div class="form-group row">


                        <div class="col-lg-6">
                            {!! Form::label('rPass', 'Mot de passe', ['class' =>'control-label']) !!}
                            {!! Form::password('rPass', ['class' => 'form-control', 'type' => 'password']) !!}
                            {!! $errors->first('rPass', '<small class="text-danger">Le champ Mot de passe est incorrect.</small>') !!}
                        </div>

                        <div class="col-lg-6">
                            {!! Form::label('rPass_confirmation', 'Confirmation du mot de passe', ['class' =>'control-label']) !!}
                            {!! Form::password('rPass_confirmation', ['class' => 'form-control', 'type' => 'password']) !!}
                            {!! $errors->first('rPass_confirmation', '<small class="text-danger">Le champ Mot de passe est incorrect.</small>') !!}
                        </div>

                    </div>


                    {!! Form::submit('S\'inscrire', ['class' => 'btn btn-primary mt-4 pull-right'] ) !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
