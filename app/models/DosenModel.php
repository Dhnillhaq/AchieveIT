<?php

class DosenModel extends Connection
{
    // Get All Dosen
    public function getDosen()
    {
        $stmt = "SELECT * FROM dosen";
        $result = sqlsrv_query($this->conn, $stmt);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data ?? [];
    }

    public function getDosenById($id)
    {
        $stmt = "SELECT * FROM dosen WHERE id_dosen = ?";
        $params = array($id);
        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        $data = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC) ?? [];

        return $data;
    }

    public function store($data)
    {
        $stmt = "INSERT INTO dosen(nama, nip) VALUES(?, ?)";
        $params = array($data['nama'], $data['nip']);
        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        return $result;
    }

    public function delete($id_dosen)
    {
        $stmt = "DELETE FROM dosen WHERE id_dosen = ?";
        $params = array($id_dosen);
        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        return $result;
    }

    public function update($data)
    {
        $stmt = "UPDATE dosen SET nip = ?, nama = ? WHERE id_dosen = ?";
        $params = array(
            $data['nip'],
            $data['nama'],
            $data['id_dosen']
        );
        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        return $result;
    }
}

?>