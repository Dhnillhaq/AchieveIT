<?php

class MahasiswaModel extends Connection
{
    private $data = [];

    // Get All Mahasiswa
    public function getAllDataMahasiswa($nim)
    {
        $stmt = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
        $result = sqlsrv_query($this->conn, $stmt);

        $this->data[] = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
        $this->data[] = $this->countPrestMhs($nim);;
        
        return $this->data;
    }

    // Get Prestasi ber-Anggota kan Mahasiswa   
    public function getPrestasiMhs()
    {
        $stmt = "EXEC usp_GetPrestasiMahasiswa @nim = '?';";
        $result = sqlsrv_query($this->conn, $stmt);
        
        
        
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $this->data[] = $row;
        }
        return $this->data;
    }

    public function countPrestMhs($nim)
    {
        $stmt = "SELECT dbo.fn_HitungTotalPrestasi('$nim') AS total";
        $result = sqlsrv_query($this->conn, $stmt);


        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $this->data[] = $row;
        }
        return $this->data;
    }
}
?>