<?php

class Connection
{
    protected $pdo;

    public function __construct()
    {
        try {
            if (CONNECTION_TYPE == 'sqlsrv') {
                $this->pdo = new PDO(CONNECTION_TYPE . ":Server=" . SERVER_NAME . ";Database=" . DATABASE_NAME . ";TrustServerCertificate=true");
            } else {
                $this->pdo = new PDO(CONNECTION_TYPE . ":host=" . DB_HOST . ";dbname=" . DATABASE_NAME, DB_USERNAME, DB_PASS);
            }
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            if (APP_DEBUG) {
                die('Connection failed: ' . $e->getMessage());
            } else {
                die('Internal Server Error');
            }
        }
    }
}
?>