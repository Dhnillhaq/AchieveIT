<?php

class PeranDosenModel extends Connection
{
    public function getPeranDosen()
    {
        $stmt = "SELECT * FROM peran_dosen";
        $result = sqlsrv_query($this->conn, $stmt);

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    public function getPeranDosenById($id)
    {
        $stmt = "SELECT * FROM peran_dosen WHERE id_peran = ?";
        $params = array($id);
        $result = sqlsrv_query($this->conn, $stmt, $params);

        return sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

    }

    public function store($data)
    {
        $stmt = "INSERT INTO peran_dosen(peran) VALUES(?)";
        $params = array($data['peran']);
        return sqlsrv_query($this->conn, $stmt, $params);
    }
    public function delete($id_peran)
    {
        $stmt = "DELETE FROM peran_dosen WHERE id_peran = ?";
        $params = array($id_peran);

        return sqlsrv_query($this->conn, $stmt, $params);
    }

    public function update($data)
    {
        $stmt = "UPDATE peran_dosen SET peran = ? WHERE id_peran = ?";
        $params = array(
            $data['peran'],
            $data['id_peran']
        );
        return sqlsrv_query($this->conn, $stmt, $params);
    }
}