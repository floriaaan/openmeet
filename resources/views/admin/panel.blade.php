@extends('layouts.nav')

@section('content')

    <div class="container position-relative" style="height: 100%">
        <div class="row">
            <div class="col-lg-3 d-none-custom">
                <div id="scrollSite" class="list-group position-fixed w-list-admin">
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

                <div id="scrollUser" class="list-group position-fixed w-list-admin" style="margin-top: 185px">
                    <h5 class="list-title">Paramètres relatifs aux utilisateurs</h5>
                    <a class="list-group-item list-group-item-action" href="#users">
                        Utilisateurs
                        <span class="badge badge-primary badge-pill">{{$userCount}}</span>
                    </a>
                    <a class="list-group-item list-group-item-action" href="#reports">
                        Signalements d'utilisateurs
                        <span class="badge badge-primary badge-pill">{{$reportCount}}</span>
                    </a>
                    <a class="list-group-item list-group-item-action" href="#messages">
                        Messages
                        <span class="badge badge-primary badge-pill">{{$messageCount['foruser']}}</span>
                    </a>
                </div>

                <div id="scrollGroup" class="list-group position-fixed w-list-admin" style="margin-top: 390px">
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
                <div data-spy="scroll" data-target="#scrollSite" data-offset="70" class="scrollspy">
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
                        {!! Form::submit('Valider les modifications', ['class' => 'btn btn-primary mt-4 pull-right'] ) !!}

                        {!! Form::close()!!}
                    </div>


                    <h4 id="theming" class="my-5">Thèmes</h4>
                    <form method="POST" action="{{ url('/admin/edit/theme') }}">
                        @csrf
                        <div class="row">
                            <div class="btn-group btn-group-toggle mx-2" data-toggle="buttons">
                                <label class="btn btn-light active">
                                    <input type="radio" name="theme" value="day" autocomplete="off"
                                           @if(Setting('openmeet.theme') == "day")checked @endif>
                                    <i class="fas fa-sun"></i> Jour
                                </label>
                                <label class="btn btn-dark">
                                    <input type="radio" name="theme" value="night" autocomplete="off"
                                           @if(Setting('openmeet.theme') == "night")checked @endif>
                                    <i class="fas fa-moon"></i> Nuit
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Valider les modifications</button>

                    </form>


                    <h4 id="privacy" class="my-5">Confidentialité</h4>
                    <div>
                        <form action="{{url('/admin/edit/privacy')}}" method="POST">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="robots" id="robots">
                                <label class="custom-control-label" for="robots">Visble sur Google (fichier robots.txt)</label>
                            </div>

                            <button type="submit" class="btn btn-primary mx-1 float-right">Valider les modifications</button>
                        </form>
                    </div>

                </div>

                <hr class="my-5">

                <div data-spy="scroll" data-target="#scrollUser" data-offset="70" class="scrollspy">
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
                                        <td>{{ $user->fname }}</td>
                                        <td>{{ $user->lname }}</td>
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
                                                <a class="btn btn-danger" href="/admin/user/delete/{{ $user->id }}">
                                                    <i class="fas fa-skull-crossbones"></i>
                                                </a>
                                            </div>

                                        </td>
                                    </tr>

                                @endforeach
                            @endif


                            </tbody>
                        </table>

                        <a href="{{url('/admin/user/')}}" class="btn btn-primary float-right">Voir plus</a>
                    </div>

                    <h4 id="reports" class="my-5">Signalements des utilisateurs</h4>
                    <p>...</p>

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

                        <a href="{{url('/admin/messages/')}}" class="btn btn-primary float-right">Voir plus</a>
                    </div>
                </div>

                <hr class="my-5">

                <div data-spy="scroll" data-target="#scrollGroup" data-offset="70" class="scrollspy">
                    <h4 id="groups" class="my-5">Groupes</h4>
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
                                                <a class="btn btn-success" href="/group/show/{{ $group['group']->id }}">
                                                    <i class="far fa-eye"></i>
                                                </a>

                                                <a class="btn btn-danger"
                                                   href="/admin/group/delete/{{ $group['group']->id }}">
                                                    <i class="fas fa-skull-crossbones"></i>
                                                </a>
                                            </div>

                                        </td>

                                    </tr>

                                @endforeach
                            @endif

                            </tbody>
                        </table>

                        <a href="{{url('/admin/group/')}}" class="btn btn-primary float-right">Voir plus</a>
                    </div>

                    <h4 id="events" class="my-5">Evénements</h4>
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
                                                <a class="btn btn-success" href="/event/show/{{ $event['event']->id }}">
                                                    <i class="far fa-eye"></i>
                                                </a>

                                                <a class="btn btn-danger"
                                                   href="/admin/event/delete/{{ $event['event']->id }}">
                                                    <i class="fas fa-skull-crossbones"></i>
                                                </a>
                                            </div>
                                        </td>

                                    </tr>

                                @endforeach
                            @endif

                            </tbody>
                        </table>

                        <a href="{{url('/admin/event/')}}" class="btn btn-primary float-right">Voir plus</a>
                    </div>

                    <h4 id="gmessages" class="my-5">Messages des groupes</h4>
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

                        <a href="{{url('/admin/messages/')}}" class="btn btn-primary float-right">Voir plus</a>
                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection

