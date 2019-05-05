<?php
  require_once 'config/database.php';


  
	$id=$_GET['id'];
	echo $id;
	$sql = "DELETE FROM `users` WHERE `idUser`= $id";
    echo $sql;
    //confirmer: si oui executer ça
	$query = $conn->prepare( $sql );
	if( !$query->execute()){
		//echo " not executed";
	}else{
		header('location:../utilisateurs.php');
    }
