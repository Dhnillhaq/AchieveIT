<?php

class KategoriModel extends Connection
{
    public function getKategori()
    {
        $stmt = "SELECT * FROM kategori";
        $result = sqlsrv_query($this->conn, $stmt);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    public function getKategoriById($id)
    {
        $stmt = "SELECT * FROM kategori WHERE id_kategori = ?";
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
        $stmt = "INSERT INTO kategori(kategori) VALUES(?)";
        $params = array(
            $data['kategori']
        );
        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        return $result;
    }

    public function update($data)
    {
        $stmt = "UPDATE kategori SET kategori = ? WHERE id_kategori = ?";
        $params = array(
            $data['kategori'],
            $data['id_kategori']
        );
        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        return $result;
    }

    public function delete($id)
    {
        $stmt = "DELETE FROM kategori WHERE id_kategori = ?";
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