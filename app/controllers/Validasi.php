<?php

class Validasi extends Controller
{
    public function index()
    {
        try {
            $this->checkMethod("GET");
            $this->checkRole("Admin", "Super Admin");

            $data = [
                'mahasiswa' => $this->model("MahasiswaModel")->getNotValidatedMahasiswa()
            ];

            $this->view('Admin/Validasi/index', $data);
        } catch (Exception $e) {
            $this->view('exception', $e);
        }
    }

    public function show($id_mahasiswa)
    {
        try {
            $this->checkMethod("GET");
            $this->checkRole("Admin", "Super Admin");
            $data = $this->model("MahasiswaModel")->getNotValidatedMahasiswaById($id_mahasiswa);

            $this->view("Admin/Validasi/show", $data);
        } catch (Exception $e) {
            $this->view('exception', $e);
        }
    }

    public function validate($id_mahasiswa, $input)
    {
        try {
            $this->checkMethod("GET");
            $this->checkRole("Admin", "Super Admin");
            $id_mahasiswa = htmlspecialchars($id_mahasiswa);
            $id_admin = $_SESSION['user']['id_admin'];
            $bool = filter_var($input, FILTER_VALIDATE_BOOLEAN);

            if ($bool == true) {
                $isSuccess = $this->model("MahasiswaModel")->validate($id_mahasiswa, $id_admin, 'Valid');
            } else {
                $isSuccess = $this->model("MahasiswaModel")->validate($id_mahasiswa, $id_admin, 'Invalid');
            }

            if ($isSuccess) {
                $this->model("LogAdminModel")->storeAdminLog("Validasi Akun", "Validasi akun Mahasiswa dengan ID " . $id_mahasiswa);
                Flasher::setFlash("Perbarui", "Mahasiswa berhasil divalidasi", "success");
            } else {
                Flasher::setFlash("Perbarui", "Mahasiswa gagal divalidasi", "error");
            }

            header("location:" . BASEURL . "/Validasi");
        } catch (Exception $e) {
            $this->view('exception', $e);
        }
    }
}
