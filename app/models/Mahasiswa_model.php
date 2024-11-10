<?php



class Mahasiswa_model
{
    private $db;

    public function __construct() {
        $this->db = new Connection;
    }

    // Get All Mahasiswa
    public function getAllDataMahasiswa()
    {
        $stmt = "SELECT * FROM mahasiswa";
        $result = sqlsrv_query($this->db->conn, $stmt);

        $data = [];

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    // Get Prestasi ber-Anggota kan Mahasiswa
    public function getPrestasiMhs()
    {
        $stmt = "SELECT * FROM prestasi_mahasiswa";
        $result = sqlsrv_query($this->db->conn, $stmt);

        $data = [];

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }
}
?>