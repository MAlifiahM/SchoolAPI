<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../kelas/kelas.php';
 
// instantiate database and kelas object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$kelas = new kelas($db);
 
// query kelas
$result = $kelas->read();
$countKelasData = $result->rowCount();
 
// check if more than 0 record found
if ($countKelasData > 0) {
 
    // kelas array
    $kelas_arr = array();
    $kelas_arr["kelas"] = array();
 
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

        extract($row);

        $item_kelas = array(
            "kode_kelas" => $kode_kelas,
            "nama_kelas" => $nama_kelas
        );

        array_push($kelas_arr["kelas"], $item_kelas);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    echo json_encode($kelas_arr);
} else {
 
    // set response code - 404 Not found
    http_response_code(404);
 
    echo json_encode(
        array("message" => "kelas tidak di temukan.")
    );
}
?>