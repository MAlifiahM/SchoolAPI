<?php
class Peserta
{
 
    // database connection and table name
    private $conn;
    private $table_name = "peserta";
 
    // object properties
    public $id;
    public $nis;
    public $nama;
    public $kode_kelas;
    public $tanggal_lahir;
    public $tempat_lahir;
    public $alamat;
    public $nama_orang_tua;
    public $pekerjaan_orang_tua;
    public $agama;
    public $tanggal_absensi;
 
    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // read peserta data
    function read()
    {
        if (!empty($_GET['nis'])) {
            //select query by nis
            $query = "SELECT * FROM " . $this->table_name . " WHERE nis = " . $_GET['nis'] . " ORDER BY tanggal_absensi DESC";
        } else {
            // select all query
            $query = "SELECT * FROM " . $this->table_name . " ORDER BY tanggal_absensi DESC";
        }
    
    // prepare query statement
        $result = $this->conn->prepare($query);
 
    // execute query
        $result->execute();

        return $result;
    }

    // create product
    function create()
    {
 
    // query to insert record
        $query = "INSERT INTO " . $this->table_name . " SET nis=:nis, nama=:nama, kode_kelas=:kode_kelas, tanggal_lahir=:tanggal_lahir, tempat_lahir=:tempat_lahir, alamat=:alamat, nama_orang_tua=:nama_orang_tua, pekerjaan_orang_tua=:pekerjaan_orang_tua, agama=:agama, tanggal_absensi=:tanggal_absensi";

    // prepare query
        $insert = $this->conn->prepare($query);
 
    // bind values
        $insert->bindParam(":nis", $this->nis);
        $insert->bindParam(":nama", $this->nama);
        $insert->bindParam(":kode_kelas", $this->kode_kelas);
        $insert->bindParam(":tanggal_lahir", $this->tanggal_lahir);
        $insert->bindParam(":tempat_lahir", $this->tempat_lahir);
        $insert->bindParam(":alamat", $this->alamat);
        $insert->bindParam(":nama_orang_tua", $this->nama_orang_tua);
        $insert->bindParam(":pekerjaan_orang_tua", $this->pekerjaan_orang_tua);
        $insert->bindParam(":agama", $this->agama);
        $insert->bindParam(":tanggal_absensi", $this->tanggal_absensi);

 
    // execute query
        if ($insert->execute()) {
            return true;
        }

        return false;

    }
}
?>