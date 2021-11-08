<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objects/location.php';

$database = new Database();
$db = $database->getConnection();

// initialize object
$location = new Location($db);

$locationPatId = $_GET['pat_id'];
$locationLocation = $_GET['location'];
$locationDate = $_GET['date'];

$stmt = $location->set($locationPatId, $locationLocation, $locationDate);
$num = $stmt->rowCount();

$data = array(
    "response" => "inserted",
);

http_response_code(200);
echo json_encode($data);
