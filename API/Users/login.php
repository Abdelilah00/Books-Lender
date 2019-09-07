<?php

if (isset($_POST['user_name']) && !empty($_POST['user_name']) &&
    isset($_POST['password']) && !empty($_POST['password'])) {

    include_once "Users.php";
    $idUser  = Users::studentLoginExist($_POST['user_name'], $_POST['password']);

    echo $idUser;

}else
   echo "parms Not found";