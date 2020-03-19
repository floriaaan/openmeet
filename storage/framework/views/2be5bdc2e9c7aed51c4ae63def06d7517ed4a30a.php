<?php $__env->startSection('content'); ?>

    <div class="container-fluid">
        <a class="btn btn-link float-right mr-5"
           href="<?php echo e(url('/groups/list')); ?>">
            Retour
            <i class="fas fa-arrow-right"></i>
        </a>
        <hr class="m-4">
        <div class="card rounded shadow-lg mb-3 mx-auto h-100" style="width: 95%">
            <div class="row no-gutters">
                <div class="col-md-4 m-auto" style="overflow: hidden;">
                    <?php if($group->picname != null): ?>
                        <img src="<?php echo e(url('/storage/upload/image/'.$group->picrepo.'/'.$group->picname)); ?>"
                             class="card-img hvr-grow" alt="Photo de <?php echo e($group->name); ?>">
                    <?php else: ?>
                        <small class="p-3 blockquote-footer">Pas de photo</small>
                    <?php endif; ?>


                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title display-4"><?php echo e($group->name); ?></h5>
                        <?php if($group->desc != null): ?><h5
                            class="text-muted ml-3 blockquote-footer"><?php echo e($group->desc); ?></h5><?php endif; ?>
                        <hr class="mx-4 my-4">

                        <div class="h-50 p-3" style="height: 40vh!important; overflow-y: scroll!important;">


                            <?php $__currentLoopData = $listEvent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(url('/events/show')); ?>/<?php echo e($event->id); ?>"
                                   style="text-decoration: none; color: inherit;">
                                    <div class="p-4 shadow-sm mt-2">
                                        <h5><?php echo e($event->name); ?></h5>
                                        <p class="text-muted"><?php echo e($event->description); ?></p>
                                        <p style="text-transform: capitalize">
                                            à <?php echo e($event->numstreet); ?> <?php echo e($event->street); ?></p>
                                        <p><?php echo e($event->zip); ?> - <?php echo e($event->city); ?></p>
                                        <hr class="my-3 mx-5">
                                        <small class="text-muted">
                                            aura lieu le
                                            <cite><?php echo e(strftime("%A %d %b %Y",strtotime($event->datefrom))); ?>

                                                à <?php echo e(strftime("%R",strtotime($event->datefrom))); ?></cite>
                                        </small>
                                        <?php if($event->dateto != null): ?>
                                            <br>
                                            <small class="text-muted">
                                                jusqu'au <cite><?php echo e(strftime("%A %d %b %Y",strtotime($event->dateto))); ?>

                                                    à <?php echo e(strftime("%R",strtotime($event->dateto))); ?></cite>
                                            </small>
                                        <?php endif; ?>
                                    </div>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>


                        <div class="d-flex justify-content-between px-5 mt-4">
                            <p class="card-text"><small class="text-muted">Créé le <?php echo e($group->datecreate); ?></small></p>
                            <div class="float-right mr-5">
                                <?php if($group->admin == auth()->id()): ?>
                                    <small class="text-muted blockquote-footer">Vous êtes administrateur du groupe.</small>
                                <?php elseif($issubscribed != null && $issubscribed): ?>
                                    <a class="btn btn-danger" style="color: #fff"
                                       onclick="event.preventDefault();document.getElementById('toggleSubscription').submit();">
                                        <i class="fas fa-minus"></i> Se désabonner
                                    </a>

                                    <form id="toggleSubscription" action="<?php echo e(url('/groups/subscribe/remove')); ?>"
                                          method="POST" style="display: none;">
                                        <?php echo e(csrf_field()); ?>

                                        <input type="hidden" name="group" value="<?php echo e($group->id); ?>">
                                        <input type="hidden" name="user" value="<?php echo e(auth()->id()); ?>">
                                    </form>
                                <?php else: ?>
                                    <a class="btn btn-primary" style="color: #fff"
                                       onclick="event.preventDefault();document.getElementById('toggleSubscription').submit();">
                                        <i class="fas fa-plus"></i> S'abonner
                                    </a>

                                    <form id="toggleSubscription" action="<?php echo e(url('/groups/subscribe/add')); ?>"
                                          method="POST" style="display: none;">
                                        <?php echo e(csrf_field()); ?>

                                        <input type="hidden" name="group" value="<?php echo e($group->id); ?>">
                                        <input type="hidden" name="user" value="<?php echo e(auth()->id()); ?>">
                                    </form>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>

    <style>
        .blockquote-footer {
            font-size: initial !important;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\langl\Desktop\Cours\Projets\ProjetClient\OpenMeet\resources\views/group/show.blade.php ENDPATH**/ ?>