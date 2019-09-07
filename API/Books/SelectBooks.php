<?php
include_once "Books.php";
$books = Books::getAllbooks();
echo json_encode($books);