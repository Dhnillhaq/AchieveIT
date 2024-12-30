<?php

class Prodi extends Controller
{
    public function create()
    {
        $this->checkMethod("GET");
        $this->checkRole("Admin", "Super Admin");
        $this->view("Admin/Prodi/create");
    }
    public function store()
    {
        try {
            $this->checkMethod("POST");
            $this->checkRole("Admin", "Super Admin");
            if (isset($_POST['submit'])) {
                $data = [
                    'kode_prodi' => htmlspecialchars($_POST['kode_prodi']),
                    'nama_prodi' => htmlspecialchars($_POST['nama_prodi']),
                ];

                $isSuccess = $this->model("ProdiModel")->store($data);
                if ($isSuccess) {
                    $this->model("LogAdminModel")->storeAdminLog("Tambah Data", "Menambahkan Data Program Studi");
                    Flasher::setFlash("Tambahkan", "Data berhasil ditambahkan", "success", "Mahasiswa/listMhs");
                } else {
                    Flasher::setFlash("Tambahkan", "Data gagal ditambahkan", "error", "Mahasiswa/listMhs");
                }
            }

            header("location:" . BASEURL . "/Prodi/create");
        } catch (Exception $e) {
            $this->view('exception', $e);
        }
    }

    public function edit($id_prodi)
    {
        try {
            $this->checkMethod("GET");
            $this->checkRole("Admin", "Super Admin");
            $id = htmlspecialchars($id_prodi);

            $data = $this->model("ProdiModel")->getProdiById($id);

            $this->view("Admin/Prodi/edit", $data);
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
                    'kode_prodi' => htmlspecialchars($_POST['kode_prodi']),
                    'nama_prodi' => htmlspecialchars($_POST['nama_prodi'])
                ];

                $isSuccess = $this->model("ProdiModel")->update($data);
                if ($isSuccess) {
                    $this->model("LogAdminModel")->storeAdminLog("Ubah Data", "Mengubah Data Program Studi dengan ID " . $data['id_prodi']);
                    Flasher::setFlash("Perbarui", "Data berhasil diperbarui", "success", "Mahasiswa/listMhs");
                } else {
                    Flasher::setFlash("Perbarui", "Data gagal diperbarui", "error", "Mahasiswa/listMhs");
                }
            }

            header('location:' . BASEURL . '/Prodi/edit/' . $data['id_prodi']);
        } catch (Exception $e) {
            $this->view('exception', $e);
        }
    }

    public function delete($id_prodi)
    {
        $this->checkMethod("GET");
        $this->checkRole("Admin", "Super Admin");
        $id = htmlspecialchars($id_prodi);

        Flasher::setFlash("Hapus", "Apakah anda yakin ingin menghapus data ini?", "warning", "Prodi/deleting/" . $id);

        header("location:" . BASEURL . "/Mahasiswa/listMhs");
    }

    public function deleting($id)
    {
        try {
            $this->checkRole("Admin", "Super Admin");
            $isSuccess = $this->model("ProdiModel")->delete($id);

            if ($isSuccess) {
                $this->model("LogAdminModel")->storeAdminLog("Hapus Data", "Menghapus Data Program Studi dengan ID " . $id);
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