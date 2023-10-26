

<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">
  <div class="col-md-4">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newDirection">
      Nouvelle direction
    </button>
    
    <!-- Modal -->
    <div class="modal fade" id="newDirection" tabindex="-1" role="dialog" aria-labelledby="newDirectionTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="newDirectionTitle">Creer une direction</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?php echo e(route('directions.store')); ?>" method="POST">
              <?php echo csrf_field(); ?>
          <div class="modal-body">
            
              <div class="form-group">
                <input type="text" name="libelle" class="form-control" placeholder="Nom">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
          </div>

            </form>
        </div>
      </div>
    </div>
    <div class="table">
      <table class="table table-bordered">
        <thead>
         <tr>
            <th colspan="2" class="text-center">Nom</th>
         </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $directions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $direction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td class="text-capitalize"><?php echo e($direction->libelle); ?></td>
            <td>
              <a href="#">Modifier</a> | 
              <form action="<?php echo e(route('directions.destroy',$direction->id)); ?>" method="POST" class="d-inline-block" onsubmit="return show_alert();">
                <?php echo csrf_field(); ?>
                <?php echo method_field("DELETE"); ?>
             
                <input type="submit" value="Supprimer" class="btn btn-danger"  >
               </form>
            </td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
      <?php echo e($directions->links()); ?>

    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin',['title'=>'Directions'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/clients/6ec092764b90fcd42777971432306baa/sites/recensement-2021.com/resources/views/admin/directions/index.blade.php ENDPATH**/ ?>