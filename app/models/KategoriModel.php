<?php

class KategoriModel extends Connection
{
    public function getKategori()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM kategori");
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $data ?? [];
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function getKategoriById($id)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM kategori WHERE id_kategori = :id_kategori");
            $stmt->execute([':id_kategori' => $id]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            return $data ?? [];
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function store($data)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO kategori(kategori) VALUES(:kategori)");
            $stmt->execute([
                ':kategori' => $data['kategori']
            ]);

            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function update($data)
    {
        try {
            $stmt = $this->pdo->prepare("UPDATE kategori SET kategori = :kategori WHERE id_kategori = :id_kategori");
            $stmt->execute([
                ':kategori' => $data['kategori'],
                ':id_kategori' => $data['id_kategori']
            ]);

            return $stmt->rowCount();
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM kategori WHERE id_kategori = :id_kategori");
            $stmt->execute([':id_kategori' => $id]);

            return $stmt->rowCount();
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }
}