<?php

class TingkatPenyelenggaraModel extends Connection
{
    public function getTingkatPenyelenggara()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM tingkat_penyelenggara");
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $data ?? [];
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function getTingkatPenyelenggaraById($id)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM tingkat_penyelenggara WHERE id_tingkat_penyelenggara = :id_tingkat_penyelenggara");
            $stmt->execute(['id_tingkat_penyelenggara' => $id]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            return $data ?? [];
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function store($data)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO tingkat_penyelenggara (tingkat_penyelenggara, poin) VALUES (:tingkat_penyelenggara, :poin)");
            $stmt->execute([
                'tingkat_penyelenggara' => $data['tingkat_penyelenggara'],
                'poin' => $data['poin']
            ]);

            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function update($data)
    {
        try {
            $stmt = $this->pdo->prepare("UPDATE tingkat_penyelenggara SET tingkat_penyelenggara = :tingkat_penyelenggara, poin = :poin WHERE id_tingkat_penyelenggara = :id_tingkat_penyelenggara");
            $stmt->execute([
                'tingkat_penyelenggara' => $data['tingkat_penyelenggara'],
                'poin' => $data['poin'],
                'id_tingkat_penyelenggara' => $data['id_tingkat_penyelenggara']
            ]);

            return $stmt->rowCount();
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM tingkat_penyelenggara WHERE id_tingkat_penyelenggara = :id_tingkat_penyelenggara");
            $stmt->execute(['id_tingkat_penyelenggara' => $id]);

            return $stmt->rowCount();
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }
}