<?php $__env->startSection('titre'); ?>
    OpenMeet - Installation
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
    <div class="container-fluid">
        <div class="mx-auto w-50">
            <?php echo Form::open(['url' => url('Install')]); ?>

            <?php echo csrf_field(); ?>
            <h1 class="openmeet-title text-center h1 my-5 text-primary">OpenMeet</h1>
            <div class="form-group">
                <?php echo Form::label('iName', 'Nom du site', ['class' =>'control-label']); ?>

                <?php echo Form::text('iName', $value = null, ['class' => 'form-control', 'placeholder' => 'Nom du site']); ?>

            </div>

            <div class="form-group">
                <?php echo Form::label('iColor', 'Couleur primaire', ['class' =>'control-label']); ?>

                <?php echo Form::color('iColor', $value='#007BFF', ['class' => 'form-control']); ?>

            </div>
            <hr>
            <div class="form-group row">
                <div class="col-lg-6">
                    <?php echo Form::label('iUser', "Nom d'utilisateur administrateur", ['class' =>'control-label']); ?>

                    <?php echo Form::text('iUser', $value = 'admin', ['class' => 'form-control']); ?>

                </div>

                <div class="col-lg-6">
                    <?php echo Form::label('iPass', 'Mot de passe administrateur', ['class' =>'control-label']); ?>

                    <?php echo Form::password('iPass', ['class' => 'form-control', 'type' => 'password']); ?>

                </div>
            </div>

            <?php echo Form::submit('Installer OpenMeet', ['class' => 'btn btn-primary mt-4 pull-right'] ); ?>


            <?php echo Form::close(); ?>

        </div>

    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\langl\Desktop\Cours\Projets\ProjetClient\OpenMeet\resources\views/install.blade.php ENDPATH**/ ?>