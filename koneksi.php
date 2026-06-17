<?php
//assalamualaikum wr.wb
//nama : Akmal Viasda
//kelas : TI-1C
// file: koneksi.php

class Database {
    private $host = "localhost";
    private $db_name = "db_simulasi_pbo_kelas_akmalviasda."; // Sesuaikan dengan database Anda
    private $username = "root";              // Sesuaikan dengan username Anda
    private $password = "";                  // Sesuaikan dengan password Anda
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name, 
                $this->username, 
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } catch(PDOException $exception) {
            echo "Koneksi gagal: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>