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
			p{
				font-size: 15px;margin: 0px;
			}
			tr{
				height: 50px;

			}
			td,th{
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
				<div class="col-md-12 text-center">
					<p style="margin-bottom: 5px; font-size: 12px;"><strong>REPUBLIQUE DE LA GUINEE</strong></p><div class="clearfix"></div>
					<div class="logo">
						<img src="<?php echo e(asset('/img/am.jpg')); ?>" style="height: 70px">
					</div>
					<p style="margin-bottom: 5px; font-size: 12px;">  Travail - Justice - Solidarité </p>
					<p><strong>MINISTERE DU PLAN ET DU DEVELOPPEMENT</strong></p><br>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="row" style="margin-top: 20px;">
				<div class="col-12">
					<div class="section">
						<img src="<?php echo e(asset('/img/logo.png')); ?>" style="float: left; width:100px;" ><br>
					</div>
					<div class="section">
					<!--	<img src="<?php echo e(asset('/img/logobtpr.png')); ?>" style="float: right; width:200px;" > -->
					</div>
				</div>

			</div>
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-12"><br><br>
					<p><strong>Direction Nationale</strong></p><br>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-12">
					<p><strong>Le Coordonnateur Technique</strong> <strong style="float: right;">Conakry, le 22 Février 2023</strong></p> <br>
					
					<p><strong>N°00431/DN/CT</strong></p>
					
					<div class="text-center">
						<H4 style="font-weight: 700;margin-bottom: 0px;"><u>ORDRE DE MISSION</u></H4>
						<p style="margin-top: 0;">GUINEE</p><br>
					</div>
					<div>
						<p><strong>Le Coordonnateur Technique du Recensement de la Population 2023 </strong>donne l’ordre à :</p><br>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="clearfix"></div>
				<div class="col-12">
					<table style="width: 100%;">
						<tbody>
							<tr>
								<th>MESDAMES/MESSIEURS</th>
								<td>: 
									<?php $__currentLoopData = $personnels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $personnel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<span class="text-uppercase"><?php echo e(@$personnel->nom.' '.@$personnel->prenoms); ?></span> (<?php echo e(@$personnel->fonction->libelle); ?>)<br>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</td>
							</tr>
							<tr>
								<th>LIEU DE LA MISSION</th>
								<td class="text-uppercase">:  <?php echo e(@$personnel->direction->libelle); ?></td>
							</tr>
							<tr>
								<th>OBJET DE LA MISSION</th>
								<td>: FORMATION DES AGENTS RECENSEURS </td>
							</tr>
							<tr>
								<th>DATE DE DEPART</th>
								<td>: 14 OCTOBRE 2023</td>
							</tr>
							<tr>
								<th>DATE DE RETOUR</th>
								<td>: 02 NOVEMBRE 2023</td>
							</tr>
							<tr>
								<th>MOYEN DE DEPLACEMENT</th>
								<td>: VEHICULE</td>
							</tr>
							<tr>
								<th>IMPUTATION BUDGETAIRE </th>
								<td>: Recensement de la Population 2023</td>
							</tr>
						</tbody>
					</table>
				</div>
			
			</div>
			<div class="row">
					<div class="clearfix"></div>
			  <div class="text-center float-right">
						<strong>
							
						<img src="<?php echo e(asset('img/signe2.png')); ?>" alt="" style="width: 200px;margin-top: 10px"> <br>
						<div class="float-right d-block mt-1">
							
						</div>
						</strong>
					</div>
				<div class="col-12">
					<br><br><br><p style="float: right;"><strong>Makan DOUMBOUYA</strong></p> <br>
					<br>
					<br>
				</div>
			</div>
			<div class="row" style="display: block;position: fixed;width: 100%;bottom: 10px;border-top: double 2px black;">
				<div class="col-12">
					<p class="text-center">Siège : Conakry – Tel :  625 88 67 32 /  625 88 67 04 <br>
www.stat-guinee.org – Facebook : RGPH2023 – Twitter : Recensement2023
</p>
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
</html><?php /**PATH /Applications/MAMP/htdocs/guinee/resources/views/admin/personnels/ompdf.blade.php ENDPATH**/ ?>