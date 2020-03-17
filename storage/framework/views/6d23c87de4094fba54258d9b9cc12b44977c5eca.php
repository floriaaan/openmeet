<?php $__env->startSection('title'); ?>
    Connexion
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>

    <div class="h-100 w-100 wall-white text-center mx-auto">

        <div class="p-5 mt-5">
            <form method="POST" action="<?php echo e(route('login')); ?>" class="form-signin">
                <?php echo csrf_field(); ?>

                <a href="<?php echo e(url('/')); ?>" class="no-hover">
                    <img class="mb-4" src="/assets/logo.svg" alt="" width="72" height="72">
                </a>
                <h1 class="h3 mb-3 font-weight-normal">Connexion</h1>

                <label for="email" class="sr-only"><?php echo e(__('Adresse e-mail')); ?></label>
                <input type="email" id="email" name="email"
                       class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                       placeholder="<?php echo e(__('Adresse e-mail')); ?>" value="<?php echo e(old('email')); ?>" required
                       autofocus autocomplete="email">


                <label for="password" class="sr-only"><?php echo e(__('Mot de passe')); ?></label>
                <input type="password" id="password" name="password"
                       class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                       placeholder="<?php echo e(__('Mot de passe')); ?>" required value="<?php echo e(old('password')); ?>">

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

                <div class="form-check my-1 mt-3">
                    <input class="form-check-input" type="checkbox" name="remember"
                           id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>

                    <label class="form-check-label" for="remember">
                        <?php echo e(__('Se souvenir de moi')); ?>

                    </label>
                </div>

                <button type="submit" class="btn btn-xl rounded-pill btn-primary mt-4">
                    <?php echo e(__('Connexion')); ?>

                </button>
                <div class="mt-3">
                    <?php if(Route::has('password.request')): ?>
                        <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                            <?php echo e(__('J\'ai oublié mon mot de passe')); ?>

                        </a>
                    <?php endif; ?>
                    <?php if(Route::has('register')): ?>
                        <a class="btn btn-link" href="<?php echo e(route('register')); ?>">
                            <?php echo e(__('S\'inscrire')); ?>

                        </a>
                    <?php endif; ?>
                </div>

                <p class="mt-5 mb-3 text-muted">&copy; OpenMeet - 2020</p>

            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('css'); ?>

    <style>

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;

        }

        .h-100 {
            height: 100vh !important;
        }

        .form-signin {
            width: 100%;
            max-width: 440px;
            padding: 15px;
            margin: auto;
        }

        .form-signin .checkbox {
            font-weight: 400;
        }

        .form-signin .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }

        .form-signin .form-control:focus {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\langl\Desktop\Cours\Projets\ProjetClient\OpenMeet\resources\views/auth/login.blade.php ENDPATH**/ ?>