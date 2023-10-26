
<?php $__env->startSection('style'); ?>
<!-- Pick a theme, load the plugin & initialize plugin -->
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

  <div class="col-md-12">
   
    <div class="card">
      
      <div class="card-body">
        <?php echo e(Form::model($caisse, ['route' => array('caisses.update', $caisse->id), 'method' => 'PUT','style'=>'width:100%;display:contents !important', 'enctype'=>"multipart/form-data"])); ?>

            <div class="container">
              <div class="row">
                <div class="form-group col-md-6" >  <label for="matricule">Type d'opération</label>
                <select name="operation" id="operation" class="form-control">
                  <option value="debit">Débit</option>
                  <option value="credit">Crédit</option>
                </select>
               </div>
               <div class="form-group col-md-6" >  <label for="nom">Montant</label>

                 <input required value="<?php echo e($caisse->credit.$caisse->debit); ?>" class="form-control  <?php if ($errors->has('montant')) :
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

                 <input required value="<?php echo e($caisse->date_en); ?>" class="form-control  <?php if ($errors->has('date_en')) :
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
                <input required type="text" value="<?php echo e($caisse->ref_paiement); ?>" name="ref_paiement" class="form-control">

               </div>
                <div class="form-group col-md-6" >  <label for="imputation">Imputation</label>
                <input required type="text" value="<?php echo e($caisse->imputation_id); ?>" class="form-control" name="imputation" id="imputation" autocomplete="off">
                  <div class="list_im" id="imp_res" style="display: none;">
                    <ul class="list-group">
                    </ul>
                  </div>
               </div>
                <div class="form-group col-md-6" >  <label for="fonction">Libellé</label>
                  <input required type="text" value="<?php echo e($caisse->libelle); ?>" class="form-control" id="libelle" name="libelle">
               </div>
                <div class="form-group col-md-6" >  <label for="num_facture">N° Facture</label>

                 <input required value="<?php echo e($caisse->num_facture); ?>" class="form-control  <?php if ($errors->has('num_facture')) :
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
                     <option value="<?php echo e($fournisseur->id); ?>" <?php echo e(($fournisseur->id == $caisse->tiers ) ? 'selected' : ''); ?>><?php echo e($fournisseur->name); ?></option>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </select>
                  <?php if ($errors->has('tiers')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('tiers'); ?>
                      <span class="invalid-feedback" role="alert">
                          <strong><?php echo e(@$message); ?></strong>
                      </span>
                  <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
               </div>
                <div class="form-group col-md-6" >  <label for="ligne_budget">Ligne budget</label>

                 <input value="<?php echo e($caisse->ligne_budget); ?>" autocomplete="off" class="form-control  <?php if ($errors->has('ligne_budget')) :
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
                  <?php if($caisse->type !='depense'): ?>
                  <option value="cheque">Chèque</option>
                  <option value="v_mtn">Virement MTN</option>
                  <?php endif; ?>
                  <option value="espece">Espece</option>
                </select>

               </div>
                <div class="col-md-12" >  
                <label for="fonction">Joindre le réçu </label><br>
                  <input type="file" class="form-control" name="recupdf">
                  <small>Type de fichier acceptable PDF</small>
               </div>
               <div class="form-group col-md-12">
                 <label for="description">Observation</label>
                 <textarea name="observation" id="observation" cols="30" rows="10" class="form-control"><?php echo e($caisse->observation); ?></textarea>
               </div>                      
              </div>
            </div>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_caisses')): ?>
            <div class="row">
              <div class="col-12">
                <button type="submit" class="btn btn-success float-right">Enregister</button>
                
                <button type="reset" class="btn btn-default float-right">Annuler</button>
              </div>
            </div>
            <?php endif; ?>
          </form>
      </div>
    </div>
  </div>
</div>

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
              $('#imputation').val(code);
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
<?php echo $__env->make('admin.layouts.admin',['title'=>'Modifier l\'enregistrement '.$caisse->code], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/recensement-2021.com/resources/views/admin/caisses/edit.blade.php ENDPATH**/ ?>