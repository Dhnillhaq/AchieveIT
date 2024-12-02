<?php 
class AuthModel extends Connection {

    public function getSuperAdmin(){
        $stmt = "SELECT * FROM admin WHERE role = 'Super Admin'";
        $result = sqlsrv_query($this->conn, $stmt);

        $data = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

        return $data;
    }

    public function getAdmin(){
        $stmt = "SELECT * FROM admin WHERE role = 'Admin'";
        $result = sqlsrv_query($this->conn, $stmt);

        $data = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

        return $data;
    }

    public function getKajur(){
        $stmt = "SELECT * FROM admin WHERE role = 'Ketua Jurusan'";
        $result = sqlsrv_query($this->conn, $stmt);

        $data = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

        return $data;
    }

    public function getMahasiswa($nim){
        $stmt = "SELECT * FROM mahasiswa WHERE nim LIKE '%$nim%'";
        $result = sqlsrv_query($this->conn, $stmt);

        $data  =  sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

        return $data;
    }

}
?>