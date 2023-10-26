
<?php $__env->startSection('content'); ?>
	              <div class="row">
          
              <div class="col-lg-3 col-md-3 col-sm-6">
               <a href="<?php echo e(route('personnels.index')); ?>">
                  <div class="card card-stats">
                  <div class="card-body ">
                    <div class="row">
                      <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-info">
                          <i class="nc-icon nc-single-02 text-info"></i>
                        </div>
                      </div>
                      <div class="col-7 col-md-8">
                        <div class="numbers">
                          <p class="card-category">Mon <br> Personnel</p>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
               </a>
              </div>
              
              <div class="col-lg-3 col-md-3 col-sm-6">
                <a href="<?php echo e(route('caisses.index')); ?>">
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
                          <p class="card-category">Enregistrement<br>Comptable</p>
                          
                          </div>
                      </div>
                    </div>
                  </div>
               
                </div>
              </a>
              </div>

                    <div class="col-lg-3 col-md-3 col-sm-6">
                <a href="<?php echo e(route('depenses.index')); ?>">
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
                          <p class="card-category">Menu Depense</p>
                          
                          </div>
                      </div>
                    </div>
                  </div>
               
                </div>
              </a>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-6">
                <a href="<?php echo e(route('abscences.index')); ?>">
                <div class="card card-stats">
                  <div class="card-body ">
                    <div class="row">
                      <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-info">
                          <i class="nc-icon   nc-badge  text-info"></i>
                        </div>
                      </div>
                      <div class="col-7 col-md-8">
                        <div class="numbers">
                          <p class="card-category">Gestion<br>de presence</p>
                          
                            </p><p>
                        </p></div>
                      </div>
                    </div>
                  </div>
                 
                </div>
                </a>
              </div>
         
              <div class="col-lg-3 col-md-3 col-sm-6">
                <a href="<?php echo e(route('budgets.index')); ?>">
                  <div class="card card-stats">
                  <div class="card-body ">
                    <div class="row">
                      <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-info">
                          <i class="nc-icon nc-money-coins  text-info"></i>
                        </div>
                      </div>
                      <div class="col-7 col-md-8">
                        <div class="numbers">
                          <p class="card-category"><br>Budget</p>
                            </p><p>
                        </p></div>
                      </div>
                    </div>
                  </div>
                </div>
                </a>
              </div>

              <div class="col-lg-3 col-md-3 col-sm-6">
                <a href="<?php echo e(route('paies.index')); ?>">
                  <div class="card card-stats">
                    <div class="card-body ">
                      <div class="row">
                        <div class="col-5 col-md-4">
                          <div class="icon-big text-center icon-info">
                            <i class="nc-icon nc-money-coins  text-info"></i>
                          </div>
                        </div>
                        <div class="col-7 col-md-8">
                          <div class="numbers">
                            <p class="card-category"><br>Paiement</p>
                              </p><p>
                          </p></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              
              <div class="col-lg-3 col-md-3 col-sm-6">
               <a href="<?php echo e(route('fournisseurs.index')); ?>">
                  <div class="card card-stats">
                  <div class="card-body ">
                    <div class="row">
                      <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-info">
                          <i class="nc-icon nc-briefcase-24 text-info"></i>
                        </div>
                      </div>
                      <div class="col-7 col-md-8">
                        <div class="numbers">
                          <p class="card-category">Liste <br>Fournisseurs</p>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
               </a>
              </div>
            </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/clients/6ec092764b90fcd42777971432306baa/sites/recensement-2021.com/resources/views/admin/welcome.blade.php ENDPATH**/ ?>