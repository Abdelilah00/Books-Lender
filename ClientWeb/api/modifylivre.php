<?php
require_once  'config/database.php';


if (isset($_POST['code']) && isset($_POST['titre']) && isset($_POST['description']) && isset($_POST['id']))
    {

        $id = $_POST['id'];
        $titre = $_POST ['titre'];
        $code  = $_POST['code'];
        $desc = $_POST['description'];
        
        
        $query = "
        update books set 
        `titre`= '$titre', 
        `code` ='$code', 
        `description`= '$desc'
        
        where idBook = $id;
        ";
        echo $query;
        $statement = $conn->prepare($query);
        if($statement->execute()) {
            header('location:../livres.php');
        }
        else{
       echo "no executes";
           // header('location:../error.php');
        }
    }
else{
echo "not seted";
//header('location:../error.php');
}



?>
