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

$pat_id = $_GET['pat_id'];
$hos_id = $_GET['hos_id'];
$priority = $_GET['priority'];
$notes = $_GET['notes'];

$stmt = $appointment->ask($pat_id, $hos_id, $priority, $notes);
$num = $stmt->rowCount();

$data = array(
    "response" => "inserted",
);

http_response_code(200);
echo json_encode($data);
