@extends('layouts.nav')

@section('content')

    <div class="container position-relative" style="height: 100%">
        <div class="row">
            <div class="col-lg-3 d-none-custom">


                <div class="list-group position-fixed w-list-admin" style="margin-top: 1px">
                    <h5 class="list-title">Paramètres du site</h5>
                    <a class="list-group-item list-group-item-action" href="#settings">
                        Paramètres du site

                    </a>
                    <a class="list-group-item list-group-item-action" href="#theming">
                        Thèmes

                    </a>
                    <a class="list-group-item list-group-item-action" href="#privacy">
                        Confidentialité

                    </a>
                </div>

                <div class="list-group position-fixed w-list-admin" style="margin-top: 180px">
                    <h5 class="list-title">Paramètres relatifs aux utilisateurs</h5>
                    <a class="list-group-item list-group-item-action" href="#users">
                        Utilisateurs
                        <span class="badge badge-primary badge-pill">{{$userCount}}</span>
                    </a>
                    <a class="list-group-item list-group-item-action" href="#reports">
                        Signalements d'utilisateurs
                        <span class="badge badge-primary badge-pill">{{$reportCount}}</span>
                    </a>
                <!--
                    <a class="list-group-item list-group-item-action" href="#bans">
                        Banissements d'utilisateurs
                        <span class="badge badge-primary badge-pill">{{$banCount}}</span>
                    </a>
                    <a class="list-group-item list-group-item-action" href="#blocks">
                        Blocages d'utilisateurs
                        <span class="badge badge-primary badge-pill">{{$blockCount}}</span>
                    </a>-->
                    <a class="list-group-item list-group-item-action" href="#messages">
                        Messages
                        <span class="badge badge-primary badge-pill">{{$messageCount['foruser']}}</span>
                    </a>
                </div>

                <div class="list-group position-fixed w-list-admin" style="margin-top: 410px">
                    <h5 class="list-title">Paramètres relatifs aux groupes/événements</h5>
                    <a class="list-group-item list-group-item-action" href="#groups">
                        Groupes
                        <span class="badge badge-primary badge-pill">{{ $groupCount }}</span>
                    </a>
                    <a class="list-group-item list-group-item-action" href="#events">
                        Evénements
                        <span class="badge badge-primary badge-pill">{{$eventCount}}</span>
                    </a>
                    <a class="list-group-item list-group-item-action" href="#gmessages">
                        Messages de groupes
                        <span class="badge badge-primary badge-pill">{{$messageCount['forgroup']}}</span>
                    </a>
                </div>
            </div>

            <div class="col-lg-9">
                <div>
                    <h4 id="settings" class="my-5">Paramètres de {{ Setting('openmeet.name') }}</h4>
                    <div>
                        {!! Form::open(['url' => '/admin/edit/settings']) !!}
                        <div class="form-group">
                            {!! Form::label('uName', 'Nom du site', ['class' =>'control-label']) !!}
                            {!! Form::text('uName', $value = Setting('openmeet.name'), ['class' => 'form-control', 'placeholder' => 'Nom du site']) !!}
                            {!! $errors->first('uName', '<small class="text-danger">Le champ Nom du site est incorrect.</small>') !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('uColor', 'Couleur primaire', ['class' =>'control-label']) !!}
                            {!! Form::color('uColor', $value=Setting('openmeet.color'), ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('uSlogan', 'Slogan du site', ['class' =>'control-label']) !!}
                            {!! Form::text('uSlogan', $value = Setting('openmeet.slogan'), ['class' => 'form-control', 'placeholder' => 'Slogan']) !!}
                            {!! $errors->first('uSlogan', '<small class="text-danger">Le champ Slogan est incorrect.</small>') !!}
                        </div>
                        {!! Form::submit('Valider les modifications', ['class' => 'btn btn-primary mt-4 pull-right'] ) !!}

                        {!! Form::close()!!}
                    </div>


                    <h4 id="theming" class="my-5">Thèmes</h4>
                    <form method="POST" action="{{ url('/admin/edit/theme') }}">
                        @csrf
                        <div class="row justify-content-between">
                            <div>
                                <div class="btn-group btn-group-toggle mx-2" data-toggle="buttons">
                                    <label class="btn btn-light @if(Setting('openmeet.theme') == "day")active @endif">
                                        <input type="radio" name="theme" value="day" autocomplete="off"
                                               @if(Setting('openmeet.theme') == "day")checked @endif>
                                        <i class="fas fa-sun"></i> Jour
                                    </label>
                                    <label class="btn btn-dark @if(Setting('openmeet.theme') == "night")active @endif">
                                        <input type="radio" name="theme" value="night" autocomplete="off"
                                               @if(Setting('openmeet.theme') == "night")checked @endif>
                                        <i class="fas fa-moon"></i> Nuit
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary ">Valider les modifications</button>
                        </div>


                    </form>
                    <div class="row justify-content-end mt-2">
                        <a href="{{url('/admin/edit/views')}}" class="btn btn-secondary mt-2">Modifier les pages</a>

                    </div>


                    <h4 id="privacy" class="my-5">Confidentialité</h4>
                    <form action="/admin/edit/privacy" method="POST">
                        @csrf
                        <div class="row justify-content-between">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="robots" id="robots"
                                       @if(Setting('openmeet.robots'))checked @endif>
                                <label class="custom-control-label" for="robots">
                                    Visible sur Google (fichier robots.txt)
                                </label>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                Valider les modifications
                            </button>
                        </div>
                    </form>


                </div>

                <hr class="my-5">

                <div>
                    <h4 id="users" class="my-5">Utilisateurs (5 derniers utilisateurs)</h4>
                    <div class="table-responsive">

                        <table class="table table-striped">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prenom</th>
                                <th scope="col">Email</th>
                                <th scope="col">Admin</th>
                                <th scope="col">Actions</th>

                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($userList))
                                @foreach($userList as $user)
                                    <tr>
                                        <td>#{{ $user->id }}</td>
                                        <td>{{ $user->lname }}</td>
                                        <td>{{ $user->fname }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>@if($user->isadmin)
                                                <span class="badge badge-pill badge-success">
                                                <i class="fas fa-user-check"></i>
                                            </span>
                                            @else
                                                <span class="badge badge-pill badge-danger">
                                                <i class="fas fa-user-times"></i>
                                            </span>
                                            @endif
                                        </td>
                                        <td>

                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a class="btn btn-success" href="/user/show/{{ $user->id }}">
                                                    <i class="far fa-eye"></i>
                                                </a>

                                                <a class="btn btn-warning" href="/user/report/{{ $user->id }}">
                                                    <i class="fas fa-exclamation-triangle"></i>
                                                </a>
                                                <a class="btn btn-danger" href="/admin/users/delete/{{ $user->id }}">
                                                    <i class="fas fa-skull-crossbones"></i>
                                                </a>
                                            </div>

                                        </td>
                                    </tr>

                                @endforeach
                            @endif


                            </tbody>
                        </table>

                        <a href="{{url('/admin/users/')}}" class="btn btn-primary float-right">Voir plus</a>
                    </div>

                    <h4 id="reports" class="my-5">Signalements des utilisateurs (10 derniers signalements)</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Concerné</th>
                                <th scope="col">Envoyé par</th>
                                <th scope="col">Créé le</th>

                                <th scope="col">Actions</th>

                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($reportList))

                                @foreach($reportList as $report)

                                    <tr>
                                        <td>#{{ $report['report']->id }}</td>
                                        <td>{{ $report['concerned']->fname }} {{ $report['concerned']->lname }}</td>
                                        <td>{{ $report['sender']->fname }} {{ $report['sender']->lname }}</td>
                                        <td>{{ $report['report']->date }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a class="btn btn-success"
                                                   href="/admin/reports/show/{{ $report['report']->id }}">
                                                    <i class="far fa-eye"></i>
                                                </a>

                                                <a class="btn btn-danger"
                                                   href="/admin/reports/delete/{{ $report['report']->id }}">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </div>

                                        </td>

                                    </tr>

                                @endforeach
                            @endif

                            </tbody>
                        </table>

                        <a href="{{url('/admin/reports')}}" class="btn btn-primary float-right">Voir plus</a>
                    </div>
                    <h4 id="bans" class="my-5">Bannissement des utilisateurs (10 derniers Bannissements)</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Concerné</th>
                                <th scope="col">Du groupe</th>
                                <th scope="col">Créé le</th>
                                <th scope="col">Actions</th>

                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($banList))

                                @foreach($banList as $ban)

                                    <tr>
                                        <td>#{{ $ban['ban']->id }}</td>
                                        <td>{{ $ban['banned']->fname }} {{ $ban['banned']->lname }}</td>
                                        <td>{{ $ban['banisher']->name }}</td>
                                        <td>{{ $ban['ban']->date }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a class="btn btn-success"
                                                   href="/admin/ban/show/{{ $ban['ban']->id }}">
                                                    <i class="far fa-eye"></i>
                                                </a>

                                                <a class="btn btn-danger"
                                                   href="/admin/ban/delete/{{ $ban['ban']->id }}">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </div>

                                        </td>

                                    </tr>

                                @endforeach
                            @endif

                            </tbody>
                        </table>

                        <a href="{{url('/admin/bans/')}}" class="btn btn-primary float-right">Voir plus</a>
                    </div>
                    <h4 id="blocks" class="my-5">Blocages des utilisateurs (10 derniers Blocages)</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Concerné</th>
                                <th scope="col">Par</th>
                                <th scope="col">Créé le</th>
                                <th scope="col">Actions</th>

                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($blockList))

                                @foreach($blockList as $block)

                                    <tr>
                                        <td>#{{ $block['block']->id }}</td>
                                        <td>{{ $block['target']->fname }} {{ $block['target']->lname }}</td>
                                        <td>{{ $block['blocker']->fname }} {{ $block['blocker']->lname }}</td>
                                        <td>{{ $block['block']->date }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a class="btn btn-success"
                                                   href="/admin/ban/show/{{ $block['block']->id }}">
                                                    <i class="far fa-eye"></i>
                                                </a>

                                                <a class="btn btn-danger"
                                                   href="/admin/ban/delete/{{ $block['block']->id }}">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </div>

                                        </td>

                                    </tr>

                                @endforeach
                            @endif

                            </tbody>
                        </table>

                        <a href="{{url('/admin/blocks/')}}" class="btn btn-primary float-right">Voir plus</a>
                    </div>

                    <h4 id="messages" class="my-5">Messages des utilisateurs (10 derniers messages)</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Envoyé par</th>
                                <th scope="col">Reçu par</th>
                                <th scope="col">Contenu</th>
                                <th scope="col">Date</th>
                                <th scope="col">Lu</th>

                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($messageList))

                                @foreach($messageList as $message)
                                    @if($message['msg']->forgroup == 0)
                                        <tr>
                                            <td>#{{ $message['msg']->id }}</td>
                                            <td>{{ $message['sender']->fname }} {{ $message['sender']->lname }}</td>
                                            <td>{{ $message['receiver']->fname }} {{ $message['receiver']->lname }}</td>
                                            <td>{{ $message['msg']->content }}</td>
                                            <td>{{ $message['msg']->date }}</td>
                                            <td>
                                                @if($message['msg']->isread)
                                                    <span class="badge badge-pill badge-success">
                                                        <i class="far fa-bookmark"></i> Lu
                                                    </span>
                                                @else
                                                    <span class="badge badge-pill badge-danger">
                                                        <i class="fas fa-bookmark"></i> Non lu
                                                    </span>
                                                @endif
                                            </td>

                                        </tr>

                                    @endif
                                @endforeach
                            @endif
                            </tbody>
                        </table>

                    </div>
                </div>

                <hr class="my-5">

                <div>
                    <h4 id="groups" class="my-5">Groupes (10 groupes)</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Admin</th>
                                <th scope="col">Créé le</th>

                                <th scope="col">Actions</th>

                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($groupList))

                                @foreach($groupList as $group)

                                    <tr>
                                        <td>#{{ $group['group']->id }}</td>
                                        <td>{{ $group['group']->name }}</td>
                                        <td>{{ $group['admin']->fname }} {{ $group['admin']->lname }}</td>
                                        <td>{{ $group['group']->datecreate }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a class="btn btn-success"
                                                   href="/groups/show/{{ $group['group']->id }}">
                                                    <i class="far fa-eye"></i>
                                                </a>

                                                <a class="btn btn-danger"
                                                   href="/admin/groups/delete/{{ $group['group']->id }}">
                                                    <i class="fas fa-skull-crossbones"></i>
                                                </a>
                                            </div>

                                        </td>

                                    </tr>

                                @endforeach
                            @endif

                            </tbody>
                        </table>

                        <a href="{{url('/admin/groups/')}}" class="btn btn-primary float-right">Voir plus</a>
                    </div>

                    <h4 id="events" class="my-5">Evénements (10 derniers événements)</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Organisateur</th>
                                <th scope="col">Date de début</th>
                                <th scope="col">Actions</th>

                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($eventList))

                                @foreach($eventList as $event)

                                    <tr>
                                        <td>#{{ $event['event']->id }}</td>
                                        <td>{{ $event['event']->name }}</td>
                                        <td>{{ $event['group']->name }}</td>
                                        <td>{{ $event['event']->datefrom }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a class="btn btn-success"
                                                   href="/events/show/{{ $event['event']->id }}">
                                                    <i class="far fa-eye"></i>
                                                </a>

                                                <a class="btn btn-danger"
                                                   href="/admin/events/delete/{{ $event['event']->id }}">
                                                    <i class="fas fa-skull-crossbones"></i>
                                                </a>
                                            </div>
                                        </td>

                                    </tr>

                                @endforeach
                            @endif

                            </tbody>
                        </table>

                        <a href="{{url('/admin/events/')}}" class="btn btn-primary float-right">Voir plus</a>
                    </div>

                    <h4 id="gmessages" class="my-5">Messages des groupes (10 derniers messages)</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Envoyé par</th>
                                <th scope="col">Reçu par</th>
                                <th scope="col">Contenu</th>
                                <th scope="col">Date</th>
                                <th scope="col">Lu</th>

                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($messageList))

                                @foreach($messageList as $message)
                                    @if($message['msg']->forgroup == 1)
                                        <tr>
                                            <td>#{{ $message['msg']->id }}</td>
                                            <td>{{ $message['sender']->fname }} {{ $message['sender']->lname }}</td>
                                            <td>{{ $message['receiver']->name }}</td>
                                            <td>{{ $message['msg']->content }}</td>
                                            <td>{{ $message['msg']->date }}</td>
                                            <td>
                                                @if($message['msg']->isread)
                                                    <span class="badge badge-pill badge-success">
                                                        <i class="far fa-bookmark"></i> Lu
                                                    </span>
                                                @else
                                                    <span class="badge badge-pill badge-danger">
                                                        <i class="fas fa-bookmark"></i> Non lu
                                                    </span>
                                                @endif
                                            </td>

                                        </tr>

                                    @endif
                                @endforeach
                            @endif

                            </tbody>
                        </table>
                    </div>

                    <hr class="my-4">
                    <h4 id="search" class="my-5">Recherche super-utilisateur</h4>
                    <div>
                        <form action="/admin/search" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-9">
                                    <input type="text" required name="search" class="form-control"
                                           placeholder="Rechercher">
                                </div>
                                <div class="col-3">
                                    <button type="submit" class="btn btn-secondary">Rechercher</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>



@endsection

