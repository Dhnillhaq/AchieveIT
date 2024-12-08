<?php

class FilesModel extends Connection
{

    public function getFileById($id)
    {
        $stmt = "SELECT * FROM files WHERE id_file = ?";
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
        $stmt = "INSERT INTO files(nama_file, nama_asli, ukuran, tipe, path) OUTPUT INSERTED.id_file VALUES(?, ?, ?, ?, ?)";
        $params = array(
            $data['nama_file'],
            $data['nama_asli'],
            $data['ukuran'],
            $data['tipe'],
            $data['path']
        );

        $idResource = sqlsrv_query($this->conn, $stmt, $params);

        if (!$idResource) {
            die(print_r(sqlsrv_errors(), true)); // Debug errors
        }

        // Fetch the inserted ID
        $idRow = sqlsrv_fetch_array($idResource, SQLSRV_FETCH_NUMERIC);
        $insertedId = $idRow[0]; // ID of the inserted row

        return (int)$insertedId;
    }
}
