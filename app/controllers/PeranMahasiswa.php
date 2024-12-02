<?php

class PeranMahasiswa extends Controller
{
    public function create()
    {
        $this->checkRole("Admin", "Super Admin");
        $this->view("Admin/PeranMahasiswa/create");
    }

    public function edit()
    {
        $this->checkRole("Admin", "Super Admin");
        $this->view("Admin/PeranMahasiswa/edit");

    }
    public function store(){
        if(isset($_POST['submit'])) {
            $data = [
                'peran' => htmlspecialchars($_POST['peran'])
            ];
            $this->model("PeranMahasiswaModel")->store($data);
        }
        header("location:" . BASEURL . "Mahasiswa/index");
    }

    public function edit($id_peran){
        $this->checkRole("Admin", "Super Admin");
        $data = $this->model("PeranMahasiswaModel")->getPeranMhsById($id_peran);
        $this->view("Admin/PeranMahasiswa/edit", $data);
    }   

    public function delete($id_peran){
        $id = htmlspecialchars($id_peran);
        this->model("PeranMahasiswaModel")->delete($id);
    }

    public function update(){
        $data = [
            'peran' => htmlspecialchars($_POST['peran']),
            'id_peran' => htmlspecialchars($_POST['id_peran'])
        ];
        $this->model("PeranMahasiswaModel")->update($data);
        header('location:' . BASEURL . 'Mahasiswa/index');
    }
}