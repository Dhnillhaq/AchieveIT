<?php
class Mahasiswa extends Controller
{
    public function index()
    {
        if (isset($_SESSION['role'])) {   
            $role = $_SESSION['role'];
            if ($role == "Mahasiswa") {
                $this->view('templates/header');
                $data['mhs'] = $this->model('MahasiswaModel')->getAllDataMahasiswa($_SESSION['nim']);
                if (isset($_POST['keyword']) && isset($_POST['limit']) && isset($_POST['year']) ) {
                    $data['prestasi'] = $this->model("PrestasiModel")->printPrestasiUmum($_POST['keyword'], $_POST['limit'], $_POST['year']);
                } else {
                    $data['prestasi'] = $this->model("PrestasiModel")->printPrestasiUmum();
                }

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