<?php

class LogAdminModel extends Connection
{
    public function getAllLogAdmin()
    {

        $stmt = "SELECT * FROM log_admin";
        $result = sqlsrv_query($this->conn, $stmt);



        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    public function getLogAdminByIdAdmin($id_admin)
    {

        $stmt = "SELECT l.*, a.nama FROM log_admin l
                JOIN admin a ON a.id_admin = l.id_admin 
                WHERE l.id_admin = ?";
        $params = array(
            $id_admin
        );
        $data = [];

        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result) {
            while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                $data[] = $row;
            }
        } else {
            // error handling
        }
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
        return sqlsrv_query($this->conn, $stmt, $params);
    }

    public function update($data)
    {
        $stmt = "UPDATE tingkat_kompetisi SET tingkat_kompetisi = ?, poin = ? WHERE id_tingkat_kompetisi = ?";
        $params = array(
            $data['tingkat_kompetisi'],
            $data['poin'],
            $data['id_tingkat_kompetisi']
        );
        return sqlsrv_query($this->conn, $stmt, $params);
    }

    public function delete($id)
    {
        $stmt = "DELETE FROM tingkat_kompetisi WHERE id_tingkat_kompetisi = ?";
        $params = array(
            $id
        );
        return sqlsrv_query($this->conn, $stmt, $params);
    }
}