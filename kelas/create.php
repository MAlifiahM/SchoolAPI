<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../config/database.php';
 
// instantiate kelas object
include_once '../kelas/kelas.php';

$database = new Database();
$db = $database->getConnection();

$kelas = new kelas($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// make sure data is not empty
if (!empty($data->kode_kelas) &&
    !empty($data->nama_kelas)
    ){
 
    // set kelas property values
    $kelas->kode_kelas = $data->kode_kelas;
    $kelas->nama_kelas = $data->nama_kelas;
    
 
    // create the kelas
    if ($kelas->create()) {
 
        // set response code - 201 created
        http_response_code(201);

        echo json_encode(array("message" => "kelas was created."));
    } else {
 
        // set response code - 503 service unavailable
        http_response_code(503);

        echo json_encode(array("message" => "Unable to create kelas."));
    }
} else {
 
    // set response code - 400 bad request
    http_response_code(400);
 
    echo json_encode(array("message" => "Data is incomplete."));
}
?>