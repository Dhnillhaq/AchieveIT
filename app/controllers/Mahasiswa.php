<?php
class Mahasiswa extends Controller
{
    public function index()
    {
        if (isset($_SESSION['role'])) {   
            $role = $_SESSION['role'];
            if ($role == "Mahasiswa") {
                $this->view('templates/header');
                $data['mhs'] = $this->model('MahasiswaModel')->getAllDataMahasiswa();
                $this->view('Mahasiswa/index', $data);
                $this->view('templates/footer');
            } else {
                header('Location:'.BASEURL.'/Umum/Login');
            }
        } else {
            header("location:http://localhost/public");
        }

    }

    public function formPrestasi()
    {
        $this->view('templates/header');
        $this->view('Mahasiswa/formPrestasi');
        $this->view('templates/footer');
    }

    public function prestasiSaya()
    {

    }

    public function profil()
    {
        
    }
}
?>