<?php
/**
 * Created by PhpStorm.
 * User: Alexis
 * Date: 10/02/2019
 * Time: 23:04
 */


if (isset($_POST['code']) && !empty($_POST['code']) &&
    isset($_POST['iduser']) && !empty($_POST['iduser'])) {
    include_once "Books.php";
    include_once "../Users/Users.php";

    if(Books::bookExist($_POST['code'])){
        $book = new books($_POST['code']);
        $user = new Users($_POST['iduser']);

        if ($user->role == "admin"){
            $book->user = null;
            $book->date_debut = null;
            $book->date_fin = null;
        }else {
            $book->user = $user->id;
            $book->date_debut = date("Y-m-d");
            $book->date_fin = date("Y-m-d", strtotime($book->date_debut. ' + 3 days'));
        }
        $book->update();

        echo "key";
    }else
        echo "Book not exist";

} else {
    echo "code not exist in the request";
}

