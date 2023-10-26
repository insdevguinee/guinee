
<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      
      <div class="card-body">
        <?php echo e(Form::model($personnel, ['route' => array('personnels.update', $personnel->id), 'method' => 'PUT','style'=>'width:100%;display:contents !important', 'enctype'=>"multipart/form-data"])); ?>

             <div class="container">
              <div class="row" id="tablePersonnelAdd">
                
                <div class="form-group col-md-6" >  <label for="matricule">matricule</label>

                 <input value="<?php echo e($personnel->matricule); ?>" class="form-control  <?php if ($errors->has('matricule')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('matricule'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="text" name="matricule" id="matricule"> 
                  <?php if ($errors->has('matricule')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('matricule'); ?>
                      <span class="invalid-feedback" role="alert">
                          <strong><?php echo e(@$message); ?></strong>
                      </span>
                  <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

               </div>
                <div class="form-group col-md-6" >  <label for="nom">nom</label>

                 <input value="<?php echo e($personnel->nom); ?>" class="form-control  <?php if ($errors->has('nom')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('nom'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="text" name="nom" id="nom"> 
                  <?php if ($errors->has('nom')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('nom'); ?>
                      <span class="invalid-feedback" role="alert">
                          <strong><?php echo e(@$message); ?></strong>
                      </span>
                  <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

               </div>
                <div class="form-group col-md-6" >  <label for="prenoms">prenoms</label>

                 <input value="<?php echo e($personnel->prenoms); ?>" class="form-control  <?php if ($errors->has('prenoms')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('prenoms'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="text" name="prenoms" id="prenoms"> 
                  <?php if ($errors->has('prenoms')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('prenoms'); ?>
                      <span class="invalid-feedback" role="alert">
                          <strong><?php echo e(@$message); ?></strong>
                      </span>
                  <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

               </div>
                <div class="form-group col-md-6" >  <label for="fonction">fonction</label>
                 <select name="fonction" id="fonction" class="form-control <?php if ($errors->has('fonction')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('fonction'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
                   <?php $__currentLoopData = $fonctions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fonction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <option value="<?php echo e($fonction->id); ?>" class="text-uppercase" 
                      <?php echo e(($personnel->fonction->id == $fonction->id )?'selected':' '); ?>><?php echo e($fonction->libelle); ?></option>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </select>
                  <?php if ($errors->has('fonction')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('fonction'); ?>
                      <span class="invalid-feedback" role="alert">
                          <strong><?php echo e(@$message); ?></strong>
                      </span>
                  <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

               </div>
                <div class="form-group col-md-6" >  <label for="mm_numero">mm_numero</label>

                 <input value="<?php echo e($personnel->mm_numero); ?>" class="form-control  <?php if ($errors->has('mm_numero')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('mm_numero'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="text" name="mm_numero" id="mm_numero"> 
                  <?php if ($errors->has('mm_numero')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('mm_numero'); ?>
                      <span class="invalid-feedback" role="alert">
                          <strong><?php echo e(@$message); ?></strong>
                      </span>
                  <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

               </div>
                <div class="form-group col-md-6" >  <label for="contact">contact</label>

                 <input value="<?php echo e($personnel->contact); ?>" class="form-control  <?php if ($errors->has('contact')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('contact'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="text" name="contact" id="contact"> 
                  <?php if ($errors->has('contact')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('contact'); ?>
                      <span class="invalid-feedback" role="alert">
                          <strong><?php echo e(@$message); ?></strong>
                      </span>
                  <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

               </div>
                <div class="form-group col-md-6" >  <label for="direction_id">Direction</label>

                 
                 <select name="direction_id" id="direction" class="form-control">
                  <?php $__currentLoopData = $directions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $direction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <option value="<?php echo e($direction->id); ?>" <?php echo e(($personnel->direction->id == $direction->id)?'selected':' '); ?>><?php echo e($direction->libelle); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </select>
                  <?php if ($errors->has('direction_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('direction_id'); ?>
                      <span class="invalid-feedback" role="alert">
                          <strong><?php echo e(@$message); ?></strong>
                      </span>
                  <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

               </div>
                <div class="form-group col-md-6" >  <label for="numero_equipe">numero_equipe</label>

                 <input value="<?php echo e($personnel->numero_equipe); ?>" class="form-control  <?php if ($errors->has('numero_equipe')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('numero_equipe'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="number" name="numero_equipe" id="numero_equipe"> 
                  <?php if ($errors->has('numero_equipe')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('numero_equipe'); ?>
                      <span class="invalid-feedback" role="alert">
                          <strong><?php echo e(@$message); ?></strong>
                      </span>
                  <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

               </div>
                         <div class="clearfix"></div>
              </div>
            </div>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_personnels')): ?>
            <div class="row">
              <div class="col-12">
                <button type="submit" class="btn btn-success float-right">Modifier</button>
                
                <button type="reset" class="btn btn-default float-right">Annuler</button>
              </div>
            </div>
            <?php endif; ?>
        <?php echo e(Form::close()); ?>

      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin',['title'=>'Modifier le personnel '.$personnel->matricule], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/clients/6ec092764b90fcd42777971432306baa/sites/recensement-2021.com/resources/views/admin/personnels/edit.blade.php ENDPATH**/ ?>