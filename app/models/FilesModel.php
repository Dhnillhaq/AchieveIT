<?php

class FilesModel extends Connection
{

    public function getFileById($id)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM files WHERE id_file = :id");
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
            $stmt = $this->pdo->prepare("INSERT INTO files(nama_file, nama_asli, ukuran, tipe, path) VALUES(:nama_file, :nama_asli, :ukuran, :tipe, :path)");
            $stmt->execute([
                ':nama_file' => $data['nama_file'],
                ':nama_asli' => $data['nama_asli'],
                ':ukuran' => $data['ukuran'],
                ':tipe' => $data['tipe'],
                ':path' => $data['path']
            ]);

            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }
}
