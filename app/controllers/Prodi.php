<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Flasher;

class Prodi extends Controller
{
    public function create()
    {
        $this->checkRole("Admin", "Super Admin");
        $this->view("Admin/Prodi/create");
    }
    public function store()
    {
        $this->checkRole("Admin", "Super Admin");
        if (isset($_POST['submit'])) {
            $data = [
                'kode_prodi' => htmlspecialchars($_POST['kode_prodi']),
                'nama_prodi' => htmlspecialchars($_POST['nama_prodi']),
            ];

            $isSuccess =  $this->model("ProdiModel")->store($data);
            if ($isSuccess) {
                Flasher::setFlash("Tambahkan", "Data berhasil ditambahkan", "success", "Mahasiswa/listMhs");
            } else {
                Flasher::setFlash("Tambahkan", "Data gagal ditambahkan", "error", "Mahasiswa/listMhs");
            }
        }

        header("location:" . BASEURL . "/Prodi/create");
    }

    public function edit($id_prodi)
    {
        $this->checkRole("Admin", "Super Admin");
        $id = htmlspecialchars($id_prodi);

        $data = $this->model("ProdiModel")->getProdiById($id);

        $this->view("Admin/Prodi/edit", $data);
    }

    public function update()
    {
        $this->checkRole("Admin", "Super Admin");
        if (isset($_POST['submit'])) {
            $data = [
                'id_prodi' => htmlspecialchars($_POST['id_prodi']),
                'kode_prodi' => htmlspecialchars($_POST['kode_prodi']),
                'nama_prodi' => htmlspecialchars($_POST['nama_prodi'])
            ];

            $isSuccess =  $this->model("ProdiModel")->update($data);
            if ($isSuccess) {
                Flasher::setFlash("Perbarui", "Data berhasil diperbarui", "success", "Mahasiswa/listMhs");
            } else {
                Flasher::setFlash("Perbarui", "Data gagal diperbarui", "error", "Mahasiswa/listMhs");
            }
        }

        header('location:' . BASEURL . '/Prodi/edit/' . $data['id_prodi']);
    }

    public function delete($id_prodi)
    {
        $this->checkRole("Admin", "Super Admin");
        $id = htmlspecialchars($id_prodi);

        Flasher::setFlash("Hapus", "Apakah anda yakin ingin menghapus data ini?", "warning", "Prodi/deleting/" . $id);

        header("location:" . BASEURL . "/Mahasiswa/listMhs");
    }

    public function deleting($id)
    {
        $this->checkRole("Admin", "Super Admin");
        $isSuccess =  $this->model("ProdiModel")->delete($id);

        if ($isSuccess) {
            Flasher::setFlash("Hapus", "Data berhasil dihapus", "success");
        } else {
            Flasher::setFlash("Hapus", "Data gagal dihapus", "error");
        }

        header("location:" . BASEURL . "/Mahasiswa/listMhs");
    }
}