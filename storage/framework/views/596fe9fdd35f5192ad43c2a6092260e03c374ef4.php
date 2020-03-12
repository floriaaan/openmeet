<!-- Web Application Manifest -->
<link rel="manifest" href="<?php echo e(route('laravelpwa.manifest')); ?>">
<!-- Chrome for Android theme color -->
<meta name="theme-color" content="<?php echo e($config['theme_color']); ?>">

<!-- Add to homescreen for Chrome on Android -->
<meta name="mobile-web-app-capable" content="<?php echo e($config['display'] == 'standalone' ? 'yes' : 'no'); ?>">
<meta name="application-name" content="<?php echo e($config['short_name']); ?>">
<link rel="icon" sizes="<?php echo e(data_get(end($config['icons']), 'sizes')); ?>" href="<?php echo e(data_get(end($config['icons']), 'src')); ?>">

<!-- Add to homescreen for Safari on iOS -->
<meta name="apple-mobile-web-app-capable" content="<?php echo e($config['display'] == 'standalone' ? 'yes' : 'no'); ?>">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-title" content="<?php echo e($config['short_name']); ?>">
<link rel="apple-touch-icon" href="<?php echo e(data_get(end($config['icons']), 'src')); ?>">



<!-- Tile for Win8 -->
<meta name="msapplication-TileColor" content="<?php echo e($config['background_color']); ?>">
<meta name="msapplication-TileImage" content="<?php echo e(data_get(end($config['icons']), 'src')); ?>">

<script type="text/javascript">
    // Initialize the service worker
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/serviceworker.js', {
            scope: '.'
        }).then(function (registration) {
            // Registration was successful
            console.log('Laravel PWA: ServiceWorker registration successful with scope: ', registration.scope);
        }, function (err) {
            // registration failed :(
            console.log('Laravel PWA: ServiceWorker registration failed: ', err);
        });
    }
</script>

<?php /**PATH C:\Users\langl\Desktop\Cours\Projets\ProjetClient\OpenMeet\resources\views/modules/laravelpwa/meta.blade.php ENDPATH**/ ?>