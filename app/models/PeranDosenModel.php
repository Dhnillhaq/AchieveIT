<?php

class PeranDosenModel extends Connection
{
    public function getPeranDosen()
    {
        $stmt = "SELECT * FROM peran_dosen";
        $result = sqlsrv_query($this->conn, $stmt);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data ?? [];
    }

    public function getPeranDosenById($id)
    {
        $stmt = "SELECT * FROM peran_dosen WHERE id_peran = ?";
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
        $stmt = "INSERT INTO peran_dosen(peran) VALUES(?)";
        $params = array($data['peran']);
        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        return $result;
    }
    public function delete($id_peran)
    {
        $stmt = "DELETE FROM peran_dosen WHERE id_peran = ?";
        $params = array($id_peran);
        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        return $result;
    }

    public function update($data)
    {
        $stmt = "UPDATE peran_dosen SET peran = ? WHERE id_peran = ?";
        $params = array(
            $data['peran'],
            $data['id_peran']
        );
        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        return $result;
    }
}