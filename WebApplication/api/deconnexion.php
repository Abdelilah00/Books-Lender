<?php
session_start();
if($_SESSION["loggedIn"]){
    session_destroy();
}
header('location:../index.php');


?>