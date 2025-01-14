<?php


class PrestasiModel extends Connection
{

    // Get All Prestasi Mahasiswa
    public function getPrestasi()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM prestasi");
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $data ?? [];
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function getDaftarPrestasi()
    {
        try {
            $stmt = $this->pdo->prepare("
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
        ");
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $data ?? [];
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function getPrestasiByNim($nim)
    {
        try {
            $stmt = $this->pdo->prepare("
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
            WHERE m.nim = :nim
            ORDER BY p.created_at DESC;
        ");
            $stmt->execute(['nim' => $nim]);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $data ?? [];
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function getDetailPrestasi($id)
    {
        try {
            if (CONNECTION_TYPE === 'sqlsrv') {
                $stmt = $this->pdo->prepare("EXEC usp_GetDetailPrestasi @id_prestasi = :id_prestasi");
            } else {
                $stmt = $this->pdo->prepare("CALL usp_GetDetailPrestasi(:id_prestasi)");
            }

            $stmt->execute(['id_prestasi' => $id]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            return $data ?? [];
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function getPrestasiById($id)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM prestasi WHERE id_prestasi = :id_prestasi");
            $stmt->execute(['id_prestasi' => $id]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            return $data ?? [];
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function getDetailPrestasiDataMahasiswa($id)
    {
        try {
            $stmt = $this->pdo->prepare("
            SELECT
                m.id_mahasiswa,
                m.nim,
                m.nama as nama_mahasiswa,
                p.id_peran,
                p.peran
            FROM prestasi_mahasiswa pm
                JOIN mahasiswa m ON pm.id_mahasiswa = m.id_mahasiswa
                JOIN peran_mahasiswa p ON pm.id_peran = p.id_peran
            WHERE pm.id_prestasi = :id_prestasi;");

            $stmt->execute(['id_prestasi' => $id]);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $data ?? [];
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function getDetailPrestasiDataDosen($id)
    {
        try {
            $stmt = $this->pdo->prepare("
            SELECT
                d.id_dosen,
                d.nama AS nama_dosen,
                d.nip,
                pd.id_peran,
                pd.peran
            FROM dosen_prestasi dp
                JOIN dosen d ON dp.id_dosen = d.id_dosen
                JOIN peran_dosen pd ON dp.id_peran = pd.id_peran
            WHERE dp.id_prestasi = :id_prestasi;
        ");
            $stmt->execute(['id_prestasi' => $id]);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $data ?? [];
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function getDetailPrestasiDataPoin($id)
    {
        try {
            $stmt = $this->pdo->prepare("
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
            WHERE p.id_prestasi = :id_prestasi;
        ");
            $stmt->execute(['id_prestasi' => $id]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            return $data ?? [];
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function countPrestasi($keyword)
    {
        try {
            $stmt = $this->pdo->prepare("WITH Ranking AS (
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
				WHERE nama LIKE :keyword1 OR nim LIKE :keyword2;");
            $stmt->execute([
                'keyword1' => "%" . $keyword . "%",
                'keyword2' => "%" . $keyword . "%"
            ]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            return $data['total'] ?? 0;
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function countPrestasiPerTahun($keyword, $year)
    {
        try {
            $stmt = $this->pdo->prepare("WITH Ranking AS (
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
                WHERE YEAR(p.tanggal_selesai_kompetisi) = :year 
                GROUP BY
                	m.nama,
                	m.nim,
                	prodi.nama_prodi,
                	YEAR(p.tanggal_selesai_kompetisi)
            )
            SELECT COUNT(*) as total
            FROM Ranking
            WHERE nama LIKE :keyword1 OR nim LIKE :keyword2;");
            $stmt->execute([
                'keyword1' => "%" . $keyword . "%",
                'keyword2' => "%" . $keyword . "%",
                'year' => $year
            ]);
            // $stmt->execute(['keyword' => "%" . $keyword . "%", 'year' => $year]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            return $data['total'] ?? 0;
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function getRankingPrestasi($keyword = "", $limit = 60, $offset = 0)
    {
        try {
            // Pastikan nilai limit dan offset adalah integer
            $limit = (int) $limit;
            $offset = (int) $offset;
    
            if (CONNECTION_TYPE === 'sqlsrv') {
                // Query untuk SQL Server
                $query = "WITH Ranking AS (
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
                WHERE nama LIKE :keyword1 OR nim LIKE :keyword2
                ORDER BY rank
                OFFSET $offset ROWS
                FETCH NEXT $limit ROWS ONLY;";
            } else {
                // Query untuk MySQL
                $query = "WITH Ranking AS (
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
                WHERE nama LIKE :keyword1 OR nim LIKE :keyword2
                ORDER BY rank
                LIMIT :limit OFFSET :offset;";
            }
    
            // Eksekusi query dengan parameter binding
            $stmt = $this->pdo->prepare($query);
    
            // Bind parameter
            if (CONNECTION_TYPE === 'sqlsrv') {
                $stmt->execute([
                    'keyword1' => "%" . $keyword . "%",
                    'keyword2' => "%" . $keyword . "%"
                ]);
            } else {
                $stmt->execute([
                    'keyword1' => "%" . $keyword . "%",
                    'keyword2' => "%" . $keyword . "%",
                    'limit' => $limit,
                    'offset' => $offset
                ]);
            }
    
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            return $data ?? [];
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }
    


    public function getRankingPrestasiPerTahun($keyword, $year, $limit, $offset)
    {
        try {
            // Pastikan nilai limit dan offset adalah integer
            $limit = (int) $limit;
            $offset = (int) $offset;
    
            if (CONNECTION_TYPE === 'sqlsrv') {
                $query = "WITH Ranking AS (
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
                    WHERE YEAR(p.tanggal_selesai_kompetisi) = :year
                    GROUP BY
                        m.nama,
                        m.nim,
                        prodi.nama_prodi,
                        YEAR(p.tanggal_selesai_kompetisi)
                )
                SELECT *
                FROM Ranking
                WHERE nim LIKE :keyword1 OR nama LIKE :keyword2
                ORDER BY rank
                OFFSET :offset ROWS
                FETCH NEXT :limit ROWS ONLY;";
            } else {
                $query = "WITH Ranking AS (
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
                    WHERE YEAR(p.tanggal_selesai_kompetisi) = :year
                    GROUP BY
                        m.nama,
                        m.nim,
                        prodi.nama_prodi,
                        YEAR(p.tanggal_selesai_kompetisi)
                )
                SELECT *
                FROM Ranking
                WHERE nim LIKE :keyword1 OR nama LIKE :keyword2
                ORDER BY rank
                LIMIT :offset, :limit;";
            }
    
            // Eksekusi query dengan parameter binding
            $stmt = $this->pdo->prepare($query);
    
            // Bind parameter untuk kedua jenis koneksi
            $stmt->bindValue(':year', $year, PDO::PARAM_INT);
            $stmt->bindValue(':keyword1', "%" . $keyword . "%", PDO::PARAM_STR);
            $stmt->bindValue(':keyword2', "%" . $keyword . "%", PDO::PARAM_STR);
            $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            return $data ?? [];
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }
    

    public function getStatistikPrestasi()
    {
        try {
            $stmt = $this->pdo->prepare("
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
        ");
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            return $data ?? [];
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function getTahunPrestasi()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT
                DISTINCT YEAR(tanggal_selesai_kompetisi) as tahun
                FROM prestasi;");
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $data ?? [];
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function getGrafikDiagramLingkaran($type = "kategori")
    {
        try {
            if (CONNECTION_TYPE === 'sqlsrv') {
                $stmt = $this->pdo->prepare("EXEC usp_GetAnalisisPrestasi @type = :type;");
            } else {
                $stmt = $this->pdo->prepare("CALL usp_GetAnalisisPrestasi(:type);");
            }

            $stmt->execute(['type' => $type]);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $data ?? [];
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function getGrafikPerTahun($type = "kategori")
    {
        try {
            if (CONNECTION_TYPE === 'sqlsrv') {
                $stmt = $this->pdo->prepare("EXEC usp_GetAnalisisPrestasiPerTahun @type = :type;");
            } else {
                $stmt = $this->pdo->prepare("CALL usp_GetAnalisisPrestasiPerTahun(:type);");
            }

            $stmt->execute(['type' => $type]);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $data ?? [];
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }
    public function getGrafikPerBulan($type = "kategori", $year = "2024")
    {
        try {
            if (CONNECTION_TYPE === 'sqlsrv') {
                $stmt = $this->pdo->prepare("EXEC usp_GetAnalisisPrestasiPerBulan @tahun = :year, @type = :type;");
            } else {
                $stmt = $this->pdo->prepare("CALL usp_GetAnalisisPrestasiPerBulan(:year, :type);");
            }
            $stmt->execute(['year' => $year, 'type' => $type]);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $data ?? [];
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function getExportData()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM vw_DataPrestasi");
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (CONNECTION_TYPE === 'sqlsrv') {
                $stmt2 = $this->pdo->prepare("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'vw_DataPrestasi' AND TABLE_CATALOG = DB_NAME();");
            } else {
                $stmt2 = $this->pdo->prepare("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'vw_DataPrestasi' AND TABLE_SCHEMA = DATABASE();");
            }
            $stmt2->execute();
            $header = $stmt2->fetchAll(PDO::FETCH_COLUMN);

            return ['data' => $data ?? [], 'header' => $header ?? []];
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function store($data)
    {
        try {
            //!!! LOGIKA DI CONTROLLER
            // Cek role user
            if (isset($_SESSION['user']['role']) && ($_SESSION['user']['role'] === 'Super Admin' || $_SESSION['user']['role'] === 'Admin')) {
                //  Langsung validasi kalo Create oleh Super Admin/Admin
                $data['status'] = 'Valid';
                $data['id_admin'] = $_SESSION['user']['id_admin'];
            } else {
                //  Tidak langsung validasi kalo Create oleh Mahasiswa
                $data['status'] = 'Not Validated';
                $data['id_admin'] = null;
            }

            // Statement insert biasa untuk role Mahasiswa
            if (CONNECTION_TYPE === 'sqlsrv') {
                $validated_at = ($_SESSION['user']['role'] === 'Super Admin' || $_SESSION['user']['role'] === 'Admin') ? 'GETDATE()' : 'NULL';
            } else {
                $validated_at = ($_SESSION['user']['role'] === 'Super Admin' || $_SESSION['user']['role'] === 'Admin') ? 'NOW()' : 'NULL';
            }

            $stmt = $this->pdo->prepare("INSERT INTO prestasi(
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
            poin_prestasi,
            status,
            id_admin,
            validated_at 
            ) VALUES (
                :kategori, 
                :juara, 
                :tingkat_penyelenggara, 
                :tingkat_kompetisi, 
                :nama_kompetisi, 
                :tanggal_mulai, 
                :tanggal_selesai, 
                :penyelenggara, 
                :tempat_kompetisi, 
                :surat_tugas, 
                :poster, 
                :foto_juara, 
                :proposal, 
                :sertifikat, 
                :poin_prestasi,
                :status,
                :id_admin,
                :validated_at
            );");

            $stmt->execute([
                'kategori' => $data['kategori'],
                'juara' => $data['juara'],
                'tingkat_penyelenggara' => $data['tingkat_penyelenggara'],
                'tingkat_kompetisi' => $data['tingkat_kompetisi'],
                'nama_kompetisi' => $data['nama_kompetisi'],
                'tanggal_mulai' => $data['tanggal_mulai'],
                'tanggal_selesai' => $data['tanggal_selesai'],
                'penyelenggara' => $data['penyelenggara'],
                'tempat_kompetisi' => $data['tempat_kompetisi'],
                'surat_tugas' => $data['surat_tugas'],
                'poster' => $data['poster'],
                'foto_juara' => $data['foto_juara'],
                'proposal' => $data['proposal'],
                'sertifikat' => $data['sertifikat'],
                'poin_prestasi' => $data['poin_prestasi'],
                'status' => $data['status'],
                'id_admin' => $data['id_admin'],
                'validated_at' => $validated_at
            ]);

            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function update($data)
    {
        try {
            // Inisialisasi query dan parameter
            $stmt = $this->pdo->prepare("UPDATE prestasi SET
            id_kategori = :kategori,
            id_juara = :juara,
            id_tingkat_penyelenggara = :tingkat_penyelenggara,
            id_tingkat_kompetisi = :tingkat_kompetisi,
            nama_kompetisi = :nama_kompetisi,
            tanggal_mulai_kompetisi = :tanggal_mulai,
            tanggal_selesai_kompetisi = :tanggal_selesai,
            penyelenggara_kompetisi = :penyelenggara,
            tempat_kompetisi = :tempat_kompetisi,
            surat_tugas = :surat_tugas,
            poster_kompetisi = :poster,
            foto_juara = :foto_juara,
            proposal = :proposal,
            sertifikat = :sertifikat,
            poin_prestasi = :poin_prestasi");

            $stmt->execute([
                'kategori' => $data['kategori'],
                'juara' => $data['juara'],
                'tingkat_penyelenggara' => $data['tingkat_penyelenggara'],
                'tingkat_kompetisi' => $data['tingkat_kompetisi'],
                'nama_kompetisi' => $data['nama_kompetisi'],
                'tanggal_mulai' => $data['tanggal_mulai'],
                'tanggal_selesai' => $data['tanggal_selesai'],
                'penyelenggara' => $data['penyelenggara'],
                'tempat_kompetisi' => $data['tempat_kompetisi'],
                'surat_tugas' => $data['surat_tugas'],
                'poster' => $data['poster'],
                'foto_juara' => $data['foto_juara'],
                'proposal' => $data['proposal'],
                'sertifikat' => $data['sertifikat'],
                'poin_prestasi' => $data['poin_prestasi']
            ]);

            return $stmt->rowCount();

            //!!! LOGIKA DI CONTROLLER
            // // Periksa role dan status (opsional)
            // if ($_SESSION['user']['role'] !== 'Mahasiswa') {
            //     $stmt .= ", status = ?";
            //     $params[] = $data['status'];
            // }

            // if ($_SESSION['user']['role'] !== 'Mahasiswa' && $data['status'] !== 'Not Validated') {
            //     $stmt .= ", id_admin = ?, validated_at = GETDATE()";
            //     $params[] = $data['id_admin'];
            // }

            // // Tambahkan WHERE kondisi
            // $stmt .= " WHERE id_prestasi = ?";
            // $params[] = $data['id_prestasi'];
        } catch (PDOException $e) {
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }

    public function delete($id_prestasi)
    {
        try {
            $stmt = $this->pdo->prepare("
            BEGIN TRANSACTION;

            DELETE FROM dosen_prestasi WHERE id_prestasi = ?;
            DELETE FROM prestasi_mahasiswa WHERE id_prestasi = ?;
            DELETE FROM prestasi WHERE id_prestasi = ?;

            COMMIT TRANSACTION;
            ");

            $stmt->execute([$id_prestasi, $id_prestasi, $id_prestasi]);

            return $stmt->rowCount();
        } catch (PDOException $e) {
            $stmt = $this->pdo->prepare("ROLLBACK TRANSACTION;");
            $stmt->execute();
            throw new Exception("Database Error: " . $e->getMessage());
        }
    }
}

?>