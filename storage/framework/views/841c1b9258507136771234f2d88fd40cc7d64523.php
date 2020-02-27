<?php $__env->startSection('body'); ?>

    <nav class="navbar navbar-expand-lg d-flex flex-row navbar-light">
        <a class="navbar-brand" href="/">
            <img src="/assets/logo.svg" width="50" height="50" class="d-inline-block align-top"
                 alt="<?php echo e(Setting('openmeet.name')); ?>">
            <span
                class="ml-2 openmeet-title openmeet-nav text-center openmeet-color"><?php echo e(Setting('openmeet.name')); ?></span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navToggle"
                aria-controls="navToggle" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navToggle">

            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
            </ul>

        </div>
    </nav>
    <?php echo $__env->yieldContent('content'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('base.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\langl\Desktop\Cours\Projets\ProjetClient\OpenMeet\resources\views/base/nav.blade.php ENDPATH**/ ?>