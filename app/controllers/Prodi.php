<?php

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

            $this->model("ProdiModel")->store($data);
        }

        header("location:" . BASEURL . "/Mahasiswa/listMhs");
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
        if (isset($_POST['submit'])) {
            $data = [
                'id_prodi' => htmlspecialchars($_POST['id_prodi']),
                'kode_prodi' => htmlspecialchars($_POST['kode_prodi']),
                'nama_prodi' => htmlspecialchars($_POST['nama_prodi'])
            ];

            $this->model("ProdiModel")->update($data);
        }

        header("location:" . BASEURL . "/Mahasiswa/listMhs");
    }

    public function delete($id_prodi)
    {
        $id = htmlspecialchars($id_prodi);

        $this->model("ProdiModel")->delete($id);

        header("location:" . BASEURL . "/Mahasiswa/listMhs");
    }
}