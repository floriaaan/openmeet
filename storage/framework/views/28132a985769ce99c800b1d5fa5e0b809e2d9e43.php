<?php $__env->startSection('body'); ?>

    <div class="navbar navbar-expand-lg navbar-light navbar-custom fixed-top justify-content-between"
         style="z-index: 5000">
        <a class="navbar-brand" href="/">
            <img src="/assets/logo.svg" width="40" height="40" class="d-inline-block align-top"
                 alt="<?php echo e(Setting('openmeet.name')); ?>">
            <span
                class="ml-2 openmeet-title openmeet-nav text-center text-primary"><?php echo e(Setting('openmeet.name')); ?></span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navToggle"
                aria-controls="navToggle" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse flex-row-reverse " id="navToggle">

            <div class="dropleft nav-responsive-patch ml-1">
                <?php if(auth()->check()): ?>
                    <?php if(auth()->user()->picname != null): ?>
                        <a class="nav-link" href="#" id="navDrop" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <img src="./<?php echo e(auth()->user()->picrepo); ?>/<?php echo e(auth()->user()->picname); ?>">
                        </a>
                    <?php else: ?>
                        <a class="nav-link" href="#" id="navDrop" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-lg fa-user-circle"></i>
                        </a>

                    <?php endif; ?>
                    <div class="dropdown-menu" aria-labelledby="navDrop">
                        <h6 class="dropdown-header">
                            Bienvenue <?php echo e(auth()->user()->fname); ?> <?php echo e(auth()->user()->lname); ?></h6>
                        <div class="dropdown-divider"></div>
                        <h6 class="dropdown-header">Participations</h6>
                        <a class="dropdown-item" href="<?php echo e(url('/user/groups/')); ?>"><i class="fas fa-users"></i> Mes groupes</a>
                        <a class="dropdown-item" href="<?php echo e(url('/user/events')); ?>"> <i class="fas fa-handshake"></i> Mes événements</a>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo e(url('/logout')); ?>"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="fas fa-user-lock"></i> Déconnexion
                        </a>
                        <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                            <?php echo e(csrf_field()); ?>

                        </form>

                        <?php if(auth()->user()->isadmin): ?>
                            <div class="dropdown-divider"></div>
                            <h6 class="dropdown-header">Administration</h6>
                            <a class="dropdown-item" href="/admin"><i class="fas fa-tools"></i> Panneau d'administration</a>
                        <?php else: ?>
                            <div class="dropdown-divider"></div>
                            <h6 class="dropdown-header">Modération</h6>
                            <a class="dropdown-item" href="/admin"><i class="fas fa-tools"></i> Panneau de modération</a>
                        <?php endif; ?>

                    </div>
                <?php else: ?>
                    <a class="nav-link" href="#" id="navDrop" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-lg fa-user-circle"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navDrop">
                        <a class="dropdown-item" href="/login"><i class="fas fa-user-lock"></i> Connexion</a>
                        <a class="dropdown-item" href="/register"><i class="fas fa-user-plus"></i> Inscription</a>
                    </div>
                <?php endif; ?>
            </div>

            <?php if(auth()->check()): ?>
                <div class="dropleft nav-responsive-patch ml-1">
                    <?php if(!empty($notifications)): ?>
                        <a class="nav-link" href="#" id="navDrop" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-lg fa-bell"></i>
                            <span class="badge badge-pill badge-danger openmeet-badge"><?php echo e(count($notifications)); ?></span>
                        </a>
                        <div class="dropdown-menu" style="padding: 0" aria-labelledby="navDrop">
                            <div class="card-header">
                                Notifications
                            </div>
                            <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notif): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($notif->type=='mes'): ?>
                                    <a class="dropdown-item" href="#">
                                        <h6 class="dropdown-header mb-1 font-weight-bold">
                                            <i class="fas fa-envelope text-primary"></i> <?php echo e($notif->title); ?></h6>
                                        <p class="text-muted font-weight-light"><?php echo e($notif->content); ?></p>
                                        <hr class="my-4">
                                        <footer class="blockquote-footer">
                                            <small class="text-muted">
                                                reçu à <?php echo e(strftime("%R",strtotime($notif->date))); ?>,
                                                le <cite><?php echo e(strftime("%A %d %b %Y",strtotime($notif->date))); ?></cite>
                                            </small>
                                        </footer>
                                    </a>

                                <?php elseif($notif->type=='sub'): ?>
                                    <a class="dropdown-item" href="#">
                                        <h6 class="dropdown-header mb-1 font-weight-bold">
                                            <i class="fas fa-users text-primary"></i> <?php echo e($notif->title); ?></h6>
                                        <p class="text-muted font-weight-light"><?php echo e($notif->content); ?></p>
                                        <hr class="my-4">
                                        <footer class="blockquote-footer">
                                            <small class="text-muted">
                                                créé à <?php echo e(strftime("%R",strtotime($notif->date))); ?>,
                                                le <cite><?php echo e(strftime("%A %d %b %Y",strtotime($notif->date))); ?></cite>
                                            </small>
                                        </footer>
                                    </a>
                                <?php elseif($notif->type=='eve'): ?>
                                    <a class="dropdown-item" href="#">
                                        <h6 class="dropdown-header mb-1 font-weight-bold">
                                            <i class="fas fa-handshake text-primary"></i> <?php echo e($notif->title); ?></h6>
                                        <p class="text-muted font-weight-light"><?php echo e($notif->content); ?></p>
                                        <hr class="my-4">
                                        <footer class="blockquote-footer">
                                            <small class="text-muted">
                                                créé à <?php echo e(strftime("%R",strtotime($notif->date))); ?>,
                                                le <cite><?php echo e(strftime("%A %d %b %Y",strtotime($notif->date))); ?></cite>
                                            </small>
                                        </footer>
                                    </a>
                                <?php endif; ?>
                                <div class="dropdown-divider"></div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="card-footer">

                                <a href="<?php echo e(url('/notifications/')); ?>"
                                   class="btn btn-primary btn-icon-split w-100">
                                <span class="icon text-white-50">
                                    <i class="fas  fa-arrow-right"></i>
                                </span>
                                    <span class="text ml-2">Tout voir</span>
                                </a>
                            </div>
                        </div>
                    <?php else: ?>
                        <a class="nav-link" href="#" id="navDrop" role="button"
                           data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="far fa-bell fa-lg"></i>
                        </a>
                        <div class="dropdown-menu">
                            <div class="card-body">
                                <p class="lead mx-auto">Aucune notification.</p>

                            </div>

                        </div>

                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php if(auth()->check()): ?>
                <a class="nav-link" href="<?php echo e(url('/messages')); ?>">
                    <i class="fas fa-lg fa-envelope"></i>
                </a>

            <?php endif; ?>

            <?php if(auth()->check()): ?>
                <a class="nav-link" href="<?php echo e(url('/groups/list')); ?>">
                    <i class="fas fa-lg fa-users"></i>
                </a>

            <?php endif; ?>

            <?php if(auth()->check()): ?>
                <div class="dropleft nav-responsive-patch ml-1">
                    <a class="nav-link" href="#" id="navDrop" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-lg fa-plus"></i>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navDrop">
                        <a class="dropdown-item" href="/groups/create"><i class="fas fa-users"></i> Créer un groupe</a>
                        <a class="dropdown-item" href="/events/create"><i class="fas fa-handshake"></i> Créer un
                            évenement</a>
                    </div>
                </div>
            <?php endif; ?>

            <button class="ml-1 btn-link border-0 nav-responsive-patch nav-responsive-patch2" onclick="displayForm()"
                    style="background-color: initial;">
                <i class="fas fa-lg fa-search"></i>
            </button>

            <form method="POST" action="<?php echo e(url('/search')); ?>" class="d-none nav-responsive-patch nav-responsive-patch2"
                  id="searchForm">
                <?php echo csrf_field(); ?>
                <input type="text" name="search" id="search" required class="form-control openmeet-search">


            </form>
        </div>
    </div>

    <?php if(Session::has('error')): ?>
        <div class="alert alert-danger">
            <?php echo e(Session::get('error')); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close" id="alert-close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <div class="mt-nav">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <footer class="footer navbar-custom mt-auto py-3 fixed-bottom">
        <div class="container">
            <span class="text-muted">&copy; OpenMeet - 2020 | <a href="<?php echo e(url('/legal/cgu')); ?>" class="btn-link">Conditions générales d'utilisation</a></span>
        </div>
    </footer>
    <div class="mt-nav"></div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\langl\Desktop\Cours\Projets\ProjetClient\OpenMeet\resources\views/layouts/nav.blade.php ENDPATH**/ ?>