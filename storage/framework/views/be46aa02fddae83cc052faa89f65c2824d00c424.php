
<?php
  $days = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30];
  $mois = ['Janvier'=>1,'Fevrier'=>2,'Mars'=>3,'Avril'=>4,'Mai'=>5,'Juin'=>6,'Juillet'=>7,'Aout'=>8,'Septembre'=>9,'Octobre'=>10,'Novembre'=>11,'Decembre'=>12];
?>
<?php $__env->startSection('style'); ?>

<style>
  table.abs td.day{
    width: 32px !important;
    height: 32px !important;
    padding: 5px !important;
    text-align: center;
    font-weight: 900;
    color: red;
  }
   table.abs td.day:hover{
    background: gray;
    cursor: pointer;
   }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="col-12">
            <form action="<?php echo e(route('abscences.index')); ?>" method="GET" class="input-group no-border">
            <input type="text" value="<?php echo e(@$_GET['search']); ?>" name="search" class="form-control" placeholder="Recherche de matricule">
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
           <div class="row">
  <div class="col-12 float-right">
    <a href="<?php echo e(route('abscences.index')); ?>" class="btn btn-success btn-sm">Projet</a>
    <a href="<?php echo e(route('formations.index')); ?>" class="btn btn-info btn-sm">Formation</a>
  </div>
</div>

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
        <small>Survoller la lettre <em class="text-danger">A</em> pour voir le motif de l'absence</small>
        <div class="table-responsive">
           <table class="table table-bordered abs">
          <thead>
            <tr>
              <th>Personnels</th>
              <th>1</th>
              <th>2</th>
              <th>3</th>
              <th>4</th>
              <th>5</th>
              <th>6</th>
              <th>7</th>
              <th>8</th>
              <th>9</th>
              <th>10</th>
              <th>11</th>
              <th>12</th>
              <th>13</th>
              <th>14</th>
              <th>15</th>
              <th>16</th>
              <th>17</th>
              <th>18</th>
              <th>19</th>
              <th>20</th>
              <th>21</th>
              <th>22</th>
              <th>23</th>
              <th>24</th>
              <th>25</th>
              <th>26</th>
              <th>27</th>
              <th>28</th>
              <th>29</th>
              <th>30</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $personnels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $personnel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td class="text-capitalize text-left" data-user="<?php echo e($personnel->id); ?>" style="padding: 5px !important"><?php echo e($personnel->nom.' '.$personnel->prenoms); ?> <span class="badge badge-info"><?php echo e(@$personnel->absMois(( isset($_GET['mois']))? $_GET['mois']:date('m') )->count()); ?></span></td>
                  <?php $__currentLoopData = $days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <td class="day" day=<?php echo e($day); ?>>
                    <?php $__currentLoopData = $personnel->absMois(( isset($_GET['mois']))? $_GET['mois']:date('m') ); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $abs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php echo (\Carbon\Carbon::parse($abs->date_abs)->format('d')==$day)?'<span title="'.$abs->motif.'">A</span>':''; ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </td>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
        </div>
        <?php echo e($personnels->links()); ?>

      </div>
    </div>
  </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="motif" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <label class="modal-title">Motif de l'abscence</label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <textarea name="motif" id="motifValue" class="form-control" required cols="30" rows="10"></textarea>
      </div>
      <div class="modal-footer">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add_abscences')): ?>
        <button type="submit" id="saveMotif" class="btn btn-primary">Enregistrer</button>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_abscences')): ?>
        <button type="reset" id="deleteMotif" class="btn btn-danger float-right" >Supprimer</button>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
  $(document).ready(function() {
    $('td.day').click(function() { 
      $('td').each(function(index, el) {
         $(this).removeClass('selected');
      });

      $(this).addClass('selected');

      $('#motifValue').val($(this).children('span').attr('title'));
      $('#motif').modal('show');
    });

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add_abscences')): ?>
    $('#saveMotif').click(function() {
      var td = $('td.selected');
      var user_id = td.parent('tr').children('td[data-user]').attr('data-user');
      var month = <?php echo e(( isset($_GET['mois']))? $_GET['mois']:date('m')); ?>;
      var year = <?php echo e(session('campagne')); ?>;
      var day = td.attr('day');  

      var motif = $('#motifValue').val();
      var abs = $('#motif').attr('motif_id');
      if ($.trim(motif) != "") {
        $.ajax({
           url: "<?php echo e(route('abscences.store')); ?>",
           type: 'POST',
           data: {
            'user': user_id,
            'date': year+'-'+month+'-'+day,
            'motif': motif,
            "_token": "<?php echo e(csrf_token()); ?>",
           },
          success:function(data){
            if (data[0]==='add') {
              $('#motif').attr('motif_id', data[1]);
              td.html("<span title="+data[2]+">A</span>");
              var badge = td.parent('tr').children('td:first-child').children('span');
              badge.text(parseInt(badge.text())+1);
              $('#motif').modal('toggle');
            }else{
              td.text(' ');
            }
          } 
       });
      } else {
        alert('Echec de l\'enregistrement, motif obligatoire');
      }
    });
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_abscences')): ?>
    $('#deleteMotif').click(function() {
      var td = $('td.selected');
      var user_id = td.parent('tr').children('td[data-user]').attr('data-user');
      var month = <?php echo e(( isset($_GET['mois']))? $_GET['mois']:date('m')); ?>;
      var year = <?php echo e(session('campagne')); ?>;
      var day = td.attr('day');  
      var abs = $('#motif').attr('motif_id');
        $.ajax({
           url: "<?php echo e(route('abscences.store')); ?>",
           type: 'POST',
           data: {
            'user': user_id,
            'date': year+'-'+month+'-'+day,
            'del': true,
            "_token": "<?php echo e(csrf_token()); ?>",
           },
          success:function(data){
             td.html("");
             var badge = td.parent('tr').children('td:first-child').children('span');
              badge.text(parseInt(badge.text())-1);
            $('#motif').modal('toggle');
          } 
       });
    });
    <?php endif; ?>
  });

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin',['title'=>'Gestion des abscences' ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/recensement-2021.com/resources/views/admin/abscences/index.blade.php ENDPATH**/ ?>