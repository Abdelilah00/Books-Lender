<?php

if ($_SESSION["loggedIn"]) { } else {
	header('location:index.php');
}
?>

<?php include 'api/statistique.php'; ?>

<div class="content">

	<div class="container-fluid">

		<div class="row">
			<div class="col-xl-12">
				<div class="breadcrumb-holder">
					<h1 class="main-title float-left">Tableau de bord</h1>
					<ol class="breadcrumb float-right">
						<li class="breadcrumb-item">Acceuil</li>
						<li class="breadcrumb-item active">tableau de bord</li>
					</ol>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<!-- end row -->

		<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-6 col-xl-6">
				<div class="card-box noradius noborder bg-default">
					<i class="fa fa-users float-right text-white"></i>
					<h6 class="text-white text-uppercase m-b-20">Utilisateurs</h6>
					<h1 class="m-b-20 text-white counter"><?php echo $u; ?></h1>
					<span class="text-white">le nombre totale des utilisateurs</span>
				</div>
			</div>

			<div class="col-xs-12 col-md-6 col-lg-6 col-xl-6">
				<div class="card-box noradius noborder bg-warning">
					<i class="fa fa-book float-right text-white"></i>
					<h6 class="text-white text-uppercase m-b-20">Livres</h6>
					<h1 class="m-b-20 text-white counter"><?php echo $t; ?></h1>
					<span class="text-white">le nombre totale des livres </span>
				</div>
			</div>

		</div>
		<!-- end row -->

		<div class="row">

			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="text-align:center;">
				<div class="card mb-3">
					<div class="card-header">
						<h3><i class="fa fa-book" style="color:blue;"></i> Books Lender</h3>
						Bienvenu à Books Lender! <br>
						Espace administrateur pour consulter la listes des livres et les informations sur eux 
						avec des informations sur les étudiants qui les prènent. 

					</div>
				</div>
				<img src="assets/images/logo.png" alt="logo" style=" align:center; height=100%; width=100%;">
				<!-- end card-->
			</div>


		</div>
		<!-- end row -->


	</div>
	<!-- END container-fluid -->

</div>