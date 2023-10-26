<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-4">
    <div class="card card-user">
      <div class="image">
        <img src="<?php echo e(env('APP_LOGO')); ?>">
      </div>
      <div class="card-body">
        <div class="author">
          <a href="#">
            <img class="avatar border-gray" src="<?php echo e(asset($user->photo)); ?>" alt="...">
            <h5 class="title"><?php echo e($user->name.' '.$user->prenom); ?></h5>
          </a>
          <p class="description">
            <?php echo e($user->email); ?>

          </p>
        </div>
        <p class="description text-center">
          Contact : <?php echo e($user->phone); ?><br>
          Direction : <?php echo e(@$user->direction->libelle); ?> <br>
          Role : <?php echo e($user->roles->first()->name); ?>

        </p>
      </div>
      <div class="card-footer">
        <hr>
        <div class="button-container">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-6 ml-auto">
              
            </div>
            <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
              <h5><?php echo e(@$user->direction->personnels->count()); ?><br><small>Personnels</small></h5>
            </div>
            <div class="col-lg-3 mr-auto">
              
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Membres de léquipe</h4>
      </div>
      <div class="card-body">
        <ul class="list-unstyled team-members">
          <?php if(!empty($users )): ?>
          <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

          <li>
            <div class="row">
              <div class="col-md-2 col-2">
                <div class="avatar">
                  <img src="<?php echo e(asset($u->photo)); ?>" alt="Image" class="img-circle img-no-padding img-responsive">
                </div>
              </div>
              <div class="col-md-7 col-7">
                <?php echo e($u->name.' '.$u->prenom); ?>

                <br>
                <span class="text-muted"><small><?php echo e($u->roles->first()->name); ?></small></span>
              </div>
              <div class="col-md-3 col-3 text-right">
                <a href="<?php echo e(route('users.show',$u->id)); ?>" class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-eye"></i></a>
              </div>
            </div>
          </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-md-8">
    <div class="card card-user">
      <div class="card-header">
        <h5 class="card-title">Modifier le profil</h5>
      </div>
       
      <div class="card-body">
        <?php echo Form::open(['method' => 'PUT', 'route' => ['users.update', $user->id] ]); ?>

          <div class="row">
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label>Email (desactivé)</label>
                <input type="text" class="form-control" disabled="" placeholder="email" value="<?php echo e($user->email); ?>">
              </div>
            </div>
            <div class="col-md-6 pl-1">
              <div class="form-group">
                <label>Contact</label>
                <input type="text" class="form-control" placeholder="Contact" value="<?php echo e($user->phone); ?>" name="phone">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label>Nom</label>
                <input type="text" class="form-control" value="<?php echo e($user->name); ?>" name="name">
              </div>
            </div>
            <div class="col-md-6 pl-1">
              <div class="form-group">
                <label>Prenom(s)</label>
                <input type="text" class="form-control" name="prenom" value="<?php echo e($user->prenom); ?>">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="update ml-auto mr-auto">
              <button type="submit" class="btn btn-primary btn-round">Mettre à jour</button>
            </div>
          </div>
        <?php echo Form::close(); ?>

      </div>
    </div>

    <div class="card card-user">
      <div class="card-header">
        <h5 class="card-title">Mot de passe</h5>
      </div>
       
      <div class="card-body">
        <?php echo Form::open(['method' => 'PUT', 'route' => ['users.update', $user->id] ]); ?>

          <div class="row">
            <div class="col-md-6">
               <div class="form-group">
                <label for="motdepasse">Mot de passe</label>
                <input type="password" class="form-control" placeholder="modifier le mot passe" name="newPassword">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="motdepasse">Confirmation</label>
                <input type="password" class="form-control" placeholder="repeter le mot passe" name="newPassword_confirmation">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="update ml-auto mr-auto">
              <button type="submit" class="btn btn-primary btn-round">Mettre à jour</button>
            </div>
          </div>
        <?php echo Form::close(); ?>

      </div>
    </div>

    <?php if(Auth::user()->hasRole('admin|Admin')): ?>
    <div class="card card-user">
      <div class="card-header">
        <h5 class="card-title">Directions</h5>
      </div>
       
      <div class="card-body">
        <form action="<?php echo e(route('setDirection')); ?>" method="POST">
          <?php echo csrf_field(); ?>
          <?php $__currentLoopData = $directions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $direction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="form-control d-inline-block" style="width: auto; margin: 10px;">
            <input type="checkbox" class="form-check-input" <?php echo e((@$user->directions->contains(@$direction))?'checked':''); ?> id="exampleCheck<?php echo e(@$direction->id); ?>" name="directions[]" value="<?php echo e(@$direction->id); ?>" >
            <input type="number" name="user" value="<?php echo e($user->id); ?>" style="display: none;">
            <label class="form-check-label"  for="exampleCheck<?php echo e(@$direction->id); ?>"><?php echo e(@$direction->libelle); ?></label>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         <div class="row">
            <div class="update ml-auto mr-auto">
              <button type="submit" class="btn btn-primary btn-round">Mettre à jour</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <?php endif; ?>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/clients/6ec092764b90fcd42777971432306baa/sites/recensement-2021.com/resources/views/admin/users/show.blade.php ENDPATH**/ ?>