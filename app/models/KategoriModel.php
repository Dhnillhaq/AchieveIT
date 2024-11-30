<?php
class KategoriModel extends Connection
{
    public function getKategori(){   

        $stmt = "SELECT * FROM kategori";
        $result = sqlsrv_query($this->conn, $stmt);

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }
}