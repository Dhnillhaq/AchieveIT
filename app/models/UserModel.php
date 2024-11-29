<?php 
class UserModel extends Connection {
    private $data;
    public function getSuperAdmin(){
        $stmt = "SELECT * FROM admin WHERE role = 'Super Admin'";
        $result = sqlsrv_query($this->conn, $stmt);

        $this->data = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

        return $this->data;
    }

    public function getAdmin(){
        $stmt = "SELECT * FROM admin WHERE role = 'Admin'";
        $result = sqlsrv_query($this->conn, $stmt);

        $this->data = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

        return $this->data;
    }

    public function getKajur(){
        $stmt = "SELECT * FROM admin WHERE role = 'Ketua Jurusan'";
        $result = sqlsrv_query($this->conn, $stmt);

        $this->data = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

        return $this->data;
    }

    public function getMahasiswa($nim){
        $stmt = "SELECT nim, password FROM mahasiswa WHERE nim LIKE '%$nim%'";
        $result = sqlsrv_query($this->conn, $stmt);

        $this->data  =  sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

        return $this->data;
    }

}
?>