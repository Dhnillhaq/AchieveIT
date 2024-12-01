<?php
class PrestasiModel extends Connection
{

    private $data = [];

    // Get All Prestasi Mahasiswa
    public function getAllPrestasi()
    {
        $stmt = "SELECT * FROM prestasi";
        $result = sqlsrv_query($this->conn, $stmt);

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $this->data[] = $row;
        }
        return $this->data;
    }

    public function getDaftarPrestasi()
    {
        $stmt = "SELECT * FROM vw_PrestasiMahasiswa ORDER BY poin DESC;";
        $result = sqlsrv_query($this->conn, $stmt);

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $this->data[] = $row;
        }
        return $this->data;
    }
    

    public function getDetailPrestasi($id)
    {
        $stmt = "EXEC usp_GetDetailPrestasi @id_prestasi = '?'";
        $params = array($id);
        $result = sqlsrv_query($this->conn, $stmt, $params);

        $this->data[] = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

        return $this->data;
    }

    public function printPrestasiUmum($keyword = "", $filterQ = "10", $filterY = "2024")
    {
        if ($keyword == "") {
            $stmt = "EXEC usp_GetRankingMahasiswaPerTahun @keyword = '$keyword', @quantity = $filterQ, @year = $filterY;";
            $result = sqlsrv_query($this->conn, $stmt);
        } else {
            $stmt = "EXEC usp_GetRankingMahasiswaPerTahun @keyword = '$keyword', @quantity = $filterQ, @year = '$filterY';";
            $result = sqlsrv_query($this->conn, $stmt);
        }

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $this->data[] = $row;
        }
        return $this->data;
    }

    public function getStatistikPrestasi()
    {
        $stmt = "SELECT * FROM vw_StatistikPrestasi;";
        $result = sqlsrv_query($this->conn, $stmt);
        
            $this->data[] = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
        
        return $this->data;
    }

    public function countPrestasi()
    {
        $stmt = "SELECT COUNT(id_prestasi) AS total_prestasi FROM prestasi;";
        $result = sqlsrv_query($this->conn, $stmt);
    }

    public function searchPrestasi($keyword)
    {
        $stmt = "SELECT m.nim, m.nama, p.nama_prodi, m.total_poin
            FROM mahasiswa m
            JOIN program_studi p ON m.id_prodi = p.id_prodi
            WHERE nama LIKE '%$keyword%' OR nim LIKE'%$keyword%'
            ORDER BY total_poin DESC;";
        $result = sqlsrv_query($this->conn, $stmt);


        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $this->data[] = $row;
        }

        return $this->data;
    }

}

?>