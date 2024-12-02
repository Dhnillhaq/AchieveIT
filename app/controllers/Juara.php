<?php

class Juara extends Controller
{

    public function create()
    {
        $this->checkRole("Admin", "Super Admin");
        $this->view("Admin/Juara/create");
    }

    // Method proses Create Juara
    public function store()
    {
        if (isset($_POST['submit'])) {
            $data = [
                'juara' => htmlspecialchars($_POST['juara']),
                'poin' => htmlspecialchars($_POST['poin']),
            ];

            $this->model("JuaraModel")->store($data);
        }

        header("location:" . BASEURL . "/Admin/pengaturanPrestasi");
    }


    public function edit($id_juara)
    {
        $this->checkRole("Admin", "Super Admin");
        $id = htmlspecialchars($id_juara);

        $data = $this->model("JuaraModel")->getJuaraById($id);

        $this->view("Admin/Juara/edit", $data);
    }

    // Method proses Update Juara
    public function update()
    {
        if (isset($_POST['submit'])) {
            $data = [
                'id_juara' => htmlspecialchars($_POST['id_juara']),
                'juara' => htmlspecialchars($_POST['juara']),
                'poin' => htmlspecialchars($_POST['poin'])
            ];

            $this->model("JuaraModel")->update($data);
        }

        header("location:" . BASEURL . "/Admin/pengaturanPrestasi");
    }

    // Method proses Delete Juara
    public function delete($id_juara)
    {
        $id = htmlspecialchars($id_juara);

        $this->model("JuaraModel")->delete($id);

        header("location:" . BASEURL . "/Admin/pengaturanPrestasi");
    }

}