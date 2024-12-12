<?php

namespace App\Models;

use App\Core\Connection;

class PrestasiMahasiswaModel extends Connection
{
    public function getPrestasiMahasiswaByIdPrestasi($id_prestasi)
    {
        $stmt = "SELECT * FROM prestasi_mahasiswa WHERE id_prestasi = ?";
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

    public function store($id_prestasi, $id_mahasiswa, $id_peran)
    {
        $stmt = "INSERT INTO prestasi_mahasiswa(id_prestasi, id_mahasiswa, id_peran) VALUES(?, ?, ?)";
        $params = array(
            $id_prestasi,
            $id_mahasiswa,
            $id_peran
        );

        $isSuccess = sqlsrv_query($this->conn, $stmt, $params);
        if (!$isSuccess) {
            die(print_r(sqlsrv_errors(), true));
        }

        return $isSuccess;
    }

    public function update($id_prestasi, $id_mahasiswa, $id_peran, $data)
    {
        $stmt = "UPDATE prestasi_mahasiswa SET id_prestasi = ?, id_mahasiswa = ?, id_peran = ? WHERE id_prestasi = ? AND id_mahasiswa = ? AND id_peran = ?";
        $params = array(
            $id_prestasi,
            $id_mahasiswa,
            $id_peran,
            $data['id_prestasi'],
            $data['id_mahasiswa'],
            $data['id_peran'],
        );

        $isSuccess = sqlsrv_query($this->conn, $stmt, $params);
        if (!$isSuccess) {
            die(print_r(sqlsrv_errors(), true));
        }

        return $isSuccess;
    }

    public function delete($id_prestasi, $id_mahasiswa)
    {
        $stmt = "DELETE FROM prestasi_mahasiswa WHERE id_prestasi = ? AND id_mahasiswa = ?";
        $params = array($id_prestasi, $id_mahasiswa);

        $isSuccess = sqlsrv_query($this->conn, $stmt, $params);
        if (!$isSuccess) {
            die(print_r(sqlsrv_errors(), true));
        }

        return $isSuccess;
    }
}
