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

$stmt = $patient->get();
$num = $stmt->rowCount();

if ($num > 0) {

    $patients_arr = array();
    $patients_arr["records"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $patient_item = array(
            "id" => $id,
            "name" => $name,
            "mobile" => $mobile,
            "email" => $email,
            "username" => $username,
            "password" => $password,
        );

        array_push($patients_arr["records"], $patient_item);
    }

    http_response_code(200);
    echo json_encode($patient_item);
} else {

    http_response_code(404);
    echo json_encode(
        array("message" => "No patient found.")
    );
}
