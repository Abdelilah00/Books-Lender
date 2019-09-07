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
	<script src="assets/js/modernizr.min.js"></script>
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/moment.min.js"></script>

	<!-- BEGIN CSS for this page -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/datatables.css" />
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css" />
	<style>
		td.details-control {
			background: url('assets/plugins/datatables/img/details_open.png') no-repeat center center;
			cursor: pointer;
		}

		tr.shown td.details-control {
			background: url('assets/plugins/datatables/img/details_close.png') no-repeat center center;
		}
	</style>
	<link href="assets/plugins/datetimepicker/css/daterangepicker.css" rel="stylesheet" />


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
			<div class="content">

				<div class="container-fluid">

					<div class="row">
						<div class="col-xl-12">
							<div class="breadcrumb-holder">
								<h1 class="main-title float-left">Livres</h1>
								<ol class="breadcrumb float-right">
									<li class="breadcrumb-item">Acceuil</li>
									<li class="breadcrumb-item active">Livres</li>
								</ol>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
					<!-- end row -->
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
							<div class="card mb-3">
								<div class="card-header">
									<h3><i class="fa fa-table"></i> Table de touts les livres</h3>
									Ci dessous les livres
								</div>

								<div class="card-body">
									<div class="button-list">
										<!--Ajout -->
										<div class="modal fade custom-modal" tabindex="-1" role="dialog" aria-labelledby="modal_add_user" aria-hidden="true" id="modal_add_user">
											<div class="modal-dialog">
												<div class="modal-content">

													<form action="api/addlivre.php" method="post" enctype="multipart/form-data">

														<div class="modal-header">
															<h5 class="modal-title">Ajouter un livre</h5>
															<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
														</div>

														<div class="modal-body">

															<div class="row">
																<div class="col-lg-6">
																	<div class="form-group">
																		<label>Titre</label>
																		<input class="form-control" name="titre" id="titre" type="text" required />
																	</div>
																</div>

																<div class="col-lg-6">
																	<div class="form-group">
																		<label>Code</label>
																		<input class="form-control" name="code" id="code" type="text" required />
																	</div>
																</div>
															</div>

															<div class="row">
																<div class="col-lg-12">
																	<div class="form-group">
																		<label>Description</label>
																		<textarea class="form-control" name="desc" id="desc" type="text" required></textarea>
																	</div>
																</div>

															</div>


														</div>

														<div class="modal-footer">
															<button type="submit" class="btn btn-primary">Ajouter</button>
														</div>
													</form>
												</div>
											</div>
										</div>
										<!--Ajout -->

										<!--Modifier -->
										<div class="modal fade custom-modal" tabindex="-1" role="dialog" aria-labelledby="modal_edit" aria-hidden="true" id="modal_edit">
											<div class="modal-dialog">
												<div class="modal-content">

													<form action="api/modifylivre.php" method="post" enctype="multipart/form-data">

														<div class="modal-header">
															<h5 class="modal-title">Modifier les informations sur un livre</h5>
															<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
														</div>

														<div class="modal-body">
															<input type="hidden" id="id" name="id" />
															<div class="row">
																<div class="col-lg-6">
																	<div class="form-group">
																		<label>Tite</label>
																		<input class="form-control" name="titre" id="titre" type="text" required />
																	</div>
																</div>

																<div class="col-lg-6">
																	<div class="form-group">
																		<label>Code</label>
																		<input class="form-control" name="code" id="code" type="text" required />
																	</div>
																</div>
															</div>

															<div class="row">
																<div class="col-lg-12">
																	<div class="form-group">
																		<label>Description</label>
																		<textarea class="form-control" name="description" id="description" type="text" required></textarea>
																	</div>
																</div>
															</div>


														</div>

														<div class="modal-footer">
															<button type="submit" class="btn btn-primary">Modifier</button>
														</div>
													</form>
												</div>
											</div>
										</div>
										<!--Modifier -->

										<a role="button" href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal_add_user"><span class="btn-label"><i class="fa fa-plus-square"></i></span>Ajouter</a>
										<a role="button" href="#" class="btn btn-warning" id="modifier" data-toggle="modal" data-target="#modal_edit"><span class="btn-label"><i class="fa fa-cog"></i></span>Modifier</a>
										<a role="button" href="#" class="btn btn-danger" id="supprimer"><span class="btn-label"><i class="fa fa-times"></i></span>Supprimer</a>
									</div>
									<br>
									<div style="overflow-x:auto;">
										<table id="example1" class="table table-bordered table-hover display " style="table-layout: fixed; width: 100%;">
											<thead>
												<tr>
													<th style="width: 5%"></th>
													<th>idLivre</th>
													<th>Titre</th>
													<th>Code</th>
													<th>Description</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th style="width: 5%"></th>
													<th>idLivre</th>
													<th>Titre</th>
													<th>Code</th>
													<th>Description</th>
												</tr>
											</tfoot>
										</table>
									</div>
								</div>
							</div>
							<!-- end card-->
						</div>
					</div>
					<!-- end row -->

				</div>
				<!-- END container-fluid -->

			</div>
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
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="assets/plugins/datetimepicker/js/moment.min.js"></script>
	<script src="assets/plugins/datetimepicker/js/daterangepicker.js"></script>

	<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>

	<script src="https://smtpjs.com/v2/smtp.js"></script>

	<script>
		$(document).ready(function() {
			$('#modal_add_user').on('shown.bs.modal', function() {
				$('input:text:visible:first').focus();
				$('#dc').daterangepicker({
					singleDatePicker: true,
					showDropdowns: true,
					parentEl: '#modal_add_user',
					locale: {
						format: 'YYYY-MM-DD'
					}
				});

			});
		});

		function format(d) {
			return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;"  >' +
				'<tr class="table-primary">' +
				'<td>Nom complet</td>' +
				'<td>' + d.prenom + ' ' + d.nom + '</td>' +
				'</tr>' +
				'<tr class="table-warning">' +
				'<td>Email</td>' +
				'<td>' + d.email + '</td>' +
				'</tr>' +
				'<tr class="table-danger">' +
				'<td>Debut</td>' +
				'<td>' + d.date_debut + '</td>' +
				'</tr>' +
				'<tr class="table-warning">' +
				'<td>Fin</td>' +
				'<td>' + d.date_fin + '</td>' +
				'</tr>' +
				'</table>';
		}

		$(document).ready(function() {
			var table = $('#example1').DataTable({
				"responsive": true,
				"language": {
					"sEmptyTable": "Aucune donnée disponible dans le tableau",
					"sInfo": "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
					"sInfoEmpty": "Affichage de l'élément 0 à 0 sur 0 élément",
					"sInfoFiltered": "(filtré à partir de _MAX_ éléments au total)",
					"sInfoPostFix": "",
					"sInfoThousands": ",",
					"sLengthMenu": "Afficher _MENU_ éléments",
					"sLoadingRecords": "Chargement...",
					"sProcessing": "Traitement...",
					"sSearch": "Rechercher :",
					"sZeroRecords": "Aucun élément correspondant trouvé",
					"oPaginate": {
						"sFirst": "Premier",
						"sLast": "Dernier",
						"sNext": "Suivant",
						"sPrevious": "Précédent"
					},
					"oAria": {
						"sSortAscending": ": activer pour trier la colonne par ordre croissant",
						"sSortDescending": ": activer pour trier la colonne par ordre décroissant"
					},
					"select": {
						"rows": {
							"_": "%d lignes sélectionnées",
							"0": "Aucune ligne sélectionnée",
							"1": "1 ligne sélectionnée"
						}
					}
				},
				"ajax": "api/loadlivres.php",
				"columns": [{
						"className": 'details-control',
						"orderable": false,
						"data": null,
						"defaultContent": ''
					},
					{
						"data": "id"
					},
					{
						"data": "titre"
					},
					{
						"data": "code"
					},
					{
						"data": "description"
					}
				],
				"columnDefs": [{
					"targets": [1],
					"visible": false,
					"searchable": false
				}],
				"order": [
					[1, 'asc']
				],

			});
			table.buttons('.buttonsToHide').nodes().css("display", "none");

			$('#example1 tbody').on('click', 'td.details-control', function() {
				var tr = $(this).closest('tr');
				var row = table.row(tr);

				if (row.child.isShown()) {
					row.child.hide();
					tr.removeClass('shown');
				} else {
					row.child(format(row.data())).show();
					tr.addClass('shown');
				}
			});

			$('#example1 tbody').on('click', 'tr', function() {
				if ($(this).hasClass('selected')) {
					$(this).removeClass('selected');
				} else {
					table.$('tr.selected').removeClass('selected');
					$(this).addClass('selected');
				}

			});
			$('#example1 tbody').on('click', 'tr', function() {
				var data = table.row(this).data();
				var to = table.row(this).data().email;
				console.log(to);
				var date_f = table.row(this).data().date_fin;

				//var date_now = new Date().format('Y-m-d');
				//var date_now= dateFormat(new Date(), 'm-d-Y h:i:s');
				var currentDate = new Date()
				var day = currentDate.getDate()
				var month = currentDate.getMonth() + 1
				var year = currentDate.getFullYear()
				var date_now = year + "-" + month + "-" + day
				console.log(date_f);
				console.log(date_now);


				if (date_now > date_f) {
					console.log("ne pas rendre");
					$msg = "Books Lender vous informe que vous avez dépassé les delais de rendre le livre";
					//	$msg = wordwrap($msg, 70);
					//mail(to, "Expiration de réservation", $msg);

					/*	var link = "mailto:nawalsmaili14@gmail.com" +
						"&subject=" + escape("Expiration de réservation") +
						"&body=" + escape("Books Lender vous informe que vous avez dépassé les delais de rendre le livre");

					window.location.href = link;
*/
					/*	Email.send({
							Host: "smtp.elasticemail.com",
							Username: "xx14@hotmail.fr",
							Password: "2ccc3222-c64b-41da-98a7-5956b2cce276",
							To: 'nawalsmaili14@gmail.com',
							From: "you@isp.com",
							Subject: "Expiration de réservation",
							Body: "Books Lender vous informe que vous avez dépassé les delais de rendre le livre"
						}).then(
							message => alert(message)
						);*/



				} else {
					console.log("rendre");

				}
			});

			$('#modifier').click(function() {
				var monline = $("#example1 tr.selected");
				var data = table.row(monline).data();
				var mondata = table.row(monline).data().id;

				console.log(mondata);

				$.ajax({
					success: function() {
						$('#modal_edit #id').val(mondata);
						$('#modal_edit #titre').val(data.titre);
						$('#modal_edit #code').val(data.code);
						$('#modal_edit #description').val(data.description);
						$('#modal_edit').modal('show');
					}
				});

			});

			$('#supprimer').click(function() {
				var monline = $("#example1 tr.selected");
				var mondata = table.row(monline).data().id;
				swal({
						title: "êtes-vous sûr?",
						text: "Une fois supprimé, vous ne pourrez plus récupérer ces informations!",
						icon: "warning",
						buttons: true,
						dangerMode: true,
					})
					.then((willDelete) => {
						if (willDelete) {
							console.log(mondata);
							$.ajax({
								url: 'api/deletelivre.php',
								type: 'POST',
								data: {
									idb: mondata
								},
								//dataType: 'html',
								success: function(data) {
									console.log("yes", data);
									swal("Poof! supprimer avec succès!", {
										icon: "success"
									});
									location.reload();
								},
								error: function(data) {
									console.log("no", data);
								}
							});
						} else {
							swal("Vos informations sont en sécurité!");
						}

					})

			});

		});
	</script>

</body>

</html>