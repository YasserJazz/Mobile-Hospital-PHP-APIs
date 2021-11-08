<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objects/patient.php';

$database = new Database();
$db = $database->getConnection();

// initialize object
$patient = new Patient($db);

$patName = $_GET['name'];
$patMobile = $_GET['mobile'];
$patEmail = $_GET['email'];
$patUsername = $_GET['username'];
$patPassword = $_GET['password'];
$patAddress = $_GET['address'];

$stmt = $patient->post($patName, $patMobile, $patEmail, $patUsername, $patPassword, $patAddress);
$num = $stmt->rowCount();

$data = array(
    "response" => "inserted",
);

http_response_code(200);
echo json_encode($data);
