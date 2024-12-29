<?php

class TingkatPenyelenggaraModel extends Connection
{
    public function getTingkatPenyelenggara()
    {

        $stmt = "SELECT * FROM tingkat_penyelenggara";
        $result = sqlsrv_query($this->conn, $stmt);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data ?? [];
    }

    public function getTingkatPenyelenggaraById($id)
    {
        $stmt = "SELECT * FROM tingkat_penyelenggara WHERE id_tingkat_penyelenggara = ?";
        $params = array(
            $id
        );
        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        $data = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC) ?? [];

        return $data;
    }

    public function store($data)
    {
        $stmt = "INSERT INTO tingkat_penyelenggara(tingkat_penyelenggara, poin) VALUES(?, ?)";
        $params = array(
            $data['tingkat_penyelenggara'],
            $data['poin']
        );
        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        return $result;
    }

    public function update($data)
    {
        $stmt = "UPDATE tingkat_penyelenggara SET tingkat_penyelenggara = ?, poin = ? WHERE id_tingkat_penyelenggara = ?";
        $params = array(
            $data['tingkat_penyelenggara'],
            $data['poin'],
            $data['id_tingkat_penyelenggara']
        );
        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        return $result;
    }

    public function delete($id)
    {
        $stmt = "DELETE FROM tingkat_penyelenggara WHERE id_tingkat_penyelenggara = ?";
        $params = array(
            $id
        );
        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        return $result;
    }
}