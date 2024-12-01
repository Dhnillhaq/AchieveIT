<?php

class Kajur extends Controller
{
    public function index()
    {
        if (isset($_SESSION['user']['role'])) {
            $role = $_SESSION['user']['role'];
            if ($role == "Ketua Jurusan") {
                $data['statistik'] = $this->model('PrestasiModel')->getStatistikPrestasi();
                $this->view('Kajur/index',$data);
            } else {
                header('Location:' . BASEURL . '/Auth/Login');
            }
        } else {
            header("location:" . BASEURL);
        }
    }

    public function profilKajur()
    {
        $this->view("Kajur/profilKajur");
    }
}