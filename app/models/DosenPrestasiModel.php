<?php

class DosenPrestasiModel extends Connection
{

    public function getDosenPrestasiByIdPrestasi($id_prestasi)
    {
        $stmt = "SELECT * FROM dosen_prestasi WHERE id_prestasi = ?";
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

    public function store($id_prestasi, $id_dosen, $id_peran)
    {
        // Cek sudah adakah didatabase?
        $query = "SELECT COUNT(*) FROM dosen_prestasi WHERE id_dosen = ? AND id_prestasi = ? AND id_peran = ?";
        $check = sqlsrv_query($this->conn, $query, [$id_dosen, $id_prestasi, $id_peran]);
        $count = sqlsrv_fetch_array($check)[0];
        if ($count > 0) { // jika ya, update data
            $data = [
                'id_prestasi' => $id_prestasi,
                'id_dosen' => $id_dosen,
                'id_peran' => $id_peran
            ];
            $result = $this->update($id_prestasi, $id_dosen, $id_peran, $data);
        } else {

            $stmt = "INSERT INTO dosen_prestasi(id_prestasi, id_dosen, id_peran) VALUES(?, ?, ?)";
            $params = array(
                $id_prestasi,
                $id_dosen,
                $id_peran
            );
            $result = sqlsrv_query($this->conn, $stmt, $params);

            if ($result === false) {
                throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
            }
        }

        return $result;
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
        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        return $result;
    }

    public function delete($id_prestasi, $id_dosen)
    {
        $stmt = "DELETE FROM dosen_prestasi WHERE id_prestasi = ? AND id_dosen = ?";
        $params = array($id_prestasi, $id_dosen);
        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        return $result;
    }
}
