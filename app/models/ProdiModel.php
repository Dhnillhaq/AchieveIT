<?php

class ProdiModel extends Connection
{

    public function getProdi()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM program_studi");
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $data;
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function getProdiById($id)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM program_studi WHERE id_prodi = :id_prodi");
            $stmt->execute(['id_prodi' => $id]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            return $data;
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function store($data)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO program_studi (kode_prodi, nama_prodi) VALUES (:kode_prodi, :nama_prodi)");
            $stmt->execute([
                'kode_prodi' => $data['kode_prodi'],
                'nama_prodi' => $data['nama_prodi']
            ]);

            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function update($data)
    {
        try {
            $stmt = $this->pdo->prepare("UPDATE program_studi SET kode_prodi = :kode_prodi, nama_prodi = :nama_prodi WHERE id_prodi = :id_prodi");
            $stmt->execute([
                'kode_prodi' => $data['kode_prodi'],
                'nama_prodi' => $data['nama_prodi'],
                'id_prodi' => $data['id_prodi']
            ]);

            return $stmt->rowCount();
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM program_studi WHERE id_prodi = :id_prodi");
            $stmt->execute(['id_prodi' => $id]);

            return $stmt->rowCount();
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }
}

?>