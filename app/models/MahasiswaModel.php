<?php

class MahasiswaModel extends Connection
{
    private $data = [];

    // Get All Mahasiswa
    public function getAllDataMahasiswa()
    {
        $stmt = "SELECT * FROM mahasiswa";
        $result = sqlsrv_query($this->conn, $stmt);


        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $this->data[] = $row;
        }
        return $this->data;
    }

    // Get Prestasi ber-Anggota kan Mahasiswa
    public function getPrestasiMhs()
    {
        $stmt = "SELECT * FROM prestasi_mahasiswa";
        $result = sqlsrv_query($this->conn, $stmt);

        

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $this->data[] = $row;
        }
        return $this->data;
    }
}
?>