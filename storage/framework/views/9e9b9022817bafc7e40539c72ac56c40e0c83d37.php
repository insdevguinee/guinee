

<?php $__env->startSection('content'); ?>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">

              <div class="card-body">
                <?php if(session('status')): ?>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span><?php echo e(session('status')); ?></span>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>
                <div class="row">
                  <div class="col-12 text-right">
                    
                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('users.index')); ?>?role=<?php echo e($role); ?>" class="btn btn-sm btn-default btn-amber text-uppercase">
                    <?php echo e($role); ?> <span class="badge-success badge"><?php echo e(\App\User::role($role)->count()); ?></span>
                </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <a href="<?php echo e(route('users.create')); ?>" class="btn btn-default btn-sm btn-green text-uppercase pull-right">
                    <i class="fa fa-user-plus"></i>
                </a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table">
                   <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prenoms</th>
                            <th>Email</th>
                            
                            <th>Direction</th>
                            <th>Role</th>
                            <th>Statut</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($user->name); ?></td>
                                <td><?php echo e($user->prenom); ?></td>
                                <td><?php echo e($user->email); ?></td>
                                
                                <td>
                                  <?php $__currentLoopData = $user->directions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($d->libelle); ?> ||| 
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  <br>
                                  Actif : <?php echo e(@$user->direction->libelle); ?>

                                </td>
                                <td class="text-uppercase"><?php echo e($user->roles->first()->name); ?></td>
                                <td>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_users')): ?>
                                 <?php if($user->id != 1): ?>
                                  <?php echo Form::open(['method' => 'PUT', 'route' => ['users.update', $user->id] ,'style'=>'display:inline-block !important;margin:0;']); ?>


                                <input  type="submit" class="btn btn-<?php echo e(($user->statut == 'active')?'success':'default'); ?> btn-sm" name="statut" value="active">
                                <input  type="submit" class="btn btn-<?php echo e(($user->statut == 'bloqué')?'warning':'default'); ?> btn-sm" name="statut" value="bloqué">
                                
                                  <?php echo Form::close(); ?>

                                   <?php endif; ?>
                                  <?php endif; ?>
                                </td>
                                <td>
                                
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_users')): ?>
                                     <a href="<?php echo e(route('users.show',[$user->id])); ?>" class="btn btn-info btn-sm"><i class="nc-icon nc-circle-10"></i> Modifier</a>
                                    <?php endif; ?>
                                  <?php if($user->id != 1): ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_users')): ?>
                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id] ,'style'=>'display:inline-block !important;margin:0;float:right;','onsubmit'=>'return show_alert();' ]); ?>

                                        <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>Supprimer</button>
                                    <?php echo Form::close(); ?>

                                    <?php endif; ?>
                                  <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                  </table>
                   <?php echo e(@$users->appends(request()->except('page'))->links()); ?>

                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin',['title'=> 'Gestion des comptes'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/clients/6ec092764b90fcd42777971432306baa/sites/recensement-2021.com/resources/views/admin/users/index.blade.php ENDPATH**/ ?>