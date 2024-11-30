<?php
class PeranDosenModel extends Connection
{
    public function getPeranDosen()
    {   
        $stmt = "SELECT * FROM peran_dosen";
        $result = sqlsrv_query($this->conn, $stmt);

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }
}