<?php

namespace App\Models;

use App\Core\Connection;

class DosenPrestasiModel extends Connection
{

    public function getDosenPrestasiByIdPrestasi($id_prestasi)
    {
        $stmt = "SELECT * FROM dosen_prestasi WHERE id_prestasi = ?";
        $params = array(
            $id_prestasi
        );

        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result) {
            return sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
        } else {
            // error handling
        }
    }

    public function store($id_prestasi, $id_dosen, $id_peran)
    {
        $stmt = "INSERT INTO dosen_prestasi(id_prestasi, id_dosen, id_peran) VALUES(?, ?, ?)";
        $params = array(
            $id_prestasi,
            $id_dosen,
            $id_peran
        );

        $isSuccess = sqlsrv_query($this->conn, $stmt, $params);
        if (!$isSuccess) {
            die(print_r(sqlsrv_errors(), true));
        }

        return $isSuccess;
    }

    public function update($id_prestasi, $id_dosen, $id_peran, $data)
    {
        $stmt = "UPDATE dosen_prestasi SET id_prestasi = ?, id_dosen = ?, id_peran = ? WHERE id_prestasi = ? AND id_dosen = ? AND id_peran = ?";
        $params = array(
            $id_prestasi,
            $id_dosen,
            $id_peran,
            $data['id_prestasi'],
            $data['id_dosen'],
            $data['id_peran'],
        );

        $isSuccess = sqlsrv_query($this->conn, $stmt, $params);
        if (!$isSuccess) {
            die(print_r(sqlsrv_errors(), true));
        }

        return $isSuccess;
    }

    public function delete($id_prestasi, $id_dosen)
    {
        $stmt = "DELETE FROM dosen_prestasi WHERE id_prestasi = ? AND id_dosen = ?";
        $params = array($id_prestasi, $id_dosen);

        $isSuccess = sqlsrv_query($this->conn, $stmt, $params);
        if (!$isSuccess) {
            die(print_r(sqlsrv_errors(), true));
        }

        return $isSuccess;
    }
}
