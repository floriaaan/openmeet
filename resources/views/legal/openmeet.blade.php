<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{url('/')}}/assets/icon.png"/>
    <meta name="description" content="">
    <meta name="author" content="">

    <title>OpenMeet</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/pepper-grinder/jquery-ui.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.3.1/css/hover-min.css"
          integrity="sha256-c+C87jupO1otD1I5uyxV68WmSLCqtIoNlcHLXtzLCT0=" crossorigin="anonymous"/>


    <style>

        :root {
            --openmeet: {{Setting('openmeet.color')}};
            --openmeet-transparent: {{Setting('openmeet.color')}}77;
        }

        .btn-primary {
            color: #fff;
            background-color: #007BFF;
            border-color: #007BFF;
        }

        .btn-primary:hover {
            color: #fff;
            background-color: #222;
            border-color: #333;
        }

        .bg-primary {
            background-color: #007BFF !important;
        }

        .btn-primary:focus, .btn-primary.focus {
            box-shadow: 0 0 0 0.2rem var(--openmeet-transparent);
        }

        .btn-primary.disabled, .btn-primary:disabled {
            color: #fff;
            background-color: #007BFF;
            border-color: #007BFF;
        }

        .btn-primary:not(:disabled):not(.disabled):active, .btn-primary:not(:disabled):not(.disabled).active,
        .show > .btn-primary.dropdown-toggle {
            color: #fff;
            background-color: calc(50% * #007BFF);
            border-color: calc(40% * #007BFF);
        }

        .btn-primary:not(:disabled):not(.disabled):active:focus, .btn-primary:not(:disabled):not(.disabled).active:focus,
        .show > .btn-primary.dropdown-toggle:focus {
            box-shadow: 0 0 0 0.2rem var(--openmeet-transparent);
        }

        .nav-link {
            color: #007BFF !important;
        }

        .text-primary {
            color: #007BFF !important;
        }

        .btn-link {
            color: #007BFF !important;
        }

        .color {
            color: #007BFF !important;
        }

        .form-control:focus {
            border-color: var(--openmeet-transparent) !important;
            box-shadow: 0 0 0 0.2rem var(--openmeet-transparent) !important;
        }

        .dropdown-item:active {
            color: #007BFF !important;
        }

        .badge-primary {
            background-color: #007BFF !important;
        }

        .custom-control-input:checked + .custom-control-label::before {
            border-color: #007BFF;
            background-color: #007BFF;
        }

        .custom-control-input:focus + .custom-control-label::before {
            box-shadow: 0 0 0 0.2rem var(--openmeet-transparent);
        }

        .custom-control-input:focus:not(:checked) ~ .custom-control-label::before {
            border-color: #007BFF;
        }

        ::-webkit-scrollbar {
            width: 5px;
        }

        ::-webkit-scrollbar-track {
            width: 5px;
            background: #f5f5f5;
        }

        ::-webkit-scrollbar-thumb {
            width: 1em;
            background-color: {{setting('openmeet.color')}};
            outline: 1px solid slategrey;
            border-radius: 1rem;
        }

        .openmeet-title {
            font-family: 'Baloo', serif;
        }

        .openmeet-nav {
            font-size: 1.5em;
        }

        .btn-xl {
            text-transform: uppercase;
            padding: 1.5rem 3rem;
            font-size: 0.9rem;
            font-weight: 700;
            letter-spacing: 0.1rem;
        }

        .bg-black {
            background-color: #000 !important;
        }

        .rounded-pill {
            border-radius: 5rem;
        }

        .navbar-custom {
            padding-top: 1rem;
            padding-bottom: 1rem;
            background-color: rgba(0, 0, 0, 0.7);
        }


        header.masthead {
            position: relative;
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
            font-size: 4rem;
        }

        header.masthead .masthead-content .masthead-subheading {
            font-size: 2rem;
        }

        header.masthead .bg-circle {
            z-index: 0;
            position: absolute;
            border-radius: 100%;
            background: linear-gradient(0deg, #051937 0%, rgb(18, 156, 235) 100%);
        }

        header.masthead .bg-circle-1 {
            height: 90rem;
            width: 90rem;
            bottom: -55rem;
            left: -55rem;
            animation: bounce 7s infinite alternate;
            -webkit-animation: bounce 7s infinite alternate;
        }

        header.masthead .bg-circle-2 {
            height: 50rem;
            width: 50rem;
            top: -25rem;
            right: -25rem;
            animation: bounce 3s infinite alternate;
            -webkit-animation: bounce 3s infinite alternate;
        }

        header.masthead .bg-circle-3 {
            height: 20rem;
            width: 20rem;
            bottom: -10rem;
            right: 5%;
            animation: bounce 4s infinite alternate;
            -webkit-animation: bounce 4s infinite alternate;
        }

        header.masthead .bg-circle-4 {
            height: 30rem;
            width: 30rem;
            top: -5rem;
            right: 35%;
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
            header.masthead {
                padding-top: calc(10rem + 55px);
                padding-bottom: 10rem;
            }

            header.masthead .masthead-content .masthead-heading {
                font-size: 6rem;
            }
        }

        section .container img {
            max-width: 60%;
        }


        .no-hover:hover {
            text-decoration: none;
        }

    </style>


</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 406.372 404.994"
                 class="d-inline-block align-top">
                <g id="logo-open" transform="translate(-0.412 -0.754)">
                    <g id="Groupe_1" data-name="Groupe 1" transform="translate(81.465 183.268)" opacity="0.1">
                        <path id="Tracé_1" data-name="Tracé 1"
                              d="M469.52,471.468c-15.329-3.224-99.512,64.972-118.5,81.847a5.453,5.453,0,0,1-7.243,0c-18.989-16.875-103.171-85.071-118.5-81.847l27.089-15.1L347.4,514.1l95.031-57.729Z"
                              transform="translate(-225.28 -456.37)" fill="#007BFF"/>
                    </g>
                    <path id="Tracé_2" data-name="Tracé 2"
                          d="M446.9,252.832l-.275,12.216c-.315-.244,8.118-20.885.275-27.3-6.1-4.992-7.925-26.627-21.88-38.3-6.642-5.556.776,7.786-8.461,0l-20.307-9.23H378.7C375,141.372,323.053,93.853,258.409,89.351h-.027c-58.253,4.037-109.455,60.709-121.7,107.639-.089.329-.173.662-.253.99q-1.825.688-3.7,1.47a125.043,125.043,0,0,0-33.914,21.107l-27.63,17.194c-6.865-17.794-8.575-39.287-1.274-64.617A203.851,203.851,0,0,1,165.98,67.675l-.107-.075A201.99,201.99,0,0,1,197.03,54.744l.444-.142,1.332-.413A203.145,203.145,0,0,1,258.2,45.37h.417a202.328,202.328,0,0,1,92.4,22.181l-.182.124A203.851,203.851,0,0,1,446.9,173.134C456.936,207.931,460.893,232.156,446.9,252.832Z"
                          transform="translate(-54.812 -44.615)" fill="#007BFF" opacity="0.25"/>
                    <g id="Groupe_4" data-name="Groupe 4" transform="translate(110.987 213.367)" opacity="0.1">
                        <path id="Tracé_5" data-name="Tracé 5"
                              d="M291.76,694.349l.182-.124c12.012-8.162,37.671-17.825,92.416-21.657h.027c58.267-4.054,109.468-60.727,121.711-107.656.089-.329.173-.662.253-.99q1.825-.688,3.7-1.47l33.914-21.107,27.63-17.194c6.865,17.794,8.575,39.287,1.275,64.617A203.084,203.084,0,0,1,384.58,716.531h-.417a202.329,202.329,0,0,1-92.4-22.181Z"
                              transform="translate(-291.76 -524.15)" fill="#007BFF"/>
                    </g>
                    <g id="Groupe_5" data-name="Groupe 5" transform="translate(10.375 194.778)" opacity="0.3">
                        <path id="Tracé_6" data-name="Tracé 6"
                              d="M80.854,482.463c.04-.058.076-.115.12-.173,9.135,7.474,25.312,20.871,53.133,44.323a.25.25,0,0,0,0,.058C137.815,575.518,193.755,644.794,258.4,649.3h.027c54.763,3.832,80.408,13.5,92.42,21.657l.107.076.075.049A202,202,0,0,1,319.8,683.885l-.444.142-1.332.413a203.144,203.144,0,0,1-59.386,8.819h-.417A203.083,203.083,0,0,1,69.93,565.5C59.889,530.7,66.884,503.139,80.854,482.463Z"
                              transform="translate(-65.193 -482.29)" fill="#007BFF"/>
                    </g>
                    <path id="Tracé_7" data-name="Tracé 7"
                          d="M839.165,469.43c-.315-.244-2.953-2.278-10.8-8.69-9.135-7.474-25.312-20.871-53.133-44.323l-4-3.357,4,3.3,53.257,44.207Z"
                          transform="translate(-447.33 -249.025)" fill="#007bea"/>
                    <path id="Tracé_8" data-name="Tracé 8"
                          d="M26,377.666l4.632-2.882,27.63-17.194,33.914-21.107,3.952-2.46,13.358-8.313"
                          transform="translate(-14.254 -181.649)" fill="none"/>
                    <path id="Tracé_9" data-name="Tracé 9"
                          d="M155.775,310.632a36.511,36.511,0,0,1-5.773-8.34,12.367,12.367,0,0,0-2.056-.315h-.031a34.383,34.383,0,0,0-4.108.178c-32.009,3.033-111.156,44.8-86.359,130.824a202.052,202.052,0,0,1-14.237-65.989c-1.994-33.492,2.7-59.71,11.644-77.992,19.952-40.788,36.6-66.5,71.615-20.9C131.236,274.027,156.836,304.433,155.775,310.632Z"
                          transform="translate(-42.346 -154.994)" fill="#007BFF"/>
                    <path id="Tracé_10" data-name="Tracé 10"
                          d="M274.438,374.594a34.382,34.382,0,0,0-4.108.178A16.845,16.845,0,0,1,274.438,374.594Z"
                          transform="translate(-168.86 -227.611)" fill="#afafef"/>
                    <path id="Tracé_141" data-name="Tracé 141"
                          d="M44.869,0A44.869,44.869,0,1,1,0,44.869,44.869,44.869,0,0,1,44.869,0Z"
                          transform="translate(66.85 30.09)" fill="#007BFF"/>
                    <path id="Tracé_11" data-name="Tracé 11"
                          d="M815.889,366.989a202.052,202.052,0,0,1-14.237,65.989c24.8-86.026-54.35-127.79-86.368-130.823a34.37,34.37,0,0,0-4.108-.178h-.018a12.37,12.37,0,0,0-2.056.315,35.952,35.952,0,0,1-5.773,8.34c-1.061-6.217,24.535-36.6,29.309-42.533,35.015-45.6,51.663-19.89,71.616,20.9C813.184,307.279,817.883,333.5,815.889,366.989Z"
                          transform="translate(-409.559 -154.994)" fill="#007BFF"/>
                    <path id="Tracé_12" data-name="Tracé 12"
                          d="M688.816,505.683h0a203.829,203.829,0,0,1-71.269,90.4q-1.665,1.177-3.353,2.327h0c-10.658,5.928-19.575,8.828-26.835,9.49-10.129.919-17.066-2.513-21.1-8.206-7.993-11.248-4.614-31.316,7.842-43.963q1.661-1.465,3.277-2.984h0c34.9-32.608,55.229-79.276,44.62-108.016a102.92,102.92,0,0,0-9.716-20.871h0c-17.878,24.952-72.939,33.665-98.633,58.617-6.124,5.946-10.462,8.078-13.322,7.589,7.078-1.177,5.4-18.158,0-33.15h0c3.393-9.432,8.26-18.078,13.322-21.506,14.388-9.721,59.062-32.044,76.824-52.054a35.988,35.988,0,0,0,5.835-8.491l1.985-.164h.027a34.409,34.409,0,0,1,4.108.178C634.466,377.892,713.613,419.657,688.816,505.683Z"
                          transform="translate(-296.723 -227.699)" fill="#007BFF" opacity="0.8"/>
                    <path id="Tracé_13" data-name="Tracé 13"
                          d="M70.067,505.421a203.785,203.785,0,0,0,71.256,90.426q1.665,1.177,3.353,2.327c10.658,5.928,19.575,8.833,26.84,9.494,10.129.919,17.066-2.513,21.1-8.206,7.993-11.248,4.614-31.316-7.842-43.963q-1.661-1.466-3.277-2.984h0c-34.9-32.608-55.229-79.276-44.62-108.016a102.7,102.7,0,0,1,9.716-20.871c17.878,24.952,72.939,33.665,98.637,58.617,6.124,5.946,10.458,8.078,13.322,7.589-7.083-1.177-5.4-18.162,0-33.154-3.393-9.432-8.26-18.078-13.322-21.506-14.388-9.721-59.062-32.044-76.824-52.054a36.511,36.511,0,0,1-5.773-8.34,12.354,12.354,0,0,0-2.056-.315h-.031a34.408,34.408,0,0,0-4.108.178C124.4,377.63,45.252,419.4,70.067,505.421Z"
                          transform="translate(-54.893 -227.565)" fill="#007BFF" opacity="0.9"/>
                    <path id="Tracé_14" data-name="Tracé 14"
                          d="M494.423,592.954c-7.083-1.177-5.4-18.162,0-33.154C499.823,574.792,501.506,591.778,494.423,592.954Z"
                          transform="translate(-290.825 -330.602)" fill="#007BFF" opacity="0.8"/>
                    <circle id="Ellipse_3" data-name="Ellipse 3" cx="44.869" cy="44.869" r="44.869"
                            transform="translate(250.607 30.09)" fill="#007BFF"/>
                    <path id="Tracé_15" data-name="Tracé 15" d="M621.53,170.05Z"
                          transform="translate(-364.102 -113.929)" fill="#108eff"/>
                    <path id="Tracé_16" data-name="Tracé 16"
                          d="M666.45,778.614a39.523,39.523,0,0,1,3.277-2.984Q668.111,777.149,666.45,778.614Z"
                          transform="translate(-389.074 -450.588)" fill="#38b0f9"/>
                    <path id="Tracé_17" data-name="Tracé 17"
                          d="M760.333,873.5q-1.825,1.092-3.593,2.069,1.692-1.146,3.353-2.327Z"
                          transform="translate(-439.269 -504.852)" fill="#38b0f9"/>
                </g>
            </svg>

        <!--<img src="/assets/logo.svg" width="40" height="40" class="d-inline-block align-top"
                 alt="{{ Setting('openmeet.name') }}">-->
            <span
                class="ml-2 openmeet-title openmeet-nav text-center text-primary">{{ Setting('openmeet.name') }}</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="btn btn-primary rounded-pill" href="{{url('/')}}">
                        <i class="fas fa-arrow-right"></i>
                        Retour à {{Setting('openmeet.name')}}
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<header class="masthead text-center text-white" style="height: 100vh;">
    <div class="masthead-content">
        <div class="container">
            <h1 class="masthead-heading">OpenMeet</h1>
            <h2 class="masthead-subheading mb-0 lead">Une application pour créer et rassembler des communautés</h2>
            <div class="row mx-auto justify-content-center mt-5">
                <div class="col">
                    <a href="https://github.com/floriaaan/openmeet/releases"
                       class="btn btn-primary btn-xl rounded-pill mx-1">Télécharger</a>
                    <div id="stats">
                        <div class="row mx-auto justify-content-center mt-2">
                            <i class="fas fa-star mt-2 mx-1"></i>
                            <span class="lead">Star-gazers - </span>
                            <span class="mx-1 mt-1" id="stars"></span>
                        </div>
                        <div class="row mx-auto justify-content-center mt-2">
                            <i class="fas fa-eye mt-2 mx-1"></i>
                            <span class="lead">Watchers - </span>
                            <span class="mx-1 mt-1" id="watchers"></span>
                        </div>
                        <div class="row mx-auto justify-content-center mt-2">
                            <i class="fas fa-code-branch mt-2 mx-1"></i>
                            <span class="lead">Forks - </span>
                            <span class="mx-1 mt-1" id="forks"></span>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <div class="bg-circle-1 bg-circle"></div>
    <div class="bg-circle-2 bg-circle"></div>
    <div class="bg-circle-3 bg-circle"></div>
    <div class="bg-circle-4 bg-circle"></div>
</header>

<section>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 order-lg-2">
                <div class="p-5 d-flex justify-content-center">
                    <img class="img-fluid" src="assets/openmeet-app1.png" alt="">
                </div>
            </div>
            <div class="col-lg-6 order-lg-1">
                <div class="p-5">
                    <h2 class="display-4">Prête à l'emploi</h2>
                    <p>
                        OpenMeet est une application prête dès son installation, utilisable depuis n'importe où.
                        Responsive, fluide et personnalisable, OpenMeet est votre application.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mb-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="p-5 d-flex justify-content-center">
                    <img class="img-fluid" src="assets/openmeet-app2.png" alt="">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="p-5">
                    <h2 class="display-4">Back-office complet</h2>
                    <p>
                        Grâce à une interface d'administration simple et complète, vous n'aurez aucun soucis pour
                        customiser votre application.
                        L'interface est conçue pour être intuitive et fluide, vous pourrez y accéder sur n'importe quel
                        appareil.
                        Vous pourrez mettre à jour le système OpenMeet depuis cette dernière.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Footer -->
<footer class="py-3" style="background-color: rgba(0, 0, 0, 0.7);">
    <div class="container">
        <span style="color: #f5f5f5">
            &copy; OpenMeet - 2020 |
            <span class="badge badge-primary">
                <a href="{{url('/legal/cgu')}}" class="no-hover" style="color: white;">
                Conditions générales d'utilisation
            </a>
            </span>

            |
            <span class="badge badge-primary">
            <a href="{{url('/openmeet')}}" class="no-hover" style="color: white;">
                Télécharger OpenMeet
            </a>
            </span>
        </span>
    </div>

</footer>

<script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/javascript.util/0.12.12/javascript.util.min.js"
        integrity="sha256-eiohPQlDytO6qQO+k+xX6LyVgfXcTzlPCy9t/VjceYo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/i18n/jquery-ui-i18n.min.js"></script>
<script>
    $.ajax({
        url: 'https://api.github.com/repositories/242750043',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            $('#watchers').text(data.subscribers_count)
            $('#stars').text(data.stargazers_count)
            $('#forks').text(data.forks)

        },
        error: function () {
            $('#stats').hide();
        }
    });
</script>


</body>

</html>
