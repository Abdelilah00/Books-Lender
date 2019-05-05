<?php
 
    $conn;
    
       $conn = new PDO('mysql:host=localhost;dbname=biblio', 'root', '');
       //$conn->set_charset('utf8');
       $conn -> exec("set names utf8");

       if(!$conn){
        echo "Connection error: " . $exception->getMessage();
       }
       
    
?>