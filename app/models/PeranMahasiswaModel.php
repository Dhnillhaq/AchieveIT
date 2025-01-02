<?php

class PeranMahasiswaModel extends Connection
{
    public function getPeranMhs()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM peran_mahasiswa");
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $data ?? [];
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function getPeranMhsById($id)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM peran_mahasiswa WHERE id_peran = :id_peran");
            $stmt->execute(['id_peran' => $id]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            return $data ?? [];
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function store($data)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO peran_mahasiswa(peran) VALUES(:peran)");
            $stmt->execute([
                'peran' => $data['peran']
            ]);

            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function delete($id_peran)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM peran_mahasiswa WHERE id_peran = :id_peran");
            $stmt->execute(['id_peran' => $id_peran]);

            return $stmt->rowCount();
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function update($data)
    {
        try {
            $stmt = $this->pdo->prepare("UPDATE peran_mahasiswa SET peran = :peran WHERE id_peran = :id_peran");
            $stmt->execute([
                'peran' => $data['peran'],
                'id_peran' => $data['id_peran']
            ]);

            return $stmt->rowCount();
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }
}