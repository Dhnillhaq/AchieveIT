<?php

class PrestasiMahasiswaModel extends Connection
{
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
}
