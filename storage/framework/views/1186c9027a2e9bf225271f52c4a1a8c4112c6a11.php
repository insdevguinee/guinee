<?php $__env->startSection('style'); ?>

<style>
  #table_id_filter label{
    float: right;
  }
</style>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="col-12">
            <form action="<?php echo e(route('personnels.index')); ?>" method="GET" class="input-group no-border">
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
    <div class="row">
  <div class="col-12 float-right">
    <a href="<?php echo e(route('personnels.formation')); ?>" class="btn btn-info btn-sm">Agents en Formation</a>
    <a href="<?php echo e(route('personnels.attente')); ?>" class="btn btn-warning btn-sm">Agents en Attente</a>
    <a href="<?php echo e(route('personnels.index')); ?>" class="btn btn-success btn-sm">Agents en Activité</a>

    <a href="<?php echo e(route('export.all.personnels',[2, @$_GET['fonction'], @$_GET['direction']])); ?>" class="btn btn-default btn-sm float-right"> <i class="fa fa-download" aria-hidden="true"></i> Exporter tous en Excel</a>    
    <a href="<?php echo e(route('personnels.generateallompdf', [10])); ?>" class="btn btn-default btn-sm float-right d-none"> <i class="fa fa-print"></i> Générer tous pdf</a>       
  </div>
</div>
    <div class="card">
      <div class="card-body">

        <div class="row">
        <div class="col-8">
          <a href="<?php echo e(route('personnels.index')); ?>" class="btn btn-success btn-sm">Effectif des Agents en Activité</a>
          <form action="<?php echo e(route('personnels.index')); ?>" method="GET" style="display: inline-flex;">
            <select class="form-control" name="fonction" >
              <option value="">LISTE DES FONCTIONS</option>
              <?php $__currentLoopData = $fonctions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fonction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($fonction->libelle); ?>" <?php echo e(($fonction->libelle == @$_GET['fonction'])? 'selected':''); ?>>
                  <?php
                    if (Auth::user()->can('all_personnels') OR Auth::user()->hasRole('admin|Admin')){
                      $count_p = @\App\personnel::active()->where('fonction_id',$fonction->id)->count();
                    }else{
                      $count_p = @\App\personnel::active()->where([['fonction_id',$fonction->id],['direction_id',Auth::user()->direction->id]])->count();
                    }
                  ?>

                  <?php echo e($fonction->libelle.' ('.$count_p.')'); ?>

                </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <button type="submit" class="btn btn-sm">Valider</button>
          </form>
        </div>          
        <div class="col-4 text-right"> 

          <form action="<?php echo e(route('personnels.active.activite')); ?>" method="POST" style="display: inline-flex;">
            <?php echo csrf_field(); ?>
            <input type="number" id="" class="form-control form-control-sm text-center" name="number" placeholder="definir le nombre" min="1" required />

            <button type="submit" class="btn">Valider</button>
          </form>

        </div>
        </div>
       
        <!-- <button type='button' class="btn btn-sm btn-default float-right" data-toggle="modal" data-target="#newPersonnel">
          Ajouter un personnel
        </button> -->
        <hr>
        <div class="clearfix"></div>
        <div class=" table-responsive">
          <?php echo e($personnels->links()); ?>

        <table class="table table-bordered table-hover" id="table_id">
          <thead>
            <tr>
              <th>matricule</th>
              <th>prenoms</th>
              <th>nom</th>
              <th>fonction</th>
              <th>numero orange money</th>
              <th>contact</th>
              <th>zone d'activité</th>
              <th>N°Eq</th>
              <th>Ordre de mission</th>
              <th>notes</th>
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
                <td>
                  
                   <?php $__currentLoopData = App\Affectation::where('personnel_id', '=', $personnel->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e(App\Direction::where('id', '=', $p->direction_id)->first()->libelle); ?> <a href="<?php echo e(route('supprimer.affectation', $p->id)); ?>"> <sup><i class="fa fa-times fa-sm text-danger"></i></sup> </a> <br>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  
                </td>
                <td>
                   <?php $__currentLoopData = App\Affectation::where('personnel_id', '=', $personnel->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($p->team_number); ?> <br>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </td>
                <!-- <td class="text-center">
                  <?php
                      $teams = explode(",", $personnel->numero_equipe);
                  ?>
                  <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  
                  <a href="<?php echo e(route('pdfordremission', [$personnel->id, $team])); ?>" class=""> <?= $team ?> <i class="fa fa-download"></i></a> &nbsp;
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </td> -->
                <td class="text-center">
                  <?php
                      //$teams = $personnel->directions();
                  ?>

                  <?php if($personnel->fonction_id == 21 || $personnel->fonction_id == 22): ?>
                    <a href="<?php echo e(route('pdfom1',[$personnel->id])); ?>" class=""><i class="fa fa-download"></i></a>
                  <?php elseif($personnel->fonction_id == 1000): ?>
                    <!-- load -->

                  <?php else: ?>
                    <!-- <a href="<?php echo e(route('pdfom2',[$personnel->id])); ?>" class=""><i class="fa fa-download"></i></a> -->
                    <?php $__currentLoopData = $personnel->directions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $affection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('pdfordremission', [$affection->pivot->direction_id, $affection->pivot->team_number])); ?>" class=""> 
                      <?= $affection->pivot->team_number ?> <i class="fa fa-download"></i>
                    </a> &nbsp;
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                  <?php endif; ?>

                </td>
                <td><?php echo e($personnel->note); ?></td>
                <td>
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_personnels')): ?>
                    <a href="<?php echo e(route('personnels.edit',[$personnel->id])); ?>" title="Modifier" class="btn btn-info btn-sm">M<i class="fa fa-edit"></i></a>
                    
                  <?php endif; ?>

                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_personnels')): ?>
                  <?php echo Form::open(['method' => 'PUT', 'route' => ['personnels.update', $personnel->id] ,'style'=>'display:inline-block !important;margin:0;']); ?>

                  <input type="submit" class="btn btn-danger btn-sm" onclick="return show_alert();" value="X" name='etat'>
                  <?php echo Form::close(); ?>

                  
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
          </table>
        </div>
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

                 
                 <select name="direction_id" id="direction" class="form-control">
                  <?php $__currentLoopData = $directions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $direction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <option value="<?php echo e($direction->id); ?>"><?php echo e($direction->libelle); ?></option>
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
<?php echo $__env->make('admin.layouts.admin',['title'=>'Agents en Activité ('.$stat['total_personnels'].')' ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\guinee\resources\views/admin/personnels/index.blade.php ENDPATH**/ ?>