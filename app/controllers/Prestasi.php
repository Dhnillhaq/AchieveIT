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
        $this->checkRole("Admin", "Super Admin", "Mahasiswa");
        $data = [
            'kategori' => $this->model("KategoriModel")->getKategori(),
            'tingkatKompetisi' => $this->model("TingkatKompetisiModel")->getTingkatKompetisi(),
            'tingkatPenyelenggara' => $this->model("TingkatPenyelenggaraModel")->getTingkatPenyelenggara(),
            'juara' => $this->model("JuaraModel")->getJuara(),
            'mahasiswa' => [
                'all' => $this->model("MahasiswaModel")->getAllDataMahasiswa()
                // 'byNim' => $this->model("MahasiswaModel")->getMahasiswaByNim($_SESSION['user']['nim'])
            ],
            'peranMahasiswa' => $this->model("PeranMahasiswaModel")->getPeranMhs(),
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
        $this->checkRole("Admin", "Super Admin", "Mahasiswa");
        $this->view("Prestasi/show");
    }
}