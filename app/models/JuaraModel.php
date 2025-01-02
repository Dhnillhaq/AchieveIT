<?php

class JuaraModel extends Connection
{
    public function getJuara()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM juara");
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $data ?? [];
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function getJuaraById($id)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM juara WHERE id_juara = :id");
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
            $stmt = $this->pdo->prepare("INSERT INTO juara(juara, poin) VALUES(:juara, :poin)");
            $stmt->execute([
                ':juara' => $data['juara'],
                ':poin' => $data['poin']
            ]);

            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function update($data)
    {
        try {
            $stmt = $this->pdo->prepare("UPDATE juara SET juara = :juara, poin = :poin WHERE id_juara = :id_juara");
            $stmt->execute([
                ':juara' => $data['juara'],
                ':poin' => $data['poin'],
                ':id_juara' => $data['id_juara']
            ]);

            return $stmt->rowCount();
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM juara WHERE id_juara = :id");
            $stmt->execute([':id' => $id]);

            return $stmt->rowCount();
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }
}