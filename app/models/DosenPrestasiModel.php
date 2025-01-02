<?php

class DosenPrestasiModel extends Connection
{

    public function getDosenPrestasiByIdPrestasi($id_prestasi)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM dosen_prestasi WHERE id_prestasi = :id_prestasi");
            $stmt->execute([':id_prestasi' => $id_prestasi]);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $data ?? [];
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function store($id_prestasi, $id_dosen, $id_peran)
    {
        try {
            // Cek sudah adakah didatabase?
            $query = $this->pdo->prepare("SELECT COUNT(*) FROM dosen_prestasi WHERE id_dosen = :id_dosen AND id_prestasi = :id_prestasi AND id_peran = :id_peran");
            $query->execute([':id_dosen' => $id_dosen, ':id_prestasi' => $id_prestasi, ':id_peran' => $id_peran]);
            $count = $query->fetchColumn();
            if ($count > 0) { // jika ya, update data
                $data = [
                    'id_prestasi' => $id_prestasi,
                    'id_dosen' => $id_dosen,
                    'id_peran' => $id_peran
                ];
                $result = self::update($id_prestasi, $id_dosen, $id_peran, $data);
            } else {

                $stmt = $this->pdo->prepare("INSERT INTO dosen_prestasi (id_prestasi, id_dosen, id_peran) VALUES (:id_prestasi, :id_dosen, :id_peran)");
                $stmt->execute([':id_prestasi' => $id_prestasi, ':id_dosen' => $id_dosen, ':id_peran' => $id_peran]);
                $result = $stmt->rowCount();
            }

            return $result;
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function update($id_prestasi, $id_dosen, $id_peran, $data)
    {
        try {
            $stmt = $this->pdo->prepare("UPDATE dosen_prestasi SET id_prestasi = :id_prestasi, id_dosen = :id_dosen, id_peran = :id_peran WHERE id_prestasi = :id_prestasi2 AND id_dosen = :id_dosen2 AND id_peran = :id_peran2");
            $stmt->execute([':id_prestasi' => $id_prestasi, ':id_dosen' => $id_dosen, ':id_peran' => $id_peran, ':id_prestasi2' => $data['id_prestasi'], ':id_dosen2' => $data['id_dosen'], ':id_peran2' => $data['id_peran']]);
            $result = $stmt->rowCount();

            return $result;
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function delete($id_prestasi, $id_dosen)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM dosen_prestasi WHERE id_prestasi = :id_prestasi AND id_dosen = :id_dosen");
            $stmt->execute([':id_prestasi' => $id_prestasi, ':id_dosen' => $id_dosen]);
            $result = $stmt->rowCount();

            return $result;
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }
}
