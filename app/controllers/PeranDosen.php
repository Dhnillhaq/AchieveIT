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
        $this->checkRole("Admin", "Super Admin");
        if (isset($_POST['submit'])) {
            $data = [
                'peran' => htmlspecialchars($_POST['peran'])
            ];
            $isSuccess =  $this->model("PeranDosenModel")->store($data);
            if ($isSuccess) {
                Flasher::setFlash("Input", "Data berhasil ditambahkan", "success", "Dosen/index");
            } else {
                Flasher::setFlash("Input", "Data gagal ditambahkan", "error", "Dosen/index");
            }
        }
        header("location:" . BASEURL . "/PeranDosen/create");
    }

    public function edit($id_peran)
    {
        $this->checkRole("Admin", "Super Admin");
        $data = $this->model("PeranDosenModel")->getPeranDosenById($id_peran);
        $this->view("Admin/PeranDosen/edit", $data);
    }

    public function delete($id_peranDosen)
    {
        $this->checkRole("Admin", "Super Admin");
        $id = htmlspecialchars($id_peranDosen);
        $isSuccess =  $this->model("PeranDosenModel")->delete($id);
        if ($isSuccess) {
            Flasher::setFlash("Input", "Data berhasil ditambahkan", "success");
        } else {
            Flasher::setFlash("Input", "Data gagal ditambahkan", "error");
        }
        header('location:' . BASEURL . '/Dosen/index');
    }

    public function update()
    {
        $this->checkRole("Admin", "Super Admin");
        $data = [
            'id_peran' => htmlspecialchars($_POST['id_peran']),
            'peran' => htmlspecialchars($_POST['peran'])
        ];
        $isSuccess =  $this->model("PeranDosenModel")->update($data);
        if ($isSuccess) {
            Flasher::setFlash("Input", "Data berhasil ditambahkan", "success", "Dosen/index");
        } else {
            Flasher::setFlash("Input", "Data gagal ditambahkan", "error", "Dosen/index");
        }
        header('location:' . BASEURL . '/PeranDosen/edit/' . $data['id_peran']);
    }
}