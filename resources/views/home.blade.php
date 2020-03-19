@extends('layouts.nav')

@section('title')
    Accueil
@endsection

@section('content')
    <div class="masthead text-center text-white" style="margin-top: -10vh!important; height: 30%!important;">
        <div class="masthead-content my-auto">
            <div class="container">
                <h1 class="masthead-heading mb-0">{{Setting('openmeet.slogan')}}</h1>
                <h2 class="masthead-subheading mb-0">{{(new \App\Event)->getCount()}}
                    {{str_plural('événement', (new \App\Event)->getCount())}} {{str_plural('organisé', (new \App\Event)->getCount())}}
                    | {{(new \App\Group)->getCount()}}
                    {{str_plural('groupe', (new \App\Group)->getCount())}} {{str_plural('créé', (new \App\Group)->getCount())}}</h2>
                <form action="{{url('/search')}}" method="POST">
                    @csrf
                    <input type="text" name="search"
                           class="text-center mt-5 form-control form-control-lg rounded-pill"
                           style="padding:2rem; font-size:15px"
                           placeholder="Rechercher un groupe ou événement">
                </form>
                @if(auth()->check())
                    <a href="{{ url('/groups/list') }}" class="btn btn-primary btn-xl rounded-pill mt-5">Voir les
                        groupes</a>
                @else
                    <a href="{{ url('/login') }}" class="btn btn-primary btn-xl rounded-pill mt-5">Connexion</a>
                    <a href="{{ url('/register') }}" class="btn btn-primary btn-xl rounded-pill mt-5">S'inscrire</a>
                @endif
            </div>


        </div>
        <div class="bg-circle-1 bg-circle"></div>
        <div class="bg-circle-2 bg-circle"></div>
        <div class="bg-circle-4 bg-circle"></div>
        <div class="bg-circle-3 bg-circle"></div>


    </div>



    <div class="container-fluid mt-5">
        <div class="card rounded mx-3 shadow-lg" id="pwa-card">
            <div class="row">
                <div class="col-lg-9">
                    <div class="p-5">
                        <p class="display-4">Installer l'application</p>
                        <p class="lead">Vos Meets dans la poche 🤳</p>

                        <hr class="mx-5 my-4">
                        <button class="mb-2 ml-lg-2 btn btn-xl btn-primary rounded-pill"
                                id="pwa-btn">
                            Installer {{Setting('openmeet.title')}}
                        </button>
                    </div>

                </div>

                <div class="col-lg">
                    <div class=" bg-primary">
                        <img class="img-pwa p-5" src="/assets/logo.svg">

                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="container-fluid mt-5" id="containerTags">

    </div>



@endsection

@section('css')
    <style>
        .masthead {

            top: 0 !important;
            width: 100%;
            overflow: hidden;
            padding-top: calc(7rem + 72px);
            padding-bottom: 7rem;
            /*background-image: radial-gradient(circle, #051937, #004874, #007e9f, #00b6a9, #12eb94);*/
            background-image: radial-gradient(circle, #2b2a2a, var(--openmeet));
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: scroll;
            background-size: cover;
        }

        .masthead .masthead-content {
            z-index: 1;
            position: relative;
        }

        .masthead .masthead-content .masthead-heading {
            font-size: 2rem;
        }

        .masthead .masthead-content .masthead-subheading {
            font-size: 1rem;
        }

        .masthead .bg-circle {
            z-index: 0;
            position: absolute;
            border-radius: 100%;
            background: linear-gradient(0deg, #051937 0%, rgb(18, 156, 235) 100%);
        }

        .masthead .bg-circle-1 {
            width: 300px;
            height: 300px;
            top: 40px;
            left: -50px;
            animation: bounce 7s infinite alternate;
            -webkit-animation: bounce 7s infinite alternate;
        }

        .masthead .bg-circle-2 {
            width: 400px;
            height: 400px;
            top: -200px;
            right: 300px;
            animation: bounce 3s infinite alternate;
            -webkit-animation: bounce 3s infinite alternate;
        }

        .masthead .bg-circle-3 {
            height: 100px;
            width: 100px;
            top: 500px;
            left: 300px;
            animation: bounce 4s infinite alternate;
            -webkit-animation: bounce 4s infinite alternate;
        }

        .masthead .bg-circle-4 {
            height: 500px;
            width: 500px;
            top: 50px;
            right: 10px;
            animation: bounce 8s infinite alternate;
            -webkit-animation: bounce 8s infinite alternate;
        }

        @keyframes bounce {
            from {
                transform: translateY(0px);
            }
            to {
                transform: translateY(-55px);
            }
        }

        @-webkit-keyframes bg-circle {
            from {
                transform: translateY(0px);
            }
            to {
                transform: translateY(-55px);
            }
        }


        @media (min-width: 992px) {
            /*header.masthead {
                padding-top: calc(7rem + 55px);
                padding-bottom: 4rem;
            }*/
            .masthead .masthead-content .masthead-heading {
                font-size: 5rem;
            }

            .masthead .masthead-content .masthead-subheading {
                font-size: 2rem;
            }
        }

        .bg-primary {
            background-image: radial-gradient(circle, var(--openmeet), #ffffff);
        }


        .img-pwa {
            margin-left: 5%;
            margin-right: 5%;
            width: 90%;
        }

        .btn-pwa {

        }

        .card-tag{
            height: 200px;
            width: auto;
            color:white;
            text-transform: capitalize;
        }

        .card-tag img {
            height: 200px!important;
            width: auto!important;
            opacity: 0.8;
        }

        @media (max-width: 900px) {
            .card-columns{
                column-count: 2;
            }
        }
        @media (max-width: 700px) {
            .card-columns{
                column-count: 1;
            }
        }

    </style>
@endsection

@section('js')

    <script>

        let deferredPrompt;
        window.addEventListener('load', () => {
            if (navigator.standalone) {
                console.log('Launched: Installed (iOS)');
                HidePromotion();
            } else if (matchMedia('(display-mode: standalone)').matches) {
                console.log('Launched: Installed');
                HidePromotion();
            } else {
                console.log('Launched: Browser Tab');
            }
        });


        window.addEventListener('beforeinstallprompt', (e) => {
            // Prevent the mini-infobar from appearing on mobile
            e.preventDefault();
            // Stash the event so it can be triggered later.
            deferredPrompt = e;
            // Update UI notify the user they can install the PWA

        });


        document.getElementById('pwa-btn').addEventListener('click', (e) => {
            // Hide the app provided install promotion

            // Show the install prompt
            deferredPrompt.prompt();
            // Wait for the user to respond to the prompt
            deferredPrompt.userChoice.then((choiceResult) => {
                if (choiceResult.outcome === 'accepted') {
                    console.log('User accepted the install prompt');
                    HidePromotion();

                } else {
                    console.log('User dismissed the install prompt');
                }
            })
        });

        function HidePromotion() {
            $('#pwa-card').toggleClass('d-none');
        }

        function ipLocateAndCreateHomeCards() {
            $.ajax({
                url: 'http://ip-api.com/json',
                type: 'GET',
                datatype: 'json',
                success: function (data) {
                    console.log('API.ip', data);
                    getGroupAndCreateCard(data);
                },
                error: function () {
                    console.log('Error')
                }
            });
        }

        function getEventAndCreateCard(datas) {
            $.ajax({
                url: "{{url('/api/v1/events/location')}}",
                type: 'POST',
                data: {'lat': datas.lat, 'lon': datas.lon, 'limit': 6},
                datatype: 'json',
                success: function (data) {
                    console.log('API.self events', data);
                },
                error: function () {
                    console.log('Error')
                }
            })
        }


        function getTags() {
            $.ajax({
                url: '{{url('/api/v1/groups/tags')}}',
                type: 'GET',
                datatype: 'json',
                success: function (data) {
                    console.log('API.self tags', data);
                    $('#containerTags').append('<div class="card rounded mx-3 shadow-lg"><div class="card-columns p-5" id="locationCard"></div></div>');
                    for(let i = 0; i < data.length; i++){
                        $('#locationCard').append(
                            '<div class="card bg-dark shadow-sm card-tag" id="card-'+ data[i].tag +'" onclick="event.preventDefault();document.getElementById("form-'+ data[i].tag.trim() +'").submit();">' +
                                '<img src="'+ data[i].img +'" class="card-img-top mx-auto" alt="Image de '+ data[i].tag +'">' +
                                '<div class="card-img-overlay">' +
                                    '<h5 class="card-title">'+ data[i].tag +'</h5>' +
                                '</div>' +
                            '</div>' +
                            '<form id="form-'+ data[i].tag.trim() +'" action="{{url("/search")}}" method="post" class="d-none">@csrf' +
                                '<input type="hidden" name="search" value="'+ data[i].tag +'">' +
                            '</form>');

                    }
                    console.log( $('#locationCard').innerHTML)

                },
                error: function () {
                    console.log('Error')
                }
            });
        }

        getTags()
    </script>
@endsection
