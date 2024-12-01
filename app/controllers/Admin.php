<?php
class Admin extends Controller
{
    
    public function index()
    {
        if ($this->checkRole()) {
            $role = $_SESSION['user']['role'];
            if ($role == "Admin") {
                $data['statistik'] = $this->model('PrestasiModel')->getStatistikPrestasi();
                $this->view('Admin/index', $data);
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
                $data['statistik'] = $this->model('PrestasiModel')->getStatistikPrestasi();
                $this->view('Admin/index', $data);
                exit;
            } else {
                header("location:".BASEURL."/Auth/login");
            }
        } else {
            header("location:".BASEURL);
        }
    }


    public function administrasiData(){
        $this->view("Admin/administrasiData");
    }
    public function pengaturanPrestasi(){
        $this->view("Admin/pengaturanPrestasi");
    }
    public function profil(){
        $this->view("Admin/profilAdmin");
    }
    public function createAdmin(){
        $this->view("Admin/Admin/create");
    }

    // Proses
    public function storeAdmin(){
        $this->view("Admin/Admin/create");
    }

    public function editAdmin(){
        $this->view("Admin/Admin/edit");
    }
    public function adminList(){
        $this->view("Admin/Admin/index");
    }
}
?>