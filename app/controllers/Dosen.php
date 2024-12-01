<?php

class Dosen extends Controller
{
    public function index()
    {
        $data['dosen'] = $this->model("DosenModel")->getDosen();
        $data['peranDosen'] = $this->model("PeranDosenModel")->getPeranDosen();
        $this->view("Admin/Dosen/index", $data);
    }

    public function create()
    {
        $this->view("Admin/Dosen/create");
    }

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
        $data = $this->model("DosenModel")->getDosenById($id_dosen);
        $this->view("Admin/Dosen/edit", $data);
    }

    public function delete($id_dosen)
    {
        $id = htmlspecialchars($id_dosen);
        $this->model("DosenModel")->delete($id);
        header('location:' . BASEURL . '/Dosen/index');
    }

    public function update()
    {
        $data = [
            'nip' => htmlspecialchars($_POST['nip']),
            'nama' => htmlspecialchars($_POST['nama']),
            'id_dosen' => htmlspecialchars($_POST['id_dosen'])
        ];
        $this->model("DosenModel")->update($data);
        header('location:' . BASEURL . '/Dosen/index');
    }


}