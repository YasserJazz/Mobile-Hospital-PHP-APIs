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

$stmt = $location->getAll();
$num = $stmt->rowCount();

if ($num > 0) {

    $locations_arr = array();
    $locations_arr["records"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $location_item = array(
            "id" => $id,
            "pat_id" => $pat_id,
            "location" => $location,
            "date" => $date,
        );

        array_push($locations_arr["records"], $location_item);
    }

    http_response_code(200);
    echo json_encode($locations_arr);
} else {

    http_response_code(404);
    echo json_encode(
        array("message" => "No locations found.")
    );
}
