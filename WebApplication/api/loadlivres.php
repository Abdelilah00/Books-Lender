<?php
require_once  'config/database.php';
header('Content-Type: application/json;charset=utf-8');  
$data = array();

$query = " SELECT `idBook`, `code`, `titre`, `description`, `user`, `date_debut`, `date_fin`, `nom` , `prenom` , `email`  FROM `books` 

left join users on books.user=users.idUser

where 1"; 

$statement = $conn->prepare($query);

$statement->execute();

$result = $statement->fetchAll();
foreach($result as $row)
{
 $data[] = array(
  'id'   => $row["idBook"],
  'titre'   => $row["titre"],
  'code'   => $row["code"],
  'description'   => $row["description"],
  'nom'   => $row["nom"],
    'prenom'   => $row["prenom"],
    'email'   => $row["email"],
    'date_debut'   => $row["date_debut"],
    'date_fin'   => $row["date_fin"]
 );

}
echo '{"data":'. json_encode($data) . '}';
//echo json_encode($data);


?>