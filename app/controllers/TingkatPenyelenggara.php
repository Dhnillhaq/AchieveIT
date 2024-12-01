<?php

class TingkatPenyelenggara extends Controller
{
    public function create()
    {
        $this->view("Admin/TingkatPenyelenggara/create");
    }
    public function store()
    {
        if (isset($_POST['submit'])) {
            $data = [
                'tingkat_penyelenggara' => htmlspecialchars($_POST['tingkat_penyelenggara']),
                'poin' => htmlspecialchars($_POST['poin']),
            ];

            $this->model("TingkatPenyelenggaraModel")->store($data);
        }

        header("location:" . BASEURL . "/Admin/pengaturanPrestasi");
    }

    public function edit($id_tingkat_penyelenggara)
    {
        $id = htmlspecialchars($id_tingkat_penyelenggara);

        $data = $this->model("TingkatPenyelenggaraModel")->getTingkatPenyelenggaraById($id);

        $this->view("Admin/TingkatPenyelenggara/edit", $data);
    }

    public function update()
    {
        if (isset($_POST['submit'])) {
            $data = [
                'id_tingkat_penyelenggara' => htmlspecialchars($_POST['id_tingkat_penyelenggara']),
                'tingkat_penyelenggara' => htmlspecialchars($_POST['tingkat_penyelenggara']),
                'poin' => htmlspecialchars($_POST['poin'])
            ];

            $this->model("TingkatPenyelenggaraModel")->update($data);
        }

        header("location:" . BASEURL . "/Admin/pengaturanPrestasi");
    }

    public function delete($id_tingkat_penyelenggara)
    {
        $id = htmlspecialchars($id_tingkat_penyelenggara);

        $this->model("TingkatPenyelenggaraModel")->delete($id);

        header("location:" . BASEURL . "/Admin/pengaturanPrestasi");
    }
}