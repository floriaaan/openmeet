<?php $__env->startSection('content'); ?>
    <h1>Toutes vos notifications </h1>

    <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notif): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div id="oneNotif" style="left: 2em;">
            <a href="" style="text-decoration: none;">
                <h3 style="margin: 0"><?php echo e($notif->title); ?></h3>
                <p style="margin: 0"><?php echo e($notif->content); ?></p>
                <span style="margin: 0"><?php echo e($notif->date); ?></span>
            </a>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('base.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\langl\Desktop\Cours\Projets\ProjetClient\OpenMeet\resources\views/notification/showall.blade.php ENDPATH**/ ?>