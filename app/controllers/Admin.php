<?php
class Admin extends Controller
{
    public function index()
    {
        if (isset($_SESSION['role'])) {   
            $role = $_SESSION['role'];
            if ($role == "Admin") {
                $this->view('templates/header');
                $this->view('Admin/index');
                $this->model('PrestasiModel')->getAllPrestasi();
                $this->view('templates/footer');
                exit;
            } else {
                header('Location:'.BASEURL.'/Umum/Login');
            }
        } else {
            header('location:'.BASEURL);
        }
    }
    public function superAdmin()
    {
        if (isset($_SESSION['role'])) {   
            $role = $_SESSION['role'];
            if ($role == "Super Admin") {
                $this->view('templates/header');
                $this->view('Admin/index');
                $this->view('templates/footer');
                exit;
            } else {
                header("location:http://localhost/public");
            }
        } else {
            header("location:http://localhost/public");
        }
    }

    public function kajur($nama = "Dhanil")
    {
        if (isset($_SESSION['role'])) {   
            $role = $_SESSION['role'];
            if ($role == "Ketua Jurusan") {
                $this->view('templates/header');
                $this->view('Kajur/index', $nama);
                $this->view('templates/footer');
            } else {
                header('Location:'.BASEURL.'/Umum/Login');
            }
        } else {
            header("location:http://localhost/public");
        }
    }
}
?>