<?php
include_once '../db.php';

class users extends db
{

    public $id;
    public $email;
    public $password;
    public $username;
    public $nom;
    public $prenom;
    public $role;


    public function __construct($id_col)
    {
        $this->id = $id_col;

        try {
            $stmt = $this->connect()->prepare("SELECT * from Users where idUser = :id");
            $stmt->execute(array(':id' => $this->id));

            if ($stmt->rowCount() != 1 && $this->id != null)
                die("<script>alert('Id Not Found')</script>");

            $element = $stmt->fetch();

            $this->email = $element['email'];
            $this->password = $element['password'];
            $this->username = $element['username'];
            $this->nom = $element['nom'];
            $this->prenom = $element['prenom'];
            $this->role = $element['role'];


        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $this->disconnect();
        }
    }

    public static function studentLoginExist($username, $Pass)
    {
        $conn = new db();
        try {

            $stmt = $conn->connect()->prepare("SELECT * from users where username=:Num");
            $stmt->execute(array(':Num' => $username));
            $element = $stmt->fetch();

            return password_verify($Pass, $element['password']) ? $element['idUser']:0;


        } catch (PDOException $e) {
            echo "Error In Select: " . $e->getMessage();
        } finally {
            $conn->disconnect();
        }
    }

    //get All
    public static function getAllusers()
    {
        $conn = new db();
        try {
            $elements = array();

            $stmt = $conn->connect()->prepare("SELECT * from Users");
            $stmt->execute();

            while ($element = $stmt->fetch()) {
                array_push($elements, $element);
            }
            return $elements;

        } catch (PDOException $e) {
            echo "Error In Select: " . $e->getMessage();
        } finally {
            $conn->disconnect();
        }
    }

    public static function count()
    {
        $conn = new db();
        try {
            $stmt = $conn->connect()->prepare("SELECT count(*) as nbr from Users");
            $stmt->execute();
            return $stmt->fetch()['nbr'];

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $conn->disconnect();
        }
    }

    //CRUD
    public function add()
    {
        try {
            $stmt = $this->connect()->prepare("insert into Users( email,password,username,nom,prenom,role ) VALUE ( :email,:password,:username,:nom,:prenom,:role )");

            $stmt->execute(array(':email' => $this->email, ':password' => $this->password, ':username' => $this->username, ':nom' => $this->nom, ':prenom' => $this->prenom, ':role' => $this->role));


        } catch (PDOException $e) {
            echo "Insert Error: " . $e->getMessage();
        } finally {
            $this->disconnect();
        }
    }

    public function update()
    {
        try {
            $stmt = $this->connect()->prepare("update Users set email=:email,password=:password,username=:username,nom=:nom,prenom=:prenom,role=:role where idUser = :id");
            $stmt->execute(array(':email' => $this->email, ':password' => $this->password, ':username' => $this->username, ':nom' => $this->nom, ':prenom' => $this->prenom, ':role' => $this->role));

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $this->disconnect();
        }
    }

    public function delete()
    {
        try {
            $stmt = $this->connect()->prepare("delete from Users where idUser = :id");
            $stmt->execute(array(':id' => $this->id));

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $this->disconnect();
        }
    }


}