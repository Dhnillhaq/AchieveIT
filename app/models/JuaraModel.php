<?php
class JuaraModel extends Connection
{
    public function getJuara(){   

        $stmt = "SELECT * FROM juara";
        $result = sqlsrv_query($this->conn, $stmt);

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    public function getJuaraById($id)
    {
        $stmt = "SELECT * FROM juara WHERE id_juara = ?";
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
        $stmt = "INSERT INTO juara(juara, poin) VALUES(?, ?)";
        $params = array(
            $data['juara'],
            $data['poin']
        );
        sqlsrv_query($this->conn, $stmt, $params);
    }

    public function update($data)
    {
        $stmt = "UPDATE juara SET juara = ?, poin = ? WHERE id_juara = ?";
        $params = array(
            $data['juara'],
            $data['poin'],
            $data['id_juara']
        );
        sqlsrv_query($this->conn, $stmt, $params);
    }

    public function delete($id)
    {
        $stmt = "DELETE FROM juara WHERE id_juara = ?";
        $params = array(
            $id
        );
        sqlsrv_query($this->conn, $stmt, $params);
    }
}