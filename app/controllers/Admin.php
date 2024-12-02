<?php
class Admin extends Controller
{

    public function index()
    {
        $this->checkRole("Admin", "Super Admin");
        $data['statistik'] = $this->model('PrestasiModel')->getStatistikPrestasi();
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
        $this->model("AdminModel");
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
        $this->model("AdminModel")->store($data);
        header("location:" . BASEURL . "/Admin/adminList");
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
        $this->model("AdminModel")->Delete($id);
        header('location:' . BASEURL . '/Admin/adminList');
    }

    public function update()
    {
        $data = [
            'nip' => htmlspecialchars($_POST['nip']),
            'nama' => htmlspecialchars($_POST['nama']),
            'role' => htmlspecialchars($_POST['role']),
            'password' => htmlspecialchars($_POST['password']),
            'id_admin' => htmlspecialchars($_POST['id_admin'])
        ];
        $this->model("AdminModel")->update($data);
        header('location:' . BASEURL . '/Admin/adminList');
    }

}
?>