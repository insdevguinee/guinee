<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
  <head>
    <meta charset="utf-8">
    <title>Connexion - <?php echo e(env('APP_NAME')); ?> DEMO</title>
    <link rel="icon" type="image/png" href="<?php echo e(env('APP_FACIVON')); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo e(asset('admin/css/bootstrap.min.css')); ?>" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/styles.css" />
  </head>
  <body>

    <div class="jumbotron mb-0 d-flex align-items-center flex-column justify-content-center text-center min-100" id="header" style="background-image: url(<?php echo e(asset('img/bg2.jpg')); ?>);background-size: cover;background-repeat: no-repeat;">
     <!--   <img src="<?php echo e(asset(env('APP_FACIVON'))); ?>" alt="" style="height: 50px;"> -->
      <p class="text-black-50"> UBF</p>
      <h4 class="text-light">Connexion</h4>
      <div class="lead">
          <div class="row">
            <div class="col-md-12 mt-auto mr-auto ml-auto">
              <div class="card bg-faded border-0 mb-3">
                    <div class="card-body">
                        <form method="POST" action="<?php echo e(route('login')); ?>" style="width: 100% !important">
                        <?php echo csrf_field(); ?>

                        <div class="form-group row">
                       
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus placeholder="Email">
                            </div>
                        </div>

                        <div class="form-group row">
                        
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="password" required autocomplete="current-password" placeholder="Mot de passe">

                                <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e(@$message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('Connexion')); ?>

                                </button>

                                <?php if(Route::has('password.request')): ?>
                                    <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                                       Mot de passe oublié ?
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </form>
                    </div>
                  </div>
                       <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
                                   <div class="card-body">
                                      <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e(@$message); ?></strong>
                                    </span>
                                   </div>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
            </div>
          </div>
         
      </div>
       <div class="row mt-4">
            <div class="col-md-12">
              <h4></h4>
              <div id="partenaire">
                <img src="<?php echo e(asset('img/partenaires/logo_1.jpeg')); ?>" style="height: 100px;border-radius: 30px;">
              </div>
              
            </div>
          </div>

  </div>

  <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <script src="<?php echo e(asset('admin/js/core/jquery.min.js')); ?>"></script>
  <script src="<?php echo e(asset('admin/js/core/bootstrap.min.js')); ?>"></script>
  <script src="<?php echo e(asset('admin/js/core/popper.min.js')); ?>"></script>
  <script>
    $('#flash-overlay-modal').modal();
  </script>
</html><?php /**PATH C:\Users\HP\Desktop\guinee\resources\views/auth/login.blade.php ENDPATH**/ ?>