<?php

class TingkatKompetisiModel extends Connection
{
    public function getTingkatKompetisi()
    {
        $stmt = "SELECT * FROM tingkat_kompetisi";
        $result = sqlsrv_query($this->conn, $stmt);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data ?? [];
    }

    public function getTingkatKompetisiById($id)
    {
        $stmt = "SELECT * FROM tingkat_kompetisi WHERE id_tingkat_kompetisi = ?";
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
        $stmt = "INSERT INTO tingkat_kompetisi(tingkat_kompetisi, poin) VALUES(?, ?)";
        $params = array(
            $data['tingkat_kompetisi'],
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
        $stmt = "UPDATE tingkat_kompetisi SET tingkat_kompetisi = ?, poin = ? WHERE id_tingkat_kompetisi = ?";
        $params = array(
            $data['tingkat_kompetisi'],
            $data['poin'],
            $data['id_tingkat_kompetisi']
        );
        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        return $result;
    }

    public function delete($id)
    {
        $stmt = "DELETE FROM tingkat_kompetisi WHERE id_tingkat_kompetisi = ?";
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