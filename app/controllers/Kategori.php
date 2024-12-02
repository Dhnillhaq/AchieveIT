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

            $this->model("KategoriModel")->store($data);
        }

        header("location:" . BASEURL . "/Admin/pengaturanPrestasi");
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

            $this->model("KategoriModel")->update($data);
        }

        header("location:" . BASEURL . "/Admin/pengaturanPrestasi");
    }

    // Method proses Delete Kategori
    public function delete($id_kategori)
    {
        $id = htmlspecialchars($id_kategori);

        $this->model("KategoriModel")->delete($id);

        header("location:" . BASEURL . "/Admin/pengaturanPrestasi");
    }
}