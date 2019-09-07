<!DOCTYPE html>
<?php  session_start(); ?>  
<?php

if(isset($_SESSION['loggedIn']))   
 {
    header("Location:home.php"); 
 }
 ?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Gestion bibliothèque</title>

	<!-- Custom CSS -->
	<link href="assets/css/login.css" rel="stylesheet">

    <!-- Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Checkboxes style -->
	<link href="assets/css/bootstrap-checkbox.css" rel="stylesheet">

	<!-- favicon -->
	<link rel="shortcut icon" href="assets/images/favicone.ico">

</head>

<body style="background-image:url(assets/images/bg4.jpeg);  background-position: center center; background-repeat: no-repeat; background-attachment: fixed; background-size: cover;">

<div class="login-menu" style="width: 100%; height: 60px;">
      <div class="container">
        <nav class="nav">
          <a class="nav-link active" href="#">Connexion</a>
        </nav>
      </div>
</div>

<div class="container h-100">
	<div class="row h-100 justify-content-center align-items-center">
				
						
		<div class="card" style="width: 60%">
			<h4 class="card-header">Connexion</h4>
           
			<div class="card-body">                    	
                        <form data-toggle="validator" role="form" method="post" action="api/authentification.php">                                
								
								<div class="row" >	
									<div class="col-md-12">    
									<div class="form-group">
									<label>Email</label>
									<div class="input-group">
									  <div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope-open-o" aria-hidden="true"></i></span>
										</div>
									  <input  type="email" class="form-control" name="email" data-error="Input valid email" required>								  
									</div>								
									<div class="help-block with-errors text-danger"></div>
									</div>
									</div>
                                </div>
								
								<div class="row">								
									<div class="col-md-12">
									<div class="form-group">
									<label>Mot de passe</label>
									<div class="input-group">
										<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-unlock" aria-hidden="true"></i></span>
										</div>
										<input type="password" id="inputPassword" data-minlength="6" name="password" class="form-control" data-error="Password to short" required />
									</div>	
									<div class="help-block with-errors text-danger"></div>
									</div>
									</div>
								</div>
																
                                <div class="row">
									<div class="col-md-12">
									<input type="hidden" name="redirect" value="" />
									<input type="submit" class="btn btn-primary btn-lg btn-block" style='background-color:#4b698a' value="Connexion" name="submit" />
									</div>
								</div>
                        </form>

                        <div class="clear"></div> 
						
			</div>	
			
		</div>	

	</div>	
</div>


<footer class="footer" style=" background-color: #f5f5f5;">
	<div class="container">
    <span class="text-muted">Par <a href="https://linkedin.com/in/naouals14">S.Naoual & D.Abdelillah</a></span>
    </div>
</footer>

<!-- Core Scripts -->
<script src="assets/js/jquery-1.10.2.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
	
<!-- Bootstrap validator  -->
<script src="assets/js/validator.min.js"></script>

</body>
</html>