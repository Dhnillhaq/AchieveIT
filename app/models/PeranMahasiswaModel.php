<?php

namespace App\Models;

use App\Core\Connection;

class PeranMahasiswaModel extends Connection
{
    public function getPeranMhs()
    {   
        $stmt = "SELECT * FROM peran_mahasiswa";
        $result = sqlsrv_query($this->conn, $stmt);

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    public function getPeranMhsById($id)
    {
        $stmt = "SELECT * FROM peran_mahasiswa WHERE id_peran = ? ";
        $params = array($id);
        $result = sqlsrv_query($this->conn, $stmt, $params);

        return sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
    }

    public function store ($data)
    {
        $stmt = "INSERT INTO peran_mahasiswa(peran) VALUES (?)";
        $params = array($data['peran']);
        return sqlsrv_query($this->conn, $stmt, $params);
    }

    public function delete($id_peran)
    {
        $stmt = "DELETE FROM peran_mahasiswa WHERE id_peran = ?";
        $params = array($id_peran);

        return sqlsrv_query($this->conn, $stmt, $params);
    }

    public function update($data)
    {
        $stmt = "UPDATE peran_mahasiswa SET peran = ? WHERE id_peran = ?";
        $params = array(
            $data['peran'],
            $data['id_peran']
        );
        return sqlsrv_query($this->conn, $stmt, $params);
    }
}