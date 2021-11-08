<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once 'config/database.php';
include_once 'objects/administrator.php';
include_once 'objects/doctor.php';
include_once 'objects/clinic.php';
include_once 'objects/patient.php';

$database = new Database();
$db = $database->getConnection();

$admin = new Admin($db);
$doctor = new Doctor($db);
$clinic = new Clinic($db);
$patient = new Patient($db);

$stmt1 = $admin->getLogin(); 
$num1 = $stmt1->rowCount();

$stmt2 = $doctor->getLogin();
$num2 = $stmt2->rowCount();

$stmt3 = $clinic->getLogin();
$num3 = $stmt3->rowCount();

$stmt4 = $patient->getLogin();
$num4 = $stmt4->rowCount();

if ($num1 == 1) {

    while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $data1 = array(
            "id" => $id,
            "kind" => "admin",
        );
        
    }

    http_response_code(200);
    echo json_encode($data1);

} elseif ($num2 == 1) {
    
    while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $data2 = array(
            "id" => $id,
            "kind" => "doctor",
        );
        
    }

    http_response_code(200);
    echo json_encode($data2);

} elseif ($num3 == 1) {

    while ($row = $stmt3->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $data3 = array(
            "id" => $id,
            "kind" => "clinic",
        );
    
    }
    
    http_response_code(200);
    echo json_encode($data3);

} elseif ($num4 == 1) {

    while ($row = $stmt4->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $data4 = array(
            "id" => $id,
            "name" => $name,
            "username" => $username,
            "password" => $password,
            "email" => $email,
            "mobile" => $mobile,
            "address" => $address,
            "kind" => "patient",
        );
    }
    
    http_response_code(200);
    echo json_encode($data4);

} else {

    $data5 = array(
        "id" => 0,
        "kind" => "Not Found",
    );

    http_response_code(404);
    echo json_encode($data5);
    
}
