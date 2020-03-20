<?php $__env->startSection('title'); ?>
    Installation
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
    <form action="<?php echo e(url('/install')); ?>" method="POST" id="form">
        <?php echo csrf_field(); ?>
        <div class="max-height wall-white">
            <div class="container-fluid h-100 p-5 position-relative">
                <div class="card mx-auto shadow-lg p-5 w-75"
                     id="card-general">

                    <h3 class="openmeet-title text-center openmeet-install"
                        style="color:#007BFF; text-shadow: 0 0 5px #d6d8d9;">
                        OpenMeet - Paramètres généraux
                    </h3>

                    <hr class="mx-5 my-3">
                    <div class="form-group">
                        <label for="iName" class="">Nom du site</label>
                        <input class="form-control <?php $__errorArgs = ['iName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               name="iName" type="text"
                               value="<?php echo e(old('iName')); ?>"
                               placeholder="OpenMeet"
                               required id="iName"
                               autocomplete="off">
                        <?php $__errorArgs = ['iName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="form-group">
                        <label for="iSlogan" class="">Slogan du site</label>
                        <input class="form-control <?php $__errorArgs = ['iSlogan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               name="iSlogan" type="text"
                               value="<?php echo e(old('iSlogan')); ?>"
                               placeholder="Trouvez le Meet en vous ⚡"
                               required id="iSlogan"
                               autocomplete="off">
                        <?php $__errorArgs = ['iSlogan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="form-group">
                        <label for="iColor" class="">Couleur du site</label>
                        <input class="form-control <?php $__errorArgs = ['iColor'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               name="iColor" type="color"
                               value="#007BFF"
                               required id="iColor">
                        <?php $__errorArgs = ['iColor'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    </div>

                    <hr class="mx-5 my-3">

                    <div class="row justify-content-end">

                        <button class="btn btn-outline-secondary rounded-pill btn-install"
                                id="btn-general-next">
                            <i class="fas fa-arrow-right fa-lg"></i>
                            Suivant
                        </button>

                    </div>


                </div>

                <div class="card mx-auto shadow-lg p-5 w-75 d-none"
                     id="card-database">

                    <h3 class="openmeet-title text-center openmeet-install"
                        style="color:#007BFF; text-shadow: 0 0 5px #d6d8d9;">
                        OpenMeet - Base de données
                    </h3>

                    <hr class="mx-5 my-3">
                    <div class="form-group">
                        <label for="iDBHost" class="">Hôte de la base de données</label>
                        <input class="form-control <?php $__errorArgs = ['iDBHost'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               name="iDBHost" type="text"
                               value="<?php echo e(old('iDBHost')); ?>"
                               placeholder="Adresse URL"
                               required id="iDBHost"
                               autocomplete="off">
                        <?php $__errorArgs = ['iDBHost'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="form-group">
                        <label for="iDBName" class="">Nom de la base de données</label>
                        <input class="form-control <?php $__errorArgs = ['iDBName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               name="iDBName" type="text"
                               value="<?php echo e(old('iDBName')); ?>"
                               placeholder="Database"
                               required id="iDBName"
                               autocomplete="off">
                        <?php $__errorArgs = ['iDBName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="form-group">
                        <label for="iDBUser" class="">Utilisateur de la base de données</label>
                        <input class="form-control <?php $__errorArgs = ['iDBUser'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               name="iDBUser" type="text"
                               value="<?php echo e(old('iDBUser')); ?>"
                               placeholder="user"
                               required id="iDBUser"
                               autocomplete="off">
                        <?php $__errorArgs = ['iDBUser'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="form-group">
                        <label for="iDBPass" class="">Mot de passe de l'utilisateur</label>
                        <input class="form-control <?php $__errorArgs = ['iDBPass'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               name="iDBPass" type="password"
                               value="<?php echo e(old('iDBUser')); ?>"
                               placeholder="pass"
                               id="iDBPass"
                               autocomplete="off">
                        <?php $__errorArgs = ['iDBPass'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="iDBMigrate" id="iDBMigrate">
                            <label class="custom-control-label" for="iDBMigrate">Mettre à zéro la base de données <code>(artisan
                                    migrate)</code></label>
                        </div>

                    </div>


                    <hr class="mx-5 my-3">

                    <div class="row justify-content-between">
                        <button class="btn btn-outline-secondary rounded-pill btn-install"
                                id="btn-database-previous">
                            <i class="fas fa-arrow-left fa-lg"></i>
                            Précédent
                        </button>

                        <button class="btn btn-outline-secondary rounded-pill btn-install"
                                id="btn-database-next">
                            <i class="fas fa-arrow-right fa-lg"></i>
                            Suivant
                        </button>

                    </div>


                </div>


                <div class="card mx-auto shadow-lg p-5 w-75 d-none"
                     id="card-admin">

                    <h3 class="openmeet-title text-center openmeet-install"
                        style="color:#007BFF; text-shadow: 0 0 5px #d6d8d9;">
                        OpenMeet - Administration
                    </h3>

                    <hr class="mx-5 my-3">
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label for="fname"><?php echo e(__('Prénom')); ?></label>

                            <input id="fname" type="text" class="form-control <?php $__errorArgs = ['fname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   name="fname"
                                   value="<?php echo e(old('fname')); ?>" required autocomplete="fname" autofocus>

                            <?php $__errorArgs = ['fname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-lg-6">
                            <label for="lname"><?php echo e(__('Nom de famille')); ?></label>


                            <input id="lname" type="text" class="form-control <?php $__errorArgs = ['lname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   name="lname"
                                   value="<?php echo e(old('lname')); ?>" required autocomplete="lname" autofocus>

                            <?php $__errorArgs = ['lname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                        </div>

                    </div>


                    <div class="form-group ">
                        <label for="bdate"><?php echo e(__('Date de naissance')); ?></label>


                        <input id="bdate" type="date" class="form-control <?php $__errorArgs = ['bdate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               name="bdate"
                               value="<?php echo e(old('bdate')); ?>" required autocomplete="bdate" autofocus>
                        <small id="warnAge" class="form-text text-muted">Personnes majeures uniquement.
                            &#128286;</small>

                        <?php $__errorArgs = ['bdate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    </div>


                    <div class="form-group ">
                        <label for="email"><?php echo e(__('Adresse mail')); ?></label>

                        <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email">

                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    </div>

                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label for="password"><?php echo e(__('Mot de passe')); ?></label>
                            <input id="password" type="password"
                                   class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   name="password" required autocomplete="new-password">

                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-lg-6">
                            <label for="password-confirm"><?php echo e(__('Confirmer le mot de passe')); ?></label>

                            <input id="password-confirm" type="password" class="form-control" name="password-confirm"
                                   required autocomplete="new-password">
                            <?php $__errorArgs = ['password-confirm'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                        </div>


                    </div>


                    <hr class="mx-5 my-3">

                    <div class="row justify-content-between">
                        <button class="btn btn-outline-secondary rounded-pill btn-install"
                                id="btn-admin-previous">
                            <i class="fas fa-arrow-left fa-lg"></i>
                            Précédent
                        </button>

                        <button class="btn btn-outline-secondary rounded-pill btn-install"
                                id="btn-admin-next">
                            <i class="fas fa-arrow-down fa-lg"></i>
                            Installer
                        </button>

                    </div>


                </div>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>

    <script>
        $('#btn-general-next').click(function (e) {
            e.preventDefault();

            if ($('#iName').val() !== '' && $('#iSlogan').val() !== '') {
                if ($('#iName').hasClass('is-invalid')) {
                    $('#iName').removeClass('is-invalid')
                }
                if ($('#iSlogan').hasClass('is-invalid')) {
                    $('#iSlogan').removeClass('is-invalid')
                }

                $('#card-general').fadeOut(500);
                $('#card-general').toggleClass('d-none');
                $('#card-database').toggleClass('d-none');
                $('#card-database').fadeIn(500);
            } else {
                shake($('#card-general'));
                if ($('#iName').val() === '') {
                    $('#iName').toggleClass('is-invalid')
                }
                if ($('#iSlogan').val() === '') {
                    $('#iSlogan').toggleClass('is-invalid')
                }
            }

        });

        $('#btn-database-previous').click(function (e) {
            e.preventDefault();

            $('#card-database').fadeOut(500);
            $('#card-database').toggleClass('d-none');
            $('#card-general').toggleClass('d-none');
            $('#card-general').fadeIn(500);
        });

        $('#btn-database-next').click(function (e) {
            e.preventDefault();
            if ($('#iDBHost').val() !== '' && $('#iDBName').val() !== '' && $('#iDBUser').val() !== '') {
                if ($('#iDBHost').hasClass('is-invalid')) {
                    $('#iDBHost').removeClass('is-invalid')
                }
                if ($('#iDBName').hasClass('is-invalid')) {
                    $('#iDBName').removeClass('is-invalid')
                }
                if ($('#iDBUser').hasClass('is-invalid')) {
                    $('#iDBUser').removeClass('is-invalid')
                }


                $('#card-database').fadeOut(500);
                $('#card-database').toggleClass('d-none');
                $('#card-admin').toggleClass('d-none');
                $('#card-admin').fadeIn(500);
            } else {
                shake($('#card-database'));
                if ($('#iDBHost').val() === '') {
                    $('#iDBHost').toggleClass('is-invalid')
                }
                if ($('#iDBName').val() === '') {
                    $('#iDBName').toggleClass('is-invalid')
                }
                if ($('#iDBUser').val() === '') {
                    $('#iDBUser').toggleClass('is-invalid')
                }
            }
        });

        $('#btn-admin-previous').click(function (e) {
            e.preventDefault();
            $('#card-admin').fadeOut(500);
            $('#card-admin').toggleClass('d-none');
            $('#card-database').toggleClass('d-none');
            $('#card-database').fadeIn(500);
        });

        $('#btn-admin-next').click(function (e) {
            e.preventDefault();
            $('#card-admin').animate({
                top: '+=3000'
            }, 1000, function () {
                $('#form').submit();
            })
        });


        function shake(div) {
            for (let i = 0; i < 5; i++) {
                div.animate({
                    left: '+=20'
                }, 100);
                div.animate({
                    left: '-=20'
                }, 100)
            }

        }
    </script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <style>
        .btn-install {
            height: 50px;
            width: 150px
        }

        .card-install {
            height: 100vh;
        }

    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\langl\Desktop\Cours\Projets\ProjetClient\OpenMeet\resources\views/install/form.blade.php ENDPATH**/ ?>