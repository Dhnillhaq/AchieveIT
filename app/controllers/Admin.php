<?php
class Admin extends Controller
{
    
    public function index()
    {
        if ($this->checkRole()) {
            $role = $_SESSION['role'];
            if ($role == "Admin") {
                $this->view('Admin/index');
                $this->model('PrestasiModel')->getAllPrestasi();
                exit;
            } else {
                header('location:' . BASEURL . '/Auth/Login');
            }
        } else {
            header('location:' . BASEURL);
        }
    }
    public function superAdmin()
    {
        if (isset($_SESSION['user']['role'])) {
            $role = $_SESSION['user']['role'];
            if ($role == "Super Admin") {
                $this->view('Admin/index');
                exit;
            } else {
                header("location:".BASEURL."/Auth/login");
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
                $this->view('Kajur/index', $nama);
            } else {
                header('Location:' . BASEURL . '/Auth/Login');
            }
        } else {
            header("location:http://localhost/public");
        }
    }

    public function administrasiData(){
        $this->view("Admin/administrasiData");
    }
    public function pengaturanPrestasi(){
        $this->view("Admin/pengaturanPrestasi");
    }
    public function profilAdmin(){
        $this->view("Admin/profilAdmin");
    }
}
?>