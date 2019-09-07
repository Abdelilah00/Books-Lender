<?php
include_once '../db.php';

class books extends db
{

    public $id;
    public $code;
    public $titre;
    public $description;
    public $user;
    public $date_debut;
    public $date_fin;

    public function __construct($id_col)
    {
        $this->code = $id_col;

        try {
            $stmt = $this->connect()->prepare("SELECT * from Books where code = :id");
            $stmt->execute(array(':id' => $this->code));

            if ($stmt->rowCount() != 1 && $this->id != null)
                die("<script>alert('Id Not Found')</script>");

            $element = $stmt->fetch();

            $this->code = $element['code'];
            $this->titre = $element['titre'];
            $this->description = $element['description'];
            $this->user = $element['user'];


        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $this->disconnect();
        }
    }
    public static function bookExist($Code)
    {
        $conn = new db();
        try {

            $stmt = $conn->connect()->prepare("SELECT count(*) as nbr from books where code=:Code");
            $stmt->execute(array(':Code' => $Code));
            $element = $stmt->fetch();

            return ($element['nbr'] == 1 ? true:false);

        } catch (PDOException $e) {
            echo "Error In Select: " . $e->getMessage();
        } finally {
            $conn->disconnect();
        }
    }
    //get All
    public static function getAllbooks()
    {
        $conn = new db();
        try {
            $elements = array();

            $stmt = $conn->connect()->prepare("SELECT * from Books where user is null");
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
            $stmt = $conn->connect()->prepare("SELECT count(*) as nbr from Books");
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
            $stmt = $this->connect()->prepare("insert into Books( code,titre,description,user ) VALUE ( :code,:titre,:description,:user )");

            $stmt->execute(array(':code' => $this->code, ':titre' => $this->titre, ':description' => $this->description, ':user' => $this->user));


        } catch (PDOException $e) {
            echo "Insert Error: " . $e->getMessage();
        } finally {
            $this->disconnect();
        }
    }

    public function update()
    {


        try {
            $stmt = $this->connect()->prepare("update Books set user= :user, date_debut=:date_debut, date_fin=:date_fin where code = :code");
            $stmt->execute(array(':code' => $this->code, ':user' => $this->user, ':date_debut' => $this->date_debut, ':date_fin' => $this->date_fin));

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $this->disconnect();
        }
    }

    public function delete()
    {
        try {
            $stmt = $this->connect()->prepare("delete from Books where idBook = :id");
            $stmt->execute(array(':id' => $this->id));

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $this->disconnect();
        }
    }


}