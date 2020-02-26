<?php $__env->startSection('titre'); ?>
    OpenMeet - Installation
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
    <div class="max-height wall-white">
        <div class="container-fluid">
            <div class="mx-auto w-50">
                <?php echo Form::open(['url' => '/Install']); ?>

                <h1 class="openmeet-title text-center openmeet-color openmeet-install">OpenMeet</h1>
                <div class="form-group <?php echo $errors->has('iName') ? 'is_invalid' : ''; ?>">
                    <?php echo Form::label('iName', 'Nom du site', ['class' =>'control-label']); ?>

                    <?php echo Form::text('iName', $value = null, ['class' => 'form-control', 'placeholder' => 'Nom du site']); ?>

                    <?php echo $errors->first('iName', '<small class="text-danger">Le champ Nom du site est incorrect.</small>'); ?>

                </div>

                <div class="form-group <?php echo $errors->has('iColor') ? 'is_invalid' : ''; ?>">
                    <?php echo Form::label('iColor', 'Couleur primaire', ['class' =>'control-label']); ?>

                    <?php echo Form::color('iColor', $value='#007BFF', ['class' => 'form-control']); ?>


                </div>
                <hr>
                <div class="form-group row">

                    <div class="col-lg-6 <?php echo $errors->has('iUser') ? 'is_invalid' : ''; ?>">
                        <?php echo Form::label('iUser', "Nom d'utilisateur administrateur", ['class' =>'control-label']); ?>

                        <?php echo Form::text('iUser', $value = 'admin', ['class' => 'form-control']); ?>

                        <?php echo $errors->first('iUser', '<small class="text-danger">Le champ Nom d\'utilisateur est incorrect.</small>'); ?>

                    </div>


                    <div class="col-lg-6 <?php echo $errors->has('iPass') ? 'is_invalid' : ''; ?>">
                        <?php echo Form::label('iPass', 'Mot de passe administrateur', ['class' =>'control-label']); ?>

                        <?php echo Form::password('iPass', ['class' => 'form-control', 'type' => 'password']); ?>

                        <?php echo $errors->first('iPass', '<small class="text-danger">Le champ Mot de passe est incorrect.</small>'); ?>

                    </div>

                </div>
                <div class="form-group">
                    <?php echo Form::label('iMail', "Adresse mail administrateur", ['class' =>'control-label']); ?>

                    <?php echo Form::email('iMail', $value = null, ['class' => 'form-control']); ?>

                    <?php echo $errors->first('iMail', '<small class="text-danger">Le champ Adresse mail est incorrect.</small>'); ?>

                </div>

                <?php echo Form::submit('Installer OpenMeet', ['class' => 'btn btn-primary mt-4 pull-right'] ); ?>


                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('base.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\langl\Desktop\Cours\Projets\ProjetClient\OpenMeet\resources\views/install/form.blade.php ENDPATH**/ ?>