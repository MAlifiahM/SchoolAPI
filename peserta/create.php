<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../config/database.php';
 
// instantiate peserta object
include_once '../peserta/peserta.php';

$database = new Database();
$db = $database->getConnection();

$peserta = new peserta($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// make sure data is not empty
if (!empty($data->nis) &&
    !empty($data->nama) &&
    !empty($data->kode_kelas) &&
    !empty($data->tanggal_lahir) &&
    !empty($data->tempat_lahir) &&
    !empty($data->alamat) &&
    !empty($data->nama_orang_tua) &&
    !empty($data->pekerjaan_orang_tua) &&
    !empty($data->agama) &&
    !empty($data->tanggal_absensi)
    ) {
 
    // set peserta property values
    $peserta->nis = $data->nis;
    $peserta->nama = $data->nama;
    $peserta->kode_kelas = $data->kode_kelas;
    $peserta->tanggal_lahir = date('Y-m-d');
    $peserta->tempat_lahir = $data->tempat_lahir;
    $peserta->alamat = $data->alamat;
    $peserta->nama_orang_tua = $data->nama_orang_tua;
    $peserta->pekerjaan_orang_tua = $data->pekerjaan_orang_tua;
    $peserta->agama = $data->agama;
    $peserta->tanggal_absensi = date('Y-m-d');
    
 
    // create the peserta
    if ($peserta->create()) {
 
        // set response code - 201 created
        http_response_code(201);

        echo json_encode(array("message" => "peserta was created."));
    } else {
 
        // set response code - 503 service unavailable
        http_response_code(503);

        echo json_encode(array("message" => "Unable to create peserta."));
    }
} else {
 
    // set response code - 400 bad request
    http_response_code(400);
 
    echo json_encode(array("message" => "Data is incomplete."));
}
?>