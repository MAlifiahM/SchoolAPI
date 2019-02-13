<?php
class kelas
{
 
    // database connection and table name
    private $conn;
    private $table_name = "kelas";
 
    // object properties
    public $kode_kelas;
    public $nama_kelas;
 
    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // read kelas data
    function read()
    {
        if (!empty($_GET['kode_kelas'])) {
            // select data by kode kelas
            $query = "SELECT * FROM " . $this->table_name . " WHERE kode_kelas = '". $_GET['kode_kelas'] . "'";
        } else {
            // select all query
            $query = "SELECT * FROM " . $this->table_name;
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
        $query = "INSERT INTO " . $this->table_name . " SET kode_kelas=:kode_kelas, nama_kelas=:nama_kelas";

    // prepare query
        $insert = $this->conn->prepare($query);
 
    // bind values
        $insert->bindParam(":kode_kelas", $this->kode_kelas);
        $insert->bindParam(":nama_kelas", $this->nama_kelas);
 
    // execute query
        if ($insert->execute()) {
            return true;
        }

        return false;

    }
}
?>