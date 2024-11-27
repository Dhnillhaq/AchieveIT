<?php
class Mahasiswa extends Controller
{
    public function index()
    {

        $this->view('templates/header');
        $data['mhs'] = $this->model('MahasiswaModel')->getAllDataMahasiswa();
        $this->view('Mahasiswa/index', $data);
        $this->view('templates/footer');
    }

    public function formPrestasi()
    {

        $this->view('templates/header');
        $this->view('Mahasiswa/formPrestasi');
        $this->view('templates/footer');
    }
}
?>