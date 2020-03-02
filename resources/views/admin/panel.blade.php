@extends('layouts.nav')

@section('content')

    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="openmeet-title openmeet-nav sidebar-header">
                <h3>Administration</h3>
            </div>

            <ul class="list-unstyled components">
                <li class="active">
                    <a href="#home" data-toggle="collapse" aria-expanded="false">Paramètres du site</a>

                </li>
                <li>
                    <a href="#contentSubmenu" data-toggle="collapse" aria-expanded="false"
                       class="dropdown-toggle">Contenu du site</a>
                    <ul class="collapse list-unstyled" id="contentSubmenu">
                        <li>
                            <a href="#">Utilisateurs</a>
                        </li>
                        <li>
                            <a href="#">Groupes</a>
                        </li>
                        <li>
                            <a href="#">Evénements</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="/contact/toadmin">Contact</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content Holder -->
        <div id="content">

            <nav class="navbar-admin navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="navbar-admin-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <!--<button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>-->

                    <div class="collapse navbar-collapse nav-tabs" id="nav-tab" role="tablist">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" id="nav-manage-tab" data-toggle="tab" href="#nav-manage" role="tab"
                                   aria-controls="nav-manage" aria-selected="true">Gestion du site</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="nav-skin-tab" data-toggle="tab" href="#nav-skin" role="tab"
                                   aria-controls="nav-skin" aria-selected="false">Thèmes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="tab-pane fade show" id="nav-manage" role="tabpanel"
                 aria-labelledby="nav-manage-tab">

                {!! Form::open(['url' => '/admin/edit']) !!}
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

            <div class="tab-pane fade" id="nav-skin" role="tabpanel"
                 aria-labelledby="nav-skin-tab">

                <h3 class="display-4">Indisponible (Work in Progress)</h3>


            </div>


        </div>
    </div>

@endsection

@section('css')

    <style>

        p {
            font-family: 'Poppins', sans-serif;
            font-size: 1.1em;
            font-weight: 300;
            line-height: 1.7em;
            color: #999;
        }

        .wrapper a, .wrapper a:hover, .wrapper a:focus {
            color: inherit;
            text-decoration: none;
            transition: all 0.3s;
        }

        .navbar-admin {
            padding: 15px 10px;
            background: #fff;
            border: none;
            border-radius: 0;
            margin-bottom: 40px;
            box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
        }

        .navbar-admin-btn {
            box-shadow: none;
            outline: none !important;
            border: none;
        }

        .line {
            width: 100%;
            height: 1px;
            border-bottom: 1px dashed #ddd;
            margin: 40px 0;
        }

        .wrapper {
            display: flex;
            width: 100%;
            align-items: stretch;
            perspective: 1500px;
            margin-top: 66px;
            background: url("/assets/wall-white-30.svg") fixed no-repeat;
            background-size: cover;
        }

        @import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";


        #sidebar {
            font-family: 'Poppins', sans-serif;
            min-width: 250px;
            max-width: 250px;
            background: #fafafa;
            border-right: 1px solid #ccc;
            color: #1b1e21;
            transition: all 0.6s cubic-bezier(0.945, 0.020, 0.270, 0.665);
            transform-origin: bottom left;
        }

        #sidebar.active {
            margin-left: -250px;
            transform: rotateY(100deg);
        }

        #sidebar .sidebar-header {
            padding: 20px;
            background: #ddd;
        }


        #sidebar ul p {
            color: #fff;
            padding: 15px;
        }

        #sidebar ul li a {
            padding: 15px;
            font-size: 1.1em;
            display: block;
        }

        #sidebar ul li a:hover {
            color: #fff;
            background: #bbb;
        }

        #sidebar ul li.active > #sidebar a, #sidebar a[aria-expanded="true"] {
            color: #23272b;
            background: #eee;
        }


        a[data-toggle="collapse"] {
            position: relative;
        }

        .dropdown-toggle::after {
            display: block;
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
        }

        ul ul a {
            font-size: 0.9em !important;
            padding-left: 30px !important;
            background: #fff;
        }

        ul.CTAs {
            padding: 20px;
        }

        ul.CTAs a {
            text-align: center;
            font-size: 0.9em !important;
            display: block;
            border-radius: 5px;
            margin-bottom: 5px;
        }


        /* ---------------------------------------------------
            CONTENT STYLE
        ----------------------------------------------------- */
        #content {
            width: 100%;
            padding: 20px;
            min-height: 100vh;
            transition: all 0.3s;
        }

        #sidebarCollapse {
            width: 40px;
            height: 40px;
            background: #f5f5f5;
            cursor: pointer;
        }

        #sidebarCollapse span {
            width: 80%;
            height: 2px;
            margin: 0 auto;
            display: block;
            background: #555;
            transition: all 0.8s cubic-bezier(0.810, -0.330, 0.345, 1.375);
            transition-delay: 0.2s;
        }

        #sidebarCollapse span:first-of-type {
            transform: rotate(45deg) translate(2px, 2px);
        }

        #sidebarCollapse span:nth-of-type(2) {
            opacity: 0;
        }

        #sidebarCollapse span:last-of-type {
            transform: rotate(-45deg) translate(1px, -1px);
        }


        #sidebarCollapse.active span {
            transform: none;
            opacity: 1;
            margin: 5px auto;
        }


        /* ---------------------------------------------------
            MEDIAQUERIES
        ----------------------------------------------------- */
        @media (max-width: 768px) {
            #sidebar {
                margin-left: -250px;
                transform: rotateY(90deg);
            }

            #sidebar.active {
                margin-left: 0;
                transform: none;
            }

            /*#sidebarCollapse span:first-of-type,
            #sidebarCollapse span:nth-of-type(2),
            #sidebarCollapse span:last-of-type {
                transform: none;
                opacity: 1;
                margin: 5px auto;
            }

            #sidebarCollapse.active span {
                margin: 0 auto;
            }

            #sidebarCollapse.active span:first-of-type {
                transform: rotate(45deg) translate(2px, 2px);
            }

            #sidebarCollapse.active span:nth-of-type(2) {
                opacity: 0;
            }

            #sidebarCollapse.active span:last-of-type {
                transform: rotate(-45deg) translate(1px, -1px);
            }*/

        }

    </style>

@endsection

@section('js')

    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
    </script>
@endsection
