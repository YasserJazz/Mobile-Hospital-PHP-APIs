<?php
class Appointment
{
    private $conn;

    public $id;
    public $pat_id;
    public $hos_id;
    public $priority;
    public $notes;
    public $status;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function ask($pat_id, $hos_id, $priority, $notes)
    {
        $query = " INSERT INTO `appointment`(`pat_id`, `hos_id`, `priority`, `notes`) VALUES(" .
            $pat_id . " ," . $hos_id . ", " . $priority . ", '" . $notes . "');";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function get(){
        $query = " SELECT * FROM appointment a where a.id = " . $_GET['id'] . ";";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function answer($id, $status)
    {
        $query = " UPDATE appointment set status = " . $status . " where id = " . $id . ";";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function patList(){
        $query = " SELECT * FROM appointment a where a.pat_id = " . $_GET['pat_id'] . ";";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function hosList(){
        $query = " SELECT * FROM appointment a where a.hos_id = " . $_GET['hos_id'] . ";";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    
}
