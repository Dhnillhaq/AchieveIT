<?php
class Mahasiswa extends Controller
{
    public function index()
    {
        $this->checkRole("Mahasiswa");
        $data['mhs'] = $this->model('MahasiswaModel')->getMahasiswaByNim($_SESSION['user']['nim']);
        if (isset($_POST['keyword']) && isset($_POST['limit']) && isset($_POST['year'])) {
            $data['prestasi'] = $this->model("PrestasiModel")->printPrestasiUmum($_POST['keyword'], $_POST['limit'], $_POST['year']);
        } else {
            $data['prestasi'] = $this->model("PrestasiModel")->printPrestasiUmum();
        }

        $this->view('Mahasiswa/index', $data);
    }

    public function formPrestasi()
    {
        $this->checkRole("Mahasiswa");
        $this->view('Mahasiswa/formPrestasi');
    }

    public function prestasiSaya()
    {
        $this->checkRole("Mahasiswa");
        $data = [
            'kp' => $this->model("KategoriModel")->getKategori(),
            'tk' => $this->model("TingkatKompetisiModel")->getTingkatKompetisi(),
            'mahasiswa' => $this->model("MahasiswaModel")->getPrestasiMahasiswaByNim($_SESSION['user']['nim'])
        ];
        $this->view('Mahasiswa/prestasiSaya', $data);

    }

    public function profil()
    {
        $this->checkRole("Mahasiswa");
        $this->view('Mahasiswa/profilMahasiswa');

    }

    public function create()
    {
        $this->checkRole("Admin", "Super Admin");
        $this->view("Admin/Mahasiswa/create");
    }
    public function edit()
    {
        $this->checkRole("Admin", "Super Admin");
        $this->view("Admin/Mahasiswa/edit");
    }
    public function listMhs()
    {
        $this->checkRole("Admin", "Super Admin");
        $data['mhs'] = $this->model("MahasiswaModel")->getAllDataMahasiswa();
        $data['prodi'] = $this->model("ProdiModel")->getAllProdi();
        $data['peranMhs'] = $this->model("PeranMahasiswaModel")->getPeranMhs();
        $this->view("Admin/Mahasiswa/index", $data);
    }
    public function show()
    {
        $this->checkRole("Admin", "Super Admin");
        $this->view("Admin/Mahasiswa/show");
    }
}
?>