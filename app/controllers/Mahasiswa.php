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
            'kategori' => $this->model("KategoriModel")->getKategori(),
            'tingkatKompetisi' => $this->model("TingkatKompetisiModel")->getTingkatKompetisi(),
            'prestasi' => $this->model("PrestasiModel")->getPrestasiByNim($_SESSION['user']['nim'])
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
        $data['prodi'] = $this->model("ProdiModel")->getAllProdi();
        $this->checkRole("Admin", "Super Admin");
        $this->view("Admin/Mahasiswa/create", $data);
    }
    
    public function store()
    {
        if (isset($_POST['submit'])) {
            $data = [
                'id_prodi' => htmlspecialchars($_POST['id_prodi']),
                'nim' => htmlspecialchars($_POST['nim']),
                'nama' => htmlspecialchars($_POST['nama']),
                'tempat_lahir' => htmlspecialchars($_POST['tempat_lahir']),
                'tanggal_lahir' => htmlspecialchars($_POST['tanggal_lahir']),
                'agama' => htmlspecialchars($_POST['agama']),
                'jenis_kelamin' => htmlspecialchars($_POST['jenis_kelamin']),
                'no_telepon' => htmlspecialchars($_POST['no_telepon']),
                'email' => htmlspecialchars($_POST['email']),
                'password' => htmlspecialchars($_POST['password'])
            ];
            $this->model("MahasiswaModel")->store($data);
        }
        header("location:" . BASEURL . "/Mahasiswa/listMhs");
    }
    
    public function edit($id_mahasiswa)
    {
        $this->checkRole("Admin", "Super Admin");
        $data['mahasiswa'] = $this->model("MahasiswaModel")->getMahasiswaById($id_mahasiswa);
        $data['prodi'] = $this->model("ProdiModel")->getAllProdi();
        $this->view("Admin/Mahasiswa/edit", $data);
    }
    
    public function delete($id_mahasiswa)
    {
        $id = htmlspecialchars($id_mahasiswa);
        $this->model("MahasiswaModel")->delete($id);
        header('location:' . BASEURL . '/Mahasiswa/index');
    }

    public function update()
    {
        if (isset($_POST['submit'])) {
            $data = [
                'id_prodi' => htmlspecialchars($_POST['id_prodi']),
                'nim' => htmlspecialchars($_POST['nim']),
                'nama' => htmlspecialchars($_POST['nama']),
                'tempat_lahir' => htmlspecialchars($_POST['tempat_lahir']),
                'tanggal_lahir' => htmlspecialchars($_POST['tanggal_lahir']),
                'agama' => htmlspecialchars($_POST['agama']),
                'jenis_kelamin' => htmlspecialchars($_POST['jenis_kelamin']),
                'no_telepon' => htmlspecialchars($_POST['no_telepon']),
                'email' => htmlspecialchars($_POST['email']),
                'password' => htmlspecialchars($_POST['password']),
                'id_mahasiswa' => htmlspecialchars($_POST['id_mahasiswa'])
            ];
            $this->model("MahasiswaModel")->update($data);
        }
        header("location:" . BASEURL . "/Mahasiswa/listMhs");
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