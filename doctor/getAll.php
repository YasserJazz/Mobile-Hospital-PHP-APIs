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

$stmt = $doctor->getAll();
$num = $stmt->rowCount();

if ($num > 0) {

    $doctors_arr = array();
    $doctors_arr["doctors"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $doctor_item = array(
            "id" => $id,
            "name" => $name,
            "phone" => $phone,
            "email" => $email,
            "username" => $username,
            "password" => $password,
            "clinicId" => $clinicId,
        );

        array_push($doctors_arr["doctors"], $doctor_item);
    }

    http_response_code(200);
    echo json_encode($doctors_arr);
} else {

    http_response_code(404);
    echo json_encode(
        array("message" => "No doctors found.")
    );
}
