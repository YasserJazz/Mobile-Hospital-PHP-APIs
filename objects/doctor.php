<?php
class Doctor
{
    private $conn;

    public $id;
    public $name;
    public $phone;
    public $email;
    public $username;
    public $password;
    public $clinicId;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function post($name, $phone, $email, $username, $password, $clinicId)
    {
        $query = " INSERT INTO `doctors`(`name`, `phone`, `email`, `username`, `password`, `clinicId`) VALUES('" .
            $name . "' ,'" . $phone . "', '" . $email . "' ,'" . $username . "' ,'" . $password . "' ," . $clinicId . ");";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function get()
    {
        $query = " SELECT * FROM doctors d where d.id = " . $_GET['id'] . ";";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function getAll()
    {
        $query = " SELECT * FROM doctors d ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function getLogin()
    {
        $query = " SELECT * FROM doctors d where d.username = '"
            . $_GET['username'] . "' and d.password = '" . $_GET['password'] . "';";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
