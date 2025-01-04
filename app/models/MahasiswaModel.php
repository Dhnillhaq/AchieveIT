<?php

class MahasiswaModel extends Connection
{

    // Get All Mahasiswa
    public function getMahasiswa()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT m.*, p.* FROM mahasiswa m JOIN program_studi p ON m.id_prodi = p.id_prodi");
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $data ?? [];
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function getMahasiswaByNim($nim, $status = "Valid")
    {
        try {
            $stmt = $this->pdo->prepare("SELECT m.*, 
		            p.*
                    FROM mahasiswa m
                    JOIN program_studi p ON m.id_prodi = p.id_prodi
                    WHERE nim = :nim
                    AND status = :status");
            $stmt->execute(['nim' => $nim, 'status' => $status]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($status == "Valid") {
                $data[] = $this->getStatistikMhs($nim);
            }

            return $data ?? [];
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }
    public function getPrestasiMahasiswaByNim($nim)
    {
        try {
            $stmt = $this->pdo->prepare("
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
            WHERE m.nim = :nim
            ORDER BY p.created_at DESC;
        ");
            $stmt->execute(['nim' => $nim]);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $data ?? [];
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    // Get Prestasi ber-Anggota kan Mahasiswa   
    public function getStatistikMhs($nim)
    {
        try {
            $stmt = $this->pdo->prepare("
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
            WHERE nim = :nim;");
            $stmt->execute(['nim' => $nim]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            return $data ?? [];
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function countPrestMhs($nim)
    {
        try {
            if (CONNECTION_TYPE == "sqlsrv") {
                $stmt = $this->pdo->prepare("SELECT dbo.fn_HitungTotalPrestasi(:nim) AS total");
            } else {
                $stmt = $this->pdo->prepare("SELECT fn_HitungTotalPrestasi(:nim) AS total");
            }

            $stmt->execute(['nim' => $nim]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            return $data['total'] ?? 0;
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function getMahasiswaById($id)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT m.*, 
		            p.*
                    FROM mahasiswa m
                    JOIN program_studi p ON m.id_prodi = p.id_prodi
                    WHERE id_mahasiswa = :id_mahasiswa");
            $stmt->execute(['id_mahasiswa' => $id]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            return $data ?? [];
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function store($data)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO mahasiswa (id_prodi, nim, nama, tempat_lahir, tanggal_lahir, agama, jenis_kelamin, no_telepon, email, status, password) VALUES (:id_prodi, :nim, :nama, :tempat_lahir, :tanggal_lahir, :agama, :jenis_kelamin, :no_telepon, :email, :status, :password)");
            $stmt->execute([
                'id_prodi' => $data['id_prodi'],
                'nim' => $data['nim'],
                'nama' => $data['nama'],
                'tempat_lahir' => $data['tempat_lahir'],
                'tanggal_lahir' => $data['tanggal_lahir'],
                'agama' => $data['agama'],
                'jenis_kelamin' => $data['jenis_kelamin'],
                'no_telepon' => $data['no_telepon'],
                'email' => $data['email'],
                'status' => $data['status'],
                'password' => $data['password']
            ]);

            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function delete($id_mahasiswa)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM mahasiswa WHERE id_mahasiswa = :id_mahasiswa");
            $stmt->execute(['id_mahasiswa' => $id_mahasiswa]);

            return $stmt->rowCount();
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function update($data)
    {
        try {
            $stmt = $this->pdo->prepare("UPDATE mahasiswa
            SET
                id_prodi = :id_prodi,
                nim = :nim,
                nama = :nama,
                tempat_lahir = :tempat_lahir,
                tanggal_lahir = :tanggal_lahir,
                agama = :agama,
                jenis_kelamin = :jenis_kelamin,
                no_telepon = :no_telepon,
                email = :email,
                password = :password
            WHERE id_mahasiswa = :id_mahasiswa");
            $stmt->execute([
                'id_prodi' => $data['id_prodi'],
                'nim' => $data['nim'],
                'nama' => $data['nama'],
                'tempat_lahir' => $data['tempat_lahir'],
                'tanggal_lahir' => $data['tanggal_lahir'],
                'agama' => $data['agama'],
                'jenis_kelamin' => $data['jenis_kelamin'],
                'no_telepon' => $data['no_telepon'],
                'email' => $data['email'],
                'password' => $data['password'],
                'id_mahasiswa' => $data['id_mahasiswa']
            ]);

            return $stmt->rowCount();
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function updateAccount($data)
    {
        try {
            $status = "Not Validated";
            $stmt = $this->pdo->prepare("UPDATE mahasiswa
            SET
                id_prodi = :id_prodi,
                nim = :nim,
                nama = :nama,
                tempat_lahir = :tempat_lahir,
                tanggal_lahir = :tanggal_lahir,
                agama = :agama,
                jenis_kelamin = :jenis_kelamin,
                no_telepon = :no_telepon,
                email = :email,
                password = :password,
                status = :status
            WHERE nim = :nim");
            $stmt->execute([
                'id_prodi' => $data['id_prodi'],
                'nim' => $data['nim'],
                'nama' => $data['nama'],
                'tempat_lahir' => $data['tempat_lahir'],
                'tanggal_lahir' => $data['tanggal_lahir'],
                'agama' => $data['agama'],
                'jenis_kelamin' => $data['jenis_kelamin'],
                'no_telepon' => $data['no_telepon'],
                'email' => $data['email'],
                'password' => $data['password'],
                'status' => $status
            ]);

            return $stmt->rowCount();
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function validate($id_mahasiswa, $id_admin, $status)
    {
        try {
            if (CONNECTION_TYPE === 'sqlsrv') {
                $stmt = $this->pdo->prepare("UPDATE mahasiswa SET status = :status, id_admin = :id_admin, validated_at = GETDATE() WHERE id_mahasiswa = :id_mahasiswa");
            } else {
                $stmt = $this->pdo->prepare("UPDATE mahasiswa SET status = :status, id_admin = :id_admin, validated_at = NOW() WHERE id_mahasiswa = :id_mahasiswa");
            }
            $stmt->execute(['id_mahasiswa' => $id_mahasiswa, 'id_admin' => $id_admin, 'status' => $status]);

            return $stmt->rowCount();
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function getNotValidatedMahasiswa()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT m.*, 
		            p.*
                    FROM mahasiswa m
                    JOIN program_studi p ON m.id_prodi = p.id_prodi WHERE m.status = 'Not Validated'");
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $data ?? [];
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function getNotValidatedMahasiswaById($id)
    {
        $stmt = $this->pdo->prepare("SELECT m.*, 
		            p.*
                    FROM mahasiswa m
                    JOIN program_studi p ON m.id_prodi = p.id_prodi
                    WHERE id_mahasiswa = :id_mahasiswa AND m.status = 'Not Validated'");
        $stmt->execute(['id_mahasiswa' => $id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data ?? [];
    }
}
?>