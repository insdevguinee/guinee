<?php $__env->startSection('content'); ?>

<style>
  #table_id_filter label{
    float: right;
  }
</style>

<div class="row">
  <div class="col-md-12">
     <div class="card">
      <div class="card-body">
        <div class="col-12">
            <form action="<?php echo e(route('personnels.attente')); ?>" method="GET" class="input-group no-border">
            <input type="text" value="<?php echo e(@$_GET['search']); ?>" name="search" class="form-control" placeholder="Recherche de matricule">
            <div class="input-group-append">
              <div class="input-group-text">
                <i class="nc-icon nc-zoom-split"></i>
              </div>
            </div>
            </form>
            <small>Appuyer sur <code>Entrer</code> pour valider la recherche</small>
        </div>
      </div>
    </div>
    <a href="<?php echo e(route('personnels.formation')); ?>" class="btn btn-info btn-sm">Agents en Formation</a>
    <a href="<?php echo e(route('personnels.attente')); ?>" class="btn btn-warning btn-sm">Agents en Attente</a>
    <a href="<?php echo e(route('personnels.index')); ?>" class="btn btn-success btn-sm">Agents en Activité</a>
    <div class="card">
      <div class="card-body" style="background: cornsilk">
        <a href="<?php echo e(route('personnels.attente')); ?>" class="btn btn-success btn-sm">Effectif des agents en attente</a>
        <form action="<?php echo e(route('personnels.attente')); ?>" methode="GET" style="display: inline-flex;">
        <select class="form-control" name="fonction" >
           <?php $__currentLoopData = $fonctions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fonction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($fonction->libelle); ?>">
              <?php
                if (Auth::user()->can('all_personnels') OR Auth::user()->hasRole('admin|Admin')){
                  $count_p = @\App\personnel::attente()->where('fonction_id',$fonction->id)->count();
                }else{
                  $count_p = @\App\personnel::attente()->where([['fonction_id',$fonction->id],['direction_id',Auth::user()->direction->id]])->count();
                }
              ?>

              <?php echo e($fonction->libelle.' ('.$count_p.')'); ?>)
            </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <button type="submit" class="btn btn-sm">Valider</button>
       </form>
       <!--   -->
        <div class="clearfix"></div>
        <div class=" table-responsive">
        <table class="table table-bordered table-hover" id="table_id">
          <thead>
            <tr>
              <th>matricule</th>
              <th>prenoms</th>
              <th>nom</th>
              
              <th>fonction</th>
              <th>numero orange money</th>
              <th>contact</th>
              <th>Zone d'activité</th>
              <th>numero_equipe</th>
              <th>statut</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $personnels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $personnel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td> <a href="#"> <?php echo e($personnel->matricule); ?> </a> </td>
                <td><?php echo e($personnel->prenoms); ?></td>
                <td><?php echo e($personnel->nom); ?></td>
                
               
                <td><?php echo e(@$personnel->fonction->libelle); ?></td>
                <td><?php echo e($personnel->mm_numero); ?></td>
                <td><?php echo e($personnel->contact); ?></td>
                <td><?php echo e(@$personnel->direction->libelle); ?></td>
                <td><?php echo e($personnel->numero_equipe); ?></td>
                <td>
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_personnels')): ?>
                   <?php echo Form::open(['method' => 'PUT', 'route' => ['personnels.update', $personnel->id] ,'style'=>'display:inline-block !important;margin:0;']); ?>

                                <input  type="submit" class="btn btn-success btn-sm" value="Active" name='etat'>
                    <?php echo Form::close(); ?>


                    <?php echo Form::open(['method' => 'PUT', 'route' => ['personnels.update', $personnel->id] ,'style'=>'display:inline-block !important;margin:0;']); ?>

                                <input  type="submit" class="btn btn-default btn-sm" value="Formation" name='etat'>
                    <?php echo Form::close(); ?>

                  <?php endif; ?>
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_personnels')): ?>
                  <?php echo Form::open(['method' => 'DELETE', 'route' => ['personnels.destroy', $personnel->id] ,'style'=>'display:inline-block !important;margin:0;','onsubmit'=>'spinner();return show_alert(); ']); ?>

                      <input  type="submit" class="btn btn-danger btn-sm" name="statut" value="X">
                    <?php echo Form::close(); ?>

                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
          </table>
        <?php echo e($personnels->links()); ?>

      </div>
    </div>
  </div>
</div>
  <div class="modal fade" id="newPersonnel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title text-center">Ajouter une nouvelle personne</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Fermer</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?php echo e(route('personnels.store')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="container">
              <div class="row" id="tablePersonnelAdd">
                
                <div class="form-group col-md-6" >  <label for="matricule">matricule</label>

                 <input value="<?php echo e(old('matricule')); ?>" class="form-control  <?php if ($errors->has('matricule')) :
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

                 <input value="<?php echo e(old('nom')); ?>" class="form-control  <?php if ($errors->has('nom')) :
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

                 <input value="<?php echo e(old('prenoms')); ?>" class="form-control  <?php if ($errors->has('prenoms')) :
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
                     <option value="<?php echo e($fonction->id); ?>" class="text-uppercase"><?php echo e($fonction->libelle); ?></option>
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

                 <input value="<?php echo e(old('mm_numero')); ?>" class="form-control  <?php if ($errors->has('mm_numero')) :
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
                <div class="form-group col-md-6" >  <label for="direction_id">Zone d'activité</label>

                 <input value="<?php echo e(old('direction_id')); ?>" class="form-control  <?php if ($errors->has('direction_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('direction_id'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="text" name="direction_id" id="direction_id"> 
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

                 <input value="<?php echo e(old('numero_equipe')); ?>" class="form-control  <?php if ($errors->has('numero_equipe')) :
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

<?php $__env->startSection('script'); ?>
<script type="text/javascript" charset="utf8" src="<?php echo e(asset('plugin/DataTables/DataTables-1.10.21/js/jquery.dataTables.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('plugin/DataTables/datatables.min.js')); ?>"></script>
<script>
  $(document).ready(function() {
    $('#table_id').DataTable();
   });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin',['title'=>'Effectif des Agents en attente ('.$stat['total_personnels'].')' ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\guinee\resources\views/admin/personnels/attente/index.blade.php ENDPATH**/ ?>