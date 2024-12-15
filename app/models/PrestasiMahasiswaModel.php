<?php

class PrestasiMahasiswaModel extends Connection
{
    public function getPrestasiMahasiswaByIdPrestasi($id_prestasi)
    {
        $stmt = "SELECT * FROM prestasi_mahasiswa WHERE id_prestasi = ?";
        $params = array(
            $id_prestasi
        );
        $result = sqlsrv_query($this->conn, $stmt, $params);
        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        $data = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC) ?? [];

        return $data;
    }

    public function store($id_prestasi, $id_mahasiswa, $id_peran)
    {
        $stmt = "INSERT INTO prestasi_mahasiswa(id_prestasi, id_mahasiswa, id_peran) VALUES(?, ?, ?)";
        $params = array(
            $id_prestasi,
            $id_mahasiswa,
            $id_peran
        );
        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        return $result;
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
        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        return $result;
    }

    public function delete($id_prestasi, $id_mahasiswa)
    {
        $stmt = "DELETE FROM prestasi_mahasiswa WHERE id_prestasi = ? AND id_mahasiswa = ?";
        $params = array($id_prestasi, $id_mahasiswa);
        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        return $result;
    }
}
