
<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      
      <div class="card-body">
        <?php echo e(Form::model($fournisseur, ['route' => array('fournisseurs.update', $fournisseur->id), 'method' => 'PUT','style'=>'width:100%;display:contents !important', 'enctype'=>"multipart/form-data"])); ?>

            <div class="container">
              <div class="row" id="tablePersonnelAdd">
                
                <div class="form-group col-md-6" >  <label for="codef">CODE FOURNISSEUR</label>

                  <input value="<?php echo e($fournisseur->codef); ?>" class="form-control  <?php if ($errors->has('codef')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('codef'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="text" name="codef" id="codef"> 
                  <?php if ($errors->has('codef')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('codef'); ?>
                      <span class="invalid-feedback" role="alert">
                          <strong><?php echo e(@$message); ?></strong>
                      </span>
                  <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                </div>

                <div class="form-group col-md-6" >  <label for="name">NOM FOURNISSEUR</label>
                  <input value="<?php echo e($fournisseur->name); ?>" class="form-control  <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="text" name="name" id="name"> 
                  <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?>
                      <span class="invalid-feedback" role="alert">
                          <strong><?php echo e(@$message); ?></strong>
                      </span>
                  <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                </div>
               
                <div class="form-group col-md-6" > <label for="slug">RCCM</label>
                 <input value="<?php echo e($fournisseur->slug); ?>" class="form-control  <?php if ($errors->has('slug')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('slug'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="text" name="slug" id="slug"> 
                  <?php if ($errors->has('slug')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('slug'); ?>
                      <span class="invalid-feedback" role="alert">
                          <strong><?php echo e(@$message); ?></strong>
                      </span>
                  <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                </div>
               
                <div class="form-group col-md-6" > <label for="contact">CONTACT</label>
                 <input value="<?php echo e($fournisseur->contact); ?>" class="form-control  <?php if ($errors->has('contact')) :
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
               
                <div class="form-group col-md-6" > <label for="email">Email</label>
                 <input value="<?php echo e($fournisseur->email); ?>" class="form-control  <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="email" name="email" id="email"> 
                  <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
                      <span class="invalid-feedback" role="alert">
                          <strong><?php echo e(@$message); ?></strong>
                      </span>
                  <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                </div>
               
                <div class="form-group col-md-6" > <label for="localisation">ADRESSE</label>
                 <input value="<?php echo e($fournisseur->localisation); ?>" class="form-control  <?php if ($errors->has('localisation')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('localisation'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="text" name="localisation" id="localisation"> 
                  <?php if ($errors->has('localisation')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('localisation'); ?>
                      <span class="invalid-feedback" role="alert">
                          <strong><?php echo e(@$message); ?></strong>
                      </span>
                  <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                </div>
               
                <div class="form-group col-md-6" > <label for="siteweb">SITE WEB</label>
                 <input value="<?php echo e($fournisseur->siteweb); ?>" class="form-control  <?php if ($errors->has('siteweb')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('siteweb'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="text" name="siteweb" id="siteweb"> 
                  <?php if ($errors->has('siteweb')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('siteweb'); ?>
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
            
            <div class="row">
              <div class="col-12">
                <button type="submit" class="btn btn-success float-right">Modifier</button>
                
                
                <a href="<?php echo e(route('fournisseurs.index')); ?>" class="btn btn-default float-right">Annuler</a>
              </div>
            </div>
            
        <?php echo e(Form::close()); ?>

      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin',['title'=>'Modification du Fournisseur '.$fournisseur->name], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/diatas/Bureau/INS/app/guinee/resources/views/admin/fournisseurs/edit.blade.php ENDPATH**/ ?>