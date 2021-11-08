<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objects/advice.php';

$database = new Database();
$db = $database->getConnection();

// initialize object
$advice = new Advice($db);

$pat_id = $_GET['pat_id'];
$doc_id = $_GET['doc_id'];
$question = $_GET['question'];

$stmt = $advice->ask($pat_id, $doc_id, $question);
$num = $stmt->rowCount();

$data = array(
    "response" => "inserted",
);

http_response_code(200);
echo json_encode($data);
