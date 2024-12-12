<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Flasher;

class Dosen extends Controller
{
    public function index()
    {
        $this->checkRole("Admin", "Super Admin");
        $data['dosen'] = $this->model("DosenModel")->getDosen();
        $data['peranDosen'] = $this->model("PeranDosenModel")->getPeranDosen();
        $this->view("Admin/Dosen/index", $data);
    }

    public function create()
    {
        $this->checkRole("Admin", "Super Admin");
        $this->view("Admin/Dosen/create");
    }

    // Method proses Create Dosen
    public function store()
    {

        $this->checkRole("Admin", "Super Admin");
        if (isset($_POST['submit'])) {
            $data = [
                'nama' => htmlspecialchars($_POST['nama']),
                'nip' => htmlspecialchars($_POST['nip'])

            ];
            $isSuccess = $this->model("DosenModel")->store($data);

            if ($isSuccess) {
                Flasher::setFlash("Tambahkan", "Data berhasil ditambahkan", "success", "Dosen/index");
            } else {
                Flasher::setFlash("Tambahkan", "Data gagal ditambahkan", "error", "Dosen/index");
            }
        }
        header("location:" . BASEURL . "/Dosen/create");
    }

    public function edit($id_dosen)
    {
        $this->checkRole("Admin", "Super Admin");
        $id = htmlspecialchars($id_dosen);
        $data = $this->model("DosenModel")->getDosenById($id);
        $this->view("Admin/Dosen/edit", $data);
    }

    public function update()
    {
        $this->checkRole("Admin", "Super Admin");
        $data = [
            'nip' => htmlspecialchars($_POST['nip']),
            'nama' => htmlspecialchars($_POST['nama']),
            'id_dosen' => htmlspecialchars($_POST['id_dosen'])
        ];
        $isSuccess = $this->model("DosenModel")->update($data);
        if ($isSuccess) {
            Flasher::setFlash("Perbarui", "Data berhasil diperbarui", "success", "Dosen/index");
        } else {
            Flasher::setFlash("Perbarui", "Data gagal diperbarui", "error", "Dosen/index");
        }
        header('location:' . BASEURL . '/Dosen/edit/' . $data['id_dosen']);
    }

    public function delete($id_dosen)
    {
        $this->checkRole("Admin", "Super Admin");
        $id = htmlspecialchars($id_dosen);

        Flasher::setFlash("Hapus", "Apakah anda yakin ingin menghapus data ini?", "warning", "Dosen/deleting/" . $id);

        header('location:' . BASEURL . '/Dosen/index');
    }

    public function deleting($id)
    {
        $this->checkRole("Admin", "Super Admin");
        $isSuccess = $this->model("DosenModel")->delete($id);
        
        if ($isSuccess) {
            Flasher::setFlash("Hapus", "Data berhasil dihapus", "success");
        } else {
            Flasher::setFlash("Hapus", "Data gagal dihapus", "error");
        }
        header('location:' . BASEURL . '/Dosen/index');
    }


}