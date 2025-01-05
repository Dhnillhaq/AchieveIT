<?php

class Admin extends Controller
{

    public function index()
    {
        try {
            $this->checkMethod("GET");
            $this->checkRole("Admin", "Super Admin");
            $data = [
                'statistik' => $this->model('PrestasiModel')->getStatistikPrestasi(),
                'lingkaran' => $this->model('PrestasiModel')->getGrafikDiagramLingkaran(),
                'tahun' => $this->model('PrestasiModel')->getTahunPrestasi(),
                'kategori' => $this->model('KategoriModel')->getKategori(),
                'perTahun' => $this->model('PrestasiModel')->getGrafikPertahun(),
                'perBulan' => $this->model('PrestasiModel')->getGrafikPerBulan(),
            ];

            $this->view('Admin/index', $data);
        } catch (Exception $e) {
            $this->view('exception', $e);
        }
    }

    public function getDataRankingPrestasi()
    {
        // Terima data POST dari JavaScript
        $input = json_decode(file_get_contents("php://input"), true);

        // Tangkap parameter dari input
        $keyword = $input['keyword'] ?? "";          // Keyword pencarian
        $year = $input['year'] ?? "all";             // Tahun filter
        $page = (int) ($input['page'] ?? 1);          // Halaman, default halaman pertama
        $limit = 10;                                 // Jumlah data per halaman
        $offset = ($page - 1) * $limit;              // Hitung offset untuk query
        // Ambil jumlah total data berdasarkan filter
        if ($year === "all") {
            $totalPrestasi = $this->model('PrestasiModel')->countPrestasi($keyword); // Total sesuai keyword
            $data = $this->model('PrestasiModel')->getRankingPrestasi($keyword, $limit, $offset); // Data untuk semua tahun
        } else {
            $totalPrestasi = $this->model('PrestasiModel')->countPrestasiPerTahun($keyword, $year); // Total berdasarkan tahun
            $data = $this->model('PrestasiModel')->getRankingPrestasiPerTahun($keyword, $year, $limit, $offset); // Data berdasarkan tahun
        }

        // Return data sebagai JSON
        header('Content-Type: application/json');
        echo json_encode([
            'data' => $data,
            'total' => $totalPrestasi,   
            'page' => $page,             
            'limit' => $limit            
        ]);
    }

    public function getAnalisisDataPrestasi()
    {
        // Terima data POST dari JavaScript
        $input = json_decode(file_get_contents("php://input"), true);

        // Tangkap parameter dari input
        $selected = $input['selected'] ?? 'kategori';          // Keyword pencarian
        $years = $input['years'] ?? "2024";             // Tahun filter
        $selectedModel = "";
        if ($selected === 'tingkat_kompetisi') {
            $selectedModel = 'TingkatKompetisi';
        } else if ($selected === 'tingkat_penyelenggara') {
            $selectedModel = 'TingkatPenyelenggara';
        } else {
            $selectedModel = $selected;
        }
        // Ambil jumlah total data berdasarkan filter
        $dataTahun = $this->model('PrestasiModel')->getTahunPrestasi();
        $dataSelected = $this->model($selectedModel . 'Model')->{'get' . $selectedModel}();
        $dataLingkaran = $this->model('PrestasiModel')->getGrafikDiagramLingkaran($selected);
        $dataPerTahun = $this->model('PrestasiModel')->getGrafikPertahun($selected);
        $dataPerBulan = $this->model('PrestasiModel')->getGrafikPerBulan($selected, $years);

        // echo "<pre>";
        // echo "LINGKARAN<br>";
        // print_r($dataLingkaran);
        // echo "PERBULAN<br>";
        // print_r($dataPerBulan);
        // echo "PERTAHUN<br>";
        // print_r($dataPerTahun);
        // echo "SELECTED<br>";
        // print_r($dataSelected);
        // echo "TAHUN<br>";
        // print_r($dataTahun);                        
        // echo "</pre>";


        // Return data sebagai JSON
        header('Content-Type: application/json');
        echo json_encode([
            'dataTahun' => $dataTahun,
            'dataSelected' => $dataSelected,
            'dataLingkaran' => $dataLingkaran,
            'dataPerTahun' => $dataPerTahun,
            'dataPerBulan' => $dataPerBulan,
        ]);
    }



    public function administrasiData()
    {
        $this->checkMethod("GET");
        $this->checkRole("Admin", "Super Admin");
        $this->view("Admin/administrasiData");
    }

    public function pengaturanPrestasi()
    {
        try {
            $this->checkMethod("GET");
            $this->checkRole("Admin", "Super Admin");
            $data = [
                'kategoriKompetisi' => $this->model('KategoriModel')->getKategori(),
                'tingkatKompetisi' => $this->model('TingkatKompetisiModel')->getTingkatKompetisi(),
                'tingkatPenyelenggara' => $this->model('TingkatPenyelenggaraModel')->getTingkatPenyelenggara(),
                'juara' => $this->model('JuaraModel')->getJuara()
            ];

            $this->view("Admin/pengaturanPrestasi", $data);
        } catch (Exception $e) {
            $this->view('exception', $e);
        }
    }

    public function profil()
    {
        $this->checkMethod("GET");
        $this->checkRole("Admin", "Super Admin");        
        $this->view("Admin/profilAdmin");
    }

    public function getLogs($pages, $limits = 10)
    {
        $page = (int) $pages;
        $limit = (int) $limits;
        $offset = ($page - 1) * $limit;

        $logs = $this->model("LogAdminModel")->getLogAdmin($offset, $limit);
        $totalLogs = $this->model("LogAdminModel")->countLogs(); // Total jumlah log

        echo json_encode([
            'data' => $logs,
            'total' => $totalLogs,
            'page' => $page,
            'limit' => $limit,
        ]);
    }

    public function adminList()
    {
        try {
            $this->checkMethod("GET");
            $this->checkRole("Super Admin");
            $data['admin'] = $this->model("AdminModel")->getAllDataAdmin();
            $this->view("Admin/Admin/index", $data);
        } catch (Exception $e) {
            $this->view('exception', $e);
        }
    }

    public function create()
    {
        $this->checkMethod("GET");
        $this->checkRole("Super Admin");
        $this->view("Admin/Admin/create");
    }

    // Proses
    public function store()
    {
        try {
            $this->checkMethod("POST");
            $this->checkRole("Super Admin");
            $data = [
                "nama" => htmlspecialchars($_POST['nama']),
                "nip" => htmlspecialchars($_POST['nip']),
                "role" => htmlspecialchars($_POST['role']),
                "password" => htmlspecialchars($_POST['password'])
            ];

            $isSuccess = $this->model("AdminModel")->store($data);

            if ($isSuccess) {
                $this->model("LogAdminModel")->storeAdminLog("Tambah Data", "Menambahkan Data Admin");
                Flasher::setFlash("Tambahkan", "Data berhasil ditambahkan", "success", "Admin/adminList");
            } else {
                Flasher::setFlash("Tambahkan", "Data gagal ditambahkan", "error", "Admin/adminList");
            }

            header('location:' . BASEURL . '/Admin/create');
        } catch (Exception $e) {
            $this->view('exception', $e);
        }
    }

    public function edit($id_admin)
    {
        try {
            $this->checkMethod(method: "GET");
            $this->checkRole("Super Admin");
            $id = htmlspecialchars($id_admin);
            $data = $this->model("AdminModel")->getAdminById($id);
            $this->view("Admin/Admin/edit", $data);
        } catch (Exception $e) {
            $this->view('exception', $e);
        }
    }

    public function update()
    {
        try {
            $this->checkMethod("POST");
            $this->checkRole("Super Admin");
            $data = [
                'nip' => htmlspecialchars($_POST['nip']),
                'nama' => htmlspecialchars($_POST['nama']),
                'role' => htmlspecialchars($_POST['role']),
                'password' => htmlspecialchars($_POST['password']),
                'id_admin' => htmlspecialchars($_POST['id_admin'])
            ];
            $isSuccess = $this->model("AdminModel")->update($data);

            if ($isSuccess) {
                $this->model("LogAdminModel")->storeAdminLog("Edit Data", "Mengubah Data Admin dengan ID: " . $data['id_admin']);
                Flasher::setFlash("Perbarui", "Data berhasil diperbarui", "success", "Admin/adminList");
            } else {
                Flasher::setFlash("Perbarui", "Data gagal diperbarui", "error", "Admin/adminList");
            }
            header('location:' . BASEURL . '/Admin/edit/' . $data['id_admin']);
        } catch (Exception $e) {
            $this->view('exception', $e);
        }
    }

    public function delete($id_admin)
    {
        $this->checkRole("Super Admin");
        $id = htmlspecialchars($id_admin);

        Flasher::setFlash("Hapus", "Apakah anda yakin ingin menghapus data ini?", "warning", "Admin/deleting/" . $id);

        header('location:' . BASEURL . '/Admin/adminList');
    }

    public function deleting($id)
    {
        try {
            $this->checkMethod("POST");
            $this->checkRole("Super Admin");
            $isSuccess = $this->model("AdminModel")->delete($id);

            if ($isSuccess) {
                $this->model("LogAdminModel")->storeAdminLog("Hapus Data", "Menghapus Data Admin dengan ID: " . $id);
                Flasher::setFlash("Hapus", "Data berhasil dihapus", "success");
            } else {
                Flasher::setFlash("Hapus", "Data gagal dihapus", "error");
            }
            header('location:' . BASEURL . '/Admin/adminList');
        } catch (Exception $e) {
            $this->view('exception', $e);
        }
    }

}
?>