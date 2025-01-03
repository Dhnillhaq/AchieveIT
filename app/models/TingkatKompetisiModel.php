<?php

class TingkatKompetisiModel extends Connection
{
    public function getTingkatKompetisi()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM tingkat_kompetisi");
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $data ?? [];
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function getTingkatKompetisiById($id)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM tingkat_kompetisi WHERE id_tingkat_kompetisi = :id_tingkat_kompetisi");
            $stmt->execute(['id_tingkat_kompetisi' => $id]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            return $data ?? [];
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function store($data)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO tingkat_kompetisi (tingkat_kompetisi, poin) VALUES (:tingkat_kompetisi, :poin)");
            $stmt->execute([
                'tingkat_kompetisi' => $data['tingkat_kompetisi'],
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
            $stmt = $this->pdo->prepare("UPDATE tingkat_kompetisi SET tingkat_kompetisi = :tingkat_kompetisi, poin = :poin WHERE id_tingkat_kompetisi = :id_tingkat_kompetisi");
            $stmt->execute([
                'tingkat_kompetisi' => $data['tingkat_kompetisi'],
                'poin' => $data['poin'],
                'id_tingkat_kompetisi' => $data['id_tingkat_kompetisi']
            ]);

            return $stmt->rowCount();
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM tingkat_kompetisi WHERE id_tingkat_kompetisi = :id_tingkat_kompetisi");
            $stmt->execute(['id_tingkat_kompetisi' => $id]);

            return $stmt->rowCount();
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }
}