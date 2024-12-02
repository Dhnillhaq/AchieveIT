<?php
class PrestasiModel extends Connection
{

    // Get All Prestasi Mahasiswa
    public function getAllPrestasi()
    {
        $stmt = "SELECT * FROM prestasi";
        $result = sqlsrv_query($this->conn, $stmt);

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    public function getDaftarPrestasi()
    {
        $stmt = "SELECT * FROM vw_PrestasiMahasiswa ORDER BY poin DESC;";
        $result = sqlsrv_query($this->conn, $stmt);

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }


    public function getDetailPrestasi($id)
    {
        $stmt = "EXEC usp_GetDetailPrestasi @id_prestasi = '?'";
        $params = array($id);
        $result = sqlsrv_query($this->conn, $stmt, $params);

        $data[] = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

        return $data;
    }

    public function printPrestasiUmum($keyword = "", $filterQ = "10", $filterY = "2024")
    {
        $stmt = "EXEC usp_GetRankingMahasiswaPerTahun @keyword = '$keyword', @quantity = $filterQ, @year = $filterY;";
        $result = sqlsrv_query($this->conn, $stmt);

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    public function getStatistikPrestasi()
    {
        $stmt = "SELECT * FROM vw_StatistikPrestasi;";
        $result = sqlsrv_query($this->conn, $stmt);

        $data[] = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

        return $data;
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
            $data[] = $row;
        }

        return $data;
    }

}

?>