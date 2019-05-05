<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Gestion bibliothèque</title>
	<meta name="description" content="Coopératives ORMESSO">
	<meta name="author" content="Naoual Smaili">

	<!-- Favicon -->
	<link rel="shortcut icon" href="assets/images/favicone.ico">

	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

	<!-- Font Awesome CSS -->
	<link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

	<!-- Custom CSS -->
	<link href="assets/css/style.css" rel="stylesheet" type="text/css" />

	<!-- BEGIN CSS for this page -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" />
	<style>
		.alert-minimalist {
			background-color: #9DB0FF;
			/* #FFA996;*/
			/*rgb(241, 242, 240);*/
			border-color: rgba(149, 149, 149, 0.3);
			border-radius: 3px;
			/*	color: rgb(149, 149, 149);*/
			padding: 10px;
		}

		.alert-minimalist>[data-notify="icon"] {
			height: 50px;
			margin-right: 12px;
		}

		.alert-minimalist>[data-notify="title"] {
			color: rgb(51, 51, 51);
			display: block;
			font-weight: bold;
			margin-bottom: 5px;
		}

		.alert-minimalist>[data-notify="message"] {
			font-size: 100%;
		}
	</style>
	<!-- END CSS for this page -->

</head>

<body class="adminbody">

	<div id="main">

		<!-- top bar navigation -->
		<?php include_once 'Navigation.php' ?>
		<!-- End Navigation -->


		<!-- Left Sidebar -->
		<?php include_once 'LeftSidebar.php' ?>
		<!-- End Sidebar -->


		<div class="content-page">

			<!-- Start content -->
			<?php include_once 'content.php' ?>
			<!-- END content -->

		</div>
		<!-- END content-page -->
		<?php include_once 'footer.php' ?>

	</div>
	<!-- END main -->

	<script src="assets/js/modernizr.min.js"></script>
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/moment.min.js"></script>

	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>

	<script src="assets/js/detect.js"></script>
	<script src="assets/js/fastclick.js"></script>
	<script src="assets/js/jquery.blockUI.js"></script>
	<script src="assets/js/jquery.nicescroll.js"></script>

	<!-- App js -->
	<script src="assets/js/pikeadmin.js"></script>

	<!-- BEGIN Java Script for this page -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
	<script src="assets/plugins/bootstrap-notify/bootstrap-notify.js"></script>
	<script src="assets/plugins/bootstrap-notify/bootstrap-notify.min.js"></script>



	<!-- Counter-Up-->
	<script src="assets/plugins/waypoints/lib/jquery.waypoints.min.js"></script>
	<script src="assets/plugins/counterup/jquery.counterup.min.js"></script>



	<script>
		$(document).ready(function() {
			// counter-up
			$('.counter').counterUp({
				delay: 10,
				time: 600
			});
		});
	</script>

	<script>
		/* ctx1 */
		$(document).ready(function() {
			$.ajax({
				url: "api/fillchart.php",
				type: "GET",
				dataType: 'json',
				success: function(data) {
					var arr = data;

					var year = [];
					var values = [];
					for (var i in arr) {
						year.push("Année " + arr[i].yr);
						values.push(arr[i].t);

					}
					var chartdata = {
						labels: year,
						datasets: [{
							label: "Coopératives",
							backgroundColor: '#3EB9DC',
							data: values
						}]
					};
					var ctx = document.getElementById("lineChart").getContext('2d');
					var LineGraph = new Chart(ctx, {
						type: 'bar',
						options: {
							tooltips: {
								mode: 'index',
								intersect: false
							},
							responsive: true,
							scales: {
								xAxes: [{
									stacked: true,
								}],
								yAxes: [{
									stacked: true
								}]
							}
						},
						data: chartdata
					});

				}
			});
		});
		/* ctx1 */


		/* ctx2 */
		var pt = "<?php echo $pt; ?>";
		var ec = "<?php echo $ec; ?>";
		var ctx2 = document.getElementById("pieChart").getContext('2d');
		var pieChart = new Chart(ctx2, {
			type: 'pie',
			data: {
				datasets: [{
					data: [pt, ec],
					backgroundColor: [
						'rgba(54, 162, 235, 1)',
						'rgba(255, 206, 86, 1)'
					],
					label: 'Dataset 1'
				}],
				labels: [
					"Produits terroirs",
					"E-commerce",
				]
			},
			options: {
				responsive: true
			}

		});
		/* ctx2 */

		/* ctx3 */
		var pr = "<?php echo $pr; ?>";
		var pi = "<?php echo $pi; ?>";
		var ctx3 = document.getElementById("doughnutChart").getContext('2d');
		var doughnutChart = new Chart(ctx3, {
			type: 'doughnut',
			data: {
				datasets: [{
					data: [pr, pi],
					backgroundColor: [
						'rgba(255,99,132,1)',
						'rgba(54, 162, 235, 1)'
					],
					label: 'Dataset 1'
				}],
				labels: [
					"autre",
					"Projet innovants"
				]
			},
			options: {
				responsive: true
			}

		});
		/* ctx3 */

		$.notify({
			icon: 'assets/images/avatars/nawal2.gif',
			title: 'Naoual Smaili',
			message: 'C\'est une version bêta, pas encore stable.'
		}, {
			type: 'minimalist',
			delay: 5000,
			placement: {
				from: "buttom",
				align: "right"
			},
			animate: {
				enter: 'animated fadeInDown',
				exit: 'animated fadeOutUp'
			},
			icon_type: 'image',
			template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
				'<img data-notify="icon" class="img-circle pull-left">' +
				'<span data-notify="title">{1}</span>' +
				'<span data-notify="message">{2}</span>' +
				'</div>'
		});

		/* ctx4 */
		$.ajax({
			url: "api/statistique.php",
			type: "GET",
			dataType: 'json',
			success: function(data) {
				var arr = data;

				var secteur = [];
				var nbr = [];
				var nom_secteur = [];

				for (var i in arr) {
					secteur.push("Secteur " + arr[i].secteur);
					nbr.push(arr[i].nbr);
					nom_secteur.push(arr[i].nom_secteur);
				}

				var ctx4 = document.getElementById("comboBarLineChart").getContext('2d');
				var comboBarLineChart = new Chart(ctx4, {
					type: 'line',
					data: {
						labels: nom_secteur,
						datasets: [{
							type: 'line',
							label: 'Nombre de coopératives',
							borderColor: '#484c4f',
							borderWidth: 3,
							fill: false,
							data: nbr,
						}],
						options: {
							scales: {
								yAxes: [{
									ticks: {
										beginAtZero: true
									}
								}]
							}
						}
					}
				});

			}
		});
		/* ctx4 */
	</script>

	<!-- END Java Script for this page -->

</body>

</html>