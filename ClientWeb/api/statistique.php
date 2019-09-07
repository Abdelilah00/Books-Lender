<?php
    require_once ('config/database.php');


$query2 = "SELECT count(*) as u  FROM `users`";
$statement2 = $conn->prepare($query2);
$statement2->execute();
$result2 = $statement2->fetchAll();
foreach ($result2 as $row) {
    $u = $row["u"];
}


$query = "SELECT count(*) as t  FROM `books`";
$statement = $conn->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
foreach ($result as $row) {
    $t = $row["t"];
}

?>
