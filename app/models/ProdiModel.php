<?php
class ProdiModel extends Connection
{
    private $data = [];

    // Get All Dosen Pembimbing
    public function getAllProdi()
    {
        $stmt = "SELECT * FROM program_studi";
        $result = sqlsrv_query($this->conn, $stmt);

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $this->data[] = $row;
        }
        return $this->data;
    }
}

?>