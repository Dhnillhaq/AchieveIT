<?php

class AdminModel extends Connection
{

    // Get All Data Admin
    public function getAllDataAdmin()
    {
        $stmt = "SELECT * FROM admin";
        $result = sqlsrv_query($this->conn, $stmt);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data ?? [];
    }

    // Get All Log Admin
    public function getAllLogAdmin()
    {

        $stmt = "SELECT * FROM log_admin";
        $result = sqlsrv_query($this->conn, $stmt);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data ?? [];
    }

    public function getAdminById($id)
    {
        $stmt = "SELECT * FROM admin WHERE id_admin = ?";
        $params = array($id);
        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        $data = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC) ?? [];

        return $data;
    }

    public function store($data)
    {
        $stmt = "INSERT INTO admin(nip, nama, role, password) VALUES(?, ?, ?, ?)";
        $params = array($data['nip'], $data['nama'], $data['role'], $data['password']);
        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        return $result;
    }

    public function delete($id_admin)
    {
        $stmt = "DELETE FROM admin WHERE id_admin = ?";
        $params = array($id_admin);
        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        return $result;
    }

    public function update($data)
    {
        $stmt = "UPDATE admin SET nip = ?, nama = ?, role = ?, password = ? WHERE id_admin = ?";
        $params = array(
            $data['nip'],
            $data['nama'],
            $data['role'],
            $data['password'],
            $data['id_admin']
        );
        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        return $result;
    }
}
?>