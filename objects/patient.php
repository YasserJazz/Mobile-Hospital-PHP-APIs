<?php
class Patient
{
    private $conn;

    public $id;
    public $name;
    public $mobile;
    public $email;
    public $username;
    public $password;
    public $address;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function post($name, $mobile, $email, $username, $password, $address)
    {
        $query = " INSERT INTO `patients`(`name`, `mobile`, `email`, `username`, `password`, `address`) VALUES('" .
            $name . "' ,'" . $mobile . "', '" . $email . "' ,'" . $username . "' ,'" . $password . "' ,'" . $address . "');";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function get()
    {
        $query = " SELECT * FROM patients p where p.id = " . $_GET['id'] . ";";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function getAll()
    {
        $query = " SELECT * FROM patients p ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function getLogin()
    {
        $query = " SELECT * FROM patients p where p.username= '"
            . $_GET['username'] . "' and p.password= '" . $_GET['password'] . "';";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
