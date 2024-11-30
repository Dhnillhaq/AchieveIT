<?php
class DosenModel extends Connection
{
    private $data = [];

    // Get All Dosen
    public function getDosen()
    {
        $stmt = "SELECT * FROM dosen";
        $result = sqlsrv_query($this->conn, $stmt);


        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $this->data[] = $row;
        }
        return $this->data;
    }
}

?>