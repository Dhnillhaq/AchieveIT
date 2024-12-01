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
        $this->view("Admin/profilAdmin");
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
        $this->view("Admin/Admin/create");
    }

    public function edit()
    {
        $this->checkRole("Super Admin");
        $this->view("Admin/Admin/edit");
    }
    public function adminList()
    {
        $this->checkRole("Super Admin");
        $this->view("Admin/Admin/index");
    }
}
?>