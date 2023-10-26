
<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-12">
  	<div class="card">
  	  <div class="card-header">Paiement</div>
  	  <div class="card-body">
  	    <h5 class="card-title">Configuration Paiement</h5>
  	   	<div class="table table-bordered">
  	   		 <table>
  	    	<thead>
  	    		<tr  class="text-capitalize">
  	    			  <th>Salaire</th>
  	    			  <th>prime</th> 
	                  <th>transport</th> 
	                  <th>mise_route</th> 
	                  <th>conges</th> 
	                  <th>gratification</th> 
	                  <th>carburant</th> 
	                  <th>guide</th> 
	                  <th>communication</th> 
	                  <th>perdiem</th> 
	                  <th>internet</th> 
	                  <th>Prime Non Imp</th> 
	                  <th>avance</th> 
  	    		</tr>
  	    	</thead>
  	    	<tbody>
  	    		  <?php echo e(Form::model($config, ['route' => array('configs.update', 1), 'method' => 'PUT','style'=>'width:100%;display:contents !important'])); ?>

  	    		<tr class="text-center">
  	    			<td ><input type="checkbox" <?php echo e((@$config['salaire'] == 1 ) ? 'checked':''); ?> name="salaire"></td>
  	    			<td ><input type="checkbox" <?php echo e((@$config['prime'] == 1 ) ? 'checked':''); ?> name="prime"></td>
  	    			<td ><input type="checkbox" <?php echo e((@$config['transport'] == 1 ) ? 'checked':''); ?> name="transport"></td>
  	    			<td ><input type="checkbox" <?php echo e((@$config['mise_route'] == 1 ) ? 'checked':''); ?> name="mise_route"></td>
  	    			<td ><input type="checkbox" <?php echo e((@$config['conges'] == 1 ) ? 'checked':''); ?> name="conges"></td>
  	    			<td ><input type="checkbox" <?php echo e((@$config['gratification'] == 1 ) ? 'checked':''); ?> name="gratification"></td>
  	    			<td ><input type="checkbox" <?php echo e((@$config['carburant'] == 1 ) ? 'checked':''); ?> name="carburant"></td>
  	    			<td ><input type="checkbox" <?php echo e((@$config['guide'] == 1 ) ? 'checked':''); ?> name="guide"></td>
  	    			<td ><input type="checkbox" <?php echo e((@$config['communication'] == 1 ) ? 'checked':''); ?> name="communication"></td>
  	    			<td ><input type="checkbox" <?php echo e((@$config['perdiem'] == 1 ) ? 'checked':''); ?> name="perdiem"></td>
  	    			<td ><input type="checkbox" <?php echo e((@$config['internet'] == 1 ) ? 'checked':''); ?> name="internet"></td>
  	    			<td ><input type="checkbox" <?php echo e((@$config['prime_ni'] == 1 ) ? 'checked':''); ?> name="prime_ni"></td>
  	    			<td ><input type="checkbox" <?php echo e((@$config['avance'] == 1 ) ? 'checked':''); ?> name="avance"></td>
  	    		</tr>
  	    		<tr>
  	    			<td colspan="13">
  	    				<button class="btn btn-sm btn-info float-right">Valider</button>
  	    			</td>
  	    		</tr>	
  	    		<?php echo e(Form::close()); ?>

  	    	</tbody>
  	    </table>
  	   	</div>

  	    <p class="card-text">Cochez les champs à prendre en compte dans le calcule du net à payer dans Paiement</p>
  	  </div>
  	</div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin',['title'=>'Configuration'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/recensement-2021.com/resources/views/admin/config/data.blade.php ENDPATH**/ ?>