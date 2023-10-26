<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
  <?php echo $__env->make('admin.layouts.links.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body class="" style="    background-color: #f4f3ef;">
  <div id="loader"></div>
  <div class="wrapper ">
    <div class="main-panel">
      <?php echo $__env->make('admin.layouts.links.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <div class="content">
         <div class="row">
          <div class="col-12">
            <h4 class="d-inline-block float-left" style="margin: 0px;"><?php echo e(@$title); ?></h4>
            <div class="clearfix"></div>
            <hr>
          </div>
        </div>
        <?php echo $__env->yieldContent('content'); ?>
            <!-- Button trigger modal -->
    

    <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(!session('campagne')): ?>
    <!-- Modal -->
    <div class="modal fade" id="campagneModal" tabindex="-1" role="dialog" aria-labelledby="campagneModalTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-center" id="campagneModalTitle">Année Exercice</h5>
           
          </div>
           <form action="<?php echo e(route('campagne')); ?>" method="POST">
            <?php echo csrf_field(); ?>
          <div class="modal-body">
              <div class="form-group">
                <select name="campagne" id="campagne" class="form-control">
                  <?php $__currentLoopData = \App\Campagne::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $campagne): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($campagne->name); ?>" <?php echo e(($campagne->name == session('campagne'))?'selected':' '); ?>><?php echo e($campagne->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>  
          </div>
          <div class="modal-footer justify-content-center">
            
            <button type="submit" class="btn btn-primary mb-auto">Valider</button>
          </div>
           </form>
        </div>
      </div>
    </div>
    <?php endif; ?>

      </div>
    
      <footer class="footer footer-black  footer-white ">
        <div class="container">
          <div class="row">
          
              <div class="col-12 text-center">
                
                
              </div>
            
          </div>
        </div>
      </footer>
    </div>
  </div>

  <?php echo $__env->make('admin.layouts.links.foot', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <?php echo $__env->yieldContent('script'); ?>
   <?php if(!session('campagne')): ?>
  <script>
    jQuery(document).ready(function($) {
      $('#campagneModal').modal(
        {
          show:true,
          backdrop: 'static',
          keyboard: false
       } )
    });
  </script>
  <?php endif; ?>
</body>

</html>
<?php /**PATH /Applications/MAMP/htdocs/recensement-2021.com/resources/views/admin/layouts/admin.blade.php ENDPATH**/ ?>