@extends('layouts.nav')

@section('content')
    <div class="masthead text-center text-white" style="margin-top: -10vh!important; height: 30%!important;">
        <div class="masthead-content my-auto">
            <div class="container">
                <h1 class="masthead-heading mb-0">{{Setting('openmeet.slogan')}}</h1>
                <h2 class="masthead-subheading mb-0">1 événement à proximité | 2 groupes à proximités</h2>
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




@endsection

@section('css')
    <style>
        .masthead {

            top: 0 !important;
            width: 100%;
            overflow: hidden;
            padding-top: calc(7rem + 72px);
            padding-bottom: 7rem;
            background-image: radial-gradient(circle, #051937, #004874, #007e9f, #00b6a9, #12eb94);
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
            console.log(e);
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


    </script>
@endsection
