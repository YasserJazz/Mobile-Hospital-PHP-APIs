<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objects/appointment.php';

$database = new Database();
$db = $database->getConnection();

// initialize object
$appointment = new Appointment($db);

$id = $_GET['id'];
$status = $_GET['status'];

$stmt = $appointment->answer($id, $status);
$num = $stmt->rowCount();

$data = array(
    "response" => "updated",
);

http_response_code(200);
echo json_encode($data);
