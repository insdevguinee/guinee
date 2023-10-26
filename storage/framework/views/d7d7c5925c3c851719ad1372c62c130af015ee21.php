<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
  <?php echo $__env->make('layouts.links.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body> 
     <div class="container">
        <?php echo $__env->yieldContent('content'); ?>
     </div>
  <?php echo $__env->make('layouts.links.foot', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH /home/diatas/Bureau/INS/app/guinee/resources/views/layouts/app.blade.php ENDPATH**/ ?>