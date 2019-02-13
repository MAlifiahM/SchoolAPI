<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../peserta/peserta.php';
 
// instantiate database and peserta object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$peserta = new peserta($db);
 
// query peserta
$result = $peserta->read();
$countPesertaData = $result->rowCount();
 
// check if more than 0 record found
if ($countPesertaData > 0) {
 
    // peserta array
    $peserta_arr = array();
    $peserta_arr["peserta"] = array();
 
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

        extract($row);

        $peserta_item = array(
            "id" => $id,
            "nis" => $nis,
            "nama" => $nama,
            "kode_kelas" => $kode_kelas,
            "tanggal_lahir" => $tanggal_lahir,
            "tempat_lahir" => $tempat_lahir,
            "alamat" => $alamat,
            "nama_orang_tua" => $nama_orang_tua,
            "pekerjaan_orang_tua" => $pekerjaan_orang_tua,
            "agama" => $agama,
            "tanggal_absensi" => $tanggal_absensi
        );

        array_push($peserta_arr["peserta"], $peserta_item);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    echo json_encode($peserta_arr);
} else {
 
    // set response code - 404 Not found
    http_response_code(404);
 
    echo json_encode(
        array("message" => "peserta tidak di temukan.")
    );
}
?>