<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once 'Files.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Prestasi extends Controller
{

    private static $files;

    public function __construct()
    {
        self::$files = new Files();
    }

    public function index()
    {
        $this->checkRole("Admin", "Super Admin", "Ketua Jurusan");
        $data['daftar_prestasi'] = $this->model("PrestasiModel")->getDaftarPrestasi();
        $this->view("Prestasi/index", $data);
    }
    public function create()
    {
        $this->checkRole("Admin", "Super Admin", "Mahasiswa");
        $data = [
            'kategori' => $this->model("KategoriModel")->getKategori(),
            'tingkatKompetisi' => $this->model("TingkatKompetisiModel")->getTingkatKompetisi(),
            'tingkatPenyelenggara' => $this->model("TingkatPenyelenggaraModel")->getTingkatPenyelenggara(),
            'juara' => $this->model("JuaraModel")->getJuara(),
            'mahasiswa' => $this->model("MahasiswaModel")->getAllDataMahasiswa(),
            'peranMahasiswa' => $this->model("PeranMahasiswaModel")->getPeranMhs(),
            'dosen' => $this->model("DosenModel")->getDosen(),
            'peranDosen' => $this->model("PeranDosenModel")->getPeranDosen()
        ];
        $this->view("Prestasi/create", $data);
    }

    public function store()
    {
        $this->checkRole("Admin", "Super Admin", "Mahasiswa");

        if (isset($_POST['submit'])) {
            $dataPrestasi = [
                'kategori' => filter_var($_POST['kategori'], FILTER_VALIDATE_INT),
                'tingkat_kompetisi' => filter_var($_POST['tingkat_kompetisi'], FILTER_VALIDATE_INT),
                'tingkat_penyelenggara' => filter_var($_POST['tingkat_penyelenggara'], FILTER_VALIDATE_INT),
                'nama_kompetisi' => htmlspecialchars($_POST['nama_kompetisi']),
                'tanggal_mulai' => date('Y-m-d', strtotime($_POST['tanggal_mulai'])),
                'tanggal_selesai' => date('Y-m-d', strtotime($_POST['tanggal_selesai'])),
                'penyelenggara' => htmlspecialchars($_POST['penyelenggara']),
                'tempat_kompetisi' => htmlspecialchars($_POST['tempat_kompetisi']),
                'juara' => filter_var($_POST['juara'], FILTER_VALIDATE_INT),
                'surat_tugas' => self::$files->uploadFile($_FILES['surat_tugas']),
                'poster' => self::$files->uploadFile($_FILES['poster']),
                'foto_juara' => self::$files->uploadFile($_FILES['foto_juara']),
                'sertifikat' => self::$files->uploadFile($_FILES['sertifikat']),
                'proposal' => !empty($_FILES['proposal']['name']) ? self::$files->uploadFile($_FILES['proposal']) : NULL
            ];

            $dataPrestasi['poin_prestasi'] = $this->model("JuaraModel")->getJuaraById($dataPrestasi['juara'])['poin'] +
                $this->model("TingkatKompetisiModel")->getTingkatKompetisiById($dataPrestasi['tingkat_kompetisi'])['poin'] +
                $this->model("TingkatPenyelenggaraModel")->getTingkatPenyelenggaraById($dataPrestasi['tingkat_penyelenggara'])['poin'];

            $insertedPrestasi = $this->model("PrestasiModel")->store($dataPrestasi);

            if ($insertedPrestasi) {

                // insert into mahasiswa - prestasi
                $dataMahasiswa = [
                    'id_prestasi' => $insertedPrestasi,
                    'id_mahasiswa' => $_POST['mahasiswa'],
                    'id_peran' => $_POST['peran_mhs']
                ];

                if (count($dataMahasiswa['id_mahasiswa']) === count($dataMahasiswa['id_peran'])) {

                    for ($i = 0; $i < count($dataMahasiswa['id_mahasiswa']); $i++) {
                        $insertedPeranMahasiswa = $this->model("PrestasiMahasiswaModel")->store(
                            $dataMahasiswa['id_prestasi'],
                            filter_var($dataMahasiswa['id_mahasiswa'][$i], FILTER_VALIDATE_INT),
                            filter_var($dataMahasiswa['id_peran'][$i], FILTER_VALIDATE_INT)
                        );

                        if (!$insertedPeranMahasiswa) {
                            var_dump($dataMahasiswa);
                            die;
                        }
                    }
                } else {
                    // error handling
                }

                // insert into dosen - prestasi
                $dataDosen = [
                    'id_prestasi' => $insertedPrestasi,
                    'id_dosen' => $_POST['dosen'],
                    'id_peran' => $_POST['peran_dsn']
                ];

                if (count($dataDosen['id_dosen']) === count($dataDosen['id_peran'])) {

                    for ($i = 0; $i < count($dataDosen['id_dosen']); $i++) {
                        $insertedPeranDosen = $this->model("DosenPrestasiModel")->store(
                            $dataDosen['id_prestasi'],
                            filter_var($dataDosen['id_dosen'][$i], FILTER_VALIDATE_INT),
                            filter_var($dataDosen['id_peran'][$i], FILTER_VALIDATE_INT)
                        );

                        if (!$insertedPeranDosen) {
                            var_dump($dataDosen);
                            die;
                        }
                    }
                } else {
                    var_dump($dataDosen);
                    die;
                }

            } else {
                // error handling
            }
        }
        Flasher::setFlash("Tambahkan", "Data berhasil ditambahkan", "success");
        if ($_SESSION['user']['role'] == "Mahasiswa") {
            header('location:' . BASEURL . '/Mahasiswa/prestasiSaya');
        } else {
            $this->model("LogAdminModel")->storeAdminLog("Tambah Data", "Menambah Data Prestasi");
            header('location:' . BASEURL . '/Prestasi/index');
        }
    }

    public function edit($id)
    {
        $this->checkRole("Admin", "Super Admin", "Mahasiswa");
        $data = [
            "prestasi" => $this->model("PrestasiModel")->getDetailPrestasi($id),
            "mhs" => $this->model("PrestasiModel")->getDetailPrestasiDataMahasiswa($id),
            "dsn" => $this->model("PrestasiModel")->getDetailPrestasiDataDosen($id),
            "poin" => $this->model("PrestasiModel")->getDetailPrestasiDataPoin($id),
            'kategori' => $this->model("KategoriModel")->getKategori(),
            'tingkatKompetisi' => $this->model("TingkatKompetisiModel")->getTingkatKompetisi(),
            'tingkatPenyelenggara' => $this->model("TingkatPenyelenggaraModel")->getTingkatPenyelenggara(),
            'juara' => $this->model("JuaraModel")->getJuara(),
            'mahasiswa' => $this->model("MahasiswaModel")->getAllDataMahasiswa(),
            'peranMahasiswa' => $this->model("PeranMahasiswaModel")->getPeranMhs(),
            'dosen' => $this->model("DosenModel")->getDosen(),
            'peranDosen' => $this->model("PeranDosenModel")->getPeranDosen()
        ];
        $this->view("Prestasi/edit", $data);
    }

    public function update()
    {
        $this->checkRole("Admin", "Super Admin", "Mahasiswa");

        if (isset($_POST['submit'])) {

            $id_prestasi = htmlspecialchars($_POST['id_prestasi']);

            $selectedPrestasi = $this->model("PrestasiModel")->getPrestasiById($id_prestasi);


            $dataPrestasi = [
                'kategori' => filter_var($_POST['kategori'], FILTER_VALIDATE_INT),
                'tingkat_kompetisi' => filter_var($_POST['tingkat_kompetisi'], FILTER_VALIDATE_INT),
                'tingkat_penyelenggara' => filter_var($_POST['tingkat_penyelenggara'], FILTER_VALIDATE_INT),
                'nama_kompetisi' => htmlspecialchars($_POST['nama_kompetisi']),
                'tanggal_mulai' => date('Y-m-d', strtotime($_POST['tanggal_mulai'])),
                'tanggal_selesai' => date('Y-m-d', strtotime($_POST['tanggal_selesai'])),
                'penyelenggara' => htmlspecialchars($_POST['penyelenggara']),
                'tempat_kompetisi' => htmlspecialchars($_POST['tempat_kompetisi']),
                'juara' => filter_var($_POST['juara'], FILTER_VALIDATE_INT),
                'surat_tugas' => !empty($_FILES['surat_tugas']['name']) ? self::$files->uploadFile($_FILES['surat_tugas']) : $selectedPrestasi['surat_tugas'],
                'poster' => !empty($_FILES['poster']['name']) ? self::$files->uploadFile($_FILES['poster']) : $selectedPrestasi['poster_kompetisi'],
                'foto_juara' => !empty($_FILES['foto_juara']['name']) ? self::$files->uploadFile($_FILES['foto_juara']) : $selectedPrestasi['foto_juara'],
                'sertifikat' => !empty($_FILES['sertifikat']['name']) ? self::$files->uploadFile($_FILES['sertifikat']) : $selectedPrestasi['sertifikat'],
                'proposal' => !empty($_FILES['proposal']['name']) ? self::$files->uploadFile($_FILES['proposal']) : $selectedPrestasi['proposal'],
                'id_prestasi' => $id_prestasi
            ];

            if (isset($_POST['status'])) {
                $dataPrestasi['status'] = htmlspecialchars($_POST['status']);
                $dataPrestasi['id_admin'] = $_SESSION['user']['id_admin'];
            }

            $dataPrestasi['poin_prestasi'] = $this->model("JuaraModel")->getJuaraById($dataPrestasi['juara'])['poin'] +
                $this->model("TingkatKompetisiModel")->getTingkatKompetisiById($dataPrestasi['tingkat_kompetisi'])['poin'] +
                $this->model("TingkatPenyelenggaraModel")->getTingkatPenyelenggaraById($dataPrestasi['tingkat_penyelenggara'])['poin'];

            $updatePrestasi = $this->model("PrestasiModel")->update($dataPrestasi);

            // --- Mahasiswa - Prestasi ---
            $dataMahasiswa = [
                'id_prestasi' => $id_prestasi,
                'id_mahasiswa' => $_POST['mahasiswa'] ?? [],
                'id_peran' => $_POST['peran_mhs'] ?? []
            ];

            $existingMahasiswa = $this->model("PrestasiMahasiswaModel")->getPrestasiMahasiswaByIdPrestasi($id_prestasi);
            $existingMahasiswaIds = array_column($existingMahasiswa, 'id_mahasiswa');

            // Array untuk menandai mahasiswa yang tidak diubah
            $keptMahasiswa = [];

            // Loop untuk penambahan & update
            foreach ($dataMahasiswa['id_mahasiswa'] as $index => $id_mahasiswa) {
                $id_peran = $dataMahasiswa['id_peran'][$index];

                if (in_array($id_mahasiswa, $existingMahasiswaIds)) {
                    // Skenario jika ingin mengubah peran
                    $currentPeran = $existingMahasiswa[array_search($id_mahasiswa, $existingMahasiswaIds)]['id_peran'];
                    if ($currentPeran != $id_peran) {
                        $this->model("PrestasiMahasiswaModel")->update(
                            $id_prestasi,
                            filter_var($id_mahasiswa, FILTER_VALIDATE_INT),
                            filter_var($id_peran, FILTER_VALIDATE_INT)
                        );
                    }
                } else {
                    // Skenario belum ada mahasiswa dan peran
                    $this->model("PrestasiMahasiswaModel")->store(
                        $id_prestasi,
                        filter_var($id_mahasiswa, FILTER_VALIDATE_INT),
                        filter_var($id_peran, FILTER_VALIDATE_INT)
                    );
                }
                $keptMahasiswa[] = $id_mahasiswa; // Menandai mahasiswa yang ga diubah
            }

            // Hapus mahasiswa yang mau dihapus di Prestasi
            foreach ($existingMahasiswaIds as $id_mahasiswa_db) {
                if (!in_array($id_mahasiswa_db, $keptMahasiswa)) {
                    $this->model("PrestasiMahasiswaModel")->delete($id_prestasi, $id_mahasiswa_db);
                }
            }

            // --- Dosen - Prestasi ---
            $dataDosen = [
                'id_prestasi' => $id_prestasi,
                'id_dosen' => $_POST['dosen'] ?? [],
                'id_peran' => $_POST['peran_dsn'] ?? []
            ];

            $existingDosen = $this->model("DosenPrestasiModel")->getDosenPrestasiByIdPrestasi($id_prestasi);
            $existingDosenIds = array_column($existingDosen, 'id_dosen');

            // Array untuk menandai dosen yang tidak diubah
            $keptDosen = [];

            // Loop untuk penambahan & update
            foreach ($dataDosen['id_dosen'] as $index => $id_dosen) {
                $id_peran = $dataDosen['id_peran'][$index];

                if (in_array($id_dosen, $existingDosenIds)) {
                    // Skenario mengubah peran dosen
                    $currentPeran = $existingDosen[array_search($id_dosen, $existingDosenIds)]['id_peran'];
                    if ($currentPeran != $id_peran) {
                        $this->model("DosenPrestasiModel")->update(
                            $id_prestasi,
                            filter_var($id_dosen, FILTER_VALIDATE_INT),
                            filter_var($id_peran, FILTER_VALIDATE_INT)
                        );
                    }
                } else {
                    // Skenario menambahkan dosen & peran dosen yang belum ada
                    $this->model("DosenPrestasiModel")->store(
                        $id_prestasi,
                        filter_var($id_dosen, FILTER_VALIDATE_INT),
                        filter_var($id_peran, FILTER_VALIDATE_INT)
                    );
                }
                $keptDosen[] = $id_dosen; // Tandai dosen yang ga diubah
            }

            // Hapus dosen yang tidak ada di POST
            foreach ($existingDosenIds as $id_dosen_db) {
                if (!in_array($id_dosen_db, $keptDosen)) {
                    $this->model("DosenPrestasiModel")->delete($id_prestasi, $id_dosen_db);
                }
            }
        }
        Flasher::setFlash("Ubah", "Data Prestasi berhasil diubah", "success");
        if ($_SESSION['user']['role'] == "Mahasiswa") {
            header('location:' . BASEURL . '/Mahasiswa/prestasiSaya');
        } else {
            $this->model("LogAdminModel")->storeAdminLog("Validasi", "Menvalidasi Data Prestasi dengan ID " . $id_prestasi);
            header('location:' . BASEURL . '/Prestasi/index');
        }
    }

    public function delete($id_prestasi)
    {
        $this->checkRole("Admin", "Super Admin", "Mahasiswa");
        $id = htmlspecialchars($id_prestasi);

        Flasher::setFlash("Hapus", "Apakah anda yakin ingin menghapus data ini?", "warning", "Prestasi/deleting/" . $id);
        header('location:' . BASEURL . '/Prestasi/show/' . $id);
    }

    public function deleting($id)
    {
        $this->checkRole("Admin", "Super Admin", "Mahasiswa");

        $isSuccess = $this->model("PrestasiModel")->delete($id);
        if (!$isSuccess) {
            var_dump($isSuccess);
            die;
        } else {
            Flasher::setFlash("Hapus", "Data Prestasi berhasil dihapus", "success");
        }
        if ($_SESSION['user']['role'] == "Mahasiswa") {
            header('location:' . BASEURL . '/Mahasiswa/prestasiSaya');
        } else {
            $this->model("LogAdminModel")->storeAdminLog("Hapus Data", "Menghapus Data Prestasi dengan ID " . $id);
            header('location:' . BASEURL . '/Prestasi/index');

        }
    }

    public function show($id_prestasi)
    {
        $this->checkRole("Admin", "Super Admin", "Mahasiswa", "Ketua Jurusan");
        $id = htmlspecialchars($id_prestasi);
        $data = [
            "prestasi" => $this->model("PrestasiModel")->getDetailPrestasi($id),
            "mahasiswa" => $this->model("PrestasiModel")->getDetailPrestasiDataMahasiswa($id),
            "dosen" => $this->model("PrestasiModel")->getDetailPrestasiDataDosen($id),
            "poin" => $this->model("PrestasiModel")->getDetailPrestasiDataPoin($id),
        ];
        $this->view("Prestasi/show", $data);
    }

    public function export()
    {
        $file = new Spreadsheet();

        $this->model("LogAdminModel")->storeAdminLog("Export Prestasi", "Mengekspor Data Prestasi");


        $active_sheet = $file->getActiveSheet();

        $tableData = $this->model("PrestasiModel")->getExportData();

        $column = 'A';

        // Write headers
        $active_sheet->setCellValue($column++ . '1', 'NO');
        foreach ($tableData['header'] as $header) {
            $active_sheet->setCellValue($column++ . '1', $header);
        }

        // Write data
        $rowIndex = 2;
        $number = 1;
        foreach ($tableData['data'] as $dataRow) {
            $column = 'A';
            $active_sheet->setCellValue($column++ . $rowIndex, $number++);
            foreach ($tableData['header'] as $fieldName) {
                $active_sheet->setCellValue($column++ . $rowIndex, $dataRow[$fieldName]);
            }
            $rowIndex++;
        }


        $writer = IOFactory::createWriter($file, 'Xlsx');

        $file_name = time() . '_' . 'PrestasiExport' . '.' . 'xlsx';

        $writer->save($file_name);

        header('Content-Type: application/x-www-form-urlencoded');

        header('Content-Transfer-Encoding: Binary');

        header("Content-disposition: attachment; filename=\"" . $file_name . "\"");

        readfile($file_name);

        unlink($file_name);

        exit;
    }
}