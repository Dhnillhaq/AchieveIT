<?php
class Admin extends Controller
{
    public function index()
    {
        $this->view('templates/header');
        $this->view('Admin/index');
        $this->model('PrestasiModel')->getAllPrestasi();
        $this->view('templates/footer');
    }
}
?>