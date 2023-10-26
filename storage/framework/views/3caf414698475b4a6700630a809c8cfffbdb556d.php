
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">

        <button type='button' class="btn btn-sm btn-default float-right" data-toggle="modal" data-target="#newfournisseur">
          Ajouter un fournisseur
        </button>
        

        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Code Fournisseur</th>
              <th>Libelle</th>
              <th>contact</th>
              <th>siteweb</th>
              <th>Ville</th>
              <th>Debit</th>
              <th>Credit</th>
              <th>Total</th>
              <th>Etat</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $fournisseurs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fournisseur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td> <a href="<?php echo e(route('fournisseurs.show',[$fournisseur->id])); ?>"> <?php echo e($fournisseur->codef); ?> </a> </td>
                <td> <?php echo e($fournisseur->name); ?> </td>
                <td><?php echo e($fournisseur->contact); ?></td>
                
                <td><?php echo e($fournisseur->siteweb); ?></td>
                <td><?php echo e($fournisseur->localisation); ?></td>
                <td><?php echo e(@$fournisseur->caisses->sum('debit')); ?></td>
                <td><?php echo e(@$fournisseur->caisses->sum('credit')); ?></td>
                <td><?php echo e(@$fournisseur->caisses->sum('debit') - @$fournisseur->caisses->sum('credit')); ?></td>
                <td>                   
                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['fournisseurs.destroy', $fournisseur->id] ,'style'=>'display:inline-block !important;margin:0;']); ?>

                                <input  type="submit" class="btn btn-danger btn-sm" name="statut" value="X">
                    <?php echo Form::close(); ?>

                    
                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
          </table>
        <?php echo e($fournisseurs->links()); ?>

      </div>
    </div>
  </div>
</div>
  <div class="modal fade" id="newfournisseur">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title text-center">Nouveau fournisseur</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Fermer</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?php echo e(route('fournisseurs.store')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="container">
              <div class="row" id="tablefournisseurAdd">
                 <div class="form-group col-md-12" >  <label for="codef">Code Fournisseur</label>

                 <input value="<?php echo e(old('codef')); ?>" class="form-control  <?php if ($errors->has('codef')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('codef'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="text" name="codef" id="codef" required> 
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
                <div class="form-group col-md-6" >  <label for="name">Libelle</label>

                 <input value="<?php echo e(old('name')); ?>" class="form-control  <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="text" name="name" id="name" required> 
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
                <div class="form-group col-md-6" >  <label for="nom">Contact</label>

                 <input value="<?php echo e(old('contact')); ?>" class="form-control  <?php if ($errors->has('contact')) :
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

                <div class="form-group col-md-6" >  <label for="siteweb">Siteweb</label>

                 <input value="<?php echo e(old('siteweb')); ?>" class="form-control  <?php if ($errors->has('siteweb')) :
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


                <div class="form-group col-md-6" >  <label for="localisation">Localisation</label>

                 <input value="<?php echo e(old('localisation')); ?>" class="form-control  <?php if ($errors->has('localisation')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('localisation'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="text" name="localisation" id="localisation" placeholder="Ville - Commune/Quartier"> 
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
              <div class="clearfix"></div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <button type="submit" class="btn btn-success float-right">Enregister</button>
                
                <button type="reset" class="btn btn-default float-right">Annuler</button>
              </div>
            </div>
          </form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin',['title'=>'Liste de fournisseur' ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/recensement-2021.com/resources/views/admin/fournisseurs/index.blade.php ENDPATH**/ ?>