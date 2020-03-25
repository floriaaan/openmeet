<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo e(url('')); ?>/favicon.png"/>
    <title><?php echo e(Setting('openmeet.name', 'OpenMeet')); ?> - <?php echo $__env->yieldContent('title'); ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/pepper-grinder/jquery-ui.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.3.1/css/hover-min.css"
          integrity="sha256-c+C87jupO1otD1I5uyxV68WmSLCqtIoNlcHLXtzLCT0=" crossorigin="anonymous"/>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
          integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
          crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
            integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
            crossorigin=""></script>

    <link href="/css/openmeet.css" rel="stylesheet">
    <?php $config = (new \LaravelPWA\Services\ManifestService)->generate(); echo $__env->make( 'laravelpwa::meta' , ['config' => $config])->render(); ?>

    <style>

        :root {
            --openmeet: <?php echo e(Setting('openmeet.color')); ?>;
            --openmeet-transparent: <?php echo e(Setting('openmeet.color')); ?>77;
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

        .custom-control-input:checked + .custom-control-label::before {
            border-color: var(--openmeet);
            background-color: var(--openmeet);
        }

        .custom-control-input:focus + .custom-control-label::before {
            box-shadow: 0 0 0 0.2rem var(--openmeet-transparent);
        }

        .custom-control-input:focus:not(:checked) ~ .custom-control-label::before {
            border-color: var(--openmeet);
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
            background-color: <?php echo e(setting('openmeet.color')); ?>;
            outline: 1px solid slategrey;
            border-radius: 1rem;
        }


    </style>

    <?php if(Setting('openmeet.theme') == "night"): ?>
        <link href="/css/night.css" rel="stylesheet">
    <?php endif; ?>

</head>
<body>
<?php echo $__env->yieldContent('css'); ?>
<?php echo $__env->yieldContent('body'); ?>

<script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/javascript.util/0.12.12/javascript.util.min.js"
        integrity="sha256-eiohPQlDytO6qQO+k+xX6LyVgfXcTzlPCy9t/VjceYo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/i18n/jquery-ui-i18n.min.js"></script>
<script src="<?php echo e(asset('js/share.js')); ?>"></script>

<script>


    /*$('#alert-close').click(function () {
        $.ajax({
            url: '<?php echo e(url('/api/v1/session/unset/error')); ?>',
            type: 'post',
            data: {'sessionid': '<?php echo e(Session()->getId()); ?>'},
            success: function (data) {
                console.log('success', data)
            },
            error: function () {
                console.log('error')
            }
        })
    });*/


    function displayForm() {
        if ($('#searchForm').hasClass('d-none')) {
            $('#searchForm').removeClass('d-none');
            $('#search').focus();
        } else {
            $('#searchForm').addClass('d-none');
        }
    }

</script>
<?php echo $__env->yieldContent('js'); ?>


</body>
</html>

<?php $__env->startSection('title'); ?>
    <?php echo e(Setting('openmeet.name', 'OpenMeet')); ?>

<?php $__env->stopSection(); ?>

<?php /**PATH C:\Users\langl\Desktop\Cours\Projets\ProjetClient\OpenMeet\resources\views/layouts/index.blade.php ENDPATH**/ ?>