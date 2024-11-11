<?php 
class PrestasiModel {
    private $db;

    public function __construct() {
        $this->db = new Connection;
    }

    // Get All Prestasi Mahasiswa
    public function getAllPrestasi()
    {   
        $stmt = "SELECT * FROM prestasi";
        $result = sqlsrv_query($this->db->conn, $stmt);

        $data = [];

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    // Get All Kategori Prestasi
    public function getAllKategori()
    {
        $stmt = "SELECT * FROM kategori_prestasi";
        $result = sqlsrv_query($this->db->conn, $stmt);

        $data = [];

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    
    
    // Get All Data Juara
    public function getAllJuara()
    {

        $stmt = "SELECT * FROM juara";
        $result = sqlsrv_query($this->db->conn, $stmt);

        $data = [];

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    // Get All Data Tingkat Kompetisi
    public function getAllTingkatKompetisi()
    {
        $stmt = "SELECT * FROM tingkat_kompetisi";
        $result = sqlsrv_query($this->db->conn, $stmt);

        $data = [];

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    // Get All Data Tingkat Penyelenggara
    public function getAllTingkatPenyelenggara()
    {
        $stmt = "SELECT * FROM tingkat_penyelenggara";
        $result = sqlsrv_query($this->db->conn, $stmt);

        $data = [];

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }
    


}

?>