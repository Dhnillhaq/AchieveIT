<?php
class Mahasiswa extends Controller
{
    public function index()
    {
        if (isset($_SESSION['user']['role'])) {
            $role = $_SESSION['user']['role'];
            if ($role == "Mahasiswa") {
                $this->view('templates/header');
                $data['mhs'] = $this->model('MahasiswaModel')->getMahasiswaByNim($_SESSION['user']['nim']);
                if (isset($_POST['keyword']) && isset($_POST['limit']) && isset($_POST['year'])) {
                    $data['prestasi'] = $this->model("PrestasiModel")->printPrestasiUmum($_POST['keyword'], $_POST['limit'], $_POST['year']);
                } else {
                    $data['prestasi'] = $this->model("PrestasiModel")->printPrestasiUmum();
                }

                $this->view('Mahasiswa/index', $data);
            } else {
                header('Location:' . BASEURL . '/Auth/Login');
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
        $data = [
            'kp' => $this->model("KategoriModel")->getKategori(),
            'tk' => $this->model("TingkatKompetisiModel")->getTingkatKompetisi(),
            'mahasiswa' => $this->model("MahasiswaModel")->getPrestasiMahasiswaByNim($_SESSION['user']['nim'])
        ];
        $this->view('Mahasiswa/prestasiSaya', $data);

    }

    public function profil()
    {
        $this->view('Mahasiswa/profilMahasiswa');

    }

    public function create()
    {
        $this->view("Admin/Mahasiswa/create");
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
        header("location:" . BASEURL . "/Mahasiswa/index");
    }

    public function edit($id_mahasiswa)
    {
        $data = $this->model("MahasiswaModel")->getMahasiswaById($id_mahasiswa);
        $this->view("Admin/Mahasiswa/edit");
    }

    public function delete($id_mahasiswa)
    {
        $id = htmlspecialchars($id_mahasiswa);
        $this->model("MahasiswaModel")->delete($id);
        header('location:' . BASEURL . '/Mahasiswa/index');
    }

    public function update()
    {
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
        header("location:" . BASEURL . "/Mahasiswa/index");
    }

    public function listMhs()
    {
        $data['mhs'] = $this->model("MahasiswaModel")->getAllDataMahasiswa();
        $data['prodi'] = $this->model("ProdiModel")->getAllProdi();
        $data['peranMhs'] = $this->model("PeranMahasiswaModel")->getPeranMhs();
        $this->view("Admin/Mahasiswa/index", $data);
    }

    public function show()
    {
        $this->view("Admin/Mahasiswa/show");
    }
}
?>