<?php

class Prestasi extends Controller
{
    public function index()
    {
        $data['daftar_prestasi'] = $this->model("PrestasiModel")->getDaftarPrestasi();
        $this->view("Prestasi/index", $data);
    }
    public function create()
    {
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
        $this->view("Prestasi/edit");
    }
    public function show()
    {
        $this->view("Prestasi/show");
    }
}