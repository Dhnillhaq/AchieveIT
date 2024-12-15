<?php

class LogAdminModel extends Connection
{
    public function getAllLogAdmin()
    {

        $stmt = "SELECT TOP 50 l.*, a.nama FROM log_admin l
                JOIN admin a ON a.id_admin = l.id_admin";
        $result = sqlsrv_query($this->conn, $stmt);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data ?? [];
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