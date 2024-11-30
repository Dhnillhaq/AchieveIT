<?php
class TingkatPenyelenggaraModel extends Connection
{
    public function getTingkatPenyelenggara(){   

        $stmt = "SELECT * FROM tingkat_penyelenggara";
        $result = sqlsrv_query($this->conn, $stmt);

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }
}