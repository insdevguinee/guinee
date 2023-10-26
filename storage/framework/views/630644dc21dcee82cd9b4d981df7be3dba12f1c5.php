<?php $__env->startSection('style'); ?>

<link href="<?php echo e(asset('admin/dist/css/theme.default.min.css')); ?>" rel="stylesheet">
<style>
  .list_im{
    position: absolute;
    width: 92%;
    z-index: 1;
    height: 130px;
    overflow-y: auto;
  }

  .list_im .list-group-item{
    cursor: pointer;
  }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
   <div class="col-lg-3 col-md-3 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-info">
                <i class="nc-icon nc-simple-remove text-warning"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers">
                <p class="card-category"><?php echo e($etat['debit']); ?></p>
                <p class="card-title">DEBIT</p>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-info">
                <i class="nc-icon nc-simple-remove text-info"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers">
                <p class="card-category"><?php echo e($etat['credit']); ?></p>
                <p class="card-title">CREDIT</p>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-info">
                <i class="nc-icon nc-money-coins text-info"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers">
                <p class="card-category"><?php echo e($etat['debit'] - $etat['credit']); ?></p>
                <p class="card-title">TOTAL</p>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

</div>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="col-md-3">
          <?php if(Auth::user()->hasRole('Admin|admin')): ?>
            <form method="GET" action="">
            <label for="">Région</label>
             <select class="form-control" name="direction" >
                <option value="">Toutes les régions</option>
                <?php $__currentLoopData = $directions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $direction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($direction->id); ?>"  <?php echo e(($direction->id == @$_GET['direction'])?'selected':''); ?>><?php echo e($direction->libelle); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
           <button type="submit" class="btn btn-sm btn-info" onclick="spinner();">Valider</button>
           </form>
          <?php endif; ?>
        </div>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add_caisses')): ?>
         <button type='button' class="btn btn-sm btn-default float-right" data-toggle="modal" data-target="#newData">
         <i class="fa fa-plus-circle" aria-hidden="true"></i> Faire un enregistrement
        </button>
        <?php endif; ?>


        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th width="110px">Date</th>
              
              <th>Imputation</th>
              <th>Libelle</th>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_all_caisses')): ?>
              <th>DR</th>
              <?php endif; ?>
              
              <th>N°Facture</th>
              <th>Tiers</th>
              <th width="50px">Ligne</th>
              <th>M. Paiement</th>
              <th width="100px">Reference Paiement</th>
              <th>Debit</th>
              <th>Credit</th>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_all_caisses')): ?>
              <th>Creer Par</th>
              <?php endif; ?>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $caisses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $caisse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e(@$caisse->date_en); ?></td>
                
                
                <td><?php echo e(@$caisse->imputation_id); ?></td>
                <td><?php echo e(@$caisse->libelle); ?></td>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_all_caisses')): ?>

                <td><?php echo e(@$caisse->direction->libelle); ?></td>
                <?php endif; ?>
                
                <td><?php echo e(@$caisse->num_facture); ?></td>
                <td><a href="<?php echo e(route('fournisseurs.show',[@$caisse->fournisseur->id])); ?>"><?php echo e(@$caisse->fournisseur->name.' ['.@$caisse->fournisseur->codef.']'); ?></a></td>
                <td><?php echo e(@$caisse->ligne_budget); ?></td>
                <td><?php echo e(@$caisse->paiement); ?></td>
                <td><?php echo e(@$caisse->ref_paiement); ?></td>
                <td><?php echo e(@$caisse->debit); ?></td>
                <td><?php echo e(@$caisse->credit); ?></td>      
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_all_caisses')): ?>     
                <td><?php echo e(@$caisse->user->name); ?></td>     
                <?php endif; ?>
                <td>
                  <?php if($caisse->recu): ?>
                  <a href="<?php echo e(asset($caisse->recu)); ?>" title="Telecharger la pièce justificative" target="_blank"><i class="fa fa-file"></i></a>
                  <?php endif; ?>
                </td>      
                <td>
                  <?php if(!$caisse->parent_id): ?> 
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_caisses')): ?>
                    <a href="<?php echo e(route('caisses.edit',[$caisse->id])); ?>" class="btn btn-sm btn-default" title="Modifier">M<i class="fa fa-edit"></i></a>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_caisses')): ?>
                      <?php echo Form::open(['method' => 'DELETE', 'route' => ['caisses.destroy', $caisse->id] ,'style'=>'display:inline-block !important;margin:0;','onsubmit'=>'return show_alert();']); ?>


                          <input  type="submit" onsubmit='return show_alert();' class="btn btn-danger btn-sm" name="statut" value="X">
                      <?php echo Form::close(); ?>

                    <?php endif; ?>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
          </table>
        <?php echo e($caisses->links()); ?>

      </div>
    </div>
  </div>
</div>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add_caisses')): ?>

  <div class="modal fade" id="newData">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title text-center">Faire un enregistrement</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Fermer</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?php echo e(route('caisses.store')); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="container">
              <div class="row">
                <div class="form-group col-md-6" >  <label for="matricule">Type d'opération</label>
                <select name="operation" id="operation" class="form-control">
                  <option value="debit">Débit</option>
                  <option value="credit">Crédit</option>
                </select>
               </div>
               <div class="form-group col-md-6" >  <label for="nom">Montant</label>

                 <input required value="<?php echo e(old('montant')); ?>" class="form-control  <?php if ($errors->has('montant')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('montant'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="text" name="montant" id="montant"> 
                  <?php if ($errors->has('montant')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('montant'); ?>
                      <span class="invalid-feedback" role="alert">
                          <strong><?php echo e(@$message); ?></strong>
                      </span>
                  <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                </div>
                </div>
                <hr>
                <div class="row" >
                <div class="form-group col-md-6" >  <label for="nom">Date Enregistrement</label>

                 <input required value="<?php echo e(old('date_en')); ?>" class="form-control  <?php if ($errors->has('date_en')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('date_en'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="date" name="date_en" id="date_en"> 
                  <?php if ($errors->has('date_en')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('date_en'); ?>
                      <span class="invalid-feedback" role="alert">
                          <strong><?php echo e(@$message); ?></strong>
                      </span>
                  <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

               </div>
               <div class="form-group col-md-6" >  <label for="fonction">Ref. Paiement</label>
                <input required type="text" name="ref_paiement" class="form-control">

               </div>
                <div class="form-group col-md-6" >  <label for="imputation">Imputation</label>
                <input required type="text" class="form-control" name="imputation" id="imputation" autocomplete="off">
                  <div class="list_im" id="imp_res" style="display: none;">
                    <ul class="list-group">
                    </ul>
                  </div>
               </div>
                <div class="form-group col-md-6" >  <label for="fonction">Libellé</label>
                  <input required type="text" class="form-control" id="libelle" name="libelle">
               </div>
                <div class="form-group col-md-6" >  <label for="num_facture">N° Facture</label>

                 <input required value="<?php echo e(old('num_facture')); ?>" class="form-control  <?php if ($errors->has('num_facture')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('num_facture'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="text" name="num_facture" id="num_facture"> 
                  <?php if ($errors->has('num_facture')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('num_facture'); ?>
                      <span class="invalid-feedback" role="alert">
                          <strong><?php echo e(@$message); ?></strong>
                      </span>
                  <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

               </div>
                <div class="form-group col-md-6" >  
                  <label for="tiers">Fournisseur</label>

                 <select name="tiers" id="tiers" class="form-control">
                  <option value=""></option>
                   <?php $__currentLoopData = $fournisseurs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fournisseur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <option value="<?php echo e($fournisseur->id); ?>"><?php echo e($fournisseur->name); ?></option>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </select>

               </div>
                <div class="form-group col-md-6" >  <label for="ligne_budget">Ligne budget</label>
                 <input value="<?php echo e(old('ligne_budget')); ?>" autocomplete="off" class="form-control  <?php if ($errors->has('ligne_budget')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('ligne_budget'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="text" name="ligne_budget" id="ligne_budget"> 
                  <?php if ($errors->has('ligne_budget')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('ligne_budget'); ?>
                      <span class="invalid-feedback" role="alert">
                          <strong><?php echo e(@$message); ?></strong>
                      </span>
                  <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                  <div class="list_im" id="bud_res" style="display: none;">
                    <ul class="list-group">
                    </ul>
                  </div>
               </div>
                <div class="form-group col-md-6" >  <label for="numero_equipe">Type de paiement</label>
                <select name="paiement" id="paiement" class="form-control">
                  <option value="cheque">Chèque</option>
                  <option value="v_mtn">Virement MTN</option>
                  <option value="espece">Espece</option>
                </select>

               </div>

               <div class="col-md-12" >  
                <label for="fonction">Joindre le réçu </label><br>
                  <input required type="file" class="form-control" id="libelle" name="recupdf">
                  <small>Type de fichier acceptable PDF</small>
               </div>
               <div class="form-group col-md-12">
                 <label for="description">Observation</label>
                 <textarea name="observation" id="observation" cols="30" rows="10" class="form-control"></textarea>
               </div>                      
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
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
 <script src="<?php echo e(asset('admin/dist/js/jquery.tablesorter.min.js')); ?>"></script>
  <script src="<?php echo e(asset('admin/dist/js/jquery.tablesorter.widgets.min.js')); ?>"></script>
  <script>
 /* $(function(){
    $('table').tablesorter({
      widgets        : ['zebra', 'columns'],
      usNumberFormat : false,
      sortReset      : true,
      sortRestart    : true
    });
  });*/
  $('#imputation').keyup(function() {
      var query = $(this).val(); 
      if (query.length >= 2 || query.length==0) {
        libelle_get(query); 
        $('#imp_res').show();
      }else{
          $('#imp_res').hide();
          $('#imp_res ul').html(" ");
      }
      if (query.length == 0 ) {
        $('#imp_res').hide();
        $('#imp_res ul').html(" ");
      } 
    }); 

  function libelle_get(query = '') {
      $.ajax({url: "<?php echo e(route('imputation')); ?>", 
        method: 'GET', 
        data: {'query': query}, 
        success:function(data){
          $('#imp_res ul').html(data);
           $('#imp_res li').click(function() {
              var code = $(this).children('span[data="code"]').text();
              var libelle = $(this).children('span[data="libelle"]').text();
              $('#imputation').val(code+' - '+ libelle);
              $('#libelle').val(libelle);
              $('#imp_res').hide();
              $('#imp_res ul').html(" ");
           });
      } 
    }) 
  } 

  $('#ligne_budget').keyup(function() {
      var query = $(this).val(); 
      if (query.length >= 2 || query.length==0) {
        budget_get(query); 
        $('#bud_res').show();
      }else{
          $('#bud_res').hide();
          $('#bud_res ul').html(" ");
      }
      if (query.length == 0 ) {
        $('#bud_res').hide();
        $('#bud_res ul').html(" ");
      } 
    }); 

  function budget_get(query = '') {
      $.ajax({url: "<?php echo e(route('lignebudget')); ?>", 
        method: 'GET', 
        data: {'query': query}, 
        success:function(data){
          $('#bud_res ul').html(data);
           $('#bud_res li').click(function() {
              var code = $(this).text();
              $('#ligne_budget').val(code);
              $('#bud_res').hide();
              $('#bud_res ul').html(" ");
           });
      } 
    }) 
  } 
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin',['title'=>'Enregistrement Comptable'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/recensement-2021.com/resources/views/admin/caisses/index.blade.php ENDPATH**/ ?>