<?php

class LogAdminModel extends Connection
{
    public function getLogAdmin($offset = 0, $limit = 10)
    {
        try {
            if (CONNECTION_TYPE === 'sqlsrv') {
                $stmt = $this->pdo->prepare("SELECT l.*, a.nama FROM log_admin l
                 JOIN admin a ON a.id_admin = l.id_admin
                 ORDER BY l.timestamp DESC
                 OFFSET :offset ROWS 
                 FETCH NEXT :limit ROWS ONLY;");
            } else {
                $stmt = "SELECT l.*, a.nama FROM log_admin l
                 JOIN admin a ON a.id_admin = l.id_admin
                 ORDER BY l.timestamp DESC
                 LIMIT :offset, :limit;";
            }

            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();

            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $data ?? [];
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function countLogs()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT COUNT(*) as total FROM log_admin");
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            return $data['total'] ?? 0;
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }


    public function getLogAdminByIdAdmin($id_admin)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT l.*, a.nama FROM log_admin l
                JOIN admin a ON a.id_admin = l.id_admin 
                WHERE l.id_admin = :id_admin");
            $stmt->execute([':id_admin' => $id_admin]);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $data ?? [];
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function storeAdminLog($aksi, $keterangan)
    {
        try {
            if (CONNECTION_TYPE === 'sqlsrv') {
                $stmt = $this->pdo->prepare("INSERT INTO log_admin(id_admin, aksi, keterangan, timestamp) VALUES(:id_admin, :aksi, :keterangan, GETDATE())");
            } else {
                $stmt = $this->pdo->prepare("INSERT INTO log_admin(id_admin, aksi, keterangan, timestamp) VALUES(:id_admin, :aksi, :keterangan, NOW())");
            }

            $stmt->execute([
                ':id_admin' => $_SESSION['user']['id_admin'],
                ':aksi' => $aksi,
                ':keterangan' => $keterangan
            ]);

            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }
}