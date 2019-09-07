<?php
require_once 'config/database.php';
$query = "SELECT `idUser`, `email`, `password`, `username`, `nom`, `prenom`, `role` FROM `users`";
$statement = $conn->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

$i = 0;
foreach ($result as $row) {
  echo '<tr>

    <td>' . $row["email"] . '</td>' .
    '<td>' . $row["username"] . '</td>' .
    '<td>' . $row["nom"] . '</td>' . '<td>' . $row["prenom"] . '</td>' .
    '<td style="text-align:center;"><a role="button"  id="modifier" data-toggle="modal" data-target="#' . $row["idUser"] . '" ><i class="fa fa-edit fa-2x" style="color:green"></i></a>
<div class="modal fade custom-modal" tabindex="-1" role="dialog" aria-labelledby="modal_edit_user" aria-hidden="true" id="' . $row["idUser"] . '">
            <div class="modal-dialog">
                <div class="modal-content">

                    <form action="api/modifyUser.php" method="post" name="users" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="' . $row["idUser"] . '">

                        <div class="modal-header">
                            <h5 class="modal-title">Modifier un utilisateur</h5>
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
                        </div>

                        <div class="modal-body">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Nom </label>
                                        <input class="form-control" name="nom" type="text" value="' . $row["nom"] . '" required />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Prénom</label>
                                        <input class="form-control" name="prenom" type="text" value="' . $row["prenom"] . '"required />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Nom d"utilisateur</label>
                                        <input class="form-control" name="username" type="text" value="' . $row["username"] . '" />
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Mot de passe </label>
                                        <input class="form-control" name="password" type="password" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" name="email" type="email" required value="' . $row["email"] . '"/>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Modifier</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <a role="button" id="supprimer" onclick="return checkDelete()" href="api/deleteUser.php?id=' . $row["idUser"] . '" ><i class="fa fa-trash  fa-2x" style="color:red;"></i></a>
    </td>
        
  </tr>

  ';
  $i++;

  }

  $choisi=$row["idUser"];

  $query = "SELECT `idUser`, `email`, `password`, `username`, `nom`, `prenom`, `role` FROM `users` WHERE idUser=$choisi";
  $statement = $conn->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
  $id=$row["idUser"];
  $nom = $row["nom"];
  $prenom = $row["prenom"];
  $email = $row["email"];
  $username = $row["username"];
  $role = $row["role"];

  }