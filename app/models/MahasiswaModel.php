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
    public function getMahasiswaByNim($nim)
    {
        $stmt = "SELECT m.*, 
		            p.*
                    FROM mahasiswa m
                    JOIN program_studi p ON m.id_prodi = p.id_prodi
                    WHERE nim ='$nim'";
        $result = sqlsrv_query($this->conn, $stmt);

        $this->data[] = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
        $this->data[] = $this->getStatistikMhs($nim);
        ;

        return $this->data;
    }
    public function getPrestasiMahasiswaByNim($nim)
    {
        $stmt = "EXEC usp_GetPrestasiMahasiswa @nim = $nim;";
        $result = sqlsrv_query($this->conn, $stmt);

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $this->data[] = $row;
        }

        return $this->data;
    }

    // Get Prestasi ber-Anggota kan Mahasiswa   
    public function getStatistikMhs($nim)
    {
        $stmt = "EXEC usp_GetStatistikMahasiswa @nim = '$nim';";
        $params = array($nim);
        $result = sqlsrv_query($this->conn, $stmt, $params);

        $this->data[] = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

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