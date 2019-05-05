<?php
require_once  'config/database.php';


if (isset($_POST['nom']) && isset($_POST['prenom'])  && isset($_POST['id']) && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password']))
    {

        $id = $_POST['id'];
        $nom = $_POST ['nom'];
        $prenom  = $_POST['prenom'];
        $email = $_POST['email'];
        $username  = $_POST['username'];
        $password  = $_POST['password'];

        
        
        $query = "
        update users set 
        `nom`= '$nom', 
        `prenom` ='$prenom', 
        `email` ='$email', 
        `password` ='$password', 
        `username`= '$username'
        
        where idUser = $id;
        ";
        echo $query;
        $statement = $conn->prepare($query);
        if($statement->execute()) {
            header('location:../utilisateurs.php');
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
