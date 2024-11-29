<?php 
class AdminModel extends Connection
{
    private $data = [];
    // Get All Data Admin
    public function getAllDataAdmin()
    {
        $stmt = "SELECT * FROM admin";
        $result = sqlsrv_query($this->conn, $stmt);

        
        
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $this->data[] = $row;
        }
        return $this->data;
    }

    // Get All Log Admin
    public function getAllLogAdmin()
    {
     
        $stmt = "SELECT * FROM log_admin";
        $result = sqlsrv_query($this->conn, $stmt);

        
        
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $this->data[] = $row;
        }
        return $this->data;
    }
}
?>