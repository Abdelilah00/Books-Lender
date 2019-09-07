<?php
session_start();
    require_once ('config/database.php');


$query = "SELECT idUser,nom,prenom FROM  `users`  WHERE  `role` = 'admin'  AND `email` = ?  AND  `password` = ? ";

$statement = $conn->prepare($query);

$statement->execute(array($_POST['email'],$_POST['password']));

$atributes = $statement->fetch(PDO::FETCH_OBJ);


if ($atributes) {

    $_SESSION["loggedIn"] = true;
    $_SESSION["nom"] = $atributes->nom;
    $_SESSION["prenom"] = $atributes->prenom;
    $_SESSION["idUser"] = $atributes->idUser;
   // echo  $_SESSION["Nom"] . $_SESSION["avatar"] . $_SESSION["IDUtilisateur"];
   header('location:../home.php');

}else {
    echo "test";
    header('location:../index.php');
}

?>
