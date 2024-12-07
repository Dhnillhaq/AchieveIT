<?php 
class AdminModel extends Connection
{
    
    // Get All Data Admin
    public function getAllDataAdmin()
    {
        $stmt = "SELECT * FROM admin";
        $result = sqlsrv_query($this->conn, $stmt);

        
        
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    // Get All Log Admin
    public function getAllLogAdmin()
    {
     
        $stmt = "SELECT * FROM log_admin";
        $result = sqlsrv_query($this->conn, $stmt);

        
        
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    public function getAdminById($id)
    {
        $stmt = "SELECT * FROM admin WHERE id_admin = ?";
        $params = array($id);
        $result = sqlsrv_query($this->conn, $stmt, $params);
        
        return  sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
        
    }

    public function store($data)
    {
        $stmt = "INSERT INTO admin(nip, nama, role, password) VALUES(?, ?, ?, ?)";
        $params = array($data['nip'], $data['nama'], $data['role'], $data['password']);
        return sqlsrv_query($this->conn, $stmt, $params);
    }
    
    public function delete($id_admin)
    {
        $stmt = "DELETE FROM admin WHERE id_admin = ?";
        $params = array($id_admin);

        return sqlsrv_query($this->conn, $stmt, $params);
    }

    public function update($data)
    {
        $stmt = "UPDATE admin SET nip = ?, nama = ?, role = ?, password = ? WHERE id_admin = ?";
        $params = array(
            $data['nip'],
            $data['nama'],
            $data['role'],
            $data['password'],
            $data['id_admin']
        );
        return sqlsrv_query($this->conn, $stmt, $params);
    }
}
?>