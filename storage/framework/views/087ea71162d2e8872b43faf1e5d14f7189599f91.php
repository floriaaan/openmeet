<?php $__env->startSection('title'); ?>
    Messages
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!--================================================
     List des conversation
     ================================================-->
    <div class="container-fluid">
        <div id="listConversationsContainer" class="container extended"
             style="margin-left: -1.75em;overflow-y: scroll;height: 78vh;">
            <div class="rounded-lg overflow-hidden shadow">
                <!-- Users box-->
                <div class="px-0">
                    <div id="listConversations" class="bg-white">
                        <span class="textTypeConversation" style="margin-left: 2em; color: dimgrey">Vos conversations personnelles</span>
                        <hr class="mx-5 my-2">
                        <div class="messages-box">
                            <div class="list-group mx-sm-2 mx-lg-4 rounded-0">
                                <!-- Conversations personnelles -->
                                <?php $__currentLoopData = $personalLastMessages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lastMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $personalInfoConversations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $infoConversation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($lastMessage->sender == $infoConversation->id || $lastMessage->receiver == $infoConversation->id): ?>
                                            <div
                                                style="<?php if($lastMessage->isread == 0 && $lastMessage->sender != auth()->id()): ?> border-bottom-width: 2px;border-bottom-color:<?php echo e(setting('openmeet.color')); ?> <?php endif; ?> "
                                                class="card border-bottom-fmm mb-1">
                                                <a style="height: 15vh;overflow: hidden"
                                                   href="/messages/user/<?php echo e($infoConversation->id); ?>"
                                                   class="list-group-item list-group-item-action">
                                                    <?php if($lastMessage->isread ==0 && $lastMessage->sender != auth()->id()): ?>
                                                        <span
                                                            class="badge badge-mes badge-pill badge-danger openmeet-badge mr-2 mt-1">Nouveau message</span>
                                                    <?php endif; ?>
                                                    <div class="media">
                                                        <div class="mask">
                                                            <?php if($infoConversation->picname != null & $infoConversation->picname != ''): ?>
                                                                <img width="50" style="top:50%"
                                                                     alt="Photo de <?php echo e($infoConversation->fname); ?> <?php echo e($infoConversation->lname); ?>"
                                                                     src="#">
                                                            <?php else: ?>
                                                                <i class="fas fa-user fa-2x"></i>
                                                                <div class="textNoPhoto" style="margin-right: -5px;">
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
                                                            <p style="overflow: hidden;height: 3vh;"
                                                               class="font-italic mb-0 text-small lastMessageContent">
                                                                <?php echo e($lastMessage->content); ?>

                                                            </p>
                                                            <small style="color: dimgrey"
                                                                   class="small font-weight-lighter lastMessageDate"> <?php echo e($lastMessage->date); ?></small>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <!-- Conversations de groupe -->
                                <span class="textTypeConversation mt-2" style="margin-left: 2em; color: dimgrey">Vos conversations de groupe</span>
                                <hr class="mx-5 my-2">
                                <?php $__currentLoopData = $groupConcernedNotifs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $concernedNotif): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $groupLastMessages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lastMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $__currentLoopData = $groupInfoConversations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $infoConversation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($lastMessage->id == $concernedNotif->concerned): ?>
                                                <?php if($lastMessage->receiver == $infoConversation->id): ?>
                                                    <div
                                                        <?php if($lastMessage->sender != auth()->id() && $concernedNotif->isread == 0): ?> style="border-bottom-color: <?php echo e(setting('openmeet.color')); ?>;border-bottom-width: 2px;"
                                                        <?php endif; ?> class="card border-bottom-fmm mb-1">

                                                        <a href="/messages/group/<?php echo e($lastMessage->receiver); ?>"
                                                           class="list-group-item list-group-item-action">
                                                            <?php if($lastMessage->sender != auth()->id() && $concernedNotif->isread == 0): ?>
                                                                <span
                                                                    class="badge badge-mes badge-pill badge-danger openmeet-badge mr-2 mt-1">Nouveau message</span>
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
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <span class="textTypeConversation mt-2" style="margin-left: 2em; color: dimgrey">Autres groupes</span>
                                <hr class="mx-5 my-2">
                                <?php $__currentLoopData = $groupWithoutLastMessage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $withoutMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $groupInfoConversations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $infoConversation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($infoConversation->id == $withoutMessage->receiver): ?>
                                            <div class="card-withoutMessage card border-bottom-fmm mb-1">
                                                <a class="list-group-item list-group-item-action"
                                                   href="/messages/group/<?php echo e($infoConversation->id); ?>">
                                                    <div class="media">
                                                        <div class="mask">
                                                            <?php if($infoConversation->picname != null && $infoConversation->picname != ''): ?>
                                                                <img width="50" style="top:50%"
                                                                     alt="Photo du groupe : <?php echo e($infoConversation->name); ?>"
                                                                     src="<?php echo e(url('/storage/upload/image/'.$infoConversation->picrepo.'/'.$infoConversation->picname)); ?>">
                                                            <?php else: ?>
                                                                <i class="fas fa-users fa-2x"></i>
                                                                <div class="textNoPhoto">
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
                                                            <p style="color: dimgrey"
                                                               class="font-italic mb-0 text-small withoutMessageContent">
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
        <!--================================================
         List des messages
        ================================================-->
        <div class="px-4 chat-box bg-white unextended" id="chatbox">

        <?php $__currentLoopData = $listMessages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $__currentLoopData = $usersInfos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php if($message->sender == $userInfo->id): ?>
                    <?php if($message->sender != auth()->id()): ?>
                        <!-- Message Reçu-->
                            <div class="media w-50 mt-3">
                                <div class="mask"><a href="#" style="text-decoration: none;" class="no-hover">
                                        <?php if($userInfo->picname != null & $userInfo->picname != ''): ?>
                                            <img width="50" style="top:50%"
                                                 alt="Photo de <?php echo e($userInfo->fname); ?> <?php echo e($userInfo->lname); ?>"
                                                 src="#">
                                        <?php else: ?>
                                            <i style="color: <?php echo e(setting('openmeet.color')); ?>"
                                               class="fas fa-user fa-2x"></i>
                                        <?php endif; ?>
                                    </a>
                                </div>

                                <div class="oneMessage media-body ml-3">
                                    <a href="<?php echo e(url('/user/show/'.$userInfo->id)); ?>" style="text-decoration: none;"
                                       class="no-hover">
                                        <p style="color: gray; font-weight: bold"><?php echo e($userInfo->fname); ?> <?php echo e($userInfo->lname); ?></p>

                                        <div>
                                            <a href="<?php echo e(url('/user/report/'.$userInfo->id)); ?>"
                                               style="text-decoration: none;">
                                                <i class="fas fa-radiation"></i>
                                            </a>
                                            <a href="<?php echo e(url('/user/block/'.$userInfo->id)); ?>"
                                               style="text-decoration: none;">
                                                <i class="fas fa-shield-alt"></i>
                                            </a>

                                                <?php if($groupInfo->admin == auth()->id()): ?>

                                                    <a href="<?php echo e(url('/user/ban/')); ?>/<?php echo e($groupInfo->id); ?>/<?php echo e($userInfo->id); ?>"
                                                       style="text-decoration: none;">
                                                        <i class="fas fa-ban"></i>
                                                    </a>

                                                <?php endif; ?>

                                        </div>


                                    </a>
                                    <div class="bg-light rounded py-2 px-3 mb-2">
                                        <p class="text-small mb-0 text-muted"><?php echo e($message->content); ?></p>
                                    </div>
                                    <p class="small text-muted"><?php echo e($message->date); ?></p>
                                </div>
                            </div>
                    <?php else: ?>
                        <!-- Messages envoyé -->
                            <div class="media w-50 ml-auto mt-3">
                                <div class="oneMessage media-body">
                                    <div style="background-color: <?php echo e(setting('openmeet.color')); ?>"
                                         class="bg-fmm rounded py-2 px-3 mb-2">
                                        <p class="text-small mb-0 text-white"><?php echo e($message->content); ?></p>
                                    </div>
                                    <p class="small text-muted"><?php echo e($message->date); ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            <hr class="mx-5 my-2">

            <div class="p-fixed">
                <form action="/messages/create" method="post" class="bg-light">
                    <?php echo csrf_field(); ?>
                    <div class="input-group">
                        <a href="/messages/" class="btn btn-link my-auto"><i class="fas fa-chevron-circle-left"></i></a>
                        <input value="" type="text" name="mContent" placeholder="Envoyer un message"
                               aria-describedby="button-addon2"
                               class="form-control rounded-0 border-0 py-4 bg-light" required>
                        <div class="input-group-append">
                            <button id="button-addon2" type="submit" class="btn btn-link"><i
                                    style="color: <?php echo e(setting('openmeet.color')); ?>" class="fa fa-paper-plane"></i>
                            </button>
                        </div>
                    </div>
                    <input type="hidden" name="mReceiver" value="<?php echo e($groupInfo->id); ?>">
                    <input type="hidden" name="mForgroup" value="1">
                </form>
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

        .card {
            transition: all 0.3s;
        }

        .extended {
            width: 65vw;
            transition: all 0.5s;
        }

        .unextended {
            width: 35vw;
            transition: all 0.5s;
        }

        #chatbox {
            height: 78vh;
            overflow-y: scroll;
            position: absolute;
            margin-top: -78vh;
            right: 1vw !important;
        }

        ::-webkit-scrollbar {
            width: 5px;
            margin-left: -12px;
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

        .text-small {
            font-size: 0.9rem;
        }

        .messages-box,
        .chat-box {
            padding-bottom: 5vh;
        }

        .rounded-lg {
            border-radius: 0.5rem;
        }

        input::placeholder {
            font-size: 0.9rem;
            color: #999;
        }

        .badge-mes {
            font-size: 0;
            width: 13px;
            height: 13px;
        }

        .extended .oneMessage {
            width: 60vw !important;
        }

        @media (max-device-width: 600px ) {

            .unextended .textNoPhoto {
                display: none;
            }

            .unextended .lastMessageDate {
                display: none;
            }

            .unextended .lastMessageContent {
                display: none;
            }

            .unextended .card {
                height: 10vh;
                max-height: 10vh;
            }

            .unextended .card card-withoutMessage {
                height: 10vh;
                max-height: 10vh;
                background-color: dimgrey;
            }

            .extended {
                width: 80vw;
                transition: all 0.5s;
            }

            .unextended {
                width: 20vw;
                transition: all 0.5s;
            }

            .badge-mes {
                font-size: 0;
                width: 8px;
                height: 8px;
            }

            .unextended h6 {
                display: none;
            }

            .textTypeConversation {
                display: none;
            }

            .unextended .withoutMessageContent {
                display: none;
            }
        }
    </style>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script>

        window.onload = function () {
            var chatbox = document.getElementById("chatbox");
            chatbox.scrollTop = chatbox.scrollHeight;
            chatbox.focus();

            document.getElementById('listConversationsContainer').classList.remove('extended');
            document.getElementById('listConversationsContainer').classList.add('unextended');
            document.getElementById('chatbox').classList.add('extended');
            document.getElementById('chatbox').classList.remove('unextended');


        };


        document.getElementById('listConversations').addEventListener('mouseover', function e() {
            document.getElementById('listConversationsContainer').classList.add('extended');
            document.getElementById('listConversationsContainer').classList.remove('unextended');
            document.getElementById('chatbox').classList.remove('extended');
            document.getElementById('chatbox').classList.add('unextended');
        });

        document.getElementById('listConversations').addEventListener('touchstart', function e() {
            document.getElementById('listConversationsContainer').classList.add('extended');
            document.getElementById('listConversationsContainer').classList.remove('unextended');
            document.getElementById('chatbox').classList.remove('extended');
            document.getElementById('chatbox').classList.add('unextended');
        });


        document.getElementById('chatbox').addEventListener('mouseover', function e() {
            document.getElementById('listConversationsContainer').classList.remove('extended');
            document.getElementById('listConversationsContainer').classList.add('unextended');
            document.getElementById('chatbox').classList.add('extended');
            document.getElementById('chatbox').classList.remove('unextended');
        });

        document.getElementById('chatbox').addEventListener('touchstart', function e() {
            document.getElementById('listConversationsContainer').classList.remove('extended');
            document.getElementById('listConversationsContainer').classList.add('unextended');
            document.getElementById('chatbox').classList.add('extended');
            document.getElementById('chatbox').classList.remove('unextended');
        });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\langl\Desktop\Cours\Projets\ProjetClient\OpenMeet\resources\views/message/groupchat.blade.php ENDPATH**/ ?>