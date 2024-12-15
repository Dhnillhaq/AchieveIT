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

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        return $result;
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

        if ($idResource === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        // Fetch the inserted ID
        $idRow = sqlsrv_fetch_array($idResource, SQLSRV_FETCH_NUMERIC);
        $insertedId = $idRow[0]; // ID of the inserted row

        return (int) $insertedId;
    }
}
