<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Prestasi extends Controller
{
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
                'surat_tugas' => $this->uploadFile($_FILES['surat_tugas']),
                'poster' => $this->uploadFile($_FILES['poster']),
                'foto_juara' => $this->uploadFile($_FILES['foto_juara']),
                'sertifikat' => $this->uploadFile($_FILES['sertifikat']),
                'proposal' => !empty($_FILES['proposal']['name']) ? $this->uploadFile($_FILES['proposal']) : NULL
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
        header('location:' . BASEURL . '/Prestasi/index');
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

    public function delete($id_prestasi)
    {
        $this->checkRole("Admin", "Super Admin", "Mahasiswa");

        $id = htmlspecialchars($id_prestasi);
        $this->model("PrestasiModel")->delete($id);
        header('location:' . BASEURL . '/Prestasi/index');
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