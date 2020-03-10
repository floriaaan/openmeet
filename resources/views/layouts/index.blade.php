<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="favicon.png"/>
    <title>{{Setting('openmeet.title', 'OpenMeet')}} - @yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/pepper-grinder/jquery-ui.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.3.1/css/hover-min.css"
          integrity="sha256-c+C87jupO1otD1I5uyxV68WmSLCqtIoNlcHLXtzLCT0=" crossorigin="anonymous"/>
    <link href="/css/openmeet.css" rel="stylesheet">
    @laravelPWA

    <style>

        :root {
            --openmeet: {{Setting('openmeet.color')}};
            --openmeet-transparent: {{Setting('openmeet.color')}}77;
        }

        .btn-primary {
            color: #fff;
            background-color: var(--openmeet);
            border-color: var(--openmeet);
        }

        .btn-primary:hover {
            color: #fff;
            background-color: #222;
            border-color: #333;
        }

        .bg-primary {
            background-color: var(--openmeet) !important;
        }

        .btn-primary:focus, .btn-primary.focus {
            box-shadow: 0 0 0 0.2rem var(--openmeet-transparent);
        }

        .btn-primary.disabled, .btn-primary:disabled {
            color: #fff;
            background-color: var(--openmeet);
            border-color: var(--openmeet);
        }

        .btn-primary:not(:disabled):not(.disabled):active, .btn-primary:not(:disabled):not(.disabled).active,
        .show > .btn-primary.dropdown-toggle {
            color: #fff;
            background-color: calc(50% * var(--openmeet));
            border-color: calc(40% * var(--openmeet));
        }

        .btn-primary:not(:disabled):not(.disabled):active:focus, .btn-primary:not(:disabled):not(.disabled).active:focus,
        .show > .btn-primary.dropdown-toggle:focus {
            box-shadow: 0 0 0 0.2rem var(--openmeet-transparent);
        }

        .nav-link {
            color: var(--openmeet) !important;
        }

        .text-primary {
            color: var(--openmeet) !important;
        }

        .btn-link {
            color: var(--openmeet) !important;
        }

        .color {
            color: var(--openmeet) !important;
        }

        .form-control:focus {
            border-color: var(--openmeet-transparent) !important;
            box-shadow: 0 0 0 0.2rem var(--openmeet-transparent) !important;
        }

        .dropdown-item:active {
            color: var(--openmeet) !important;
        }

        .badge-primary {
            background-color: var(--openmeet) !important;
        }


    </style>

    @if(Setting('openmeet.theme') == "night")
        <link href="/css/night.css" rel="stylesheet">
    @endif

</head>
<body>
@yield('css')
@yield('body')

<script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/javascript.util/0.12.12/javascript.util.min.js"
        integrity="sha256-eiohPQlDytO6qQO+k+xX6LyVgfXcTzlPCy9t/VjceYo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/i18n/jquery-ui-i18n.min.js"></script>
@yield('js')
</body>
</html>

@section('title')
    {{ Setting('openmeet.name', 'OpenMeet') }}
@endsection

