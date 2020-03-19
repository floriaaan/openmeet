<?php $__env->startSection('title'); ?>
    Groupes
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container p-5">


        <?php $__currentLoopData = $listGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


            <div class="card rounded shadow mt-2 mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4" style="overflow: hidden">

                        <?php if($group->picname != null): ?>
                            <img src="<?php echo e(url('/storage/upload/image/'.$group->picrepo.'/'.$group->picname)); ?>"
                                 class="card-img hvr-grow" alt="Photo de <?php echo e($group->name); ?>">
                        <?php else: ?>
                            <small class="p-3 blockquote-footer">Pas de photo</small>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo e($group->name); ?></h5>
                            <h6 class="text-muted"><?php echo e($group->desc); ?></h6>
                            <hr class="mx-4 my-4">
                            <div class="row p-1">
                                <?php $__empty_1 = true; $__currentLoopData = (new \App\Group)->getTagsByGroup($group->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <?php if($tag != ''): ?>
                                        <a onclick="event.preventDefault();document.getElementById('form-<?php echo e($tag); ?>').submit();">
                                            <span class="badge badge-secondary mx-1"><?php echo e($tag); ?></span>
                                        </a>

                                        <form id="form-<?php echo e($tag); ?>" action="<?php echo e(url('/search')); ?>" method="post"
                                              class="d-none">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="search" value="<?php echo e($tag); ?>">
                                        </form>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <span>Aucun tag</span>
                                <?php endif; ?>
                            </div>
                            <p class="card-text"><small class="text-muted">Créé le <?php echo e($group->datecreate); ?></small>
                            </p>
                        </div>
                        <div class="">
                            <a href="<?php echo e(url('/groups/show/')); ?>/<?php echo e($group->id); ?>"
                               class="btn btn-primary float-right mr-5 mb-3">Voir <?php echo e($group->name); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <style>
        .card-columns {
            column-count: 2;
        }

        .card-img {
            width: 100% !important;
            height: auto;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\langl\Desktop\Cours\Projets\ProjetClient\OpenMeet\resources\views/group/list.blade.php ENDPATH**/ ?>