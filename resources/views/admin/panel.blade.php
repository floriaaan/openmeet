@extends('layouts.nav')

@section('content')

    <div class="container position-relative" style="height: 100%">
        <div class="row">
            <div class="col-lg-3 d-none-custom">
                <div id="scrollSite" class="list-group position-fixed w-list-admin">
                    <h5 class="list-title">Paramètres du site</h5>
                    <a class="list-group-item list-group-item-action" href="#settings">
                        Paramètres du site
                        <span class="badge badge-primary badge-pill">2</span>
                    </a>
                    <a class="list-group-item list-group-item-action" href="#theming">
                        Thèmes
                        <span class="badge badge-primary badge-pill">WIP</span>
                    </a>
                    <a class="list-group-item list-group-item-action" href="#privacy">
                        Confidentialité
                        <span class="badge badge-primary badge-pill">WIP</span>
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
                        <span class="badge badge-primary badge-pill">WIP</span>
                    </a>
                    <a class="list-group-item list-group-item-action" href="#messages">
                        Messages
                        <span class="badge badge-primary badge-pill">WIP</span>
                    </a>
                </div>

                <div id="scrollGroup" class="list-group position-fixed w-list-admin" style="margin-top: 390px">
                    <h5 class="list-title">Paramètres relatifs aux groupes/événements</h5>
                    <a class="list-group-item list-group-item-action" href="#groups">
                        Groupes
                        <span class="badge badge-primary badge-pill">WIP</span>
                    </a>
                    <a class="list-group-item list-group-item-action" href="#events">
                        Evénements
                        <span class="badge badge-primary badge-pill">WIP</span>
                    </a>
                    <a class="list-group-item list-group-item-action" href="#greports">
                        Signalements de groupes
                        <span class="badge badge-primary badge-pill">WIP</span>
                    </a>
                    <a class="list-group-item list-group-item-action" href="#gmessages">
                        Messages de groupes
                        <span class="badge badge-primary badge-pill">WIP</span>
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

                            <button type="submit" class="btn btn-primary mx-1">Valider les modifications</button>
                        </div>


                    </form>


                    <h4 id="privacy" class="my-5">Confidentialité</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse a turpis dolor. Aliquam
                        consequat lectus neque, sed lacinia massa pulvinar eget. Phasellus posuere mauris ut lorem
                        finibus, a tincidunt velit molestie. Vestibulum porttitor velit nec ullamcorper condimentum.
                        Morbi laoreet diam nec dui tincidunt, nec tincidunt enim tempor. In hac habitasse platea
                        dictumst. Nulla eu dolor erat. Aenean ac ultrices libero, sit amet fringilla dolor. Fusce ac
                        venenatis nulla. In ac mattis lectus, id gravida orci. Maecenas eget nisi a justo fringilla
                        iaculis. Ut metus nisi, consequat vitae euismod at, rutrum faucibus tellus. Mauris et nisi quis
                        magna consectetur suscipit. Curabitur at euismod nisl. Sed felis ipsum, blandit nec tortor non,
                        volutpat cursus felis. Proin augue eros, pretium non augue ut, condimentum tempor eros.

                        Praesent et est odio. Nullam eu quam ut enim porttitor maximus sed sit amet nibh. Praesent at
                        felis nibh. Quisque scelerisque facilisis accumsan. Pellentesque id justo sed nisl tempus
                        vulputate et sed dui. Maecenas hendrerit sem ut augue aliquet auctor. Morbi dignissim mi ac
                        lorem varius, ac luctus velit bibendum. Nam malesuada ex vitae lectus iaculis rhoncus. Aenean
                        dapibus lorem dignissim sapien commodo porttitor. Quisque bibendum non nisi vitae egestas.

                        In at lacus vitae felis tincidunt pharetra vel ut urna. Aenean dignissim vulputate nunc at
                        malesuada. Vestibulum a vehicula elit. Morbi mattis vel odio vitae aliquam. Maecenas laoreet
                        tempor bibendum. Vestibulum erat felis, interdum et fringilla ut, finibus at nunc. Donec id
                        lectus ut leo sodales efficitur. Nam pharetra iaculis odio vitae semper. Suspendisse suscipit,
                        dolor in finibus placerat, sapien est varius turpis, sit amet pretium sapien sem eget quam. Ut
                        tincidunt, ante at tincidunt condimentum, nisi nisi vulputate elit, quis iaculis ligula augue id
                        libero. Suspendisse erat purus, ultricies eget molestie nec, faucibus non magna. Curabitur in
                        diam odio. Suspendisse tempor vestibulum ullamcorper. Nulla facilisi. Nam sed lectus eget leo
                        fringilla auctor. Orci varius natoque penatibus et magnis dis parturient montes, nascetur
                        ridiculus mus.

                        Mauris in laoreet velit. Cras efficitur ac eros vitae porttitor. Sed mattis mattis tincidunt.
                        Maecenas ac diam non metus lacinia venenatis. Nulla sodales sem sed metus lobortis ultricies.
                        Nam nec venenatis dui, sit amet aliquet justo. Nunc eu fringilla dolor. Nunc non lobortis augue,
                        id feugiat dolor. Duis vestibulum ut est in laoreet.

                        Duis feugiat sem et nisi pellentesque, ac ultricies massa gravida. Sed consequat nulla leo, eget
                        porttitor augue condimentum id. Nam cursus massa quis justo condimentum, eu bibendum tellus
                        vestibulum. Donec ornare velit a eros rutrum, id aliquam tortor gravida. Praesent euismod nunc
                        eu orci venenatis, eu mollis sem efficitur. In efficitur libero porta, interdum odio in,
                        imperdiet risus. Quisque bibendum massa quis mattis mattis. Vestibulum ut tellus blandit,
                        aliquam libero ut, pharetra dolor. Vivamus in enim nulla. Aliquam nec mauris eu nulla tristique
                        condimentum vitae id lacus. Fusce eu nulla ex.

                        Sed sagittis vehicula ipsum, eu tempor risus elementum nec. Nunc massa purus, ullamcorper id
                        efficitur et, dapibus vitae purus. Pellentesque a eros nisi. Aliquam id tincidunt nisi, ac
                        tristique neque. Cras bibendum elit ligula, et rutrum orci molestie at. Praesent dignissim risus
                        sed est feugiat elementum. Aenean felis ante, iaculis ac nulla a, tincidunt rutrum mi. Fusce et
                        ante volutpat, interdum elit nec, lobortis diam. Nulla tincidunt metus ac vehicula laoreet. Ut
                        dapibus auctor dui eget eleifend. Nunc laoreet velit eget tortor ullamcorper, in maximus eros
                        scelerisque. Aenean blandit auctor dolor vel luctus.

                        Suspendisse eu facilisis eros. Suspendisse porttitor a magna eleifend volutpat. Pellentesque sit
                        amet lacus id ante imperdiet malesuada. In porttitor condimentum mi. Vivamus viverra bibendum
                        urna, id rutrum massa aliquet efficitur. Nunc nec quam eu lacus lacinia bibendum vel sed felis.
                        Suspendisse potenti. Morbi a pulvinar nisi.

                        Integer fermentum a libero vel ultricies. Maecenas diam leo, fringilla eget rutrum ultricies,
                        aliquam eu est. Cras convallis eleifend elit quis dictum. Nullam a lorem vestibulum, egestas
                        odio eget, euismod tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse
                        faucibus nibh dictum, consectetur risus vitae, ultricies lorem. Nam vel nulla est. Integer
                        commodo felis non elit ornare, ut vestibulum tortor elementum. Nam a mollis justo. Suspendisse
                        venenatis urna quis faucibus iaculis.

                        Nulla facilisi. Cras et orci dapibus, semper nibh vitae, luctus dolor. Aliquam lobortis nisi
                        vitae enim aliquet pulvinar. Ut cursus sem ipsum, non congue lorem dictum at. Pellentesque in
                        nulla semper, dapibus erat id, porta felis. Praesent elit nunc, tincidunt vitae convallis at,
                        varius vel nisi. Nunc pharetra eu nibh et pellentesque. Ut eget feugiat orci. Nunc quis ante
                        metus. Nam vitae orci ut odio sagittis vehicula at at lorem. Nullam hendrerit, nisl at
                        condimentum ullamcorper, ante lectus imperdiet urna, id fringilla leo quam eget neque. Nullam ut
                        magna ligula. Aliquam non egestas lectus. Vivamus porttitor pretium feugiat.

                        In a vestibulum quam. Nam sodales lacinia sapien quis consectetur. Fusce ut ornare tortor.
                        Vestibulum vitae purus quis felis lobortis sodales id ut risus. Integer dignissim mattis sem id
                        tincidunt. Nulla posuere porttitor ipsum vel commodo. Quisque in elit nec tellus elementum
                        iaculis eu eu ipsum. Proin tortor ligula, rhoncus id quam non, feugiat finibus quam. Proin
                        efficitur tincidunt ex, a fermentum lectus eleifend sit amet. Orci varius natoque penatibus et
                        magnis dis parturient montes, nascetur ridiculus mus. Praesent euismod risus nec diam lacinia,
                        eget lobortis quam suscipit. Etiam ac vehicula metus. Nam tempus id augue quis volutpat. Duis
                        dignissim malesuada nulla, nec commodo sem volutpat non. Duis nec rutrum justo.

                        10 paragraphes, 883 mots, 5907 caractères de Lorem Ipsum généré</p>

                </div>

                <div data-spy="scroll" data-target="#scrollUser" data-offset="70" class="scrollspy">
                    <h4 id="users" class="my-5">Utilisateurs (5 derniers utilisateurs)</h4>
                    <div>

                        <table class="table table-striped">
                            <thead>
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
                                        <td>{{ $user->id }}</td>
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

                    <h4 id="messages" class="my-5">Messages</h4>
                    <p>...</p>
                </div>

                <div data-spy="scroll" data-target="#scrollGroup" data-offset="70" class="scrollspy">
                    <h4 id="groups" class="my-5">Groupes</h4>
                    <p>...</p>

                    <h4 id="events" class="my-5">Evénements</h4>
                    <p>...</p>

                    <h4 id="greports" class="my-5">Signalements des groupes/événements</h4>
                    <p>...</p>

                    <h4 id="gmessages" class="my-5">Messages des groupes</h4>
                    <p>...</p>
                </div>


            </div>
        </div>
    </div>


@endsection

