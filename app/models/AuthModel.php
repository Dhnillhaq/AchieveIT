<?php
class AuthModel extends Connection
{

    public function getSuperAdmin()
    {
        $stmt = "SELECT * FROM admin WHERE role = ?";
        $params = array('Super Admin');
        $result = sqlsrv_query($this->conn, $stmt, $params);

        $data = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

        return $data;
    }

    public function getAdmin()
    {
        $stmt = "SELECT * FROM admin WHERE role = ?";
        $params = array('Admin');
        $result = sqlsrv_query($this->conn, $stmt, $params);

        $data = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

        return $data;
    }

    public function getKajur()
    {
        $stmt = "SELECT * FROM admin WHERE role = ?";
        $params = array('Ketua Jurusan');
        $result = sqlsrv_query($this->conn, $stmt, $params);

        $data = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

        return $data;
    }

    public function getMahasiswa($nim)
    {
        $stmt = "SELECT * FROM mahasiswa WHERE nim LIKE ?";
        $params = array("%{$nim}%");
        $result = sqlsrv_query($this->conn, $stmt, $params);
        // Ambil data
        $data = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
    }

    public function registrasi($username, $password)
    {
        $stmt = "INSERT INTO mahasiswa (nim, password) VALUES (?, ?)";
        $params = array($username, $password);
        return sqlsrv_query($this->conn, $stmt, $params);
    }

    public function gantiSandi($username, $password)
    {
        if ($_SESSION['user']['role'] == 'Mahasiswa') {
            $stmt = "UPDATE mahasiswa
                 SET password = ?
                 WHERE nim = ?;";
        } else {
            $stmt = "UPDATE admin
                 SET password = ?
                 WHERE nip = ?;";
        }

        $params = array($username, $password);

        return sqlsrv_query($this->conn, $stmt, $params);
    }

}
?>