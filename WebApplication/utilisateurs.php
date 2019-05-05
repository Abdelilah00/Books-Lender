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

    <!-- Switchery css -->
    <link href="assets/plugins/switchery/switchery.min.css" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- Font Awesome CSS -->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript">
        function checkDelete() {
            return confirm("Êtes-vous sûr(e) de vouloir supprimer?")
        }

        function showModal(id) {
            model = "#modal_edit_user" + id;
            //$('#update .score').html(id);
            $(model).modal('show')

        }

        function getUtilisateur(index) {
            var id = index;
            alert(id);
            showModal(id);
        }
    </script>

    <script src="assets/js/jquery.min.js"></script>
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
                                <h1 class="main-title float-left">Utilisateurs</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item">Acceuil</li>
                                    <li class="breadcrumb-item active">Utilisateurs</li>
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
                                    <span class="pull-right"><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_add_user"><i class="fa fa-user-plus" aria-hidden="true"></i> Ajouter un nouveau utilisateurs</button></span>
                                    <div class="modal fade custom-modal" tabindex="-1" role="dialog" aria-labelledby="modal_add_user" aria-hidden="true" id="modal_add_user">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <form action='api/adduser.php' method='post' name="users" enctype='multipart/form-data'>
                                                    <input type="hidden" name="role" value="etudiant">

                                                    <div class='modal-header'>
                                                        <h5 class='modal-title'>Ajouter un utilisateur</h5>
                                                        <button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span><span class='sr-only'>Fermer</span></button>
                                                    </div>

                                                    <div class='modal-body'>

                                                        <div class='row'>
                                                            <div class='col-lg-6'>
                                                                <div class='form-group'>
                                                                    <label>Nom </label>
                                                                    <input class='form-control' name='nom' type='text' required value='' />
                                                                </div>
                                                            </div>
                                                            <div class='col-lg-6'>
                                                                <div class='form-group'>
                                                                    <label>Prénom</label>
                                                                    <input class='form-control' name='prenom' type='text' required value='' />
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class='row'>
                                                            <div class='col-lg-6'>
                                                                <div class='form-group'>
                                                                    <label>Nom d'utilisateur</label>
                                                                    <input class='form-control' name='username' type='text' value='' />
                                                                </div>
                                                            </div>

                                                            <div class='col-lg-6'>
                                                                <div class='form-group'>
                                                                    <label>Mot de passe </label>
                                                                    <input class='form-control' name='password' type='password' required />
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class='row'>
                                                            <div class='col-lg-12'>
                                                                <div class='form-group'>
                                                                    <label>Email</label>
                                                                    <input class='form-control' name='email' type='email' value='' required />
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class='modal-footer'>
                                                        <button type='submit' class='btn btn-primary'>Ajouter</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <h3><i class="fa fa-user"></i> Tous les utilisateurs (<?php include 'api/fillUsers.php';
                                                                                            echo $t; ?> utilisateurs)</h3>
                                </div>

                                <!-- end card-header -->

                                <div class="card-body">

                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="example1">
                                            <thead>
                                                <tr>
                                                    <th style="width:50px">Email</th>
                                                    <th>Nom d'utilisateur</th>
                                                    <th>Nom</th>
                                                    <th>Préom</th>
                                                    <th style="width:120px">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php include_once 'api/SelectUsers.php' ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <!-- end card-body -->

                            </div>
                            <!-- end card -->

                        </div>
                        <!-- end col -->

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
    <script src="assets/js/moment.min.js"></script>

    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <script src="assets/js/detect.js"></script>
    <script src="assets/js/fastclick.js"></script>
    <script src="assets/js/jquery.nicescroll.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/plugins/switchery/switchery.min.js"></script>

    <!-- App js -->
    <script src="assets/js/pikeadmin.js"></script>

    <!-- BEGIN Java Script for this page -->

    <!-- END Java Script for this page -->

</body>

</html>


