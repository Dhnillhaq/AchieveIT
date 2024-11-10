<?php 
class Connection 
{
    private $serverName = "DESKTOP-2SVDLK3\SQLEXPRESS";
    private $connectionInfo = ["Database" => "achieveit"];
    public $conn;

    public function __construct() {
        // Inisialisasi koneksi di dalam konstruktor
        $this->conn = sqlsrv_connect($this->serverName, $this->connectionInfo);
        $this->ifNotConnect(); // Panggil fungsi cek koneksi setelah inisialisasi
    }

    function ifNotConnect() {
        if ($this->conn === false) {
            die(print_r(sqlsrv_errors(), true)); 
        }
    }
}
?>
