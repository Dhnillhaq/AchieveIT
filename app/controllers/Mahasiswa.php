<?php

class Mahasiswa extends Controller
{
    public function index()
    {
        try {
            $this->checkMethod("GET");
            $this->checkRole("Mahasiswa");
            $data = [
                'mhs' => $this->model('MahasiswaModel')->getMahasiswaByNim($_SESSION['user']['nim']),
                'tahun' => $this->model('PrestasiModel')->getTahunPrestasi()
            ];

            $this->view('Mahasiswa/index', $data);
        } catch (Exception $e) {
            $this->view('exception', $e);
        }
    }

    public function prestasiSaya()
    {
        try {
            $this->checkMethod("GET");
            $this->checkRole("Mahasiswa");
            $data = [
                'kategori' => $this->model("KategoriModel")->getKategori(),
                'tingkat' => $this->model("TingkatKompetisiModel")->getTingkatKompetisi(),
                'prestasi' => $this->model("PrestasiModel")->getPrestasiByNim($_SESSION['user']['nim'])
            ];

            $this->view('Mahasiswa/prestasiSaya', $data);
        } catch (Exception $e) {
            $this->view('exception', $e);
        }
    }

    public function profil()
    {
        $this->checkMethod("GET");
        $this->checkRole("Mahasiswa");
        $this->view('Mahasiswa/profilMahasiswa');

    }

    public function create()
    {
        try {
            $this->checkMethod("GET");
            $this->checkRole("Admin", "Super Admin");
            $data['prodi'] = $this->model("ProdiModel")->getProdi();
            $this->view("Admin/Mahasiswa/create", $data);
        } catch (Exception $e) {
            $this->view('exception', $e);
        }
    }

    public function store()
    {
        try {
            $this->checkMethod("POST");
            $this->checkRole("Admin", "Super Admin");
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

                $isSuccess = $this->model("MahasiswaModel")->store($data);
                if ($isSuccess) {
                    $this->model("LogAdminModel")->storeAdminLog("Tambah Data", "Menambah Data Mahasiswa");
                    Flasher::setFlash("Tambahkan", "Data berhasil ditambahkan", "success", "Mahasiswa/listMhs");
                } else {
                    Flasher::setFlash("Tambahkan", "Data gagal ditambahkan", "error", "Mahasiswa/listMhs");
                }
            }
            header("location:" . BASEURL . "/Mahasiswa/create");
        } catch (Exception $e) {
            $this->view('exception', $e);
        }
    }

    public function edit($id_mahasiswa)
    {
        try {
            $this->checkMethod("GET");
            $this->checkRole("Admin", "Super Admin");
            $data['mahasiswa'] = $this->model("MahasiswaModel")->getMahasiswaById($id_mahasiswa);
            $data['prodi'] = $this->model("ProdiModel")->getProdi();
            $this->view("Admin/Mahasiswa/edit", $data);
        } catch (Exception $e) {
            $this->view('exception', $e);
        }
    }
    public function update()
    {
        try {
            $this->checkMethod("POST");
            $this->checkRole("Admin", "Super Admin");
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
                $isSuccess = $this->model("MahasiswaModel")->update($data);
                if ($isSuccess) {
                    $this->model("LogAdminModel")->storeAdminLog("Ubah Data", "Mengubah Data Mahasiswa dengan ID " . $data['id_mahasiswa']);
                    Flasher::setFlash("Perbarui", "Data berhasil diperbarui", "success", "Mahasiswa/listMhs");
                } else {
                    Flasher::setFlash("Perbarui", "Data gagal diperbarui", "error", "Mahasiswa/listMhs");
                }
            }
            header("location:" . BASEURL . "/Mahasiswa/edit/" . $_POST['id_mahasiswa']);
        } catch (Exception $e) {
            $this->view('exception', $e);
        }
    }

    public function delete($id_mahasiswa)
    {
        $this->checkMethod("GET");
        $this->checkRole("Admin", "Super Admin");
        $id = htmlspecialchars($id_mahasiswa);

        Flasher::setFlash("Hapus", "Apakah anda yakin ingin menghapus data ini?", "warning", "Mahasiswa/deleting/" . $id);

        header('location:' . BASEURL . '/Mahasiswa/listMhs');
    }

    public function deleting($id)
    {
        try {
            $this->checkRole("Admin", "Super Admin");
            $isSuccess = $this->model("MahasiswaModel")->delete($id);

            if ($isSuccess) {
                $this->model("LogAdminModel")->storeAdminLog("Hapus Data", "Mengubah Data Mahasiswa dengan ID " . $id);
                Flasher::setFlash("Hapus", "Data berhasil dihapus", "success");
            } else {
                Flasher::setFlash("Hapus", "Data gagal dihapus", "error");
            }
            header('location:' . BASEURL . '/Mahasiswa/listMhs');
        } catch (Exception $e) {
            $this->view('exception', $e);
        }
    }


    public function listMhs()
    {
        try {
            $this->checkMethod("GET");
            $this->checkRole("Admin", "Super Admin");
            $data['mhs'] = $this->model("MahasiswaModel")->getMahasiswa();
            $data['prodi'] = $this->model("ProdiModel")->getProdi();
            $data['peranMhs'] = $this->model("PeranMahasiswaModel")->getPeranMhs();
            $this->view("Admin/Mahasiswa/index", $data);
        } catch (Exception $e) {
            $this->view('exception', $e);
        }
    }

    public function show($id_mahasiswa)
    {
        try {
            $this->checkMethod("GET");
            $this->checkRole("Admin", "Super Admin");
            $data = $this->model("MahasiswaModel")->getMahasiswaById($id_mahasiswa);
            $this->view("Admin/Mahasiswa/show", $data);
        } catch (Exception $e) {
            $this->view('exception', $e);
        }
    }

    public function getSelectedMahasiswa()
    {
        $this->checkRole("Admin", "Super Admin", "Mahasiswa");

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nim = htmlspecialchars($_POST['nim']);

            $data = [
                'selectedMahasiswa' => $this->model("MahasiswaModel")->getMahasiswaByNim($nim)
            ];

            echo json_encode($data);
        }
    }
}
?>