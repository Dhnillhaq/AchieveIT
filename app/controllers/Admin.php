<?php
class Admin extends Controller
{

    public function index()
    {
        $this->checkRole("Admin", "Super Admin");
        $data = [
            'prestasi' => $this->model("PrestasiModel")->printPrestasiUmum(),
            'statistik' => $this->model('PrestasiModel')->getStatistikPrestasi(),
            'lingkaran' => $this->model('PrestasiModel')->getGrafikDiagramLingkaran(),
            'tahun' => $this->model('PrestasiModel')->getTahunPrestasi(),
            'kategori' => $this->model('KategoriModel')->getKategori(),
            'perTahun' => $this->model('PrestasiModel')->getGrafikPertahun(),
            'perBulan' => $this->model('PrestasiModel')->getGrafikPerBulan(),
        ];
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";

        $this->view('Admin/index', $data);

    }

    public function administrasiData()
    {
        $this->checkRole("Admin", "Super Admin");
        $this->view("Admin/administrasiData");
    }
    public function pengaturanPrestasi()
    {
        $this->checkRole("Admin", "Super Admin");
        $data = [
            'kategoriKompetisi' => $this->model('KategoriModel')->getKategori(),
            'tingkatKompetisi' => $this->model('TingkatKompetisiModel')->getTingkatKompetisi(),
            'tingkatPenyelenggara' => $this->model('TingkatPenyelenggaraModel')->getTingkatPenyelenggara(),
            'juara' => $this->model('JuaraModel')->getJuara()
        ];

        $this->view("Admin/pengaturanPrestasi", $data);
    }
    public function profil()
    {
        $this->checkRole("Admin", "Super Admin");
        $this->view("Admin/profilAdmin");
    }
    public function adminList()
    {
        $this->checkRole("Super Admin");
        $data['admin'] = $this->model("AdminModel")->getAllDataAdmin();
        $this->view("Admin/Admin/index", $data);
    }
    public function create()
    {
        $this->checkRole("Super Admin");
        $this->view("Admin/Admin/create");
    }

    // Proses
    public function store()
    {
        $this->checkRole("Super Admin");
        $data = [
            "nama" => htmlspecialchars($_POST['nama']),
            "nip" => htmlspecialchars($_POST['nip']),
            "role" => htmlspecialchars($_POST['role']),
            "password" => htmlspecialchars($_POST['password'])
        ];

        $isSuccess = $this->model("AdminModel")->store($data);

        if ($isSuccess) {
            Flasher::setFlash("Input", "Data berhasil ditambahkan", "success", "Admin/adminList");
        } else {
            Flasher::setFlash("Input", "Data gagal ditambahkan", "error", "Admin/adminList");
        }

        header('location:' . BASEURL . '/Admin/create');
    }

    public function edit($id_admin)
    {
        $this->checkRole("Super Admin");
        $id = htmlspecialchars($id_admin);
        $data = $this->model("AdminModel")->getAdminById($id);
        $this->view("Admin/Admin/edit", $data);
    }

    public function delete($id_admin)
    {
        $this->checkRole("Super Admin");
        $id = htmlspecialchars($id_admin);
        $isSuccess = $this->model("AdminModel")->delete($id);

        if ($isSuccess) {
            Flasher::setFlash("Delete", "Data berhasil dihapus", "success");
        } else {
            Flasher::setFlash("Delete", "Data gagal dihapus", "error");
        }
        header('location:' . BASEURL . '/Admin/adminList');
    }

    public function update()
    {
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
            Flasher::setFlash("Update", "Data berhasil diperbarui", "success", "Admin/adminList");
        } else {
            Flasher::setFlash("Update", "Data gagal diperbarui", "error", "Admin/adminList");
        }
        header('location:' . BASEURL . '/Admin/edit/' . $data['id_admin']);
    }
}
?>