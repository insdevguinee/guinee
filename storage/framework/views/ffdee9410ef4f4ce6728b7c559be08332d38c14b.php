
<?php $__env->startSection('content'); ?>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="<?php echo e(route('users.store')); ?>" autocomplete="off" class="form-horizontal">
            <?php echo csrf_field(); ?>
            <?php echo method_field('post'); ?>

            <div class="card ">
              
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="<?php echo e(route('users.index')); ?>" class="btn btn-sm btn-success"><?php echo e(__('Retour à la liste')); ?></a>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label"><?php echo e(__('Nom')); ?></label>
                  <div class="col-sm-7">
                    <div class="form-group<?php echo e($errors->has('name') ? ' has-danger' : ''); ?>">
                      <input class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" name="name" id="input-name" type="text" placeholder="<?php echo e(__('Nom')); ?>" value="<?php echo e(old('name')); ?>" required="true" aria-required="true"/>
                      <?php if($errors->has('name')): ?>
                        <span id="name-error" class="error text-danger" for="input-name"><?php echo e($errors->first('name')); ?></span>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label"><?php echo e(__('Prenom')); ?></label>
                  <div class="col-sm-7">
                    <div class="form-group<?php echo e($errors->has('prenom') ? ' has-danger' : ''); ?>">
                      <input class="form-control<?php echo e($errors->has('prenom') ? ' is-invalid' : ''); ?>" name="prenom" id="input-prenom" type="text" placeholder="<?php echo e(__('Prenom')); ?>" value="<?php echo e(old('prenom')); ?>" required="true" aria-required="true"/>
                      <?php if($errors->has('prenom')): ?>
                        <span id="prenom-error" class="error text-danger" for="input-prenom"><?php echo e($errors->first('prenom')); ?></span>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label"><?php echo e(__('Email')); ?></label>
                  <div class="col-sm-7">
                    <div class="form-group<?php echo e($errors->has('email') ? ' has-danger' : ''); ?>">
                      <input class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" id="input-email" type="email" placeholder="<?php echo e(__('Email')); ?>" value="<?php echo e(old('email')); ?>" required />
                      <?php if($errors->has('email')): ?>
                        <span id="email-error" class="error text-danger" for="input-email"><?php echo e($errors->first('email')); ?></span>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password"><?php echo e(__(' Mot de passe')); ?></label>
                  <div class="col-sm-7">
                    <div class="form-group<?php echo e($errors->has('password') ? ' has-danger' : ''); ?>">
                      <input class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" input type="password" name="password" id="input-password" placeholder="<?php echo e(__('Mot de passe')); ?>" value="" required />
                      <?php if($errors->has('password')): ?>
                        <span id="name-error" class="error text-danger" for="input-name"><?php echo e($errors->first('password')); ?></span>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>

                
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password-confirmation"><?php echo e(__('Confirme Mot de passe')); ?></label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="<?php echo e(__('Confirme Mot de passe')); ?>" value="" required />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password"><?php echo e(__(' Direction')); ?></label>
                  <div class="col-sm-7">
                    <div class="form-group">
                        <select name="direction_id" id="directions" class="form-control">
                            <?php $__currentLoopData = $directions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $direction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($direction['id']); ?>"><?php echo e($direction['libelle']); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password"><?php echo e(__(' Role')); ?></label>
                  <div class="col-sm-7">
                    <div class="form-group"> 
                        <select name="roles" id="roles" class="form-control">
                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($role['id']); ?>"><?php echo e($role['name']); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                  </div>
                </div>


              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-success"><?php echo e(__('Creer')); ?></button>
              </div>
            </div>
          </form>
            
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin',['title'=>'Creer un compte'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/diatas/Bureau/INS/app/guinee/resources/views/admin/users/create.blade.php ENDPATH**/ ?>