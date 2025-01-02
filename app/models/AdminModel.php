<?php

class AdminModel extends Connection
{

    // Get All Data Admin
    public function getAllDataAdmin()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM admin");
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $data ?? [];
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    // Get All Log Admin
    public function getLogAdmin()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM log_admin");
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $data ?? [];
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function getAdminById($id)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM admin WHERE id_admin = :id");
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
            $stmt = $this->pdo->prepare("INSERT INTO admin (nip, nama, role, password) VALUES (:nip, :nama, :role, :password)");
            $stmt->execute([
                ':nip' => $data['nip'],
                ':nama' => $data['nama'],
                ':role' => $data['role'],
                ':password' => $data['password']
            ]);

            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function delete($id_admin)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM admin WHERE id_admin = :id_admin");
            $stmt->execute([':id_admin' => $id_admin]);

            return $stmt->rowCount();
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function update($data)
    {
        try {
            $stmt = $this->pdo->prepare("UPDATE admin SET nip = :nip, nama = :nama, role = :role, password = :password WHERE id_admin = :id_admin");
            $stmt->execute([
                ':id_admin' => $data['id_admin'],
                ':nip' => $data['nip'],
                ':nama' => $data['nama'],
                ':role' => $data['role'],
                ':password' => $data['password']
            ]);

            return $stmt->rowCount();
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }
}
?>