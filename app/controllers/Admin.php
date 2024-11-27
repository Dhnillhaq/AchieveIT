<?php
class Admin extends Controller
{
    public function index()
    {
        $role = "";
        if ($role == "admin") {
            $this->view('templates/header');
            $this->view('Admin/index');
            $this->model('PrestasiModel')->getAllPrestasi();
            $this->view('templates/footer');
        } else {
            header("location:Umum.php");
        }
    }
}
?>