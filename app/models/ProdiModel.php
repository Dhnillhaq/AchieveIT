<?php
class ProdiModel extends Connection
{

    public function getAllProdi()
    {
        $stmt = "SELECT * FROM program_studi";
        $result = sqlsrv_query($this->conn, $stmt);

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    public function getProdiById($id)
    {
        $stmt = "SELECT * FROM program_studi WHERE id_prodi = ?";   
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
        $stmt = "INSERT INTO program_studi(kode_prodi, nama_prodi) VALUES(?, ?)";
        $params = array(
            $data['kode_prodi'],
            $data['nama_prodi']
        );
        return sqlsrv_query($this->conn, $stmt, $params);
    }

    public function update($data)
    {
        $stmt = "UPDATE program_studi SET kode_prodi = ?, nama_prodi = ? WHERE id_prodi = ?";
        $params = array(
            $data['kode_prodi'],
            $data['nama_prodi'],
            $data['id_prodi']
        );
        return sqlsrv_query($this->conn, $stmt, $params);
    }

    public function delete($id)
    {
        $stmt = "DELETE FROM program_studi WHERE id_prodi = ?";
        $params = array(
            $id
        );
        return sqlsrv_query($this->conn, $stmt, $params);
    }
}

?>