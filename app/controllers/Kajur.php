<?php

class Kajur extends Controller
{
    public function index()
    {
        $this->checkRole("Ketua Jurusan");
        $data['statistik'] = $this->model('PrestasiModel')->getStatistikPrestasi();
        if (isset($_POST['keyword']) && isset($_POST['limit']) && isset($_POST['year'])) {
            $data['prestasi'] = $this->model("PrestasiModel")->getRankingPrestasi($_POST['keyword'], $_POST['limit'], $_POST['year']);
        } else {
            $data['prestasi'] = $this->model("PrestasiModel")->getRankingPrestasi();
        }
        $this->view('Kajur/index', $data);

    }

    public function profil()
    {
        $this->checkRole("Ketua Jurusan");
        $this->view("Kajur/profil");
    }
}