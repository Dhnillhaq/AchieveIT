<?php

class ProdiModel extends Connection
{

    public function getAllProdi()
    {
        $stmt = "SELECT * FROM program_studi";
        $result = sqlsrv_query($this->conn, $stmt);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data ?? [];
    }

    public function getProdiById($id)
    {
        $stmt = "SELECT * FROM program_studi WHERE id_prodi = ?";
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
        $stmt = "INSERT INTO program_studi(kode_prodi, nama_prodi) VALUES(?, ?)";
        $params = array(
            $data['kode_prodi'],
            $data['nama_prodi']
        );
        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        return $result;
    }

    public function update($data)
    {
        $stmt = "UPDATE program_studi SET kode_prodi = ?, nama_prodi = ? WHERE id_prodi = ?";
        $params = array(
            $data['kode_prodi'],
            $data['nama_prodi'],
            $data['id_prodi']
        );
        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        return $result;
    }

    public function delete($id)
    {
        $stmt = "DELETE FROM program_studi WHERE id_prodi = ?";
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

?>