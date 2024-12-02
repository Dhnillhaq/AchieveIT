<?php

class Prestasi extends Controller
{
    public function index()
    {
        $this->checkRole("Admin", "Super Admin");
        $data['daftar_prestasi'] = $this->model("PrestasiModel")->getDaftarPrestasi();
        $this->view("Prestasi/index", $data);
    }
    public function create()
    {
        $this->checkRole("Admin", "Super Admin");
        $data = [
            'kp' => $this->model("KategoriModel")->getKategori(),
            'tp' => $this->model("TingkatPenyelenggaraModel")->getTingkatPenyelenggara(),
            'tk' => $this->model("TingkatKompetisiModel")->getTingkatKompetisi(),
            'juara' => $this->model("JuaraModel")->getJuara(),
            'mahasiswa' => [
                'all' => $this->model("MahasiswaModel")->getAllDataMahasiswa()
                // 'byNim' => $this->model("MahasiswaModel")->getMahasiswaByNim($_SESSION['user']['nim'])
            ],
            'peranMhs' => $this->model("PeranMahasiswaModel")->getPeranMhs(),
            'dosen' => $this->model("DosenModel")->getDosen(),
            'peranDosen' => $this->model("PeranDosenModel")->getPeranDosen()
        ];
        $this->view("Prestasi/create", $data);
    }
    public function edit()
    {
        $this->checkRole("Admin", "Super Admin");
        $this->view("Prestasi/edit");
    }
    public function show()
    {
        $this->checkRole("Admin", "Super Admin");
        $this->view("Prestasi/show");
    }
}