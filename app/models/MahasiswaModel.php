<?php

class MahasiswaModel extends Connection
{
    private $data = [];

    // Get All Mahasiswa
    public function getAllDataMahasiswa()
    {
        $stmt = "SELECT m.*, 
		            p.*
                    FROM mahasiswa m
                    JOIN program_studi p ON m.id_prodi = p.id_prodi";
        $result = sqlsrv_query($this->conn, $stmt);

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $this->data[] = $row;
        }
        return $this->data;
    }
    public function getMahasiswaByNim($nim)
    {
        $stmt = "SELECT m.*, 
		            p.*
                    FROM mahasiswa m
                    JOIN program_studi p ON m.id_prodi = p.id_prodi
                    WHERE nim = ?";
        $params = array($nim);
        $result = sqlsrv_query($this->conn, $stmt);

        $this->data[] = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
        $this->data[] = $this->getStatistikMhs($nim);
        ;

        return $this->data;
    }
    public function getPrestasiMahasiswaByNim($nim)
    {
        $stmt = "EXEC usp_GetPrestasiMahasiswa @nim = ?;";
        $params = array($nim);
        $result = sqlsrv_query($this->conn, $stmt, $params);
        
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $this->data[] = $row;
        }

        return $this->data;
    }

    // Get Prestasi ber-Anggota kan Mahasiswa   
    public function getStatistikMhs($nim)
    {
        $stmt = "EXEC usp_GetStatistikMahasiswa @nim = ?;";
        $params = array($nim);
        $result = sqlsrv_query($this->conn, $stmt, $params);
        
        $this->data[] = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
        
        return $this->data;
    }

    public function countPrestMhs($nim)
    {
        $stmt = "SELECT dbo.fn_HitungTotalPrestasi(?) AS total";
        $params = array($nim);
        $result = sqlsrv_query($this->conn, $stmt, $params);
        

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $this->data[] = $row;
        }
        return $this->data;
    }

    public function getMahasiswaById($id){
        $stmt = "SELECT * FROM mahasiswa WHERE id_mahasiswa = ?;";
        $params = array($id);
        $result = sqlsrv_query($this->conn, $stmt, $params);
        
        return sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
    }

    public function store($data){
        $stmt = "INSERT INTO mahasiswa (id_prodi, nim, nama, tempat_lahir, tanggal_lahir, agama, jenis_kelamin, no_telepon, email, password) VALUE (?, ?, ?, ?, ?, ?, ?, ?, ?,?);";
        $params = array(
            $data['id_prodi'],
            $data['nim'],
            $data['nama'],
            $data['tempat_lahir'],
            $data['tanggal_lahir'],
            $data['agama'],
            $data['jenis_kelamin'],
            $data['no_telepon'],
            $data['email'],
            $data['password']
        );

        sqlsrv_query($this->conn, $stmt, $params);
    }

    public function delete($id_mahasiswa)
    {
        $stmt = "DELETE FROM mahasiswa WHERE id_mahasiswa = ?";
        $params = array($id_mahasiswa);

        sqlsrv_query($this->conn, $stmt, $params);
    }

    public function update($data){
        $stmt = "UPDATE mahasiswa
            SET
                id_prodi = ?,
                nim = ?,
                nama = ?,
                tempat_lahir = ?,
                tanggal_lahir = ?,
                agama = ?,
                jenis_kelamin = ?,
                no_telepon = ?,
                email = ?, 
                password = ? 
            WHERE id_mahasiswa = ?;";
        $params = array(
            $data['id_prodi'],
            $data['nim'],
            $data['nama'],
            $data['tempat_lahir'],
            $data['tanggal_lahir'],
            $data['agama'],
            $data['jenis_kelamin'],
            $data['no_telepon'],
            $data['email'],
            $data['password'],
            $data['id_mahasiswa']
        );

        sqlsrv_query($this->conn, $stmt, $params);
    }
}
?>