
<?php $__env->startSection('style'); ?>
<!-- Pick a theme, load the plugin & initialize plugin -->
<link href="<?php echo e(asset('admin/dist/css/theme.default.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12">
     <div class="card">
      <div class="card-body">
        <div class="col-12">
            <form action="<?php echo e(route('budgets.index')); ?>" method="GET" class="input-group no-border">
            <input type="text" value="<?php echo e(@$_GET['search']); ?>" name="search" class="form-control" placeholder="Recherche ligne budgetaire CODE">
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
        <?php if(Auth::user()->hasRole('admin')): ?>
        <a href="<?php echo e(route('budgets.export')); ?>" type="button" class="btn btn-sm btn-default float-right">
         <i class="fa fa-download" aria-hidden="true"></i> Telecharger XLXS
        </a>
        <?php endif; ?>
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Code1</th>
              <th>Code2</th>
              <th>Ligne budget</th>
              <th>Compta</th>
              <th>Phase Operation</th>
              <th>Libellé</th>
              <th>Montant</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $budgets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $budget): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($budget->code1); ?></td>
                <td><?php echo e($budget->code2); ?></td>
                <td><?php echo e($budget->ligne_budget); ?></td>
                <td><?php echo e($budget->compta); ?></td> 
                <td><?php echo e($budget->phase_operation); ?></td>
                <td><?php echo e($budget->libelle); ?></td>
                <td>
                  <?php
                    $montant = \App\Caisse::where([['ligne_budget',$budget->ligne_budget],['direction_id',Auth::user()->direction->id]])->whereYear('created_at',session('campagne'))->sum('debit');
                    // $montant2 = \App\Caisse::where([['ligne_budget',$budget->ligne_budget],['direction_id',Auth::user()->direction->id]])->sum('credit');
                  ?>
                  <?php echo e($montant); ?>

                </td>  
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
        <?php if(!isset($_GET['search'])): ?>
        <?php echo e($budgets->links()); ?>

        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin',['title'=>'Budget'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/recensement-2021.com/resources/views/admin/budgets/index.blade.php ENDPATH**/ ?>