<?php
class Mahasiswa extends Controller
{
    public function index()
    {
        if (isset($_SESSION['role'])) {
            $role = $_SESSION['role'];
            if ($role == "Mahasiswa") {
                $data['mhs'] = $this->model('MahasiswaModel')->getAllDataMahasiswa();
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

    }

    public function profil()
    {

    }
}
?>