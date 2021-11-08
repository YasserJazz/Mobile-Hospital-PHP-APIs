<?php
class Location
{
    private $conn;

    public $id;
    public $pat_id;
    public $location;
    public $date;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function set($pat_id, $location, $date)
    {
        $query = " INSERT INTO `location`(`pat_id`, `location`, `date`) VALUES(" .
            $pat_id . " ,'" . $location . "', '" . $date . "');";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function getAll()
    {
        $query = " SELECT * FROM location l  where l.pat_id = " . $_GET['pat_id'] . ";";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
