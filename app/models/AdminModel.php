<?php 
class AdminModel{
    private $db;

    // Get All Data Admin
    public function getAllDataAdmin()
    {
        $this->db = new Connection;
        $stmt = "SELECT * FROM admin";
        $result = sqlsrv_query($this->db->conn, $stmt);

        $data = [];
        
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    // Get All Log Admin
    public function getAllLogAdmin()
    {
        $this->db = new Connection;
        $stmt = "SELECT * FROM log_admin";
        $result = sqlsrv_query($this->db->conn, $stmt);

        $data = [];
        
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }
}
?>