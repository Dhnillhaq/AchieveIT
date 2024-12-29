<?php

class Dosen extends Controller
{
    public function index()
    {
        try {
            $this->checkMethod("GET");
            $this->checkRole("Admin", "Super Admin");
            $data['dosen'] = $this->model("DosenModel")->getDosen();
            $data['peranDosen'] = $this->model("PeranDosenModel")->getPeranDosen();
            $this->view("Admin/Dosen/index", $data);
        } catch (Exception $e) {
            $this->view('exception', $e);
        }
    }

    public function create()
    {
        $this->checkMethod("GET");
        $this->checkRole("Admin", "Super Admin");
        $this->view("Admin/Dosen/create");
    }

    // Method proses Create Dosen
    public function store()
    {
        try {
            $this->checkMethod("POST");
            $this->checkRole("Admin", "Super Admin");
            if (isset($_POST['submit'])) {
                $data = [
                    'nama' => htmlspecialchars($_POST['nama']),
                    'nip' => htmlspecialchars($_POST['nip'])

                ];
                $isSuccess = $this->model("DosenModel")->store($data);

                if ($isSuccess) {
                    $this->model("LogAdminModel")->storeAdminLog("Tambah Data", "Menambahkan Data Dosen");
                    Flasher::setFlash("Tambahkan", "Data berhasil ditambahkan", "success", "Dosen/index");
                } else {
                    Flasher::setFlash("Tambahkan", "Data gagal ditambahkan", "error", "Dosen/index");
                }
            }
            header("location:" . BASEURL . "/Dosen/create");
        } catch (Exception $e) {
            $this->view('exception', $e);
        }
    }

    public function edit($id_dosen)
    {
        try {
            $this->checkMethod("GET");
            $this->checkRole("Admin", "Super Admin");
            $id = htmlspecialchars($id_dosen);
            $data = $this->model("DosenModel")->getDosenById($id);
            $this->view("Admin/Dosen/edit", $data);
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
                'nip' => htmlspecialchars($_POST['nip']),
                'nama' => htmlspecialchars($_POST['nama']),
                'id_dosen' => htmlspecialchars($_POST['id_dosen'])
            ];
            $isSuccess = $this->model("DosenModel")->update($data);
            if ($isSuccess) {
                $this->model("LogAdminModel")->storeAdminLog("Ubah Data", "Mengubah Data Dosen dengan ID " . $data['id_dosen']);
                Flasher::setFlash("Perbarui", "Data berhasil diperbarui", "success", "Dosen/index");
            } else {
                Flasher::setFlash("Perbarui", "Data gagal diperbarui", "error", "Dosen/index");
            }
            header('location:' . BASEURL . '/Dosen/edit/' . $data['id_dosen']);
        } catch (Exception $e) {
            $this->view('exception', $e);
        }
    }

    public function delete($id_dosen)
    {
        $this->checkMethod("GET");
        $this->checkRole("Admin", "Super Admin");
        $id = htmlspecialchars($id_dosen);

        Flasher::setFlash("Hapus", "Apakah anda yakin ingin menghapus data ini?", "warning", "Dosen/deleting/" . $id);

        header('location:' . BASEURL . '/Dosen/index');
    }

    public function deleting($id)
    {
        try {
            $this->checkRole("Admin", "Super Admin");
            $isSuccess = $this->model("DosenModel")->delete($id);

            if ($isSuccess) {
                $this->model("LogAdminModel")->storeAdminLog("Hapus Data", "Menghapus Data Dosen dengan ID " . $id);
                Flasher::setFlash("Hapus", "Data berhasil dihapus", "success");
            } else {
                Flasher::setFlash("Hapus", "Data gagal dihapus", "error");
            }
            header('location:' . BASEURL . '/Dosen/index');
        } catch (Exception $e) {
            $this->view('exception', $e);
        }
    }


}