<?php

class PeranDosen extends Controller
{
    public function create()
    {
        $this->checkRole("Admin", "Super Admin");
        $this->view("Admin/PeranDosen/create");
    }

    public function store()
    {
        if (isset($_POST['submit'])) {
            $data = [
                'peran' => htmlspecialchars($_POST['peran'])
            ];
            $this->model("PeranDosenModel")->store($data);
        }
        header("location:" . BASEURL . "/Dosen/index");
    }

    public function edit($id_peran)
    {
        $this->checkRole("Admin", "Super Admin");
        $data = $this->model("PeranDosenModel")->getPeranDosenById($id_peran);
        $this->view("Admin/PeranDosen/edit", $data);
    }

    public function delete($id_peranDosen)
    {
        $id = htmlspecialchars($id_peranDosen);
        $this->model("PeranDosenModel")->delete($id);
        header('location:' . BASEURL . '/Dosen/index');
    }

    public function update()
    {
        $data = [
            'id_peran' => htmlspecialchars($_POST['id_peran']),
            'peran' => htmlspecialchars($_POST['peran'])
        ];
        $this->model("PeranDosenModel")->update($data);
        header('location:' . BASEURL . '/Dosen/index');
    }
}