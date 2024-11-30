<?php
class TingkatKompetisiModel extends Connection
{
    public function getTingkatKompetisi(){   

        $stmt = "SELECT * FROM tingkat_kompetisi";
        $result = sqlsrv_query($this->conn, $stmt);

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }
}