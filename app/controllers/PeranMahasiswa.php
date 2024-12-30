<?php

class PeranMahasiswa extends Controller
{
    public function create()
    {
        $this->checkMethod("GET");
        $this->checkRole("Admin", "Super Admin");
        $this->view("Admin/PeranMahasiswa/create");
    }

    public function store()
    {
        try {
            $this->checkMethod("POST");
            $this->checkRole("Admin", "Super Admin");
            if (isset($_POST['submit'])) {
                $data = [
                    'peran' => htmlspecialchars($_POST['peran'])
                ];
                $isSuccess = $this->model("PeranMahasiswaModel")->store($data);
                if ($isSuccess) {
                    $this->model("LogAdminModel")->storeAdminLog("Tambah Data", "Menambah Data Peran Mahasiswa");
                    Flasher::setFlash("Tambahkan", "Data berhasil ditambahkan", "success", "Mahasiswa/listMhs");
                } else {
                    Flasher::setFlash("Tambahkan", "Data gagal ditambahkan", "error", "Mahasiswa/listMhs");
                }
            }
            header("location:" . BASEURL . "/PeranMahasiswa/create");
        } catch (Exception $e) {
            $this->view('exception', $e);
        }
    }

    public function edit($id_peran)
    {
        try {
            $this->checkMethod("GET");
            $this->checkRole("Admin", "Super Admin");
            $data = $this->model("PeranMahasiswaModel")->getPeranMhsById($id_peran);
            $this->view("Admin/PeranMahasiswa/edit", $data);
        } catch (Exception $e) {
            $this->view('exception', $e);
        }
    }

    public function update()
    {
        try {
            $this->checkMethod("POST");
            $this->checkRole("Admin", "Super Admin");
            $data = [
                'peran' => htmlspecialchars($_POST['peran']),
                'id_peran' => htmlspecialchars($_POST['id_peran'])
            ];

            $isSuccess = $this->model("PeranMahasiswaModel")->update($data);
            if ($isSuccess) {
                $this->model("LogAdminModel")->storeAdminLog("Ubah Data", "Mengubah Data Peran Mahasiswa dengan ID " . $data['id_peran']);
                Flasher::setFlash("Perbarui", "Data berhasil diperbarui", "success", "Mahasiswa/listMhs");
            } else {
                Flasher::setFlash("Perbarui", "Data gagal diperbarui", "error", "Mahasiswa/listMhs");
            }
            header('location:' . BASEURL . '/PeranMahasiswa/edit/' . $data['id_peran']);
        } catch (Exception $e) {
            $this->view('exception', $e);
        }
    }

    public function delete($id_peran)
    {
        try {
            $this->checkMethod("GET");
            $this->checkRole("Admin", "Super Admin");
            $id = htmlspecialchars($id_peran);

            Flasher::setFlash("Hapus", "Apakah anda yakin ingin menghapus data ini?", "warning", "PeranMahasiswa/deleting/" . $id);

            header("location:" . BASEURL . "/Mahasiswa/listMhs");
        } catch (Exception $e) {
            $this->view('exception', $e);
        }
    }

    public function deleting($id)
    {
        try {
            $this->checkRole("Admin", "Super Admin");
            $isSuccess = $this->model("PeranMahasiswaModel")->delete($id);

            if ($isSuccess) {
                $this->model("LogAdminModel")->storeAdminLog("Hapus Data", "Menghapus Data Peran Dosen dengan ID " . $id);
                Flasher::setFlash("Hapus", "Data berhasil dihapus", "success");
            } else {
                Flasher::setFlash("Hapus", "Data gagal dihapus", "error");
            }
            header("location:" . BASEURL . "/Mahasiswa/listMhs");
        } catch (Exception $e) {
            $this->view('exception', $e);
        }
    }

}