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

$id = $_GET['id'];
$answer = $_GET['answer'];

$stmt = $advice->answer($id, $answer);
$num = $stmt->rowCount();

$data = array(
    "response" => "updated",
);

http_response_code(200);
echo json_encode($data);
