<?php
class Clinic
{
    private $conn;

    public $id;
    public $name;
    public $phone;
    public $email;
    public $username;
    public $password;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function post($name, $phone, $email, $username, $password)
    {
        $query = " INSERT INTO `clinics`(`name`, `phone`, `email`, `username`, `password`) VALUES('" .
            $name . "' ," . $phone . ", '" . $email . "' ,'" . $username . "' ,'" . $password . "');";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function get()
    {
        $query = " SELECT * FROM clinics c where c.id = " . $_GET['id'] . ";";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function getAll()
    {
        $query = " SELECT * FROM clinics c ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function getLogin()
    {
        $query = " SELECT * FROM clinics c where c.username = '"
            . $_GET['username'] . "' and c.password = '" . $_GET['password'] . "';";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
