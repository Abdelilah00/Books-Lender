<?php
require_once  'config/database.php';

if(isset($_POST['idb'])) {
	$id=$_POST['idb'];
	echo $id;
	$sql = "DELETE FROM books WHERE idBook = $id";
	echo $sql;
	$query = $conn->prepare( $sql );
	//$restlt=$query->execute();
	if( !$query->execute()){
		echo " not executed";
	}else{
		header('location:../livres.php');
	}
	
}else{
	echo "not seted";
}



?>