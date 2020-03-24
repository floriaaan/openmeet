@extends('layouts.index')

@section('title')
    Inscription
@endsection

@section('body')
    <div class="h-100 w-100 wall-white text-center">

        <div class="p-5">
            <form method="POST" action="{{ route('register') }}" class="form-signin">
                @csrf

                <a href="{{ url('/') }}" class="no-hover">
                    <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" viewBox="0 0 406.372 404.994">
                        <g id="logo-open" transform="translate(-0.412 -0.754)">
                            <g id="Groupe_1" data-name="Groupe 1" transform="translate(81.465 183.268)" opacity="0.1">
                                <path id="Tracé_1" data-name="Tracé 1" d="M469.52,471.468c-15.329-3.224-99.512,64.972-118.5,81.847a5.453,5.453,0,0,1-7.243,0c-18.989-16.875-103.171-85.071-118.5-81.847l27.089-15.1L347.4,514.1l95.031-57.729Z" transform="translate(-225.28 -456.37)" fill="var(--openmeet)"/>
                            </g>
                            <path id="Tracé_2" data-name="Tracé 2" d="M446.9,252.832l-.275,12.216c-.315-.244,8.118-20.885.275-27.3-6.1-4.992-7.925-26.627-21.88-38.3-6.642-5.556.776,7.786-8.461,0l-20.307-9.23H378.7C375,141.372,323.053,93.853,258.409,89.351h-.027c-58.253,4.037-109.455,60.709-121.7,107.639-.089.329-.173.662-.253.99q-1.825.688-3.7,1.47a125.043,125.043,0,0,0-33.914,21.107l-27.63,17.194c-6.865-17.794-8.575-39.287-1.274-64.617A203.851,203.851,0,0,1,165.98,67.675l-.107-.075A201.99,201.99,0,0,1,197.03,54.744l.444-.142,1.332-.413A203.145,203.145,0,0,1,258.2,45.37h.417a202.328,202.328,0,0,1,92.4,22.181l-.182.124A203.851,203.851,0,0,1,446.9,173.134C456.936,207.931,460.893,232.156,446.9,252.832Z" transform="translate(-54.812 -44.615)" fill="var(--openmeet)" opacity="0.25"/>
                            <g id="Groupe_4" data-name="Groupe 4" transform="translate(110.987 213.367)" opacity="0.1">
                                <path id="Tracé_5" data-name="Tracé 5" d="M291.76,694.349l.182-.124c12.012-8.162,37.671-17.825,92.416-21.657h.027c58.267-4.054,109.468-60.727,121.711-107.656.089-.329.173-.662.253-.99q1.825-.688,3.7-1.47l33.914-21.107,27.63-17.194c6.865,17.794,8.575,39.287,1.275,64.617A203.084,203.084,0,0,1,384.58,716.531h-.417a202.329,202.329,0,0,1-92.4-22.181Z" transform="translate(-291.76 -524.15)" fill="var(--openmeet)"/>
                            </g>
                            <g id="Groupe_5" data-name="Groupe 5" transform="translate(10.375 194.778)" opacity="0.3">
                                <path id="Tracé_6" data-name="Tracé 6" d="M80.854,482.463c.04-.058.076-.115.12-.173,9.135,7.474,25.312,20.871,53.133,44.323a.25.25,0,0,0,0,.058C137.815,575.518,193.755,644.794,258.4,649.3h.027c54.763,3.832,80.408,13.5,92.42,21.657l.107.076.075.049A202,202,0,0,1,319.8,683.885l-.444.142-1.332.413a203.144,203.144,0,0,1-59.386,8.819h-.417A203.083,203.083,0,0,1,69.93,565.5C59.889,530.7,66.884,503.139,80.854,482.463Z" transform="translate(-65.193 -482.29)" fill="var(--openmeet)"/>
                            </g>
                            <path id="Tracé_7" data-name="Tracé 7" d="M839.165,469.43c-.315-.244-2.953-2.278-10.8-8.69-9.135-7.474-25.312-20.871-53.133-44.323l-4-3.357,4,3.3,53.257,44.207Z" transform="translate(-447.33 -249.025)" fill="#007bea"/>
                            <path id="Tracé_8" data-name="Tracé 8" d="M26,377.666l4.632-2.882,27.63-17.194,33.914-21.107,3.952-2.46,13.358-8.313" transform="translate(-14.254 -181.649)" fill="none"/>
                            <path id="Tracé_9" data-name="Tracé 9" d="M155.775,310.632a36.511,36.511,0,0,1-5.773-8.34,12.367,12.367,0,0,0-2.056-.315h-.031a34.383,34.383,0,0,0-4.108.178c-32.009,3.033-111.156,44.8-86.359,130.824a202.052,202.052,0,0,1-14.237-65.989c-1.994-33.492,2.7-59.71,11.644-77.992,19.952-40.788,36.6-66.5,71.615-20.9C131.236,274.027,156.836,304.433,155.775,310.632Z" transform="translate(-42.346 -154.994)" fill="var(--openmeet)"/>
                            <path id="Tracé_10" data-name="Tracé 10" d="M274.438,374.594a34.382,34.382,0,0,0-4.108.178A16.845,16.845,0,0,1,274.438,374.594Z" transform="translate(-168.86 -227.611)" fill="#afafef"/>
                            <path id="Tracé_141" data-name="Tracé 141" d="M44.869,0A44.869,44.869,0,1,1,0,44.869,44.869,44.869,0,0,1,44.869,0Z" transform="translate(66.85 30.09)" fill="var(--openmeet)"/>
                            <path id="Tracé_11" data-name="Tracé 11" d="M815.889,366.989a202.052,202.052,0,0,1-14.237,65.989c24.8-86.026-54.35-127.79-86.368-130.823a34.37,34.37,0,0,0-4.108-.178h-.018a12.37,12.37,0,0,0-2.056.315,35.952,35.952,0,0,1-5.773,8.34c-1.061-6.217,24.535-36.6,29.309-42.533,35.015-45.6,51.663-19.89,71.616,20.9C813.184,307.279,817.883,333.5,815.889,366.989Z" transform="translate(-409.559 -154.994)" fill="var(--openmeet)"/>
                            <path id="Tracé_12" data-name="Tracé 12" d="M688.816,505.683h0a203.829,203.829,0,0,1-71.269,90.4q-1.665,1.177-3.353,2.327h0c-10.658,5.928-19.575,8.828-26.835,9.49-10.129.919-17.066-2.513-21.1-8.206-7.993-11.248-4.614-31.316,7.842-43.963q1.661-1.465,3.277-2.984h0c34.9-32.608,55.229-79.276,44.62-108.016a102.92,102.92,0,0,0-9.716-20.871h0c-17.878,24.952-72.939,33.665-98.633,58.617-6.124,5.946-10.462,8.078-13.322,7.589,7.078-1.177,5.4-18.158,0-33.15h0c3.393-9.432,8.26-18.078,13.322-21.506,14.388-9.721,59.062-32.044,76.824-52.054a35.988,35.988,0,0,0,5.835-8.491l1.985-.164h.027a34.409,34.409,0,0,1,4.108.178C634.466,377.892,713.613,419.657,688.816,505.683Z" transform="translate(-296.723 -227.699)" fill="var(--openmeet)" opacity="0.8"/>
                            <path id="Tracé_13" data-name="Tracé 13" d="M70.067,505.421a203.785,203.785,0,0,0,71.256,90.426q1.665,1.177,3.353,2.327c10.658,5.928,19.575,8.833,26.84,9.494,10.129.919,17.066-2.513,21.1-8.206,7.993-11.248,4.614-31.316-7.842-43.963q-1.661-1.466-3.277-2.984h0c-34.9-32.608-55.229-79.276-44.62-108.016a102.7,102.7,0,0,1,9.716-20.871c17.878,24.952,72.939,33.665,98.637,58.617,6.124,5.946,10.458,8.078,13.322,7.589-7.083-1.177-5.4-18.162,0-33.154-3.393-9.432-8.26-18.078-13.322-21.506-14.388-9.721-59.062-32.044-76.824-52.054a36.511,36.511,0,0,1-5.773-8.34,12.354,12.354,0,0,0-2.056-.315h-.031a34.408,34.408,0,0,0-4.108.178C124.4,377.63,45.252,419.4,70.067,505.421Z" transform="translate(-54.893 -227.565)" fill="var(--openmeet)" opacity="0.9"/>
                            <path id="Tracé_14" data-name="Tracé 14" d="M494.423,592.954c-7.083-1.177-5.4-18.162,0-33.154C499.823,574.792,501.506,591.778,494.423,592.954Z" transform="translate(-290.825 -330.602)" fill="var(--openmeet)" opacity="0.8"/>
                            <circle id="Ellipse_3" data-name="Ellipse 3" cx="44.869" cy="44.869" r="44.869" transform="translate(250.607 30.09)" fill="var(--openmeet)"/>
                            <path id="Tracé_15" data-name="Tracé 15" d="M621.53,170.05Z" transform="translate(-364.102 -113.929)" fill="#108eff"/>
                            <path id="Tracé_16" data-name="Tracé 16" d="M666.45,778.614a39.523,39.523,0,0,1,3.277-2.984Q668.111,777.149,666.45,778.614Z" transform="translate(-389.074 -450.588)" fill="#38b0f9"/>
                            <path id="Tracé_17" data-name="Tracé 17" d="M760.333,873.5q-1.825,1.092-3.593,2.069,1.692-1.146,3.353-2.327Z" transform="translate(-439.269 -504.852)" fill="#38b0f9"/>
                        </g>
                    </svg>
                </a>
                <h1 class="h3 mb-3 font-weight-normal">Inscription</h1>

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
                               name="password" required autocomplete="new-password" aria-describedby="passwordHelp">
                        <small id="passwordHelp" class="form-text text-muted">
                            8 caractères minimum.
                        </small>

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="col-lg-6">
                        <label for="password-confirm">{{ __('Confirmer le mot de passe') }}</label>

                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                               required autocomplete="new-password">

                    </div>


                </div>

                <div class="form-group ">
                    <label for="bdate">{{ __('Date de naissance') }}</label>


                    <input id="bdate" type="date" class="form-control @error('bdate') is-invalid @enderror" name="bdate"
                           value="{{ old('bdate') }}" required autocomplete="bdate" autofocus>
                    <small id="warnAge" class="form-text text-muted">Personnes majeures uniquement.
                        &#128286;</small>

                    @error('bdate')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                </div>

                <button type="submit" class="btn btn-xl rounded-pill btn-primary w-50">
                    {{ __('S\'inscrire') }}
                </button>
                <div class="mt-3">
                    @if (Route::has('login'))
                        <a class="btn btn-link" href="{{ route('login') }}">
                            {{ __('Se connecter') }}
                        </a>
                    @endif
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('J\'ai oublié mon mot de passe') }}
                        </a>
                    @endif

                </div>


                <p class="mt-5 mb-3 text-muted">&copy; OpenMeet - 2020</p>
            </form>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{url('/js/zxcvbn.js')}}"></script>
    <script>
        console.log(zxcvbn());

    </script>
@endsection

@section('css')

    <style>

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;

        }

        .h-100 {
            height: 100vh !important;
        }

        .form-signin {
            width: 100%;
            max-width: 720px;
            padding: 5px;
            margin: auto;
        }

        .form-signin .checkbox {
            font-weight: 400;
        }

        .form-signin .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }

        .form-signin .form-control:focus {
            z-index: 2;
        }

    </style>
@endsection

