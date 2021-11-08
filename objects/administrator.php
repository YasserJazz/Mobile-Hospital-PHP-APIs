<?php
class Admin
{
    private $conn;

    public $id;
    public $name;
    public $email;
    public $username;
    public $password;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function getLogin()
    {
        $query = " SELECT * FROM administrator a where a.username= '"
            . $_GET['username'] . "' and a.password= '" . $_GET['password'] . "';";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
