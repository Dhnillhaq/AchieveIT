<?php

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
        if (isset($_POST['submit'])) {
            $data = [
                'nama' => htmlspecialchars($_POST['nama']),
                'nip' => htmlspecialchars($_POST['nip'])

            ];
            $this->model("DosenModel")->store($data);
        }
        header("location:" . BASEURL . "/Dosen/index");
    }

    public function edit($id_dosen)
    {
        $this->checkRole("Admin", "Super Admin");
        $id = htmlspecialchars($id_dosen);
        $data = $this->model("DosenModel")->getDosenById($id);
        $this->view("Admin/Dosen/edit", $data);
    }

    public function delete($id_dosen)
    {
        $this->checkRole("Admin", "Super Admin");
        $id = htmlspecialchars($id_dosen);
        $this->model("DosenModel")->delete($id);
        header('location:' . BASEURL . '/Dosen/index');
    }

    public function update()
    {
        $this->checkRole("Admin", "Super Admin");
        $data = [
            'nip' => htmlspecialchars($_POST['nip']),
            'nama' => htmlspecialchars($_POST['nama']),
            'id_dosen' => htmlspecialchars($_POST['id_dosen'])
        ];
        $this->model("DosenModel")->update($data);
        header('location:' . BASEURL . '/Dosen/index');
    }

}