<?php

class DosenModel extends Connection
{
    // Get All Dosen
    public function getDosen()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM dosen");
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $data ?? [];
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function getDosenById($id)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM dosen WHERE id_dosen = :id");
            $stmt->execute([':id' => $id]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            return $data ?? [];
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function store($data)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO dosen (nip, nama) VALUES (:nip, :nama)");
            $stmt->execute([
                ':nip' => $data['nip'],
                ':nama' => $data['nama']
            ]);

            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function delete($id_dosen)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM dosen WHERE id_dosen = :id_dosen");
            $stmt->execute([':id_dosen' => $id_dosen]);

            return $stmt->rowCount();
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function update($data)
    {
        try {
            $stmt = $this->pdo->prepare("UPDATE dosen SET nip = :nip, nama = :nama WHERE id_dosen = :id_dosen");
            $stmt->execute([
                ':id_dosen' => $data['id_dosen'],
                ':nip' => $data['nip'],
                ':nama' => $data['nama']
            ]);

            return $stmt->rowCount();
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }
}

?>