@extends('layouts.nav')

@section('content')

    <div class="position-relative container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div id="list-example" class="list-group">
                    <a class="list-group-item list-group-item-action" href="#list-item-1">Paramètres du Site</a>
                    <a class="list-group-item list-group-item-action" href="#list-item-2">Thèmes</a>
                    <a class="list-group-item list-group-item-action" href="#list-item-3">Item 3</a>
                    <a class="list-group-item list-group-item-action" href="#list-item-4">Item 4</a>
                </div>
            </div>

            <div class="col-lg-9">
                <div data-spy="scroll" data-target="#list-example" data-offset="0" class="scrollspy">
                    <h4 id="list-item-1">Paramètres de {{ Setting('openmeet.name') }}</h4>
                    <div class="card">
                        {!! Form::open(['url' => '/admin/edit']) !!}
                        <div class="form-group">
                            {!! Form::label('uName', 'Nom du site', ['class' =>'control-label']) !!}
                            {!! Form::text('uName', $value = Setting('openmeet.name'), ['class' => 'form-control', 'placeholder' => 'Nom du site']) !!}
                            {!! $errors->first('uName', '<small class="text-danger">Le champ Nom du site est incorrect.</small>') !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('uColor', 'Couleur primaire', ['class' =>'control-label']) !!}
                            {!! Form::color('uColor', $value=Setting('openmeet.color'), ['class' => 'form-control']) !!}

                        </div>
                        {!! Form::submit('Valider les modifications', ['class' => 'btn btn-primary mt-4 pull-right'] ) !!}

                        {!! Form::close()!!}
                    </div>


                    <h4 id="list-item-2">Thèmes</h4>
                    <p>...</p>
                    <h4 id="list-item-3">Item 3</h4>
                    <p>...</p>
                    <h4 id="list-item-4">Item 4</h4>
                    <p>...</p>
                </div>
            </div>
        </div>
    </div>


@endsection

