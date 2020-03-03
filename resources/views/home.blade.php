@extends('layouts.nav')

@section('content')

    <header class="masthead text-center text-white" style="margin: initial!important;">
        <div class="masthead-content my-auto">
            <div class="container">
                <h1 class="masthead-heading mb-0">Trouvez le Meet pour vous</h1>
                <h2 class="masthead-subheading mb-0">1 événement à proximité | 2 groupes à proximités</h2>
                @if(auth()->check())
                    <a href="{{ url('/groups/list') }}" class="btn btn-primary btn-xl rounded-pill mt-5">Voir les groupes</a>
                @else
                    <a href="{{ url('/login') }}" class="btn btn-primary btn-xl rounded-pill mt-5">Connexion</a>
                    <a href="{{ url('/register') }}" class="btn btn-primary btn-xl rounded-pill mt-5">S'inscrire</a>
                @endif
            </div>
        </div>
        <div class="bg-circle-1 bg-circle"></div>
        <div class="bg-circle-2 bg-circle"></div>
        <div class="bg-circle-3 bg-circle"></div>
        <div class="bg-circle-4 bg-circle"></div>
    </header>

@endsection

@section('css')
    <style>
        header.masthead {
            position: absolute;
            top: 0!important;
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

        header.masthead .masthead-content {
            z-index: 1;
            position: relative;
        }

        header.masthead .masthead-content .masthead-heading {
            font-size: 2rem;
        }

        header.masthead .masthead-content .masthead-subheading {
            font-size: 1rem;
        }

        header.masthead .bg-circle {
            z-index: 0;
            position: absolute;
            border-radius: 100%;
            background: linear-gradient(0deg, #051937 0%, rgb(18, 156, 235) 100%);
        }

        header.masthead .bg-circle-1 {
            width: 90%;
            padding-bottom: 90%;
            bottom: -55%;
            left: -65%;
            animation: bounce 7s infinite alternate;
            -webkit-animation: bounce 7s infinite alternate;
        }

        header.masthead .bg-circle-2 {
            width: 50%;
            padding-bottom: 50%;
            top: -25%;
            right: -35%;
            animation: bounce 3s infinite alternate;
            -webkit-animation: bounce 3s infinite alternate;
        }

        header.masthead .bg-circle-3 {
            width: 20%;
            padding-bottom: 20%;
            bottom: -10%;
            right: 5%;
            animation: bounce 4s infinite alternate;
            -webkit-animation: bounce 4s infinite alternate;
        }

        header.masthead .bg-circle-4 {
            width: 30%;
            padding-bottom: 30%;
            top: -45%;
            right: 35%;
            animation: bounce 5s infinite alternate;
            -webkit-animation: bounce 5s infinite alternate;
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
            header.masthead .masthead-content .masthead-heading {
                font-size: 5rem;
            }
            header.masthead .masthead-content .masthead-subheading {
                font-size: 2rem;
            }
        }


    </style>
@endsection
