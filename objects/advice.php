<?php
class Advice
{
    private $conn;

    public $id;
    public $pat_id;
    public $doc_id;
    public $question;
    public $answer;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function ask($pat_id, $doc_id, $question)
    {
        $query = " INSERT INTO `advice`(`pat_id`, `doc_id`, `question`) VALUES(" .
            $pat_id . " ," . $doc_id . ", '" . $question .  "');";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function get(){
        $query = " SELECT * FROM advice a where a.id = " . $_GET['id'] . ";";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    
    function answer($id, $answer)
    {
        $query = "UPDATE advice set answer = '" . $answer . "' where id = " . $id . ";";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function patList(){
        $query = " SELECT * FROM advice a where a.pat_id = " . $_GET['pat_id'] . ";";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function docList(){
        $query = " SELECT * FROM advice a where a.doc_id = " . $_GET['doc_id'] . ";";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

}
