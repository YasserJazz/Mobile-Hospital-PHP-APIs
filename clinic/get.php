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

$stmt = $clinic->get();
$num = $stmt->rowCount();

if ($num > 0) {

    $clinics_arr = array();
    $clinics_arr["records"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $clinic_item = array(
            "id" => $id,
            "name" => $name,
            "phone" => $phone,
            "email" => $email,
            "username" => $username,
            "password" => $password,
        );

        array_push($clinics_arr["records"], $clinic_item);
    }

    http_response_code(200);
    echo json_encode($clinic_item);
} else {

    http_response_code(404);
    echo json_encode(
        array("message" => "No clinic found.")
    );
}
