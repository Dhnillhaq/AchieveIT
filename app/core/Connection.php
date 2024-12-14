<?php

class Connection
{
    private $serverName = SERVER_NAME;
    private $connectionInfo = ["Database" => DATABASE_NAME];
    protected $conn;

    public function __construct()
    {
        $this->conn = sqlsrv_connect($this->serverName, $this->connectionInfo);

        if ($this->conn === false) {
            $errors = sqlsrv_errors();
            die(print_r(sqlsrv_errors(), true));
        }
    }

    public function close()
    {
        if ($this->conn) {
            sqlsrv_close($this->conn);
            $this->conn = null;
        }
    }

    public function __destruct()
    {
        self::close();
    }
}
?>