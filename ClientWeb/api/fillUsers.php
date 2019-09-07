<?php
require_once 'config/database.php';

$query2 = "SELECT count(*) as t  FROM `users`";
$statement2 = $conn->prepare($query2);
$statement2->execute();
$result2 = $statement2->fetchAll();
foreach ($result2 as $row) {
    $t = $row["t"];
}
