<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>PDF</title>

		<!-- Bootstrap CSS -->
		<link href="<?php echo e(public_path('admin/css/bootstrap.min.css')); ?>" rel="stylesheet" />
  		<link href="<?php echo e(public_path('admin/css/paper-dashboard.css')); ?>?v=2.0.0" rel="stylesheet" />
		<style>
			p{
				font-size: 15px;margin: 0px;
			}
			tr{
				height: 50px;
			}
			td,th{
				height: 40px !important;
			}
			table{
				font-size: 15px;
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
				<div class="col-md-6">
					<div class="logo">
						<img src="<?php echo e(public_path('/img/drapeau-gn.png')); ?>" style="height: 100px">
						<img src="<?php echo e(public_path('/img/armoirie-gn.png')); ?>" style="height: 90px">
					</div>
				</div>

				<div class="col-md-6 text-right">
					<p style="margin-bottom: 5px; font-size: 15px;"><strong>REPUBLIQUE DE LA GUINEE</strong></p><div class="clearfix"></div>
					<p style="margin-bottom: 5px; font-size: 10px;">  Travail - Justice - Solidarité </p>
					<p style="margin-bottom: 5px; font-size: 10px;">  Conakry, le 1<sup>er</sup> Septembre 2023 </p>
				</div>
			</div>
			<div class="clearfix"></div>

			<div class="row" style="margin-top: 5px;">
				<div class="col-12">
					<div class="section">
						<p><strong>MINISTERE DU PLAN</strong></p>
						<p><strong>ET DE LA COOPERATION INTERNATIONALE</strong></p>
						<p style="font-size: 18px"><strong>INSTITUT NATIONAL DE LA STATISTIQUE</strong></p>
					</div>
				</div>
			</div>
			
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-12">							
					<div class="text-center">
						<H4 style="font-weight: 700;margin-bottom: 0px; font-size:27px;"><u>ORDRE DE MISSION</u></H4>
						<p style="margin-top: 0;font-size: 17px;">N° &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;INS/DGA/DG/CTP/2023</p><br>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="clearfix"></div>
				<div class="col-12">
					<table style="width: 100%;">
						<tbody>
							<tr>
								<td style="vertical-align: top"> <strong>Il est ordonné à :</strong> </td>
								<td> 
									<?php $__currentLoopData = $personnels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $personnel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<span class="text-uppercase"><?php echo e(@$personnel->nom.' '.@$personnel->prenoms); ?></span> (<?php echo e(ucwords(@$personnel->fonction->libelle)); ?>)<br>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

									<?php if(isset($conducteurs)): ?>
                                        <?php $__currentLoopData = $conducteurs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $conducteur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <span class="text-uppercase">
                                            <?php echo e(@$conducteur->name); ?> <?php echo e(@$conducteur->last_name); ?>

                                            </span> (Chauffeur) <br/>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php endif; ?>

								</td>
							</tr>
							<tr>
								<th>De se rendre à </th>
								<td class="text-uppercase">: <?php echo e(@$personnel->direction->libelle); ?>.</td>
							</tr>
							<tr>
								<th>Objet de la Mission</th>
								<td>Enquête pilote pour la collecte des données de la cartographie censitaire du RGPH-4 </td>
							</tr>
							<tr>
								<th>Date de départ</th>
								<td>: 2 Septembre 2023</td>
							</tr>
							<tr>
								<th>Durée de la Mission</th>
								<td>: 21 Jours</td>
							</tr>
							<tr>
								<th>Moyen de Transport</th>
								<td>: <?php echo e(@$conducteur->brand_car); ?> <?php echo e(@$conducteur->number_car); ?> </td>
							</tr>
							<tr>
								<td style="vertical-align: top"> <strong>Moto</strong> </td>
								<td>:
									<?php $__currentLoopData = $engins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $engin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<span class="text-uppercase"><?php echo e(@$engin->brand.' '.@$engin->number); ?></span>,  
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</td>
							</tr>

							<tr>
								<td colspan="2" style="font-size: 19px;">									
									Les autorités civiles et militaires des Regions, Prefectures, Sous-prefectures et Communes 
									traversées sont priées de bien vouloir faciliter l'accomplissement de la mission.
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			
			</div>
			
			<div class="row">
				<div class="col-12 text-right" style="font-size: 19px;">
					Le Coordinateur National Adjoint
					<figure>
						<img src="<?php echo e(public_path('img/sign-dga.png')); ?>" alt="" style="width: 100px;margin-top: 10px">
						<img src="<?php echo e(public_path('img/cachet-dga.png')); ?>" alt="" style="width: 100px;margin-top: 10px">
					</figure>
					Mamadou CAMARA
				</div>
			</div>

			<div class="row" style="display: block;position: fixed;width: 100%;bottom: 10px;border-top: double 2px black;">
				<div class="col-12">
					<p class="text-center"> BP : 221, Conakry, Tél : (+224) 60 30 41 45 67 ; Fax : (+224) 30 41 30 59 </p>
					<p class="text-center"> <i>République de Guinée</i> </p>
				</div>
			</div>
		</div>

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html><?php /**PATH C:\Users\DIATAS\Desktop\DIATAS\INS\app\guinee\resources\views/admin/personnels/ompdf.blade.php ENDPATH**/ ?>