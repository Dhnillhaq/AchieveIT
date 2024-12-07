<?php

class Kategori extends Controller
{
    public function create()
    {
        $this->checkRole("Admin", "Super Admin");
        $this->view("Admin/Kategori/create");
    }

    // Method proses Create Kategori
    public function store()
    {
        if (isset($_POST['submit'])) {
            $data = [
                'kategori' => htmlspecialchars($_POST['kategori'])
            ];

            $isSuccess =  $this->model("KategoriModel")->store($data);
            if ($isSuccess) {
                Flasher::setFlash("Input", "Data berhasil ditambahkan", "success", "Admin/pengaturanPrestasi");
            } else {
                Flasher::setFlash("Input", "Data gagal ditambahkan", "error", "Admin/pengaturanPrestasi");
            }
        }

        header("location:" . BASEURL . "/Kategori/create");
    }

    public function edit($id_kategori)
    {
        $this->checkRole("Admin", "Super Admin");
        $id = htmlspecialchars($id_kategori);

        $data = $this->model("KategoriModel")->getKategoriById($id);

        $this->view("Admin/Kategori/edit", $data);
    }

    // Method proses Update Kategori
    public function update()
    {
        if (isset($_POST['submit'])) {
            $data = [
                'id_kategori' => htmlspecialchars($_POST['id_kategori']),
                'kategori' => htmlspecialchars($_POST['kategori'])
            ];

            $isSuccess =  $this->model("KategoriModel")->update($data);
            if ($isSuccess) {
                Flasher::setFlash("Input", "Data berhasil ditambahkan", "success", "Admin/pengaturanPrestasi");
            } else {
                Flasher::setFlash("Input", "Data gagal ditambahkan", "error", "Admin/pengaturanPrestasi");
            }
        }

        header("location:" . BASEURL . "/Kategori/edit/" . $data['id_kategori']);
    }

    // Method proses Delete Kategori
    public function delete($id_kategori)
    {
        $id = htmlspecialchars($id_kategori);

        $isSuccess =  $this->model("KategoriModel")->delete($id);
        if ($isSuccess) {
            Flasher::setFlash("Input", "Data berhasil ditambahkan", "success");
        } else {
            Flasher::setFlash("Input", "Data gagal ditambahkan", "error");
        }

        header("location:" . BASEURL . "/Admin/pengaturanPrestasi");
    }
}