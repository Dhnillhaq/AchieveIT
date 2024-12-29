<?php

class JuaraModel extends Connection
{
    public function getJuara()
    {
        $stmt = "SELECT * FROM juara";
        $result = sqlsrv_query($this->conn, $stmt);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data ?? [];
    }

    public function getJuaraById($id)
    {
        $stmt = "SELECT * FROM juara WHERE id_juara = ?";
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
        $stmt = "INSERT INTO juara(juara, poin) VALUES(?, ?)";
        $params = array(
            $data['juara'],
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
        $stmt = "UPDATE juara SET juara = ?, poin = ? WHERE id_juara = ?";
        $params = array(
            $data['juara'],
            $data['poin'],
            $data['id_juara']
        );
        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        return $result;
    }

    public function delete($id)
    {
        $stmt = "DELETE FROM juara WHERE id_juara = ?";
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