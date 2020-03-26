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
                    <div class="row justify-content-center mt-5 ">
                        <input type="text" name="search"
                               class="text-center form-control form-control-lg rounded-pill mx-1 w-75"
                               style="padding:2rem; font-size:15px"
                               placeholder="Rechercher un groupe ou événement"
                               required>
                        <button type="submit" class="btn btn-primary rounded-pill mx-1">
                            <i class="fas fa-lg fa-search"></i>
                        </button>
                    </div>
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
        <!--<div class="card rounded mx-3 shadow-lg" id="pwa-card">-->
        <div class="mx-3 p-2" id="pwa-card">
            <hr class="my-4 mx-3">
            <div class="row justify-content-between">
                <div class="">
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

                <div class="mr-4">

                    <svg id="f7bb3db6-0aca-42e3-bcc4-5e9b3a55e19d" data-name="Layer 1"
                         xmlns="http://www.w3.org/2000/svg" width="300" height="300" viewBox="0 0 879.5 581.35056">
                        <title>Mobile_application</title>
                        <path
                            d="M803.25,740.67528q-36.47625-5.71034-70.14288-9.71417L741.75,713.67528c-3-1-16,9-16,9l11-50c-15,2-22,53-22,53l-17-17,8.36835,19.24713c-68.68128-7.21667-127.94678-9.46881-177.76581-8.95227L535.75,704.17528c-3-1-16,9-16,9l11-50c-15,2-22,53-22,53l-17-17,8.8634,20.38586A997.85166,997.85166,0,0,0,398.59082,727.777c7.38153-22.99578,33.15918-45.10174,33.15918-45.10174-19.82056,6.16638-30.13214,16.2124-35.4693,25.5246A401.561,401.561,0,0,1,417.75,569.17528s-40,90-34,150l.76129,10.65808C349.71191,735.26213,332.25,740.67528,332.25,740.67528Z"
                            transform="translate(-160.25 -159.32472)" fill="#3f3d56"/>
                        <path
                            d="M894.92236,616.811a12,12,0,1,1,12-12A12.01375,12.01375,0,0,1,894.92236,616.811Zm0-22a10,10,0,1,0,10,10A10.01114,10.01114,0,0,0,894.92236,594.811Z"
                            transform="translate(-160.25 -159.32472)" fill="#3f3d56"/>
                        <path
                            d="M990.75,739.10087H971.00885V719.35972H990.75Zm-18.2226-1.51855h16.70405v-16.704H972.5274Z"
                            transform="translate(-160.25 -159.32472)" fill="#3f3d56"/>
                        <path
                            d="M322.39387,740.181l-13.4651-14.43621L323.365,712.27965l13.46509,14.43621ZM311.075,725.81944l11.39354,12.21526,12.21525-11.39354L323.29028,714.4259Z"
                            transform="translate(-160.25 -159.32472)" fill="#3f3d56"/>
                        <rect x="21.67236" y="578.66157" width="857.82764" height="2" fill="#3f3d56"/>
                        <path
                            d="M713.725,293.08473v65.68a2.29614,2.29614,0,0,1-2.29,2.29h-1.62989v342.15a35.702,35.702,0,0,1-35.70007,35.7H460.31509a35.69346,35.69346,0,0,1-35.69006-35.7v-330.15h-1.18a1.6176,1.6176,0,0,1-1.62-1.61v-37.38a1.61971,1.61971,0,0,1,1.62-1.62h1.18v-14.08H423.435a1.69647,1.69647,0,0,1-1.68994-1.7v-36.87a1.69432,1.69432,0,0,1,1.68994-1.69H424.625v-19.22H423.415a1.498,1.498,0,0,1-1.5-1.5v-20.12a1.50661,1.50661,0,0,1,1.5-1.51H424.625v-40.74a35.69136,35.69136,0,0,1,35.69006-35.69H674.105a35.69991,35.69991,0,0,1,35.70007,35.69v95.78H711.435A2.29609,2.29609,0,0,1,713.725,293.08473Z"
                            transform="translate(-160.25 -159.32472)" fill="#3f3d56"/>
                        <rect x="379.97864" y="18.3068" width="39.82343" height="8.08642" rx="2.54189" fill="#e6e8ec"/>
                        <circle cx="430.41006" cy="22.35" r="4.58665" fill="#e6e8ec"/>
                        <path
                            d="M692.71,202.07524v504.09a22.58,22.58,0,0,1-7.96,17.23,22.6419,22.6419,0,0,1-14.69,5.41H465.41a22.58668,22.58668,0,0,1-10.46-2.55,21.15539,21.15539,0,0,1-2.2-1.3,22.66834,22.66834,0,0,1-9.99-18.79v-504.09a22.649,22.649,0,0,1,22.65-22.65h30.63v3.93a18.65015,18.65015,0,0,0,18.65,18.65H618.77a18.65009,18.65009,0,0,0,18.65-18.65v-3.93h32.64A22.64264,22.64264,0,0,1,692.71,202.07524Z"
                            transform="translate(-160.25 -159.32472)" fill="var(--openmeet)"/>
                        <path
                            d="M692.71,634.00524v72.16a22.58,22.58,0,0,1-7.96,17.23,22.6419,22.6419,0,0,1-14.69,5.41H465.41a22.58668,22.58668,0,0,1-10.46-2.55,21.15539,21.15539,0,0,1-2.2-1.3,22.66834,22.66834,0,0,1-9.99-18.79v-72.13a186.97056,186.97056,0,0,1,249.95-.03Z"
                            transform="translate(-160.25 -159.32472)" fill="#fff" opacity="0.3"/>
                        <path
                            d="M680.54,726.23528a22.40961,22.40961,0,0,1-10.48,2.57H465.41a22.58668,22.58668,0,0,1-10.46-2.55,122.16129,122.16129,0,0,1,225.59-.02Z"
                            transform="translate(-160.25 -159.32472)" fill="#fff" opacity="0.3"/>
                        <path
                            d="M636,727.44483A13.56058,13.56058,0,0,1,629.65831,729H505.81957a13.66765,13.66765,0,0,1-6.32958-1.5431A73.92279,73.92279,0,0,1,636,727.44483Z"
                            transform="translate(-160.25 -159.32472)" fill="#fff" opacity="0.3"/>
                        <path
                            d="M619.7959,374.5752c-20.52881,0-43.05811-3.90918-60.646-17.1001-24.4873-18.36524-54.65674-17.38526-75.65332-13.32813a164.86282,164.86282,0,0,0-40.27441,13.415l-.92481-1.77344a166.95707,166.95707,0,0,1,40.76758-13.59521c21.40918-4.14356,52.19678-5.13379,77.28516,13.68213,46.99951,35.24951,131.15771,3.59033,132.00146,3.26758l.7168,1.86718a242.3548,242.3548,0,0,1-48.70606,11.85694A186.20165,186.20165,0,0,1,619.7959,374.5752Z"
                            transform="translate(-160.25 -159.32472)" fill="#fff"/>
                        <path d="M442.75,356.67528s69-16.71229,117,6.16983,133-.16983,133-.16983"
                              transform="translate(-160.25 -159.32472)" fill="#fff" opacity="0.3"/>
                        <path
                            d="M507.89111,382.63623a131.45576,131.45576,0,0,1-24.82617-2.479A166.95732,166.95732,0,0,1,442.29736,366.562l.92481-1.77344a164.86232,164.86232,0,0,0,40.27441,13.415c20.99561,4.05664,51.16553,5.03711,75.65332-13.32812,25.06641-18.79981,60.17725-18.74707,85.2124-15.39209a242.3552,242.3552,0,0,1,48.70606,11.85693l-.7168,1.86719c-.84472-.32373-85.001-31.9834-132.00146,3.26758C543.898,378.81445,524.99316,382.63623,507.89111,382.63623Z"
                            transform="translate(-160.25 -159.32472)" fill="#fff" opacity="0.3"/>
                        <path
                            d="M508.231,374.5835c-34.63428,0-65.39063-12.4253-65.852-12.61524l.76172-1.84961c.68457.28223,69.08837,27.89942,116.10009.06446,47.82471-28.31983,132.90576-3.041,133.75928-2.78223l-.58008,1.91406c-.84472-.25586-85.09277-25.28125-132.16064,2.58887C544.19678,371.415,525.71875,374.5835,508.231,374.5835Z"
                            transform="translate(-160.25 -159.32472)" fill="#fff" opacity="0.3"/>
                        <path d="M442.76,359.50545s68.99,22.88212,116.99,0,132.96-2.16209,132.96-2.16209"
                              transform="translate(-160.25 -159.32472)" fill="#fff" opacity="0.3"/>
                        <path
                            d="M710.51913,420.72469v29.15278s2.33223,32.65113,15.15945,48.97669c0,0,20.99,29.73584,23.90529,23.32223l-3.59045-21.11522-12.15205-11.5359-6.41362-36.14946-1.74917-32.65112Z"
                            transform="translate(-160.25 -159.32472)" fill="#ffb8b8"/>
                        <polygon
                            points="679.124 524.941 679.124 546.514 661.633 552.928 661.633 527.856 679.124 524.941"
                            fill="#ffb8b8"/>
                        <polygon
                            points="643.558 522.609 655.219 548.846 638.894 555.843 635.395 530.189 643.558 522.609"
                            fill="#ffb8b8"/>
                        <path
                            d="M832.96085,480.77943s23.32223,210.48313,14.57639,211.06619-25.65445,11.66112-25.65445,4.08139S808.4725,589.81086,808.4725,589.81086L795.64528,539.085V609.0517l13.41028,79.29559s-12.82723,16.90861-22.15612,6.99667l-19.8239-77.54642S740.838,500.02027,742.00415,490.69138C742.00415,490.69138,802.05889,439.38247,832.96085,480.77943Z"
                            transform="translate(-160.25 -159.32472)" fill="#2f2e41"/>
                        <path
                            d="M828.2964,707.00507s4.66445-9.912,15.15945-3.49833l8.74584,10.495S874.75,732.67528,858.75,736.67528c-16.49131,4.12283-26.37221-.26326-26.37221-.26326s-2.91528-1.74916-5.2475-1.74916-7.57973-4.08139-7.57973-5.24751,1.74917-21.82722,1.74917-21.82722a3.67667,3.67667,0,0,1,4.08139.58305C827.13029,709.92035,828.2964,707.00507,828.2964,707.00507Z"
                            transform="translate(-160.25 -159.32472)" fill="#2f2e41"/>
                        <path
                            d="M793.89611,703.50674s11.07806-8.74584,16.32556,1.16611c0,0,3.304,1.16611,3.69269,0s3.304-1.74917,3.304,4.66444,3.16611,22.41029.25083,22.99334-5.83055,2.33223-5.2475,4.66445-3.16611,2.66111-16.57639,2.07806-13.99334-5.83056-13.99334-5.83056,0-7.57972,3.49833-11.66111S793.89611,703.50674,793.89611,703.50674Z"
                            transform="translate(-160.25 -159.32472)" fill="#2f2e41"/>
                        <path
                            d="M772.32305,321.6052s-2.91528,21.57307,15.7425,29.15279-41.397,32.65113-47.22752,18.07473,1.16612-19.24084,1.16612-19.24084,5.83055-5.83056.58305-21.57306Z"
                            transform="translate(-160.25 -159.32472)" fill="#ffb8b8"/>
                        <circle cx="593.41526" cy="151.78548" r="25.65445" fill="#ffb8b8"/>
                        <path
                            d="M783.40111,357.75466s-17.49168,9.32889-34.40029,2.33223-16.32557,23.32223-16.32557,23.32223l8.74584,22.73917,60.6378-5.83056-4.08139-34.98334Z"
                            transform="translate(-160.25 -159.32472)" fill="#f2f2f2"/>
                        <path
                            d="M774.71069,337.80432a21.16638,21.16638,0,0,1,14.521,11.20451l27.98668,8.74583,6.99667,9.91195-8.16278,71.71586s15.15945,14.57639,15.15945,22.73918,18.65778,36.14945,9.32889,32.65112-26.23751-15.74251-26.23751-15.74251-42.56307,1.74917-55.97335,13.41029-18.65779,8.16278-18.65779,8.16278-13.99334-60.6378-14.57639-69.9667-16.90862-65.30224-16.90862-65.30224l29.15279-16.32556,7.42538-8.42509,20.5613,32.91343L783.98416,350.758S774.7661,343.50843,774.71069,337.80432Z"
                            transform="translate(-160.25 -159.32472)" fill="#3f3d56"/>
                        <path
                            d="M832.96085,412.5619l3.49833,18.65779s15.74251,58.30558,13.41028,78.12947c0,0,1.74917,44.31224-8.16278,39.06474s-4.66444-37.31557-4.66444-37.31557L823.0489,453.37581l-7.57973-33.81724Z"
                            transform="translate(-160.25 -159.32472)" fill="#ffb8b8"/>
                        <path
                            d="M818.38445,364.16828l5.83056,3.49833s22.15612,46.06141,16.90862,49.55974S813.137,428.30441,813.137,428.30441Z"
                            transform="translate(-160.25 -159.32472)" fill="#3f3d56"/>
                        <polygon
                            points="561.93 206.01 548.228 205.718 545.022 211.257 549.103 267.814 570.093 272.478 561.93 206.01"
                            fill="#3f3d56"/>
                        <path
                            d="M774.55608,289.41318l4.62409-1.68149s-9.6685-9.66851-23.12045-8.82773l3.78344-3.78338s-9.24818-3.36292-17.65558,5.46481c-4.4196,4.64055-9.53315,10.09526-12.72091,16.23994h-4.95208l2.06681,4.13363-7.23384,4.13362,7.42483-.7425a20.85851,20.85851,0,0,0,.70227,10.70563l1.68143,4.624s6.726-13.45182,6.726-15.13331v4.2037s4.62409-3.78332,4.62409-6.30552l2.52221,2.94259,1.2611-4.62409,15.5537,4.62409-2.52221-3.78331,9.66851,1.26111-3.78344-4.62409s10.92961,5.4648,11.35006,10.08889,3.306,10.65165,3.306,10.65165l3.49833-4.08139S786.7468,295.7187,774.55608,289.41318Z"
                            transform="translate(-160.25 -159.32472)" fill="#2f2e41"/>
                        <ellipse cx="614.98833" cy="152.07701" rx="2.0407" ry="5.2475" fill="#ffb8b8"/>
                        <path
                            d="M201.884,706.3411c12.42842,23.049,38.806,32.94351,38.806,32.94351s6.22712-27.47543-6.2013-50.52448-38.806-32.9435-38.806-32.9435S189.45559,683.29206,201.884,706.3411Z"
                            transform="translate(-160.25 -159.32472)" fill="#3f3d56"/>
                        <path
                            d="M210.42653,698.75813c22.43841,13.49969,31.08016,40.3138,31.08016,40.3138s-27.73812,4.92679-50.17653-8.57291S160.25,690.18522,160.25,690.18522,187.98811,685.25844,210.42653,698.75813Z"
                            transform="translate(-160.25 -159.32472)" fill="var(--openmeet)"/>
                        <path d="M442.76,356.67528s68.99-36,116.99,0,132.96,3.40157,132.96,3.40157"
                              transform="translate(-160.25 -159.32472)" fill="#fff" opacity="0.3"/>
                        <circle cx="407.75" cy="552.67528" r="11" fill="#fff"/>
                    </svg>

                </div>
            </div>
            <hr class="my-4 mx-3">
        </div>

    </div>



    <div class="container-fluid mt-5" id="containerEvents">

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

        .card-tag {
            height: 200px;
            width: auto;
            color: white;
            text-transform: capitalize;
        }

        .card-tag img {
            margin-left: auto;
            margin-right: auto;

            height: 200px !important;
            width: auto !important;
            opacity: 0.8;
        }


        @media (max-width: 990px) {
            .img-pwa {
                width: 60%;
                margin: auto !important;

            }

        }

        @media (max-width: 900px) {


            .card-columns {
                column-count: 2;
            }
        }

        @media (max-width: 700px) {
            .card-columns {
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
                    getEventAndCreateCard(data);
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
                    $('#containerTags').append('<hr class=" mx-5"><div class="card rounded mx-3 shadow-lg"><div class="card-columns p-5" id="locationCard"></div></div>');
                    for (let i = 0; i < data.length; i++) {
                        $('#locationCard').append(
                            '<div class="card bg-dark shadow-sm card-tag" id="card-' + data[i].tag + '">' +
                            '<img src="' + data[i].img + '" class="card-img-top mx-auto" alt="Image de ' + data[i].tag + '">' +
                            '<div class="card-img-overlay" onclick="event.preventDefault();document.getElementById("form-' + data[i].tag.trim() + '").submit();">' +
                            '<h5 class="card-title">' + data[i].tag + '</h5>' +
                            '</div>' +
                            '</div>' +
                            '<form id="form-' + data[i].tag.trim() + '" action="{{url("/search")}}" method="post" class="d-none">@csrf' +
                            '<input type="hidden" name="search" value="' + data[i].tag + '">' +
                            '</form>');

                    }
                    console.log($('#locationCard').innerHTML)

                },
                error: function () {
                    console.log('Error')
                }
            });
        }

        //getTags()
    </script>
@endsection
