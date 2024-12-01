<?php

class Kategori extends Controller
{
    public function create()
    {
        $this->view("Admin/Kategori/create");
    }

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
        $id = htmlspecialchars($id_kategori);

        $data = $this->model("KategoriModel")->getKategoriById($id);

        $this->view("Admin/Kategori/edit", $data);
    }

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

    public function delete($id_kategori)
    {
        $id = htmlspecialchars($id_kategori);

        $this->model("KategoriModel")->delete($id);

        header("location:" . BASEURL . "/Admin/pengaturanPrestasi");
    }
}