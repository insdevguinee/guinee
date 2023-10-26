
<?php $__env->startSection('content'); ?>
<div>
    <div class="container">
        <div class="row">
             <?php echo e(Form::model($role, ['route' => array('roles.update', $role->id), 'method' => 'PUT','style'=>'width:100%;display:contents !important'])); ?>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                       
                        <div class="form-group">
                            <?php echo e(Form::label('name', 'Role Name')); ?>

                            <?php echo e(Form::text('name', null, array('class' => 'form-control'))); ?>

                        </div>
                   </div>
                </div>
            </div>
                <?php $__currentLoopData = $permissionNames; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permissionName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <span class="elipsis"><!-- card title -->
                                    <strong style="text-transform: uppercase;"><?php echo e($permissionName); ?></strong>
                                </span>
                            </div>
                           <div class="card-body">
                                <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(str_contains($permission->name, $permissionName)): ?>
                                         <label class="switch switch switch-round block">
                                            <?php echo e(Form::checkbox('permissions[]',  $permission->id,$role->permissions )); ?>

                                            <span class="switch-label" data-on="YES" data-off="NO"></span>
                                            <span><?php echo e(Form::label($permission->name, ucfirst($permission->name))); ?></span>
                                        </label>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <hr>
                <div class="clearfix"></div>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_roles')): ?>
                <?php echo e(Form::submit('Modifier', array('class' => 'btn btn-primary float-right'))); ?>

                <?php endif; ?>
                <?php echo e(Form::close()); ?>            
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin',['title'=>'Roles'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/recensement-2021.com/resources/views/admin/roles/edit.blade.php ENDPATH**/ ?>