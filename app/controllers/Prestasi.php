<?php

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
    
    public function delete($id_prestasi)
    {
        $this->checkRole("Admin", "Super Admin");
     
        $id = htmlspecialchars($id_prestasi);
        $this->model("PrestasiModel")->delete($id);
        header('location:' . BASEURL . '/Prestasi/index');
    }
    public function show($id_prestasi)
    {
        $this->checkRole("Admin", "Super Admin", "Mahasiswa", "Ketua Jurusan");
        $id = htmlspecialchars($id_prestasi);
        $data =[
            "prestasi" => $this->model("PrestasiModel")->getDetailPrestasi($id),
            "mahasiswa" => $this->model("PrestasiModel")->getDetailPrestasiDataMahasiswa($id),
            "dosen" => $this->model("PrestasiModel")->getDetailPrestasiDataDosen($id),
            "poin" => $this->model("PrestasiModel")->getDetailPrestasiDataPoin($id),
        ];
        $this->view("Prestasi/show", $data);
    }
}