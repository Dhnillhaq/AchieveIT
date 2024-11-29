<?php
class Mahasiswa extends Controller
{
    public function index()
    {
        if (isset($_SESSION['role'])) {
            $role = $_SESSION['role'];
            if ($role == "Mahasiswa") {
                $this->view('templates/header');
                $data['mhs'] = $this->model('MahasiswaModel')->getAllDataMahasiswa($_SESSION['username']);
                if (isset($_POST['keyword']) && isset($_POST['limit']) && isset($_POST['year']) ) {
                    $data['prestasi'] = $this->model("PrestasiModel")->printPrestasiUmum($_POST['keyword'], $_POST['limit'], $_POST['year']);
                } else {
                    $data['prestasi'] = $this->model("PrestasiModel")->printPrestasiUmum();
                }

                $this->view('Mahasiswa/index', $data);
            } else {
                header('Location:' . BASEURL . '/Umum/Login');
            }
        } else {
            header("location:http://localhost/public");
        }

    }

    public function formPrestasi()
    {
        $this->view('Mahasiswa/formPrestasi');
    }
    
    public function prestasiSaya()
    {
        $this->view('Mahasiswa/prestasiSaya');
        
    }
    
    public function profil()
    {
        $this->view('Mahasiswa/profilMahasiswa');

    }

    public function create(){
        $this->view("Admin/Mahasiswa/create");
    }
    public function edit(){
        $this->view("Admin/Mahasiswa/edit");
    }
    public function listMhs(){
        $this->view("Admin/Mahasiswa/index");
    }
    public function show(){
        $this->view("Admin/Mahasiswa/show");
    }
}
?>