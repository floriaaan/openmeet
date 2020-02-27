<?php $__env->startSection('content'); ?>
    <h1>Toutes vos notifications </h1>

    <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notif): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="#">
            <h3><?php echo e($notif->NOTIF_TITLE); ?></h3>
            <p><?php echo e($notif->NOTIF_CONTENT); ?></p>
            <span><?php echo e($notif->NOTIF_DATE); ?></span>
        </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('base.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\langl\Desktop\Cours\Projets\ProjetClient\OpenMeet\resources\views/notification/showall.blade.php ENDPATH**/ ?>