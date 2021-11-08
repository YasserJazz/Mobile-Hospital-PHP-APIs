<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objects/doctor.php';

$database = new Database();
$db = $database->getConnection();

// initialize object
$doctor = new Doctor($db);

$docName = $_GET['name'];
$docPhone = $_GET['phone'];
$docEmail = $_GET['email'];
$docUsername = $_GET['username'];
$docPassword = $_GET['password'];
$docClinicId = $_GET['clinicId'];

$stmt = $doctor->post($docName, $docPhone, $docEmail, $docUsername, $docPassword, $docClinicId);
$num = $stmt->rowCount();

$data = array(
    "response" => "inserted",
);

http_response_code(200);
echo json_encode($data);
