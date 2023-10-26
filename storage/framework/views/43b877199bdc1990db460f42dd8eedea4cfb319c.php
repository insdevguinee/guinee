
<?php
  $mois = ['Janvier'=>1,'Fevrier'=>2,'Mars'=>3,'Avril'=>4,'Mai'=>5,'Juin'=>6,'Juillet'=>7,'Aout'=>8,'Septembre'=>9,'Octobre'=>10,'Novembre'=>11,'Decembre'=>12];
?>

<?php $__env->startSection('style'); ?>
<!-- Pick a theme, load the plugin & initialize plugin -->
<link href="<?php echo e(asset('admin/dist/css/theme.default.min.css')); ?>" rel="stylesheet">

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        
         <form action="" id="date">
          <select class="form-control col-md-2" name="mois">
         <?php $__currentLoopData = $mois; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <option value="<?php echo e($value); ?>" <?php echo e(( isset($_GET['mois']) ) ? ( ($_GET['mois'] == $value)? 'selected' : ' ' ) : ( (date('m') == $value ) ? 'selected' : ' ' )); ?> ><?php echo e($m); ?></option>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <button type="submit" class="btn btn-default col-md-2" >Valider</button>
        </form>
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th width="110px">Direction</th>
              <th>Portefeuille</th>
              <th>Solde</th>
              <th>Personnels</th>
              <th>Salaire</th>
              <th>Net à payer</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $directions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $direction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
             <td class="text-uppercase"><?php echo e($direction['direction']); ?></td>
             <td><?php echo e($direction['portefeuille']); ?></td>
             <td><?php echo e($direction['sold']); ?></td>
             <td><?php echo e($direction['personnels']); ?></td>
             <td><?php echo e($direction['salaire']); ?></td>
             <td><?php echo e($direction['netPayer']); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
          </table>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin',['title'=>'Récapitulatif'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/clients/6ec092764b90fcd42777971432306baa/sites/recensement-2021.com/resources/views/admin/recap/index.blade.php ENDPATH**/ ?>