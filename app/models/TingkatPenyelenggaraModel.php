<?php

class TingkatPenyelenggaraModel extends Connection
{
    public function getTingkatPenyelenggara()
    {

        $stmt = "SELECT * FROM tingkat_penyelenggara";
        $result = sqlsrv_query($this->conn, $stmt);

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    public function getTingkatPenyelenggaraById($id)
    {
        $stmt = "SELECT * FROM tingkat_penyelenggara WHERE id_tingkat_penyelenggara = ?";
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
        $stmt = "INSERT INTO tingkat_penyelenggara(tingkat_penyelenggara, poin) VALUES(?, ?)";
        $params = array(
            $data['tingkat_penyelenggara'],
            $data['poin']
        );
        return sqlsrv_query($this->conn, $stmt, $params);
    }

    public function update($data)
    {
        $stmt = "UPDATE tingkat_penyelenggara SET tingkat_penyelenggara = ?, poin = ? WHERE id_tingkat_penyelenggara = ?";
        $params = array(
            $data['tingkat_penyelenggara'],
            $data['poin'],
            $data['id_tingkat_penyelenggara']
        );
        return sqlsrv_query($this->conn, $stmt, $params);
    }

    public function delete($id)
    {
        $stmt = "DELETE FROM tingkat_penyelenggara WHERE id_tingkat_penyelenggara = ?";
        $params = array(
            $id
        );
        return sqlsrv_query($this->conn, $stmt, $params);
    }
}