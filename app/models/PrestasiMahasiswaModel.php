<?php

class PrestasiMahasiswaModel extends Connection
{
    public function getPrestasiMahasiswaByIdPrestasi($id_prestasi)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM prestasi_mahasiswa WHERE id_prestasi = :id_prestasi");
            $stmt->execute(['id_prestasi' => $id_prestasi]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            return $data ?? [];
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function store($id_prestasi, $id_mahasiswa, $id_peran)
    {
        try {
            // Cek sudah adakah didatabase?
            $query = $this->pdo->prepare("SELECT COUNT(*) FROM prestasi_mahasiswa WHERE id_prestasi = :id_prestasi AND id_mahasiswa = :id_mahasiswa AND id_peran = :id_peran");
            $query->execute([
                'id_prestasi' => $id_prestasi,
                'id_mahasiswa' => $id_mahasiswa,
                'id_peran' => $id_peran
            ]);
            $count = $query->fetchColumn();

            if ($count > 0) { // jika ya, update data di database
                $data = [
                    'id_prestasi' => $id_prestasi,
                    'id_dosen' => $id_mahasiswa,
                    'id_peran' => $id_peran
                ];
                $result = $this->update($id_prestasi, $id_mahasiswa, $id_peran, $data);
            } else {
                $stmt = $this->pdo->prepare("INSERT INTO prestasi_mahasiswa(id_prestasi, id_mahasiswa, id_peran) VALUES(:id_prestasi, :id_mahasiswa, :id_peran)");
                $stmt->execute([
                    'id_prestasi' => $id_prestasi,
                    'id_mahasiswa' => $id_mahasiswa,
                    'id_peran' => $id_peran
                ]);

                $result = $this->pdo->lastInsertId();
            }
            return $result;
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function update($id_prestasi, $id_mahasiswa, $id_peran, $data)
    {
        try {
            $stmt = $this->pdo->prepare("UPDATE prestasi_mahasiswa SET id_prestasi = :id_prestasi, id_mahasiswa = :id_mahasiswa, id_peran = :id_peran WHERE id_prestasi = :id_prestasi2 AND id_mahasiswa = :id_mahasiswa2 AND id_peran = :id_peran2");
            $stmt->execute([
                'id_prestasi' => $id_prestasi,
                'id_mahasiswa' => $id_mahasiswa,
                'id_peran' => $id_peran,
                'id_prestasi2' => $data['id_prestasi'],
                'id_mahasiswa2' => $data['id_mahasiswa'],
                'id_peran2' => $data['id_peran']
            ]);

            return $stmt->rowCount();
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function delete($id_prestasi, $id_mahasiswa)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM prestasi_mahasiswa WHERE id_prestasi = :id_prestasi AND id_mahasiswa = :id_mahasiswa");
            $stmt->execute([
                'id_prestasi' => $id_prestasi,
                'id_mahasiswa' => $id_mahasiswa
            ]);

            return $stmt->rowCount();
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }
}
