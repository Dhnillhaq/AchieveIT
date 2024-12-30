<?php

class MahasiswaModel extends Connection
{

    // Get All Mahasiswa
    public function getAllDataMahasiswa()
    {
        $stmt = "SELECT m.*, 
		            p.*
                    FROM mahasiswa m
                    JOIN program_studi p ON m.id_prodi = p.id_prodi";
        $result = sqlsrv_query($this->conn, $stmt);
        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data ?? [];
    }

    public function getMahasiswaByNim($nim, $status = "Valid")
    {
        $stmt = "SELECT m.*, 
		            p.*
                    FROM mahasiswa m
                    JOIN program_studi p ON m.id_prodi = p.id_prodi
                    WHERE nim = ?
                    AND status = ?";
        $params = array($nim, $status);

        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        $data[] = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC) ?? [];

        if ($status == "Valid") {
            $data[] = $this->getStatistikMhs($nim);
        }

        return $data;
    }
    public function getPrestasiMahasiswaByNim($nim)
    {
        $stmt = "
            SELECT
                p.id_prestasi,
                p.nama_kompetisi,
                tk.tingkat_kompetisi,
                k.kategori AS kategori_kompetisi,
                j.juara,
                p.status,
                p.poin_prestasi AS poin,
                p.created_at
            FROM prestasi_mahasiswa pm
                JOIN mahasiswa m ON pm.id_mahasiswa = m.id_mahasiswa
                JOIN prestasi p ON pm.id_prestasi = p.id_prestasi
                JOIN kategori k ON p.id_kategori = k.id_kategori
                JOIN juara j ON p.id_juara = j.id_juara
                JOIN tingkat_kompetisi tk ON p.id_tingkat_kompetisi = tk.id_tingkat_kompetisi
            WHERE m.nim = ?
            ORDER BY p.created_at DESC;
        ";
        $params = array($nim);
        $result = sqlsrv_query($this->conn, $stmt, $params);    

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        $data = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC) ?? [];

        return $data;
    }

    // Get Prestasi ber-Anggota kan Mahasiswa   
    public function getStatistikMhs($nim)
    {
        $stmt = "
            SELECT
                total_prestasi,
                total_poin,
                peringkat_mapres
            FROM (
                SELECT
                    nim,
                    dbo.fn_HitungTotalPrestasi(?) AS total_prestasi,
                    SUM(p.poin_prestasi) AS total_poin,
                    RANK() OVER (ORDER BY SUM(p.poin_prestasi) DESC) AS 
                    peringkat_mapres
                FROM mahasiswa m
            JOIN prestasi_mahasiswa pm ON m.id_mahasiswa = pm.id_mahasiswa
            JOIN prestasi p ON pm.id_prestasi = p.id_prestasi
			GROUP BY m.nim,
			total_poin
            ) AS RankedMahasiswa
            WHERE nim = ?;
        ";
        $params = array($nim, $nim);
        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        $data = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC) ?? [];

        return $data;
    }

    public function countPrestMhs($nim)
    {
        $stmt = "SELECT dbo.fn_HitungTotalPrestasi(?) AS total";
        $params = array($nim);
        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        $data = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC) ?? [];

        return $data;
    }

    public function getMahasiswaById($id)
    {
        $stmt = "SELECT m.*, 
		            p.*
                    FROM mahasiswa m
                    JOIN program_studi p ON m.id_prodi = p.id_prodi
                    WHERE id_mahasiswa = ?";
        $params = array($id);
        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        $data = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC) ?? [];

        return $data;
    }

    public function store($data, $validate = 'Valid')
    {
        $stmt = "INSERT INTO mahasiswa (id_prodi, nim, nama, tempat_lahir, tanggal_lahir, agama, jenis_kelamin, no_telepon, email, status, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
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
            $validate,
            $data['password']
        );

        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        return $result;
    }

    public function delete($id_mahasiswa)
    {
        $stmt = "DELETE FROM mahasiswa WHERE id_mahasiswa = ?";
        $params = array($id_mahasiswa);

        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        return $result;
    }

    public function update($data)
    {
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

        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        return $result;
    }

    public function updateAccount($data)
    {
        $status = "Not Validated";
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
                password = ?,
                status = ? 
            WHERE nim = ?;";
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
            $status,
            $data['nim']
        );

        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        return $result;
    }

    public function validate($id_mahasiswa, $id_admin, $status)
    {
        $stmt = "UPDATE mahasiswa SET status = ?, id_admin = ?, validated_at = GETDATE() WHERE id_mahasiswa = ?";
        $params = [
            $status,
            $id_admin,
            $id_mahasiswa
        ];

        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        return $result;
    }

    public function getNotValidatedMahasiswa()
    {
        $stmt = "SELECT m.*, 
		            p.*
                    FROM mahasiswa m
                    JOIN program_studi p ON m.id_prodi = p.id_prodi WHERE m.status = 'Not Validated'";
        $result = sqlsrv_query($this->conn, $stmt);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data ?? [];
    }

    public function getNotValidatedMahasiswaById($id)
    {
        $stmt = "SELECT m.*, 
		            p.*
                    FROM mahasiswa m
                    JOIN program_studi p ON m.id_prodi = p.id_prodi
                    WHERE id_mahasiswa = ? AND m.status = 'Not Validated'";
        $params = array($id);
        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        $data = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC) ?? [];

        return $data;
    }
}
?>