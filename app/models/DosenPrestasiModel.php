<?php

class DosenPrestasiModel extends Connection
{
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
}
