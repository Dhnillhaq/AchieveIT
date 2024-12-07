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
        
        $this->checkRole("Admin", "Super Admin");
        if (isset($_POST['submit'])) {
            $data = [
                'nama' => htmlspecialchars($_POST['nama']),
                'nip' => htmlspecialchars($_POST['nip'])

            ];
            $isSuccess = $this->model("DosenModel")->store($data);

            if ($isSuccess) {
                Flasher::setFlash("Input", "Data berhasil ditambahkan", "success", "Dosen/index");
            } else {
                Flasher::setFlash("Input", "Data gagal ditambahkan", "error", "Dosen/index");
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

    public function delete($id_dosen)
    {
        $this->checkRole("Admin", "Super Admin");
        $id = htmlspecialchars($id_dosen);
        $isSuccess =  $this->model("DosenModel")->delete($id);
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
            'nip' => htmlspecialchars($_POST['nip']),
            'nama' => htmlspecialchars($_POST['nama']),
            'id_dosen' => htmlspecialchars($_POST['id_dosen'])
        ];
        $isSuccess =  $this->model("DosenModel")->update($data);
        if ($isSuccess) {
            Flasher::setFlash("Input", "Data berhasil ditambahkan", "success", "Dosen/index");
        } else {
            Flasher::setFlash("Input", "Data gagal ditambahkan", "error", "Dosen/index");
        }
        header('location:' . BASEURL . '/Dosen/edit/' . $data['id_dosen']);
    }

}