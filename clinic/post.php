<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objects/clinic.php';

$database = new Database();
$db = $database->getConnection();

// initialize object
$clinic = new Clinic($db);

$clinicName = $_GET['name'];
$clinicPhone = $_GET['phone'];
$clinicEmail = $_GET['email'];
$clinicUsername = $_GET['username'];
$clinicPassword = $_GET['password'];

$stmt = $clinic->post($clinicName, $clinicPhone, $clinicEmail, $clinicUsername, $clinicPassword);
$num = $stmt->rowCount();

$data = array(
    "response" => "inserted",
);

http_response_code(200);
echo json_encode($data);
