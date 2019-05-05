<?php

require_once  'config/database.php';
 
 if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email'])&& isset($_POST['username']) 
 && isset($_POST['password'])&& isset($_POST['role']))
    {
 $query = "
 INSERT INTO users 
 (nom,prenom,email, username, password,role) 
 VALUES (:nom,:prenom,:email,:username, :password,:role)

 ";
 $statement = $conn->prepare($query);
 if($statement->execute(
  array(
   ':nom'  => $_POST['nom'],
   ':prenom'  => $_POST['prenom'],
   ':email' => $_POST['email'],
   ':username' => $_POST['username'],
   ':password' => $_POST['password'],
   ':role'   => $_POST['role']
  )
 )) {
     header('location:../utilisateurs.php');
 }else{
echo $query;
    echo 'not executed';
   // header('location:../error.php');
 }
}else{
    echo "not seted";
   //header('location:../error.php');
 }



?>