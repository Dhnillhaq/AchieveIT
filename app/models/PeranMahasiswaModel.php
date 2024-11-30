<?php
class PeranMahasiswaModel extends Connection
{
    public function getPeranMhs()
    {   
        $stmt = "SELECT * FROM peran_mahasiswa";
        $result = sqlsrv_query($this->conn, $stmt);

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }
}