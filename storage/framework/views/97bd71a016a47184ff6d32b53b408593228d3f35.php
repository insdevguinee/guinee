<?php $__env->startSection('content'); ?>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-warning">
                <h4 class="card-title "><?php echo e(__('Permission ')); ?></h4>
                <p class="card-category"> Gestion de permission </p>
              </div>
              <div class="card-body">
                <?php if(session('status')): ?>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-warning">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span><?php echo e(session('status')); ?></span>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-12">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add_roles')): ?>
                         <p> <a href="<?php echo e(route('permissions.create')); ?>" class="btn pull-right btn-sm btn-default btn-bordered">Ajouter une permission</a></p>
                        <?php endif; ?>
                        <div class="clearfix"></div>
                        <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <span class="badge badge-<?php echo e(str_contains($permission->name, 'delete') ? 'danger' : ''); ?> <?php echo e(str_contains($permission->name, 'edit') ? 'warning' : 'info'); ?>" style="margin: 5px;">
                             <?php echo e($permission->name); ?>

                           

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_permissions')): ?>
                            <a href="<?php echo e(route('permissions.edit',[$permission->id])); ?>" class="btn btn-warning btn-sm">M</a>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_permissions')): ?>
                            <?php echo Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id], 'style'=>'display: inline;height:100%','onsubmit'=>'return show_alert();']); ?>

                            <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                            <?php echo Form::close(); ?>

                            <?php endif; ?>
                          </span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin',['title'=>'Permissions'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\guinee\resources\views/admin/permissions/index.blade.php ENDPATH**/ ?>