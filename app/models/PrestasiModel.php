<?php


class PrestasiModel extends Connection
{

    // Get All Prestasi Mahasiswa
    public function getAllPrestasi()
    {
        $stmt = "SELECT * FROM prestasi";
        $result = sqlsrv_query($this->conn, $stmt);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data ?? [];
    }

    public function getDaftarPrestasi()
    {
        $stmt = "
            SELECT
                p.id_prestasi,
                p.nama_kompetisi,
                tk.tingkat_kompetisi,
                k.kategori AS kategori_kompetisi,
                j.juara,
                p.status,
                p.poin_prestasi AS poin,
                p.created_at
            FROM prestasi p
                JOIN kategori k ON p.id_kategori = k.id_kategori
                JOIN juara j ON p.id_juara = j.id_juara
                JOIN tingkat_kompetisi tk ON p.id_tingkat_kompetisi = tk.id_tingkat_kompetisi
            ORDER BY poin DESC;
        ";
        $result = sqlsrv_query($this->conn, $stmt);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data ?? [];
    }

    public function getPrestasiByNim($nim)
    {
        $stmt = "
            SELECT
                p.id_prestasi,
                p.nama_kompetisi,
                tk.tingkat_kompetisi,
                k.kategori AS kategori_kompetisi,
                j.juara,
                p.status,
                p.poin_prestasi AS poin,
                p.created_at
            FROM prestasi_mahasiswa pm
                JOIN mahasiswa m ON pm.id_mahasiswa = m.id_mahasiswa
                JOIN prestasi p ON pm.id_prestasi = p.id_prestasi
                JOIN kategori k ON p.id_kategori = k.id_kategori
                JOIN juara j ON p.id_juara = j.id_juara
                JOIN tingkat_kompetisi tk ON p.id_tingkat_kompetisi = tk.id_tingkat_kompetisi
            WHERE m.nim = ?
            ORDER BY p.created_at DESC;
        ";
        $params = array($nim);
        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data ?? [];
    }

    public function getDetailPrestasi($id)
    {
        $stmt = "EXEC usp_GetDetailPrestasi @id_prestasi = ?";
        $params = array($id);
        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        $data = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC) ?? [];

        return $data;
    }

    public function getPrestasiById($id)
    {
        $stmt = "SELECT * FROM prestasi WHERE id_prestasi = ?";
        $params = array($id);
        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        $data = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC) ?? [];

        return $data;
    }

    public function getDetailPrestasiDataMahasiswa($id)
    {
        $stmt = "
            SELECT
                m.id_mahasiswa,
                m.nim,
                m.nama as nama_mahasiswa,
                p.id_peran,
                p.peran
            FROM prestasi_mahasiswa pm
                JOIN mahasiswa m ON pm.id_mahasiswa = m.id_mahasiswa
                JOIN peran_mahasiswa p ON pm.id_peran = p.id_peran
            WHERE pm.id_prestasi = ?;
";
        $params = array($id);
        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data ?? [];
    }

    public function getDetailPrestasiDataDosen($id)
    {
        $stmt = "
            SELECT
                d.id_dosen,
                d.nama AS nama_dosen,
                d.nip,
                pd.id_peran,
                pd.peran
            FROM dosen_prestasi dp
                JOIN dosen d ON dp.id_dosen = d.id_dosen
                JOIN peran_dosen pd ON dp.id_peran = pd.id_peran
            WHERE dp.id_prestasi = ?;
        ";
        $params = array($id);
        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data ?? [];
    }

    public function getDetailPrestasiDataPoin($id)
    {
        $stmt = "
            SELECT
                tk.tingkat_kompetisi,
                tk.poin AS poin_tk,
                tp.tingkat_penyelenggara AS penyelenggara,
                tp.poin AS poin_tp,
                j.juara,
                j.poin AS poin_j,
                p.poin_prestasi AS total_poin
            FROM prestasi p
                JOIN tingkat_kompetisi tk ON p.id_tingkat_kompetisi = tk.id_tingkat_kompetisi
                JOIN tingkat_penyelenggara tp ON p.id_tingkat_penyelenggara = tp.id_tingkat_penyelenggara
                JOIN juara j ON p.id_juara = j.id_juara
            WHERE p.id_prestasi = ?;
        ";
        $params = array($id);
        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        $data = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC) ?? [];

        return $data;
    }

    public function countPrestasi($keyword)
    {
        $stmt = "WITH Ranking AS (
                    SELECT
                        m.nama,
                        m.nim,
                        prodi.nama_prodi,
                        SUM(p.poin_prestasi) AS total_poin,
                        ROW_NUMBER() OVER (ORDER BY SUM(p.poin_prestasi) DESC) AS rank
                    FROM prestasi_mahasiswa pm
                    JOIN mahasiswa m ON pm.id_mahasiswa = m.id_mahasiswa
                    JOIN prestasi p ON pm.id_prestasi = p.id_prestasi
                    JOIN program_studi prodi ON m.id_prodi = prodi.id_prodi
                    GROUP BY
                        m.nama,
                        m.nim,
                        prodi.nama_prodi
                )
                SELECT COUNT(*) as total
                FROM Ranking
				WHERE nama LIKE ? OR nim LIKE ?;";
        $params = array("%" . $keyword . "%", "%" . $keyword . "%");
        $result = sqlsrv_query($this->conn, $stmt, $params);
    
        if ($result === false) {
            die(print_r(sqlsrv_errors(), true));
        }
        
        $data = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
    
        return $data['total'];
    }

    public function countPrestasiPerTahun($keyword, $year)
    {
        $stmt = "WITH Ranking AS (
                SELECT
                	m.nama,
                	m.nim,
                	prodi.nama_prodi,
                	SUM(p.poin_prestasi) AS total_poin,
                	YEAR(p.tanggal_selesai_kompetisi) AS tahun_prestasi,
                    ROW_NUMBER() OVER (ORDER BY SUM(p.poin_prestasi) DESC) AS rank
                FROM prestasi_mahasiswa pm
                JOIN mahasiswa m ON pm.id_mahasiswa = m.id_mahasiswa
                JOIN prestasi p ON pm.id_prestasi = p.id_prestasi
                JOIN program_studi prodi ON m.id_prodi = prodi.id_prodi
                WHERE YEAR(p.tanggal_selesai_kompetisi) = ? 
                GROUP BY
                	m.nama,
                	m.nim,
                	prodi.nama_prodi,
                	YEAR(p.tanggal_selesai_kompetisi)
            )
            SELECT COUNT(*) as total
            FROM Ranking
            WHERE nama LIKE ? OR nim LIKE ?;";
        $params = array($year, "%" . $keyword . "%", "%" . $keyword . "%");
        $result = sqlsrv_query($this->conn, $stmt, $params);
    
        if ($result === false) {
            die(print_r(sqlsrv_errors(), true));
        }
        
        $data = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
    
        return $data['total'];
    }

    public function getRankingPrestasi($keyword = "", $limit = 60, $offset =  0)
    {
        $stmt = "WITH Ranking AS (
                    SELECT
                        m.nama,
                        m.nim,
                        prodi.nama_prodi,
                        SUM(p.poin_prestasi) AS total_poin,
                        RANK() OVER (ORDER BY SUM(p.poin_prestasi) DESC) AS rank
                    FROM prestasi_mahasiswa pm
                    JOIN mahasiswa m ON pm.id_mahasiswa = m.id_mahasiswa
                    JOIN prestasi p ON pm.id_prestasi = p.id_prestasi
                    JOIN program_studi prodi ON m.id_prodi = prodi.id_prodi
                    GROUP BY
                        m.nama,
                        m.nim,
                        prodi.nama_prodi
                )
                SELECT *
                FROM Ranking
                WHERE nama LIKE ? OR nim LIKE ?
                ORDER BY rank
                OFFSET ? ROWS
                FETCH NEXT ? ROWS ONLY;";

        $params = array("%" . $keyword . "%", "%" . $keyword . "%",  $offset, $limit);
        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data ?? [];
    }
    public function getRankingPrestasiPerTahun($keyword, $year, $limit, $offset)
    {
        $stmt = "WITH Ranking AS (
                    SELECT
                    	m.nama,
                    	m.nim,
                    	prodi.nama_prodi,
                    	SUM(p.poin_prestasi) AS total_poin,
                    	YEAR(p.tanggal_selesai_kompetisi) AS tahun_prestasi,
                        RANK() OVER (ORDER BY SUM(p.poin_prestasi) DESC) AS rank
                    FROM prestasi_mahasiswa pm
                    JOIN mahasiswa m ON pm.id_mahasiswa = m.id_mahasiswa
                    JOIN prestasi p ON pm.id_prestasi = p.id_prestasi
                    JOIN program_studi prodi ON m.id_prodi = prodi.id_prodi
                    WHERE YEAR(p.tanggal_selesai_kompetisi) = ? 
                    GROUP BY
                    	m.nama,
                    	m.nim,
                    	prodi.nama_prodi,
                    	YEAR(p.tanggal_selesai_kompetisi)
                )
                SELECT *
                FROM Ranking
                WHERE nim LIKE ? OR nama LIKE ?
                ORDER BY rank
                OFFSET ? ROWS
                FETCH NEXT ? ROWS ONLY;";

        $params = array($year, "%" . $keyword . "%", "%" . $keyword . "%", $offset, $limit);
        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data ?? [];
    }

    public function getStatistikPrestasi()
    {
        $stmt = "
            SELECT
                (SELECT
                    COUNT(id_prestasi)
                FROM prestasi WHERE status = 'Valid') AS total_prestasi,
                (SELECT
                    COUNT(id_mahasiswa)
                FROM mahasiswa) AS total_mahasiswa,
                (SELECT
                    COUNT(id_prestasi) * 1.0 / COUNT(DISTINCT YEAR(tanggal_selesai_kompetisi))
                FROM prestasi WHERE status = 'Valid') AS rata_rata,
                (SELECT
                    COUNT(id_mahasiswa) FROM mahasiswa WHERE total_poin > 0) AS total_mapres;
        ";
        $result = sqlsrv_query($this->conn, $stmt);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        $data = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC) ?? [];

        return $data;
    }

    public function getTahunPrestasi()
    {
        $stmt = "SELECT
                DISTINCT YEAR(tanggal_selesai_kompetisi) as tahun
                FROM prestasi;";
        $result = sqlsrv_query($this->conn, $stmt);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data ?? [];
    }

    public function getGrafikDiagramLingkaran($type = "Kategori")
    {
        $stmt = "EXEC usp_GetAnalisisPrestasi @type = ?;";
        $params = array($type);
        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data ?? [];
    }

    public function getGrafikPerTahun($type = "kategori")
    {
        $stmt = "EXEC usp_GetAnalisisPrestasiPerTahun @type = ?;";
        $params = array($type);
        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data ?? [];
    }
    public function getGrafikPerBulan($type = "kategori", $year = "2024")
    {
        $stmt = "EXEC usp_GetAnalisisPrestasiPerBulan @tahun = ?, @type = ?;";
        $params = array($year, $type);
        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data ?? [];
    }

    public function getExportData()
    {
        $stmt = "SELECT * FROM vw_DataPrestasi";
        $result = sqlsrv_query($this->conn, $stmt);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }

        $stmt2 = "SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = N'vw_DataPrestasi'";
        $result2 = sqlsrv_query($this->conn, $stmt2);

        while ($row = sqlsrv_fetch_array($result2, SQLSRV_FETCH_ASSOC)) {
            $header[] = $row['COLUMN_NAME'];
        }

        return ['data' => $data ?? [], 'header' => $header ?? []];
    }

    public function store($data)
    {
        // Statement insert biasa untuk role Mahasiswa
        $stmt = "INSERT INTO prestasi(
        id_kategori, 
        id_juara, 
        id_tingkat_penyelenggara, 
        id_tingkat_kompetisi, 
        nama_kompetisi, 
        tanggal_mulai_kompetisi, 
        tanggal_selesai_kompetisi, 
        penyelenggara_kompetisi, 
        tempat_kompetisi, 
        surat_tugas, 
        poster_kompetisi, 
        foto_juara, 
        proposal, 
        sertifikat, 
        poin_prestasi";

        // Parameter insert Mahasiswa
        $params = array(
            $data['kategori'],
            $data['juara'],
            $data['tingkat_penyelenggara'],
            $data['tingkat_kompetisi'],
            $data['nama_kompetisi'],
            $data['tanggal_mulai'],
            $data['tanggal_selesai'],
            $data['penyelenggara'],
            $data['tempat_kompetisi'],
            $data['surat_tugas'],
            $data['poster'],
            $data['foto_juara'],
            $data['proposal'],
            $data['sertifikat'],
            $data['poin_prestasi'],
        );

        // Cek role user
        if (isset($_SESSION['user']['role']) && ($_SESSION['user']['role'] === 'Super Admin' || $_SESSION['user']['role'] === 'Admin')) {
            //  Langsung validasi kalo Create oleh Super Admin/Admin
            $stmt .= ", status, id_admin, validated_at";
            $params[] = 'Valid';
            $params[] = $_SESSION['user']['id_admin'];
        }

        $stmt .= ") OUTPUT INSERTED.id_prestasi VALUES(";

        // Tanda tanya sejumlah parameter
        $stmt .= str_repeat("?, ", count($params) - 1) . "?";

        // Value validated_at
        if (isset($_SESSION['user']['role']) && ($_SESSION['user']['role'] === 'Super Admin' || $_SESSION['user']['role'] === 'Admin')) {
            $stmt .= ", GETDATE()";
        }

        $stmt .= ")";

        $idResource = sqlsrv_query($this->conn, $stmt, $params);

        if ($idResource === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        // Fetch the inserted ID
        $idRow = sqlsrv_fetch_array($idResource, SQLSRV_FETCH_NUMERIC);
        $insertedId = $idRow[0]; // ID of the inserted row

        return (int) $insertedId;
    }

    public function update($data)
    {
        // Inisialisasi query dan parameter
        $stmt = "UPDATE prestasi SET 
                id_kategori = ?, 
                id_juara = ?, 
                id_tingkat_penyelenggara = ?, 
                id_tingkat_kompetisi = ?, 
                nama_kompetisi = ?, 
                tanggal_mulai_kompetisi = ?, 
                tanggal_selesai_kompetisi = ?, 
                penyelenggara_kompetisi = ?, 
                tempat_kompetisi = ?, 
                surat_tugas = ?, 
                poster_kompetisi = ?, 
                foto_juara = ?, 
                proposal = ?, 
                sertifikat = ?, 
                poin_prestasi = ?";

        // Parameter awal
        $params = [
            $data['kategori'],
            $data['juara'],
            $data['tingkat_penyelenggara'],
            $data['tingkat_kompetisi'],
            $data['nama_kompetisi'],
            $data['tanggal_mulai'],
            $data['tanggal_selesai'],
            $data['penyelenggara'],
            $data['tempat_kompetisi'],
            $data['surat_tugas'],
            $data['poster'],
            $data['foto_juara'],
            $data['proposal'],
            $data['sertifikat'],
            $data['poin_prestasi']
        ];

        // Periksa role dan status (opsional)
        if ($_SESSION['user']['role'] !== 'Mahasiswa') {
            $stmt .= ", status = ?";
            $params[] = $data['status'];
        }

        if ($_SESSION['user']['role'] !== 'Mahasiswa' && $data['status'] !== 'Not Validated') {
            $stmt .= ", id_admin = ?, validated_at = GETDATE()";
            $params[] = $data['id_admin'];
        }

        // Tambahkan WHERE kondisi
        $stmt .= " WHERE id_prestasi = ?";
        $params[] = $data['id_prestasi'];


        // Eksekusi query
        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        return $result;
    }

    public function delete($id_prestasi)
    {
        $stmt = "
            BEGIN TRANSACTION;

            DELETE FROM dosen_prestasi WHERE id_prestasi = ?;
            DELETE FROM prestasi_mahasiswa WHERE id_prestasi = ?;
            DELETE FROM prestasi WHERE id_prestasi = ?;

            COMMIT TRANSACTION;
";

        $params = array($id_prestasi, $id_prestasi, $id_prestasi);
        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            // Transaksi dibatalkan
            sqlsrv_query($this->conn, "ROLLBACK TRANSACTION;");
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        return $result;
    }
}

?>