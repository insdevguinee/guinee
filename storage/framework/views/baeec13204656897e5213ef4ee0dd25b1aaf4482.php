

<?php $__env->startSection('content'); ?>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-12">
            <div class="card">
            <div class="card-body">
             <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add_roles')): ?>
               <a href="<?php echo e(route('roles.create')); ?>" class="btn btn-sm btn-default float-right">
               <i class="fa fa-plus-circle" aria-hidden="true"></i> Creer un role
              </a>
              <?php endif; ?>
            </div>
        </div>
          </div>
      </div>
      <div class="row">
        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-6">
            <div class="card">
              <div class="card-header card-header-info">
                <h4 class="card-title text-capitalize"><?php echo e($role->name); ?></h4>
                <p class="card-category"> Gestion du role <?php echo e($role->name); ?> </p>
              </div>
              <div class="card-body">
                  <?php $__currentLoopData = $role->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="badge badge-primary">
                     <?php echo e($permission->name); ?>

                   </span>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
              <div class="card-footer">
                 <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_roles')): ?>
                    <a href="<?php echo e(route('roles.edit',[$role->id])); ?> " class="btn btn-sm btn-warning">
                        <i class="fa fa-pencil"></i>
                        <span>Modifier</span>
                    </a>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_roles')): ?>
                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id],'style'=>'display:inline-block !important','onsubmit'=>'return show_alert();' ]); ?>

                     <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>Supprimer</button>
                    <?php echo Form::close(); ?>

                    <?php endif; ?>
              </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin',['title'=>'Roles'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/diatas/Bureau/INS/app/guinee/resources/views/admin/roles/index.blade.php ENDPATH**/ ?>