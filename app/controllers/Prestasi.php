<?php

class Prestasi extends Controller
{
    public function index(){
        $this->view("Prestasi/index");
    }
    public function create(){
        $data['kp'] = $this->model("KategoriModel")->getKategori();
        $data['tp'] = $this->model("TingkatPenyelenggaraModel")->getTingkatPenyelenggara();
        $data['tk'] = $this->model("TingkatKompetisiModel")->getTingkatKompetisi();
        $data['juara'] = $this->model("JuaraModel")->getJuara();
        $data['mahasiswa'] = $this->model("MahasiswaModel")->getMahasiswa();    
        $data['peranMhs'] = $this->model("PeranMahasiswaModel")->getPeranMhs();
        $data['dosen'] = $this->model("DosenModel")->getDosen();
        $data['juara'] = $this->model("PeranDosenModel")->getPeranDosen();
        $this->view("Prestasi/create", $data);
    }
    public function edit(){
        $this->view("Prestasi/edit");
    }
    public function show(){
        $this->view("Prestasi/show");
    }
}