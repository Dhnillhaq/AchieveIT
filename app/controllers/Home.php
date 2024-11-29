<?php
class Home extends Controller
{
    public function index()
    {
        if (isset($_POST['limit'])) {
            $data['prestasi'] = $this->model("PrestasiModel")->printPrestasiUmum($_POST['limit']);
        } else if (isset($_POST['keyword'])) {
            $data['prestasi'] = $this->model("PrestasiModel")->searchPrestasi($_POST['keyword']);
        } else {
            $data['prestasi'] = $this->model("PrestasiModel")->printPrestasiUmum();
        }
        $this->view('index', $data);
    }

    public function search()
    {
        $data['search'] = $this->model("PrestasiModel")->searchPrestasi($_POST['keyword']);
    }
}

?>