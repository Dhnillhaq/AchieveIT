<?php

class Home extends Controller
{
    public function index()
    {
        if (isset($_POST['keyword']) && isset($_POST['limit']) && isset($_POST['year'])) {
            $data['prestasi'] = $this->model("PrestasiModel")->printPrestasiUmum($_POST['keyword'], $_POST['limit'], $_POST['year']);
        } else {
            $data['prestasi'] = $this->model("PrestasiModel")->printPrestasiUmum();
        }
        $this->view('index', $data);
    }

    public function pageNotFound()
    {
        if (!isset($_SESSION['user'])) {
            $data['url'] = 'Home/index';
        } else {
            if ($_SESSION['user']['role'] == 'Super Admin') {
                $data['url'] = 'Admin/index';
            } else if ($_SESSION['user']['role'] == 'Ketua Jurusan') {
                $data['url'] = 'Kajur/index';
            } else {
                $data['url'] = 'Mahasiswa/index';
            }
        }
        $this->view('pageNotFound', $data);
    }
}

?>