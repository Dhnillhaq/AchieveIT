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
}

?>