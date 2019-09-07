<?php

class db{
    private $server = "mysql:host=localhost;dbname=biblio;charset=utf8";
    private $username = "root";
    private $password = "";
    private $option = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
    protected $con = null;

    protected function connect(){
        try {
            $this->con =  new PDO($this->server, $this->username,$this->password,$this->option);
            return $this->con;
        } catch (PDOException $e) {
            echo "There is some problem in connection: " . $e->getMessage();
        }
    }

    protected function disconnect(){
        $this->con = null;
    }
}
