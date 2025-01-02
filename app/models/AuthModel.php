<?php

class AuthModel extends Connection
{

    public function getMahasiswa()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM mahasiswa");
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $data ?? [];
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function getAdmin()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM mahasiswa");
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $data ?? [];
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function registrasi($username, $password)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO mahasiswa (nim, password) VALUES (:nim, :password)");
            $stmt->execute([
                ':nim' => $username,
                ':password' => $password
            ]);

            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function gantiSandi($password, $username)
    {
        try {
            if (isset($_SESSION['user'])) {
                if ($_SESSION['user']['role'] == 'Mahasiswa') {
                    $stmtStr = "UPDATE mahasiswa
                 SET password = :password
                 WHERE nim = :username;";
                } else {
                    $stmtStr = "UPDATE admin
                 SET password = :password
                 WHERE nip = :username;";
                }
            } else {
                $stmtStr = "UPDATE mahasiswa
             SET password = :password
             WHERE nim = :username;";
            }

            $stmt = $this->pdo->prepare($stmtStr);
            $stmt->execute([
                ':password' => $password,
                ':username' => $username
            ]);

            return $stmt->rowCount();
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }
}
?>