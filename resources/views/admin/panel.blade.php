@extends('layouts.nav')

@section('content')



    <div class="jumbotron">
        <h1 class="display-4">Administration</h1>
        <p class="lead">Ceci est le panneau d'administration de {{ Setting('openmeet.name') }}</p>
        <hr class="my-4">

    </div>
    <div class="mx-2 my-2">
        <div class="card">
            <div class="card-header">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                           role="tab"
                           aria-controls="nav-home" aria-selected="true">Accueil</a>

                        <a class="nav-item nav-link" id="nav-manage-tab" data-toggle="tab" href="#nav-manage" role="tab"
                           aria-controls="nav-manage" aria-selected="false">Gestion du site</a>

                        <a class="nav-item nav-link" id="nav-users-tab" data-toggle="tab" href="#nav-users" role="tab"
                           aria-controls="nav-users" aria-selected="false">Utilisateurs</a>

                        <a class="nav-item nav-link" id="nav-groups-tab" data-toggle="tab" href="#nav-groups" role="tab"
                           aria-controls="nav-groups" aria-selected="false">Groupes</a>

                        <a class="nav-item nav-link" id="nav-events-tab" data-toggle="tab" href="#nav-events" role="tab"
                           aria-controls="nav-events" aria-selected="false">Evenements</a>

                    </div>
                </nav>
            </div>
            <div class="card-body">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">


                    </div>

                    <div class="tab-pane fade show" id="nav-manage" role="tabpanel"
                         aria-labelledby="nav-manage-tab">

                        {!! Form::open(['url' => '/Admin/edit']) !!}
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

                    <div class="tab-pane fade" id="nav-users" role="tabpanel" aria-labelledby="nav-users-tab">

                    </div>

                    <div class="tab-pane fade" id="nav-groups" role="tabpanel" aria-labelledby="nav-groups-tab">

                    </div>

                    <div class="tab-pane fade" id="nav-events" role="tabpanel" aria-labelledby="nav-events-tab">

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
