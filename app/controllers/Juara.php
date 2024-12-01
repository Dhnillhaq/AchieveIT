<?php

class Juara extends Controller
{

    public function create()
    {
        $this->view("Admin/Juara/create");
    }
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
        $id = htmlspecialchars($id_juara);

        $data = $this->model("JuaraModel")->getJuaraById($id);

        $this->view("Admin/Juara/edit", $data);
    }

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

    public function delete($id_juara)
    {
        $id = htmlspecialchars($id_juara);

        $this->model("JuaraModel")->delete($id);

        header("location:" . BASEURL . "/Admin/pengaturanPrestasi");
    }

}