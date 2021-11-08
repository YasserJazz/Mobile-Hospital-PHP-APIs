<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objects/advice.php';

$database = new Database();
$db = $database->getConnection();

// initialize object
$advice = new Advice($db);

$stmt = $advice->docList();
$num = $stmt->rowCount();

if ($num > 0) {

    $advices_arr = array();
    $advices_arr["records"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $advice_item = array(
            "id" => $id,
            "pat_id" => $pat_id,
            "doc_id" => $doc_id,
            "notes" => $question,
            "status" => $answer,
        );

        array_push($advices_arr["records"], $advice_item);
    }

    http_response_code(200);
    echo json_encode($advices_arr);
} else {

    http_response_code(404);
    echo json_encode(
        array("message" => "No advice found.")
    );
}
