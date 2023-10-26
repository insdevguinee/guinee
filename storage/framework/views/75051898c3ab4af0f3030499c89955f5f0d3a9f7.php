<?php
  $admin = Auth::user()->hasRole('Admin|admin');
?>
<nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent" style="background:<?php echo e(Auth::user()->statut == 'attente' ? '#ffdb8f' : ' #fff'); ?> !important;position: fixed;">
        <div class="container-fluid">

          <div class="navbar-wrapper">
            <a class="navbar-brand" href="<?php echo e(route('admin')); ?>">
              <img src="<?php echo e(env('APP_LOGO')); ?>" alt="UBF" style="height: 50px;">
            </a>
             <form action="<?php echo e(route('direction')); ?>" method="POST">
                <?php echo csrf_field(); ?>
              <select name="direction" id="direction">
                <?php $__currentLoopData = Auth::user()->directions()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $direction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($direction->id); ?>" <?php echo e(($direction->id == session('direction'))?'selected':' '); ?>><?php echo e($direction->libelle); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
              <input type="submit" value="OK">
              </form>
               ||||
            
              <form action="<?php echo e(route('campagne')); ?>" method="POST">
                <?php echo csrf_field(); ?>
              <select name="campagne" id="campagne">
                <?php $__currentLoopData = \App\Campagne::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $campagne): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($campagne->name); ?>" <?php echo e(($campagne->name == session('campagne'))?'selected':' '); ?>><?php echo e($campagne->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
              <input type="submit" value="OK">
              </form>
            </span>
          </div>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav float-left">
              <li class="nav-item <?php echo e(active(route('admin'),'active')); ?>"><a href="<?php echo e(route('admin')); ?>" class="nav-link">Accueil</a></li>
               <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" id="Gestion" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Personnels
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Gestion">
                  <a class="dropdown-item" href="<?php echo e(route('personnels.index')); ?>">Personnels actifs</a>
                  <a class="dropdown-item" href="<?php echo e(route('personnels.attente')); ?>">Personnels en attente</a>
                  <a class="dropdown-item" href="<?php echo e(route('personnels.formation')); ?>">Personnels en formation</a>
                </div>
              </li>
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" id="Gestion" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gestion
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Gestion">
                  
                 
                  <a class="dropdown-item" href="<?php echo e(route('caisses.index')); ?>">Enregistrement Comptable</a>
                  <a class="dropdown-item" href="<?php echo e(route('depenses.index')); ?>">Menu Depense</a>
                    <hr style="margin: 0;">
                   <a class="dropdown-item" href="<?php echo e(route('abscences.index')); ?>">Gestion de presence</a>
                
                  <hr style="margin: 0;">
                  <a class="dropdown-item" href="<?php echo e(route('fournisseurs.index')); ?>">Fournisseurs</a>
                   <a href="<?php echo e(route('budgets.index')); ?>"  class="dropdown-item">Budget</a>
                  
                  
                </div>
              </li>
            
               <li class="nav-item">
                <a href="<?php echo e(route('paies.index')); ?>" class="nav-link">Paiement</a>
              </li>

           
              <?php if(Auth::user()->hasRole('admin|Admon')): ?>
              <li class="nav-item">
                <a href="<?php echo e(route('recap')); ?>" class="nav-link">Recap</a>
              </li>
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" id="admin" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="admin">
                  <a class="dropdown-item" href="<?php echo e(route('users.index')); ?>">Utilisateurs</a>
                  <a class="dropdown-item" href="<?php echo e(route('directions.index')); ?>">Directions</a>
                   <hr style="margin: 0;">
                  
                  <a class="dropdown-item" href="<?php echo e(route('roles.index')); ?>">Roles</a>
                  <a class="dropdown-item" href="<?php echo e(route('permissions.index')); ?>">Permissions</a>
                   <hr style="margin: 0;">
                   <a class="dropdown-item" href="<?php echo e(route('config.index')); ?>">Configuration</a>
                   <hr style="margin: 0;">
                </div>
              </li>
             
              <?php endif; ?>
            </ul>
            
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link btn-magnify" href="<?php echo e(route('index')); ?>">
                  <i class="nc-icon nc-layout-11"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Font</span>
                  </p>
                </a>
              </li>
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-circle-10"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Profil</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="<?php echo e(route('users.edit',[Auth::id()])); ?>">Mon profil</a>
                  
                  <hr style="margin: 0px;">
                  <a class="dropdown-item" href="#">Infos pratiques</a>
                   <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        <?php echo e(__('Deconnexion')); ?>

                    </a>

                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                        <?php echo csrf_field(); ?>
                    </form>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav><?php /**PATH /home/clients/6ec092764b90fcd42777971432306baa/sites/recensement-2021.com/resources/views/admin/layouts/links/navbar.blade.php ENDPATH**/ ?>