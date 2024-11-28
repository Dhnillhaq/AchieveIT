<?php 
class ProgramStudiModel extends Connection
{
    private $data = [];
    
    // Get All Dosen Pembimbing
    public function getAllDosenPembimbing()
    {
        $stmt = "SELECT * FROM dosen_pembimbing";
        $result = sqlsrv_query($this->conn, $stmt);

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $this->data[] = $row;
        }
        return $this->data;
    }
}

?>