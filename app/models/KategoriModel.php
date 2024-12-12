<?php

namespace App\Models;

use App\Core\Connection;

class KategoriModel extends Connection
{
    public function getKategori()
    {
        $stmt = "SELECT * FROM kategori";
        $result = sqlsrv_query($this->conn, $stmt);

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

        if ($result) {
            return sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
        } else {
            // error handling
        }
    }

    public function store($data)
    {
        $stmt = "INSERT INTO kategori(kategori) VALUES(?)";
        $params = array(
            $data['kategori']
        );
        return sqlsrv_query($this->conn, $stmt, $params);
    }

    public function update($data)
    {
        $stmt = "UPDATE kategori SET kategori = ? WHERE id_kategori = ?";
        $params = array(
            $data['kategori'],
            $data['id_kategori']
        );
        return sqlsrv_query($this->conn, $stmt, $params);
    }

    public function delete($id)
    {
        $stmt = "DELETE FROM kategori WHERE id_kategori = ?";
        $params = array(
            $id
        );
        return sqlsrv_query($this->conn, $stmt, $params);
    }
}