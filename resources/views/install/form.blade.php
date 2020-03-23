@extends('layouts.index')

@section('title')
    Installation
@endsection

@section('body')
    <form action="{{url('/install')}}" method="POST" id="form">
        @csrf
        <div class="max-height wall-white">
            <div class="container-fluid h-100 p-5 position-relative">
                <div class="card mx-auto shadow-lg p-5 w-75"
                     id="card-general">
                    <div class="row justify-content-between">
                        <img src="/assets/logo.svg" width="50px" height="50px">
                        <h3 class="openmeet-title text-center openmeet-install"
                            style="color:#007BFF; text-shadow: 0 0 5px #d6d8d9;">
                            OpenMeet - Paramètres généraux
                        </h3>
                    </div>


                    <hr class="mx-5 my-3">
                    <div class="form-group">
                        <label for="iName" class="">Nom du site</label>
                        <input class="form-control @error('iName') is-invalid @enderror"
                               name="iName" type="text"
                               value="{{ old('iName') }}"
                               placeholder="OpenMeet"
                               required id="iName"
                               autocomplete="off">
                        @error('iName')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="iSlogan" class="">Slogan du site</label>
                        <input class="form-control @error('iSlogan') is-invalid @enderror"
                               name="iSlogan" type="text"
                               value="{{ old('iSlogan') }}"
                               placeholder="Trouvez le Meet en vous ⚡"
                               required id="iSlogan"
                               autocomplete="off">
                        @error('iSlogan')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="iColor" class="">Couleur du site</label>
                        <input class="form-control @error('iColor') is-invalid @enderror"
                               name="iColor" type="color"
                               value="#007BFF"
                               required id="iColor">
                        @error('iColor')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                    </div>

                    <hr class="mx-5 my-3">

                    <div class="row justify-content-end">

                        <button class="btn btn-outline-secondary rounded-pill btn-install"
                                id="btn-general-next">
                            <i class="fas fa-arrow-right fa-lg"></i>
                            Suivant
                        </button>

                    </div>


                </div>

                <div class="card mx-auto shadow-lg p-5 w-75 d-none"
                     id="card-database">

                    <div class="row justify-content-between">
                        <img src="/assets/logo.svg" width="50px" height="50px">
                        <h3 class="openmeet-title text-center openmeet-install"
                            style="color:#007BFF; text-shadow: 0 0 5px #d6d8d9;">
                            OpenMeet - Base de données
                        </h3>
                    </div>

                    <hr class="mx-5 my-3">
                <!--<div class="form-group">
                        <label for="iDBHost" class="">Hôte de la base de données</label>
                        <input class="form-control @error('iDBHost') is-invalid @enderror"
                               name="iDBHost" type="text"
                               value="{{ old('iDBHost') }}"
                               placeholder="Adresse URL"
                               required id="iDBHost"
                               autocomplete="off">
                        @error('iDBHost')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="iDBName" class="">Nom de la base de données</label>
                        <input class="form-control @error('iDBName') is-invalid @enderror"
                               name="iDBName" type="text"
                               value="{{ old('iDBName') }}"
                               placeholder="Database"
                               required id="iDBName"
                               autocomplete="off">
                        @error('iDBName')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="iDBUser" class="">Utilisateur de la base de données</label>
                        <input class="form-control @error('iDBUser') is-invalid @enderror"
                               name="iDBUser" type="text"
                               value="{{ old('iDBUser') }}"
                               placeholder="user"
                               required id="iDBUser"
                               autocomplete="off">
                        @error('iDBUser')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="iDBPass" class="">Mot de passe de l'utilisateur</label>
                        <input class="form-control @error('iDBPass') is-invalid @enderror"
                               name="iDBPass" type="password"
                               value="{{ old('iDBUser') }}"
                               placeholder="pass"
                               id="iDBPass"
                               autocomplete="off">
                        @error('iDBPass')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group">

                            <input type="checkbox" class="" name="iDBMigrate" id="iDBMigrate" checked>
                            <label class="" for="iDBMigrate">Mettre à zéro la base de données <code>(artisan
                                    migrate)</code></label>


                    </div>-->

                    <p class="lead p-5">
                        N'oubliez pas de changer les paramètres liés à la base de données dans le
                        fichier <code>.env</code>
                        <br>
                        Il faut aussi que vous executiez cette commande : <code>php artisan migrate:fresh</code>
                    </p>


                    <hr class="mx-5 my-3">

                    <div class="row justify-content-between">
                        <button class="btn btn-outline-secondary rounded-pill btn-install"
                                id="btn-database-previous">
                            <i class="fas fa-arrow-left fa-lg"></i>
                            Précédent
                        </button>

                        <button class="btn btn-outline-secondary rounded-pill btn-install"
                                id="btn-database-next">
                            <i class="fas fa-arrow-right fa-lg"></i>
                            Suivant
                        </button>

                    </div>


                </div>


                <div class="card mx-auto shadow-lg p-5 w-75 d-none"
                     id="card-admin">

                    <div class="row justify-content-between">
                        <img src="/assets/logo.svg" width="50px" height="50px">
                        <h3 class="openmeet-title text-center openmeet-install"
                            style="color:#007BFF; text-shadow: 0 0 5px #d6d8d9;">
                            OpenMeet - Administration
                        </h3>
                    </div>

                    <hr class="mx-5 my-3">
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label for="fname">{{ __('Prénom') }}</label>

                            <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror"
                                   name="fname"
                                   value="{{ old('fname') }}" required autocomplete="fname" autofocus>

                            @error('fname')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label for="lname">{{ __('Nom de famille') }}</label>


                            <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror"
                                   name="lname"
                                   value="{{ old('lname') }}" required autocomplete="lname" autofocus>

                            @error('lname')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        </div>

                    </div>


                    <div class="form-group ">
                        <label for="bdate">{{ __('Date de naissance') }}</label>


                        <input id="bdate" type="date" class="form-control @error('bdate') is-invalid @enderror"
                               name="bdate"
                               value="{{ old('bdate') }}" required autocomplete="bdate" autofocus>
                        <small id="warnAge" class="form-text text-muted">Personnes majeures uniquement.
                            &#128286;</small>

                        @error('bdate')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                    </div>


                    <div class="form-group ">
                        <label for="email">{{ __('Adresse mail') }}</label>

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                    </div>

                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label for="password">{{ __('Mot de passe') }}</label>
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label for="password-confirm">{{ __('Confirmer le mot de passe') }}</label>

                            <input id="password-confirm" type="password" class="form-control" name="password-confirm"
                                   required autocomplete="new-password">
                            @error('password-confirm')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        </div>


                    </div>


                    <hr class="mx-5 my-3">

                    <div class="row justify-content-between">
                        <button class="btn btn-outline-secondary rounded-pill btn-install"
                                id="btn-admin-previous">
                            <i class="fas fa-arrow-left fa-lg"></i>
                            Précédent
                        </button>

                        <button class="btn btn-outline-secondary rounded-pill btn-install"
                                id="btn-admin-next">
                            <i class="fas fa-arrow-down fa-lg"></i>
                            Installer
                        </button>

                    </div>


                </div>
            </div>
        </div>
    </form>
@endsection


@section('js')

    <script>
        $('#btn-general-next').click(function (e) {
            e.preventDefault();

            if ($('#iName').val() !== '' && $('#iSlogan').val() !== '') {
                if ($('#iName').hasClass('is-invalid')) {
                    $('#iName').removeClass('is-invalid')
                }
                if ($('#iSlogan').hasClass('is-invalid')) {
                    $('#iSlogan').removeClass('is-invalid')
                }

                $('#card-general').fadeOut(500);
                $('#card-general').toggleClass('d-none');
                $('#card-database').toggleClass('d-none');
                $('#card-database').fadeIn(500);
            } else {
                shake($('#card-general'));
                if ($('#iName').val() === '') {
                    $('#iName').toggleClass('is-invalid')
                }
                if ($('#iSlogan').val() === '') {
                    $('#iSlogan').toggleClass('is-invalid')
                }
            }

        });

        $('#btn-database-previous').click(function (e) {
            e.preventDefault();

            $('#card-database').fadeOut(500);
            $('#card-database').toggleClass('d-none');
            $('#card-general').toggleClass('d-none');
            $('#card-general').fadeIn(500);
        });

        $('#btn-database-next').click(function (e) {
            e.preventDefault();
            /*if ($('#iDBHost').val() !== '' && $('#iDBName').val() !== '' && $('#iDBUser').val() !== '') {
                if ($('#iDBHost').hasClass('is-invalid')) {
                    $('#iDBHost').removeClass('is-invalid')
                }
                if ($('#iDBName').hasClass('is-invalid')) {
                    $('#iDBName').removeClass('is-invalid')
                }
                if ($('#iDBUser').hasClass('is-invalid')) {
                    $('#iDBUser').removeClass('is-invalid')
                }


                $('#card-database').fadeOut(500);
                $('#card-database').toggleClass('d-none');
                $('#card-admin').toggleClass('d-none');
                $('#card-admin').fadeIn(500);
            } else {
                shake($('#card-database'));
                if ($('#iDBHost').val() === '') {
                    $('#iDBHost').toggleClass('is-invalid')
                }
                if ($('#iDBName').val() === '') {
                    $('#iDBName').toggleClass('is-invalid')
                }
                if ($('#iDBUser').val() === '') {
                    $('#iDBUser').toggleClass('is-invalid')
                }
            }*/
            $('#card-database').fadeOut(500);
            $('#card-database').toggleClass('d-none');
            $('#card-admin').toggleClass('d-none');
            $('#card-admin').fadeIn(500);
        });

        $('#btn-admin-previous').click(function (e) {
            e.preventDefault();
            $('#card-admin').fadeOut(500);
            $('#card-admin').toggleClass('d-none');
            $('#card-database').toggleClass('d-none');
            $('#card-database').fadeIn(500);
        });

        $('#btn-admin-next').click(function (e) {
            e.preventDefault();
            $('#card-admin').animate({
                top: '+=3000'
            }, 1000, function () {
                $('#form').submit();
            })
        });


        function shake(div) {
            for (let i = 0; i < 5; i++) {
                div.animate({
                    left: '+=20'
                }, 100);
                div.animate({
                    left: '-=20'
                }, 100)
            }

        }
    </script>

@endsection

@section('css')
    <style>
        .btn-install {
            height: 50px;
            width: 150px
        }

        .card-install {
            height: 100vh;
        }

    </style>
@endsection
