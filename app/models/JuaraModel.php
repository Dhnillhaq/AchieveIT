<?php
class JuaraModel extends Connection
{
    public function getJuara(){   

        $stmt = "SELECT * FROM juara";
        $result = sqlsrv_query($this->conn, $stmt);

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }
}