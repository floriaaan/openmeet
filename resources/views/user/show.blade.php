@extends('layouts.nav')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-3">

                <div class="card h-100">
                    <div class="card-body">
                        <div class="myback-img">
                            <img
                                alt="Photo de {{$user->fname}} {{$user->lname}}"
                                src="{{$user->picrepo}}/{{$user->picname}}"
                                class="">
                        </div>
                        <div class="myoverlay"></div>
                        <div class="profile-img">
                            <div class="borders avatar-profile">
                                <img
                                    src="{{$user->picrepo}}/{{$user->picname}}">
                            </div>
                        </div>
                        <div class="profile-title">
                            <h3>{{$user->fname}} {{$user->lname}}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9">

                Groupes et événements

            </div>


        </div>
    </div>

@endsection

@section('css')
    <style>
        .card {
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: none;
            border-radius: .25rem;
        }

        .myback-img {
            display: flex;
            justify-content: center;
            height: 372px;
            overflow: hidden;
            object-fit: cover;
            border-radius: .25rem;
        }

        .myoverlay {
            position: absolute;
            background: -webkit-linear-gradient(top, transparent 0%, rgba(0, 0, 0, 0.72) 100%);
            height: 100%;
            width: 100%;
            top: 0;
        }

        .card-body {
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            padding: 0;
        }

        .avatar-profile img {
            width: 90px;
            height: 90px;
            border-radius: 100%;
            overflow: hidden;
            opacity: 0.9;
            object-fit: cover;
            -o-object-fit: cover;
        }

        .borders {
            position: relative;
            border: 5px solid #fff;
            border-radius: 100%;
        }

        .borders:before {
            content: " ";
            position: absolute;
            z-index: -1;
            top: -10px;
            left: -10px;
            right: -10px;
            bottom: -10px;
            border-radius: 100%;
            background-image: linear-gradient(90deg, #FDA240, #C5087E), linear-gradient(90deg, #FDA240, #C5087E);
            background-position: 0 0px, 100% 100%;
            background-size: 100% 5px;
            border-left: 5px solid #FDA240;
            border-right: 5px solid #C5087E;
            padding: 10px 5px;
        }

        .profile-img {
            position: absolute;
            top: 71%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .profile-title {
            text-align: center;
            position: relative;
            top: -39px;
            margin-bottom: -26px;
        }

        .profile-title h3 {
            font-size: 18px;
            color: #fff;
            font-weight: bold;
            margin-bottom: 0;
        }

        a:hover {
            text-decoration: none !important;
        }

    </style>

@endsection
