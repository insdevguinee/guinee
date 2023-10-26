
<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      
      <div class="card-body">
        
           <form action="<?php echo e(route('personnels.modifier')); ?>" method="POST">
           <?php echo csrf_field(); ?>
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
                     <option value="<?php echo e($fonction->id); ?>" class="text-uppercase" <?php echo e(($personnel->fonction_id == $fonction->id )? 'selected':' '); ?>><?php echo e($fonction->libelle); ?></option>
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
                <div class="form-group col-md-6" >  <label for="mm_numero">numero_mobile money</label>

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
               <?php $__currentLoopData = App\Affectation::where('personnel_id', '=', $personnel->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="form-group col-md-6">  <label for="direction_id">Zone d'activité</label>
                  <select name="direction_id[]" id="direction" class="form-control">

                      <?php $__currentLoopData = $directions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l => $direction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($direction->id); ?>" <?php echo e((App\Direction::where('id', '=', $p->direction_id)->first()->id == $direction->id)?'selected':' '); ?> default=<?php echo e($direction->libelle); ?>><?php echo e($direction->libelle); ?></option>
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
                <div class="form-group col-md-6" >  <label for="numero_equipe">Numéro équipe</label>

                  <input value="<?php echo e($p->team_number); ?>" class="form-control  <?php if ($errors->has('numero_equipe')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('numero_equipe'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="number" name="numero_equipe[]" id="numero_equipe"> 
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
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                <div class="clearfix"></div>
                <div class="container">
                  <div id="mat" class="row"></div>
                </div>
                <div class="clearfix"></div>
                <p class="text-center">
                       <a href="#end" id="addLine" class="add btn btn-sm btn-info"><span class="fa fa-plus-square-o fa-lg"></span> Ajouter une zone</a>
                    </p>
              </div>
            </div>
            <input type="hidden" name="id" value="<?php echo e($id); ?>">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_personnels')): ?>
            <div class="row">
              <div class="col-12">
                <button type="submit" class="btn btn-success float-right">Modifier</button>
                
                
                <a href="/tableau-bord/personnels" class="btn btn-default float-right">Annuler</a>
              </div>
            </div>
            <?php endif; ?>
        </form>
        
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script>
    jQuery(document).ready(function($) {

        $('#addLine').click(function(event) {

          var code = "<div class=\"form-group col-md-12\" style=\"display:inline-block; width: 50%;\">  <label for=\"direction_id\">Zone d'activité</label><select name=\"direction_id[]\" id=\"direction\" class=\"form-control\"><?php $__currentLoopData = $directions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $direction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <option value=\"<?php echo e($direction->id); ?>\" <?php echo e(($personnel->direction_id == $direction->id)?'selected':' '); ?>><?php echo e($direction->libelle); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select><?php if ($errors->has('direction_id[]')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('direction_id[]'); ?><span class=\"invalid-feedback\" role=\"alert\"><strong><?php echo e(@$message); ?></strong></span><?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?></div><div class=\"form-group col-md-6\" style=\"display:inline-block; width: 50%;\">  <label for=\"numero_equipe\">Numero équipe</label><input value=\"<?php echo e($personnel->numero_equipe); ?>\" class=\"form-control  <?php if ($errors->has('numero_equipe')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('numero_equipe'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>\" type=\"number\" name=\"numero_equipe[]\" id=\"numero_equipe\"><?php if ($errors->has('numero_equipe')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('numero_equipe'); ?><span class=\"invalid-feedback\" role=\"alert\"><strong><?php echo e(@$message); ?></strong></span><?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?></div>";
          $('#mat').append("<div style=\"width: 100%\">"+code+"</div>");
            $('select').select2({
            placeholder: "Search for a repository",
          });
          $('.remove').click(function(event) {
            $(this).parent('.mat').remove();
          });
        });

        $(".numero").inputmask({"mask": "9999/9999"});
         $('#active-bons').addClass('active');
    });

  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin',['title'=>'Modifier le personnel '.$personnel->matricule], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/damaro/Bureau/guinee/resources/views/admin/personnels/edit.blade.php ENDPATH**/ ?>