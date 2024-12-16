<?php

class LogAdminModel extends Connection
{
    public function getAllLogAdmin($offset = 0, $limit = 10)
    {
        $stmt = "SELECT l.*, a.nama FROM log_admin l
                 JOIN admin a ON a.id_admin = l.id_admin
                 ORDER BY l.timestamp DESC
                 OFFSET ? ROWS 
                 FETCH NEXT ? ROWS ONLY;";
        $params = array($offset, $limit);
        $result = sqlsrv_query($this->conn, $stmt, $params);
    
        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }
    
        $data = [];
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
    
        if (empty($data)) {
            return [];
        }
    
        return $data;
    }
    
    public function countLogs()
    {
        $stmt = "SELECT COUNT(*) AS total FROM log_admin;";
        $result = sqlsrv_query($this->conn, $stmt);
    
        if ($result === false) {
            die(print_r(sqlsrv_errors(), true));
        }
        
        $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
    
        return $row['total'];
    }
    

    public function getLogAdminByIdAdmin($id_admin)
    {

        $stmt = "SELECT l.*, a.nama FROM log_admin l
                JOIN admin a ON a.id_admin = l.id_admin 
                WHERE l.id_admin = ?";
        $params = array(
            $id_admin
        );
        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        $data = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC) ?? [];

        return $data;
    }

    public function storeAdminLog($aksi, $keterangan)
    {
        $stmt = "INSERT INTO log_admin(id_admin, aksi, keterangan, timestamp) VALUES(?, ?, ?, GETDATE())";
        $params = array(
            $_SESSION['user']['id_admin'],
            $aksi,
            $keterangan
        );
        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        return $result;
    }
}