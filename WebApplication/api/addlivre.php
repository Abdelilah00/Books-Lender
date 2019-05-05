<?php

require_once  'config/database.php';
 
 if (isset($_POST['titre']) && isset($_POST['code'])&& isset($_POST['desc']))
    {
 $query = "
 INSERT INTO books 
 (`titre`, `code`, `description` ) 
 VALUES (:titre,:code,:desc)

 ";
 $statement = $conn->prepare($query);
 if($statement->execute(
  array(
    'titre'   => $_POST["titre"],
    'code'   => $_POST["code"],
    'desc'   => $_POST["desc"]
  )
 )) {
     header('location:../livres.php');
 }else{
    header('location:../error.php');
 }
}else{
   header('location:../error.php');
 }



?>
