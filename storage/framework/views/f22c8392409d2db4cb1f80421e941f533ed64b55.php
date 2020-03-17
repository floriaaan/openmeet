<?php $__env->startSection('content'); ?>
    <div class="container extended" style="padding-left: 1vw;overflow-y: scroll;height: 75vh !important;">
        <div class="rounded-lg overflow-hidden shadow">
            <!-- Users box-->
            <div class="px-0">
                <div class="bg-white">
                    <span style="margin-left: 2em; color: dimgrey">Vos conversations personnelles</span>
                    <hr class="mx-5 my-2">
                    <div class="messages-box">
                        <div class="list-group mx-sm-2 mx-lg-4 rounded-0">
                            <!-- Conversations personnelles -->
                            <?php $__currentLoopData = $personalLastMessages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lastMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $__currentLoopData = $personalInfoConversations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $infoConversation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($lastMessage->sender == $infoConversation->id || $lastMessage->receiver == $infoConversation->id): ?>
                                        <div
                                            <?php if($lastMessage->isread == 0 && $lastMessage->sender != auth()->id()): ?> style="border-bottom-width: 2px;border-bottom-color:<?php echo e(setting('openmeet.color')); ?> " <?php endif; ?> class="card border-bottom-fmm mb-1">
                                            <a href="/messages/user/<?php echo e($infoConversation->id); ?>" class="list-group-item list-group-item-action">
                                                <?php if($lastMessage->isread ==0 && $lastMessage->sender != auth()->id()): ?>
                                                    <span
                                                        class="badge badge-pill badge-danger openmeet-badge mr-2 mt-1">Nouveau message</span>
                                            <?php endif; ?>
                                                <div class="media">
                                                    <div class="mask">
                                                        <?php if($infoConversation->picname != null & $infoConversation->picname != ''): ?>
                                                            <img width="50" style="top:50%"
                                                                 alt="Photo de <?php echo e($infoConversation->fname); ?> <?php echo e($infoConversation->lname); ?>"
                                                                 src="#">
                                                        <?php else: ?>
                                                            <i class="fas fa-user fa-2x"></i>
                                                            <div style="margin-right: -5px;">
                                                                <small
                                                                    style="text-align: center;margin-left: -15px;margin-right: -0px; color: dimgrey;font-size: smaller">pas
                                                                    de photo</small>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>

                                                    <div class="media-body ml-4">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between mb-1">
                                                            <h6 class="mb-0"> <?php echo e($infoConversation->fname); ?> <?php echo e($infoConversation->lname); ?> </h6>
                                                        </div>
                                                        <p class="font-italic mb-0 text-small">
                                                            <?php echo e($lastMessage->content); ?>

                                                        </p>
                                                        <small style="color: dimgrey"
                                                               class="small font-weight-lighter"> <?php echo e($lastMessage->date); ?></small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <!-- Conversations de groupe -->
                            <span style="margin-left: 2em; color: dimgrey">Vos conversations de groupe</span>
                            <hr class="mx-5 my-2">
                            <?php $__currentLoopData = $groupLastMessages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lastMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $__currentLoopData = $groupInfoConversations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $infoConversation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($lastMessage->receiver == $infoConversation->id): ?>
                                        <div
                                            <?php if($lastMessage->isread == 0 && $lastMessage->sender != auth()->id()): ?> style="border-bottom-color: <?php echo e(setting('openmeet.color')); ?>;border-bottom-width: 2px;"
                                            <?php endif; ?> class="card border-bottom-fmm mb-1">

                                            <a href="/messages/group/<?php echo e($lastMessage->receiver); ?>" class="list-group-item list-group-item-action">
                                                <?php if($lastMessage->isread ==0 && $lastMessage->sender != auth()->id()): ?>
                                                    <span
                                                        class="badge badge-pill badge-danger openmeet-badge mr-2 mt-1">Nouveau message</span>
                                            <?php endif; ?>
                                                <div class="media">
                                                    <div class="mask">
                                                        <?php if($infoConversation->picname != null && $infoConversation->picname != ''): ?>
                                                            <img width="50" style="top:50%"
                                                                 alt="Photo du groupe : <?php echo e($infoConversation->name); ?>"
                                                                 src="<?php echo e(url('/storage/upload/image/'.$infoConversation->picrepo.'/'.$infoConversation->picname)); ?>">
                                                        <?php else: ?>
                                                            <i class="fas fa-users fa-2x"></i>
                                                            <div>
                                                                <small
                                                                    style="text-align: center;margin-left: -15px;margin-right: 0px; color: dimgrey;font-size: smaller">pas
                                                                    de photo</small>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>

                                                    <div class="media-body ml-4">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between mb-1">

                                                            <h6 class="mb-0"><?php echo e($infoConversation->name); ?> </h6>

                                                        </div>
                                                        <p class="font-italic mb-0 text-small">
                                                            <?php $__currentLoopData = $groupLastMessagesInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lastMessageInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if($lastMessageInfo->id == $lastMessage->sender): ?>
                                                                    <span><?php echo e($lastMessageInfo->fname); ?> <?php echo e($lastMessageInfo->lname); ?> : </span> <?php echo e($lastMessage->content); ?>

                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </p>
                                                        <?php if($lastMessage->sender != 0): ?>
                                                            <small style="color: dimgrey"
                                                                   class="small font-weight-lighter"> <?php echo e($lastMessage->date); ?></small>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = $groupWithoutLastMessage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $withoutMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $__currentLoopData = $groupInfoConversations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $infoConversation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($infoConversation->id == $withoutMessage->receiver): ?>
                                        <div class="card border-bottom-fmm mb-1">
                                            <a class="list-group-item list-group-item-action" href="/messages/group/<?php echo e($infoConversation->id); ?>">
                                                <div class="media">
                                                    <div class="mask">
                                                        <?php if($infoConversation->picname != null && $infoConversation->picname != ''): ?>
                                                            <img width="50" style="top:50%"
                                                                 alt="Photo du groupe : <?php echo e($infoConversation->name); ?>"
                                                                 src="<?php echo e(url('/storage/upload/image/'.$infoConversation->picrepo.'/'.$infoConversation->picname)); ?>">
                                                        <?php else: ?>
                                                            <i class="fas fa-users fa-2x"></i>
                                                            <div>
                                                                <small
                                                                    style="text-align: center;margin-left: -15px;margin-right: 0px; color: dimgrey;font-size: smaller">pas
                                                                    de photo</small>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>

                                                    <div class="media-body ml-4">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between mb-1">

                                                            <h6 class="mb-0"><?php echo e($infoConversation->name); ?> </h6>

                                                        </div>
                                                        <p style="color: dimgrey" class="font-italic mb-0 text-small">
                                                            <?php echo e($withoutMessage->content); ?>

                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>

    <style>
        .fmm-active {
            background-image: linear-gradient(to left bottom, #730ebd, #9600b4, #b000aa, #c600a0, #d80096);
            transition: 0.5s;
            background-size: 200% auto;
            border-bottom: solid 1px white;
        }

        .fmm-active:hover {
            background-position: right center;
        }

        .translate {
            margin-left: 0.5em;
            transition: all 0.3s;
        }

        .card {
            transition: all 0.3s;
        }


        .extended {
            margin-left: -2vw;
            width: 85vw;
            transition: all 0.5s;
        }

        .unextended {
            width: 15vw;
            transition: all 0.5s;
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
        .badge {
            font-size: 0;
            width: 13px;
            height: 13px;
        }

    </style>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script>

    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\langl\Desktop\Cours\Projets\ProjetClient\OpenMeet\resources\views/message/conversationslist.blade.php ENDPATH**/ ?>
