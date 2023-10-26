<?php
$i =1;
$tnetpayer =0;
$tsalaire =0;
$tavance =0;
$tmr =0;
$tfrais = 0;
$ttransport =0;
$tcarburant =0;
$tperdiems =0;
$tcommunication =0;
$tinternet = 0;
$tguide =0;
?>
<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php
	$tnetpayer += ($user['etat'] == 2) ? $user['salaireformation'] : $user['salaire'];
	$tsalaire +=$user['brut_social'];
	// $tff += $user['FRAISF'] ;
	$tmr +=$user['mise_route'];
	$ttransport +=$user['transport'];
	$tcarburant += $user['carburant'];
		$tperdiems += $user['perdiem'] ;
	$tcommunication += $user['communication'];
	$tguide += $user['guide'];
	$tfrais +=$user['frais'];
	$tavance += $user['avance'];
?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>PDF</title>

		<!-- Bootstrap CSS -->
		<link href="<?php echo e(asset('admin/css/bootstrap.min.css')); ?>" rel="stylesheet" />
  		<link href="<?php echo e(asset('admin/css/paper-dashboard.css')); ?>?v=2.0.0" rel="stylesheet" />
		<style>
			body{
				font-size: 10px;
			}
			.location{
				font-size: 16px;
			}
			tr{
				height: 25px;
			}
			td,th{
				padding-left: 5px;
				height: 40px !important;
			}
		</style>
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-3">
					<div class="logo">
						<img src="<?php echo e(asset('/img/partenaires/logo.png')); ?>" alt="logo" style="width: 100px">
					</div>
				</div>
				<h4 class="col-8 float-right text-uppercase">
					ETAT DES <?php echo e(@$users[0]['fonction']); ?> DANS LE CADRE DU RECENSEMENT DE LA POPULATION <?php echo e(session('campagne')); ?>

				</h4>
			</div>
			<div class="row mt-1">
				<div class="col-3">
					<p>Décret N°96-975 du 18 décembre 1996 <br>
					Siège social : Cité Adm. Tour C 2ème étage
					</p>
					<h5>DRHAJ/DRH</h5>
				</div>
				<p  class="col-8 float-right location" >
				Lieu : <span class="text-uppercase"><?php echo e(@$infos['departement']); ?></span> <br>
				Mois : <span class="text-uppercase"> <?php echo e(\Carbon\Carbon::parse(@$infos['date'])->startOfMonth()->format('F')); ?></span> <br>
				Objet : <span class="text-uppercase">Formation des <?php echo e(@$users[0]['fonction']); ?>   <span class="text-uppercase"><?php echo e(@$infos['fonction']); ?></span></span> <br>
				Date d'émission : <span class="text-uppercase"> <?php echo e(explode('00:00',\Carbon\Carbon::parse(date('d-m-Y'),'UTC')->locale('fr_FR')->isoFormat('LLLL'))[0]); ?></span>
				</p>

			</div>
			<div class="clearfix"></div>
			<div class="row">
				<p class="col-12 float-left">
					<strong><i>Service Rénumértion</i></strong> <br>
					<strong>BUDGET : RECENSEMENT DE LA POPULATION <?php echo e($infos['annee']); ?></strong>
				</p>
			</div>
			<div class="clearfix"></div>
			<div class="row mt-1">
				<div class="col-12">
					<table class="table-bordered" style="width: 100%;">
						<thead>
							<tr>
								<th>N°</th>
								<th>NOM ET PRENOMS</th>
								
								<th>MOBILE MONEY</th>
								<th>NBRE JOUR</th>
								
								<?php if($tmr != 0): ?>
								<th>MISE EN ROUTE</th>
								<?php endif; ?>
								<?php if($ttransport != 0): ?>
								<th>TRANSPORT</th>
								<?php endif; ?>
								<?php if($tcarburant !=0): ?>
								<th>CARBURANT</th>
								<?php endif; ?>
								<?php if($tperdiems !=0): ?>
								<th>PERDIEMS</th>
								<?php endif; ?>
								<?php if($tcommunication !=0): ?>
								<th>COMMUNICATION</th>
								<?php endif; ?>
								<?php if($tinternet !=0): ?>
								<th>INTERNET</th>
								<?php endif; ?>
								<?php if($tguide !=0): ?>
								<th>GUIDE</th>
								<?php endif; ?>
								<?php if($tavance !=0): ?>
								<th>AVANCE</th>
								<?php endif; ?>
								
								<th>FRAIS</th>
								<?php if($tnetpayer !=0): ?>
								<th>NET A PAYER</th>
								<?php endif; ?>
								<th>  EMARGEMENT  </th>
								
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($i++); ?></td>
								<td><?php echo e($user['nom']); ?> <br> <small><?php echo e($user['matricule']); ?></small></td>
								
								<td><?php echo e($user['mm']); ?></td>
								<td><?php echo e($user['jour']); ?></td>
								<?php if($tmr != 0): ?>
								<td><?php echo e(number_format($user['mise_route'] ,0, ',' , ' ')); ?></td>
								<?php endif; ?>
								<?php if($ttransport != 0): ?>
								<td><?php echo e(number_format($user['transport'],0,',',' ')); ?></td>
								<?php endif; ?>
								<?php if($tcarburant !=0): ?>
								<td><?php echo e(number_format($user['carburant'],0,',',' ')); ?></td>
								<?php endif; ?>
								<?php if($tperdiems !=0): ?>
								<td><?php echo e(number_format($user['perdiem'],0,',',' ')); ?></td>
								<?php endif; ?>
								<?php if($tcommunication !=0): ?>
								<td><?php echo e(number_format($user['communication'],0,',',' ')); ?></td>
								<?php endif; ?>
								<?php if($tinternet !=0): ?>
								<td><?php echo e(number_format($user['internet'],0,',',' ')); ?></td>
								<?php endif; ?>
								<?php if($tguide !=0): ?>
								<td><?php echo e(number_format($user['guide'],0,',',' ')); ?></td>
								<?php endif; ?>
								<?php if($tavance !=0): ?>
								<td><?php echo e(number_format($user['avance'],0,',',' ')); ?></td>
								<?php endif; ?>
								
								<td><?php echo e(number_format($user['frais'],0, ',', ' ')); ?></td>
								<?php if($tnetpayer !=0): ?>
									<?php if($user['etat'] == 2): ?>
										<td><?php echo e(number_format($user['salaireformation'],0,',',' ')); ?></td>
									<?php else: ?>
										<td><?php echo e(number_format($user['salaire'],0,',',' ')); ?></td>
									<?php endif; ?>
								<?php endif; ?>
								<td></td>
								
							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
						<tfoot>
							<tr>
								<th></th>
								<th>TOTAL</th>
								<th></th>
								<th></th>
								<?php if($tmr != 0): ?>
								<th><?php echo e(number_format($tmr,0,',',' ')); ?></th>
								<?php endif; ?>
								<?php if($ttransport != 0): ?>
								<th><?php echo e(number_format($ttransport,0,',',' ')); ?></th>
								<?php endif; ?>
								<?php if($tcarburant !=0): ?>
								<th><?php echo e(number_format($tcarburant,0,',',' ')); ?></th>
								<?php endif; ?>
								<?php if($tperdiems !=0): ?>
								<th><?php echo e(number_format($tperdiems,0,',',' ')); ?></th>
								<?php endif; ?>
								<?php if($tcommunication !=0): ?>
								<th><?php echo e(number_format($tcommunication,0,',',' ')); ?></th>
								<?php endif; ?>
								<?php if($tinternet !=0): ?>
								<th><?php echo e(number_format($tinternet,0,',',' ')); ?></th>
								<?php endif; ?>
								<?php if($tguide !=0): ?>
								<th><?php echo e(number_format($tguide,0,',',' ')); ?></th>
								<?php endif; ?>
								<?php if($tavance !=0): ?>
								<th><?php echo e(number_format($tavance,0,',',' ')); ?></th>
								<?php endif; ?>
								
								<th><?php echo e(number_format($tfrais,0, ',', ' ')); ?></th>
								<?php if($tnetpayer !=0): ?>
								<th><?php echo e(number_format($tnetpayer,0,',',' ')); ?></th>
								<?php endif; ?>
								<th></th>

								
							</tr>
						</tfoot>
					</table>
				</div>
			</div>

			<div class="row mt-3">
				<div class="col-12">
					<div class="text float-left">
						<strong>
							Le Coordinateur Technique Chargé <br>
						de l'Administration et des Finances <br>
						<img src="<?php echo e(asset('img/signe2.png')); ?>" alt="" style="width: 100px;margin-top: 10px;"><br>
						<div class="float-left d-block mt-1">
							
						</div>
						</strong>
					</div>
					<div class="text-center float-right">
						<strong>
							Le Directeur National<br>
						<img src="<?php echo e(asset('img/signe2.png')); ?>" alt="" style="width: 100px;margin-top: 10px"> <br>
						<div class="float-right d-block mt-1">
							Makan DOUMBOUYA
						</div>
						</strong>
					</div>
				</div>
			</div>
			<div class="row">

			</div>

		</div>

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>
<?php /**PATH /Applications/MAMP/htdocs/guinee/resources/views/admin/paies/pdf.blade.php ENDPATH**/ ?>