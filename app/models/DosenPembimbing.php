<?php 
class DosenPembimbing
{
    private $db;

    // Get All Dosen Pembimbing
    public function getAllDosenPembimbing()
    {
        $this->db = new Connection;
        $stmt = "SELECT * FROM dosen_pembimbing";
        $result = sqlsrv_query($this->db->conn, $stmt);

        $data = [];

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }
}

?>