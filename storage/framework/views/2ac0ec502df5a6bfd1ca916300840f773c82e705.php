<?php $__env->startSection('content'); ?>
<style>
  .disable{
    background: #9e9e9e;
  }
</style>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="col-12">
            <form action="<?php echo e(route('paies.index',['personnel'=>'formations'])); ?>" method="GET" class="input-group no-border">
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
    <div class="card">
      <div class="card-body">
        <div class="row">

            <div class="col-md-4">
          <form action="" method="GET" class="form-group">
          
          <label for="">Mois</label>
          <select class="form-control" name="mois">
         <?php $__currentLoopData = \App\Option::mois(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <option value="<?php echo e($value); ?>" <?php echo e(( isset($_GET['mois']) ) ? ( ($_GET['mois'] == $value)? 'selected' : ' ' ) : ( (date('m') == $value ) ? 'selected' : ' ' )); ?> ><?php echo e($m); ?></option>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <label for="">Fonction</label>
            <select class="form-control" name="fonction" >
                <option value="">Toutes les fonctions</option>
                <?php $__currentLoopData = $fonctions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                      if (Auth::user()->can('all_personnels') OR Auth::user()->hasRole('admin|Admin')){
                        if (isset($_GET['personnel'])) {
                            $users = @\App\personnel::formation()->where('fonction_id',$f->id)->count();

                        }else{

                            $users = @\App\personnel::active()->where('fonction_id',$f->id)->count();
                        }

                      }else{
                        if (isset($_GET['personnel'])) {
                            # code...
                            $users = @\App\personnel::formation()->where([['fonction_id',$f->id],['direction_id',Auth::user()->direction->id]])->count();
                        }else{

                            $users = @\App\personnel::active()->where([['fonction_id',$f->id],['direction_id',Auth::user()->direction->id]])->count();
                        }
                      }
                    ?>
                    <?php if($users != 0): ?>
                      <option value="<?php echo e($f->libelle); ?>" <?php echo e((@$_GET['fonction'] == $f->libelle) ? 'selected':' '); ?>>
                    <?php echo e($f->libelle.' ('.$users.')'); ?>)
                    </option>
                    <?php endif; ?>

                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            
            <a href="<?php echo e(route('paies.index')); ?>" class="btn btn-sm btn-default">Annuler</a>

            <button type="submit" class="btn btn-sm btn-info" onclick="spinner();">Valider</button>
           </form>
        </div>
        <div class="col-md-5"></div>
        <div class="col-md-3 float-right">
         

          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add_paies')): ?>
          <a href="#" class="btn btn-default btn-block btn-sm" data-toggle="modal" data-target="#prime2">  <i class="fa fa-plus-circle" aria-hidden="true"></i> Enregistrer un montant</a>
          
          <?php endif; ?>

          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('xlsPaies_downloads')): ?>
          <a href="<?php echo e(route('exportPaie',['mois'=>(isset($_GET['mois'])? $_GET['mois'] : date('m')) , 'fonction'=> (isset($_GET['fonction'])? $_GET['fonction'] : 'all'),'personnel'=>(isset($_GET['personnel'])? 'formations' : false) ])); ?>" class="btn btn-success btn-block btn-sm" onclick="spinner();">
             <i class="fa fa-download" aria-hidden="true"></i> Telecharger Excel
          </a>
          <?php endif; ?>

          

           <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pdfPaies_downloads')): ?>
          <a href="<?php echo e(route('pdf',['mois'=>(isset($_GET['mois'])? $_GET['mois'] : date('m')) , 'fonction'=> (isset($_GET['fonction'])? $_GET['fonction'] : 'all'),'personnel'=>(isset($_GET['personnel'])? 'formations' : false) ])); ?>" class="btn btn-info btn-block btn-sm" onclick="spinner();">
             <i class="fa fa-download" aria-hidden="true"></i> Telecharger PDF
          </a>
          <?php endif; ?>

          
        </div>
        </div>
        <table class="table table-bordered table-hover table-responsive" id="table_id">
          <thead>
            <tr class="text-capitalize">
              <th>matricule</th>
              <th>prenoms & nom</th>
              <th>fonction</th>
              <th>N° Orange Money</th>
              <th class="<?php echo e((@$config['salaire'] == 0 ) ? 'disable':''); ?> ">salaire brut</th>
              <th>Zone d’Activité</th>
              <th class="<?php echo e((@$config['transport'] == 0 ) ? 'disable':''); ?> ">Transport</th>
              <th class="<?php echo e((@$config['carburant'] == 0 ) ? 'disable':''); ?> ">carburant</th>
              <th class="<?php echo e((@$config['communication'] == 0 ) ? 'disable':''); ?> ">communication</th>
              <th class="<?php echo e((@$config['internet'] == 0 ) ? 'disable':''); ?> ">internet</th>
              <th class="<?php echo e((@$config['guide'] == 0 ) ? 'disable':''); ?> ">Guide</th>            
              <th>Salaire NET</th>
              <th>NET A PAYER</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $personnels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $personnel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="personnel">
              <td><?php echo e($personnel['matricule']); ?> </td>
              <td><?php echo e($personnel['nom']); ?></td>
              <td><?php echo e($personnel['fonction']); ?></td>
              <td><?php echo e($personnel['mm']); ?></td>
              <?php if($personnel['etat'] == 0): ?>
              <td class="<?php echo e(($config['salaire'] == 0 ) ? 'disable':''); ?> "><?php echo e($personnel['salaireformationbrute']); ?></td>
              <?php else: ?>
              <td class="<?php echo e(($config['salaire'] == 0 ) ? 'disable':''); ?> "><?php echo e($personnel['salaireBrute']); ?></td>
              <?php endif; ?>
              
              <td ><?php echo e($personnel['direction']); ?></td>
              <td  class="<?php echo e(($config['transport'] == 0 ) ? 'disable':''); ?> "><?php echo e($personnel['transport']); ?></td>
              <td  class="<?php echo e(($config['carburant'] == 0 ) ? 'disable':''); ?> "><?php echo e($personnel['carburant']); ?></td>
              <td  class="<?php echo e(($config['communication'] == 0 ) ? 'disable':''); ?> "><?php echo e($personnel['communication']); ?></td>
              <td  class="<?php echo e(($config['internet'] == 0 ) ? 'disable':''); ?> "><?php echo e($personnel['internet']); ?></td>
              <td  class="<?php echo e(($config['guide'] == 0 ) ? 'disable':''); ?> "><?php echo e($personnel['guide']); ?></td>
             
              <td><?php echo e($personnel['salairenet']); ?></td>
              
              <?php if($personnel['etat'] == 0): ?>
              <td class="<?php echo e(($config['salaire'] == 0 ) ? 'disable':''); ?>"><?php echo e($personnel['salaireformation']); ?></td>
              <?php else: ?>
              <td><?php echo e($personnel['salaire']); ?></td>
              <?php endif; ?>

             </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
         
      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add_paies')): ?>
      <div class="modal fade" id="prime">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
              </button>
            </div>
            <div class="modal-body">
             <form action="<?php echo e(route('prime')); ?>" method="post">
              <?php echo csrf_field(); ?>
              <div class="form-group">
                <label for="personnel">Matricule</label>
                <input type="text" name="personnel" mat="personnel" placeholder="Matricule" class="form-control" required>
              </div>

              <div class="form-group">
                <label for="prime">Type de prime</label>
                <select id="prime" name="primePaie" class="form-control" required>
                  <option>Selectionnez la prime</option>
                  <?php if($config['prime'] == 1 ): ?>
                  <option value="prime">Prime</option>
                  <?php endif; ?>

                  <?php if($config['transport'] == 1 ): ?>
                  <option value="transport">Transport</option>
                  <?php endif; ?>
                  <?php if($config['mise_route'] == 1 ): ?>
                  <option value="mise_route">Mise en route</option>
                  <?php endif; ?>
                  <?php if($config['conges'] == 1 ): ?>
                  <option value="conges">Congé</option>
                  <?php endif; ?>
                  <?php if($config['gratification'] == 1 ): ?>
                  <option value="gratification">Gratification</option>
                  <?php endif; ?>
                  <?php if($config['carburant'] == 1 ): ?>
                  <option value="carburant">Carburant</option>
                  <?php endif; ?>
                  <?php if($config['guide'] == 1 ): ?>
                  <option value="guide">Guide</option>
                  <?php endif; ?>
                  <?php if($config['communication'] == 1 ): ?>
                  <option value="communication">Communication</option>
                  <?php endif; ?>
                  <?php if($config['perdiem'] == 1 ): ?>
                  <option value="perdiem">Perdiem</option>
                  <?php endif; ?>
                  <?php if($config['internet'] == 1 ): ?>

                  <option value="internet">Internet</option>
                  <?php endif; ?>
                  <?php if($config['prime_ni'] == 1 ): ?>

                  <option value="prime_ni">Primes non imposables</option>
                  <?php endif; ?>
                  <?php if($config['avance'] == 1 ): ?>
                  <option value="avance">Avance</option>
                  <?php endif; ?>
                 </select>
              </div>

              <div class="form-group">
                <label for="montant">Montant</label>
                <input type="text" name="mois" value="<?php echo e(isset($_GET['mois']) ? $_GET['mois']:date('m')); ?>" style="display: none;">
                <input type="text" name="prime" id="montant" class="form-control" placeholder="Montant">
              </div>

              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
              <button type="submit" class="btn btn-primary">Enregistrer</button>
              
             </form>
             <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pdfPaies_downloads')): ?>
             <form action="<?php echo e(route('export.paiements')); ?>"  method="POST">
              <?php echo csrf_field(); ?>
              <input type="text" name="mois" value="<?php echo e(isset($_GET['mois']) ? $_GET['mois']:date('m')); ?>" style="display: none;">
              <input type="text" name="personnel" value="<?php echo e((isset($_GET['personnel'])? 'formations' : false)); ?>" style="display: none;">

              <input type="text" style="display: none" name="fonction" value="<?php echo e(@$_GET['fonction']); ?>">

              <input type="text" name="matricule" mat="personnel" placeholder="Matricule" class="form-control" required>
              <button type="submit" class="btn btn-primary">Telecharger le rapport</button>
             </form>
              
              <?php endif; ?>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

       <div class="modal fade" id="prime2">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
              </button>
            </div>
            <div class="modal-body">
             <form action="<?php echo e(route('prime')); ?>" method="post">
              <?php echo csrf_field(); ?>
              <div class="form-group">
                <label for="fonction">Fonction</label>
                
                <select name="fonction"  class="form-control">
                  <option value="*">--Fonction--</option>
                  <?php $__currentLoopData = $fonctions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                      if (Auth::user()->can('all_personnels') OR Auth::user()->hasRole('admin|Admin')){
                        $users = @\App\personnel::active()->where('fonction_id',$f->id)->count();
                      }else{
                        $users = @\App\personnel::active()->where([['fonction_id',$f->id],['direction_id',Auth::user()->direction->id]])->count();
                      }
                    ?>
                    <?php if($users != 0): ?>
                      <option value="<?php echo e($f->id); ?>" <?php echo e((@$_GET['fonction'] == $f->libelle) ? 'selected':' '); ?>>
                    <?php echo e($f->libelle); ?>

                    </option>
                    <?php endif; ?>

                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>

              <div class="form-group">
                <label for="prime">Type de prime</label>
                <select id="primePaie" name="primePaie" class="form-control" required>
                   <option>Selectionnez la prime</option>
                    <?php if(@$config['prime'] == 1 ): ?>
                    <option value="prime">Prime</option>
                    <?php endif; ?>

                    <?php if(@$config['transport'] == 1 ): ?>
                    <option value="transport">Transport</option>
                    <?php endif; ?>
                    <?php if(@$config['mise_route'] == 1 ): ?>
                    <option value="mise_route">Mise en route</option>
                    <?php endif; ?>
                    <?php if(@$config['conges'] == 1 ): ?>
                    <option value="conges">Congé</option>
                    <?php endif; ?>
                    <?php if(@$config['gratification'] == 1 ): ?>
                    <option value="gratification">Gratification</option>
                    <?php endif; ?>
                    <?php if(@$config['carburant'] == 1 ): ?>
                    <option value="carburant">Carburant</option>
                    <?php endif; ?>
                    <?php if(@$config['guide'] == 1 ): ?>
                    <option value="guide">Guide</option>
                    <?php endif; ?>
                    <?php if(@$config['communication'] == 1 ): ?>
                    <option value="communication">Communication</option>
                    <?php endif; ?>
                    <?php if(@$config['perdiem'] == 1 ): ?>
                    <option value="perdiem">Perdiem</option>
                    <?php endif; ?>
                    <?php if(@$config['internet'] == 1 ): ?>

                    <option value="internet">Internet</option>
                    <?php endif; ?>
                    <?php if(@$config['prime_ni'] == 1 ): ?>

                    <option value="prime_ni">Primes non imposables</option>
                    <?php endif; ?>
                    <?php if(@$config['avance'] == 1 ): ?>
                    <option value="avance">Avance</option>
                    <?php endif; ?>
                </select>
              </div>

              <div class="form-group">
                <input type="text" name="mois" value="<?php echo e((@$_GET['mois']) ? @$_GET['mois']:date('m')); ?>" style="display: none;">
                <label for="montant">Montant</label>
                <input type="text" name="montant" class="form-control" placeholder="Montant">
              </div>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('all_personnels')): ?>
               <div class="form-group">
                <label for="directions">Région</label>
                <select id="directions" name="direction" class="form-control">
                  <?php $__currentLoopData = $directions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $direction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($direction['id']); ?>" class="text-capitalize"><?php echo e($direction['libelle' ]); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
              <?php endif; ?>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
              <button type="submit" class="btn btn-primary">Enregistrer</button>
             </form>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
      <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<script type="text/javascript" charset="utf8" src="<?php echo e(asset('plugin/DataTables/DataTables-1.10.21/js/jquery.dataTables.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('plugin/DataTables/datatables.min.js')); ?>"></script>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add_paies')): ?>
<script>
  $(document).ready(function() {

    $('#montant').focus(function(event) {
      var name = $('#prime option:selected').val();
      $(this).attr('name', name);
    });
    $('.personnel').dblclick(function() {
      $('#prime').modal({
          show: true
        });
      var matricule = $(this).children('td:first-child').text();
      $("input[mat='personnel']").val(matricule);
    });
  });
</script>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<link rel="stylesheet" href="<?php echo e(url('https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugin/DataTables/datatables.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('plugin/DataTables/DataTables-1.10.21/css/jquery.dataTables.css')); ?>">
<style>
  .personnel{
    cursor: auto;
  }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin',['title'=>'Etat de Paie' ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/diatas/Bureau/INS/app/guinee/resources/views/admin/paies/index.blade.php ENDPATH**/ ?>