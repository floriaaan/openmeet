<?php $__env->startSection('content'); ?>

    <div class="container position-relative" style="height: 100%">
        <div class="row">
            <div class="col-lg-3 d-none-custom">


                <div class="list-group position-fixed w-list-admin" style="margin-top: 1px">
                    <h5 class="list-title">Paramètres du site</h5>
                    <a class="list-group-item list-group-item-action" href="#settings">
                        Paramètres du site

                    </a>
                    <a class="list-group-item list-group-item-action" href="#theming">
                        Thèmes

                    </a>
                    <a class="list-group-item list-group-item-action" href="#privacy">
                        Confidentialité

                    </a>
                </div>

                <div class="list-group position-fixed w-list-admin" style="margin-top: 180px">
                    <h5 class="list-title">Paramètres relatifs aux utilisateurs</h5>
                    <a class="list-group-item list-group-item-action" href="#users">
                        Utilisateurs
                        <span class="badge badge-primary badge-pill"><?php echo e($userCount); ?></span>
                    </a>
                    <a class="list-group-item list-group-item-action" href="#reports">
                        Signalements d'utilisateurs
                        <span class="badge badge-primary badge-pill"><?php echo e($reportCount); ?></span>
                    </a>
                <!--
                    <a class="list-group-item list-group-item-action" href="#bans">
                        Banissements d'utilisateurs
                        <span class="badge badge-primary badge-pill"><?php echo e($banCount); ?></span>
                    </a>
                    <a class="list-group-item list-group-item-action" href="#blocks">
                        Blocages d'utilisateurs
                        <span class="badge badge-primary badge-pill"><?php echo e($blockCount); ?></span>
                    </a>-->
                    <a class="list-group-item list-group-item-action" href="#messages">
                        Messages
                        <span class="badge badge-primary badge-pill"><?php echo e($messageCount['foruser']); ?></span>
                    </a>
                </div>

                <div class="list-group position-fixed w-list-admin" style="margin-top: 410px">
                    <h5 class="list-title">Paramètres relatifs aux groupes/événements</h5>
                    <a class="list-group-item list-group-item-action" href="#groups">
                        Groupes
                        <span class="badge badge-primary badge-pill"><?php echo e($groupCount); ?></span>
                    </a>
                    <a class="list-group-item list-group-item-action" href="#events">
                        Evénements
                        <span class="badge badge-primary badge-pill"><?php echo e($eventCount); ?></span>
                    </a>
                    <a class="list-group-item list-group-item-action" href="#gmessages">
                        Messages de groupes
                        <span class="badge badge-primary badge-pill"><?php echo e($messageCount['forgroup']); ?></span>
                    </a>
                </div>
            </div>

            <div class="col-lg-9">
                <div>
                    <h4 id="settings" class="my-5">Paramètres de <?php echo e(Setting('openmeet.name')); ?></h4>
                    <div>
                        <?php echo Form::open(['url' => '/admin/edit/settings']); ?>

                        <div class="form-group">
                            <?php echo Form::label('uName', 'Nom du site', ['class' =>'control-label']); ?>

                            <?php echo Form::text('uName', $value = Setting('openmeet.name'), ['class' => 'form-control', 'placeholder' => 'Nom du site']); ?>

                            <?php echo $errors->first('uName', '<small class="text-danger">Le champ Nom du site est incorrect.</small>'); ?>

                        </div>

                        <div class="form-group">
                            <?php echo Form::label('uColor', 'Couleur primaire', ['class' =>'control-label']); ?>

                            <?php echo Form::color('uColor', $value=Setting('openmeet.color'), ['class' => 'form-control']); ?>

                        </div>

                        <div class="form-group">
                            <?php echo Form::label('uSlogan', 'Slogan du site', ['class' =>'control-label']); ?>

                            <?php echo Form::text('uSlogan', $value = Setting('openmeet.slogan'), ['class' => 'form-control', 'placeholder' => 'Slogan']); ?>

                            <?php echo $errors->first('uSlogan', '<small class="text-danger">Le champ Slogan est incorrect.</small>'); ?>

                        </div>
                        <?php echo Form::submit('Valider les modifications', ['class' => 'btn btn-primary mt-4 pull-right'] ); ?>


                        <?php echo Form::close(); ?>

                    </div>


                    <h4 id="theming" class="my-5">Thèmes</h4>
                    <form method="POST" action="<?php echo e(url('/admin/edit/theme')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="row justify-content-between">
                            <div>
                                <div class="btn-group btn-group-toggle mx-2" data-toggle="buttons">
                                    <label class="btn btn-light <?php if(Setting('openmeet.theme') == "day"): ?>active <?php endif; ?>">
                                        <input type="radio" name="theme" value="day" autocomplete="off"
                                               <?php if(Setting('openmeet.theme') == "day"): ?>checked <?php endif; ?>>
                                        <i class="fas fa-sun"></i> Jour
                                    </label>
                                    <label class="btn btn-dark <?php if(Setting('openmeet.theme') == "night"): ?>active <?php endif; ?>">
                                        <input type="radio" name="theme" value="night" autocomplete="off"
                                               <?php if(Setting('openmeet.theme') == "night"): ?>checked <?php endif; ?>>
                                        <i class="fas fa-moon"></i> Nuit
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary ">Valider les modifications</button>
                        </div>


                    </form>
                    <div class="row justify-content-end mt-2">
                        <a href="<?php echo e(url('/admin/edit/views')); ?>" class="btn btn-secondary mt-2">Modifier les pages</a>

                    </div>


                    <h4 id="privacy" class="my-5">Confidentialité</h4>
                    <form action="/admin/edit/privacy" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="row justify-content-between">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="robots" id="robots"
                                       <?php if(Setting('openmeet.robots')): ?>checked <?php endif; ?>>
                                <label class="custom-control-label" for="robots">
                                    Visible sur Google (fichier robots.txt)
                                </label>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                Valider les modifications
                            </button>
                        </div>
                    </form>


                </div>

                <hr class="my-5">

                <div>
                    <h4 id="users" class="my-5">Utilisateurs (5 derniers utilisateurs)</h4>
                    <div class="table-responsive">

                        <table class="table table-striped">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prenom</th>
                                <th scope="col">Email</th>
                                <th scope="col">Admin</th>
                                <th scope="col">Actions</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($userList)): ?>
                                <?php $__currentLoopData = $userList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>#<?php echo e($user->id); ?></td>
                                        <td><?php echo e($user->lname); ?></td>
                                        <td><?php echo e($user->fname); ?></td>
                                        <td><?php echo e($user->email); ?></td>
                                        <td><?php if($user->isadmin): ?>
                                                <span class="badge badge-pill badge-success">
                                                <i class="fas fa-user-check"></i>
                                            </span>
                                            <?php else: ?>
                                                <span class="badge badge-pill badge-danger">
                                                <i class="fas fa-user-times"></i>
                                            </span>
                                            <?php endif; ?>
                                        </td>
                                        <td>

                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a class="btn btn-success" href="/user/show/<?php echo e($user->id); ?>">
                                                    <i class="far fa-eye"></i>
                                                </a>

                                                <a class="btn btn-warning" href="/user/report/<?php echo e($user->id); ?>">
                                                    <i class="fas fa-exclamation-triangle"></i>
                                                </a>
                                                <a class="btn btn-danger" href="/admin/users/delete/<?php echo e($user->id); ?>">
                                                    <i class="fas fa-skull-crossbones"></i>
                                                </a>
                                            </div>

                                        </td>
                                    </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>


                            </tbody>
                        </table>

                        <a href="<?php echo e(url('/admin/users/')); ?>" class="btn btn-primary float-right">Voir plus</a>
                    </div>

                    <h4 id="reports" class="my-5">Signalements des utilisateurs (10 derniers signalements)</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Concerné</th>
                                <th scope="col">Envoyé par</th>
                                <th scope="col">Créé le</th>

                                <th scope="col">Actions</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($reportList)): ?>

                                <?php $__currentLoopData = $reportList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <tr>
                                        <td>#<?php echo e($report['report']->id); ?></td>
                                        <td><?php echo e($report['concerned']->fname); ?> <?php echo e($report['concerned']->lname); ?></td>
                                        <td><?php echo e($report['sender']->fname); ?> <?php echo e($report['sender']->lname); ?></td>
                                        <td><?php echo e($report['report']->date); ?></td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a class="btn btn-success"
                                                   href="/admin/reports/show/<?php echo e($report['report']->id); ?>">
                                                    <i class="far fa-eye"></i>
                                                </a>

                                                <a class="btn btn-danger"
                                                   href="/admin/reports/delete/<?php echo e($report['report']->id); ?>">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </div>

                                        </td>

                                    </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                            </tbody>
                        </table>

                        <a href="<?php echo e(url('/admin/reports')); ?>" class="btn btn-primary float-right">Voir plus</a>
                    </div>
                    <h4 id="bans" class="my-5">Bannissement des utilisateurs (10 derniers Bannissements)</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Concerné</th>
                                <th scope="col">Du groupe</th>
                                <th scope="col">Créé le</th>
                                <th scope="col">Actions</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($banList)): ?>

                                <?php $__currentLoopData = $banList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ban): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <tr>
                                        <td>#<?php echo e($ban['ban']->id); ?></td>
                                        <td><?php echo e($ban['banned']->fname); ?> <?php echo e($ban['banned']->lname); ?></td>
                                        <td><?php echo e($ban['banisher']->name); ?></td>
                                        <td><?php echo e($ban['ban']->date); ?></td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a class="btn btn-success"
                                                   href="/admin/ban/show/<?php echo e($ban['ban']->id); ?>">
                                                    <i class="far fa-eye"></i>
                                                </a>

                                                <a class="btn btn-danger"
                                                   href="/admin/ban/delete/<?php echo e($ban['ban']->id); ?>">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </div>

                                        </td>

                                    </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                            </tbody>
                        </table>

                        <a href="<?php echo e(url('/admin/bans/')); ?>" class="btn btn-primary float-right">Voir plus</a>
                    </div>
                    <h4 id="blocks" class="my-5">Blocages des utilisateurs (10 derniers Blocages)</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Concerné</th>
                                <th scope="col">Par</th>
                                <th scope="col">Créé le</th>
                                <th scope="col">Actions</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($blockList)): ?>

                                <?php $__currentLoopData = $blockList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $block): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <tr>
                                        <td>#<?php echo e($block['block']->id); ?></td>
                                        <td><?php echo e($block['target']->fname); ?> <?php echo e($block['target']->lname); ?></td>
                                        <td><?php echo e($block['blocker']->fname); ?> <?php echo e($block['blocker']->lname); ?></td>
                                        <td><?php echo e($block['block']->date); ?></td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a class="btn btn-success"
                                                   href="/admin/ban/show/<?php echo e($block['block']->id); ?>">
                                                    <i class="far fa-eye"></i>
                                                </a>

                                                <a class="btn btn-danger"
                                                   href="/admin/ban/delete/<?php echo e($block['block']->id); ?>">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </div>

                                        </td>

                                    </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                            </tbody>
                        </table>

                        <a href="<?php echo e(url('/admin/blocks/')); ?>" class="btn btn-primary float-right">Voir plus</a>
                    </div>

                    <h4 id="messages" class="my-5">Messages des utilisateurs (10 derniers messages)</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Envoyé par</th>
                                <th scope="col">Reçu par</th>
                                <th scope="col">Contenu</th>
                                <th scope="col">Date</th>
                                <th scope="col">Lu</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($messageList)): ?>

                                <?php $__currentLoopData = $messageList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($message['msg']->forgroup == 0): ?>
                                        <tr>
                                            <td>#<?php echo e($message['msg']->id); ?></td>
                                            <td><?php echo e($message['sender']->fname); ?> <?php echo e($message['sender']->lname); ?></td>
                                            <td><?php echo e($message['receiver']->fname); ?> <?php echo e($message['receiver']->lname); ?></td>
                                            <td><?php echo e($message['msg']->content); ?></td>
                                            <td><?php echo e($message['msg']->date); ?></td>
                                            <td>
                                                <?php if($message['msg']->isread): ?>
                                                    <span class="badge badge-pill badge-success">
                                                        <i class="far fa-bookmark"></i> Lu
                                                    </span>
                                                <?php else: ?>
                                                    <span class="badge badge-pill badge-danger">
                                                        <i class="fas fa-bookmark"></i> Non lu
                                                    </span>
                                                <?php endif; ?>
                                            </td>

                                        </tr>

                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            </tbody>
                        </table>

                    </div>
                </div>

                <hr class="my-5">

                <div>
                    <h4 id="groups" class="my-5">Groupes (10 groupes)</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Admin</th>
                                <th scope="col">Créé le</th>

                                <th scope="col">Actions</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($groupList)): ?>

                                <?php $__currentLoopData = $groupList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <tr>
                                        <td>#<?php echo e($group['group']->id); ?></td>
                                        <td><?php echo e($group['group']->name); ?></td>
                                        <td><?php echo e($group['admin']->fname); ?> <?php echo e($group['admin']->lname); ?></td>
                                        <td><?php echo e($group['group']->datecreate); ?></td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a class="btn btn-success"
                                                   href="/groups/show/<?php echo e($group['group']->id); ?>">
                                                    <i class="far fa-eye"></i>
                                                </a>

                                                <a class="btn btn-danger"
                                                   href="/admin/groups/delete/<?php echo e($group['group']->id); ?>">
                                                    <i class="fas fa-skull-crossbones"></i>
                                                </a>
                                            </div>

                                        </td>

                                    </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                            </tbody>
                        </table>

                        <a href="<?php echo e(url('/admin/groups/')); ?>" class="btn btn-primary float-right">Voir plus</a>
                    </div>

                    <h4 id="events" class="my-5">Evénements (10 derniers événements)</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Organisateur</th>
                                <th scope="col">Date de début</th>
                                <th scope="col">Actions</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($eventList)): ?>

                                <?php $__currentLoopData = $eventList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <tr>
                                        <td>#<?php echo e($event['event']->id); ?></td>
                                        <td><?php echo e($event['event']->name); ?></td>
                                        <td><?php echo e($event['group']->name); ?></td>
                                        <td><?php echo e($event['event']->datefrom); ?></td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a class="btn btn-success"
                                                   href="/events/show/<?php echo e($event['event']->id); ?>">
                                                    <i class="far fa-eye"></i>
                                                </a>

                                                <a class="btn btn-danger"
                                                   href="/admin/events/delete/<?php echo e($event['event']->id); ?>">
                                                    <i class="fas fa-skull-crossbones"></i>
                                                </a>
                                            </div>
                                        </td>

                                    </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                            </tbody>
                        </table>

                        <a href="<?php echo e(url('/admin/events/')); ?>" class="btn btn-primary float-right">Voir plus</a>
                    </div>

                    <h4 id="gmessages" class="my-5">Messages des groupes (10 derniers messages)</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Envoyé par</th>
                                <th scope="col">Reçu par</th>
                                <th scope="col">Contenu</th>
                                <th scope="col">Date</th>
                                <th scope="col">Lu</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($messageList)): ?>

                                <?php $__currentLoopData = $messageList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($message['msg']->forgroup == 1): ?>
                                        <tr>
                                            <td>#<?php echo e($message['msg']->id); ?></td>
                                            <td><?php echo e($message['sender']->fname); ?> <?php echo e($message['sender']->lname); ?></td>
                                            <td><?php echo e($message['receiver']->name); ?></td>
                                            <td><?php echo e($message['msg']->content); ?></td>
                                            <td><?php echo e($message['msg']->date); ?></td>
                                            <td>
                                                <?php if($message['msg']->isread): ?>
                                                    <span class="badge badge-pill badge-success">
                                                        <i class="far fa-bookmark"></i> Lu
                                                    </span>
                                                <?php else: ?>
                                                    <span class="badge badge-pill badge-danger">
                                                        <i class="fas fa-bookmark"></i> Non lu
                                                    </span>
                                                <?php endif; ?>
                                            </td>

                                        </tr>

                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                            </tbody>
                        </table>
                    </div>

                    <hr class="my-4">
                    <h4 id="search" class="my-5">Recherche super-utilisateur</h4>
                    <div>
                        <form action="/admin/search" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-9">
                                    <input type="text" required name="search" class="form-control"
                                           placeholder="Rechercher">
                                </div>
                                <div class="col-3">
                                    <button type="submit" class="btn btn-secondary">Rechercher</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>



<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\langl\Desktop\Cours\Projets\ProjetClient\OpenMeet\resources\views/admin/panel.blade.php ENDPATH**/ ?>