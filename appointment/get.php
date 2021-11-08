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

$stmt = $appointment->get();
$num = $stmt->rowCount();

if ($num > 0) {

    $appointments_arr = array();
    $appointments_arr["records"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $appointment_item = array(
            "id" => $id,
            "pat_id" => $pat_id,
            "hos_id" => $hos_id,
            "priority" => $priority,
            "notes" => $notes,
            "status" => $status,
        );

        array_push($appointments_arr["records"], $appointment_item);
    }

    http_response_code(200);
    echo json_encode($appointment_item);
} else {

    http_response_code(404);
    echo json_encode(
        array("message" => "No appointment found.")
    );
}
