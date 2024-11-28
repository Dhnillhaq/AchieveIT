<?php
class PrestasiModel extends Connection{
    
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

    public function printPrestasiUmum($limit = "10")
    {
        $stmt = "SELECT TOP $limit m.nim, m.nama, p.nama_prodi, m.total_poin
                FROM mahasiswa m
                JOIN program_studi p ON m.id_prodi = p.id_prodi
                ORDER BY total_poin DESC;";
        $result = sqlsrv_query($this->conn, $stmt);
        

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $this->data[] = $row;
        }
        return $this->data;
    }



    // Get All Kategori Prestasi
    public function getAllKategori()
    {
        $stmt = "SELECT * FROM kategori_prestasi";
        $result = sqlsrv_query($this->conn, $stmt);


        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $this->data[] = $row;
        }
        return $this->data;
    }



    // Get All Data Juara
    public function getAllJuara()
    {

        $stmt = "SELECT * FROM juara";
        $result = sqlsrv_query($this->conn, $stmt);


        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $this->data[] = $row;
        }
        return $this->data;
    }

    // Get All Data Tingkat Kompetisi
    public function getAllTingkatKompetisi()
    {
        $stmt = "SELECT * FROM tingkat_kompetisi";
        $result = sqlsrv_query($this->conn, $stmt);


        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $this->data[] = $row;
        }
        return $this->data;
    }

    // Get All Data Tingkat Penyelenggara
    public function getAllTingkatPenyelenggara()
    {
        $stmt = "SELECT * FROM tingkat_penyelenggara";
        $result = sqlsrv_query($this->conn, $stmt);


        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $this->data[] = $row;
        }
        return $this->data;
    }

    public function countPrestasi()
    {
        $stmt = "SELECT COUNT(id_prestasi) AS total_prestasi FROM prestasi;";
        $result = sqlsrv_query($this->conn, $stmt);
    }

    public function searchPrestasi($keyword)
    {
        $stmt = "SELECT * FROM mahasiswa WHERE nama LIKE '%$keyword%' OR nim LIKE'%$keyword%';";
        $result = sqlsrv_query($this->conn, $stmt);

    }

}

?>