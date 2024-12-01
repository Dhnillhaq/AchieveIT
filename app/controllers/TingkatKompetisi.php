<?php

class TingkatKompetisi extends Controller
{
    public function create()
    {
        $this->view("Admin/TingkatKompetisi/create");
    }
    public function store()
    {
        if (isset($_POST['submit'])) {
            $data = [
                'tingkat_kompetisi' => htmlspecialchars($_POST['tingkat_kompetisi']),
                'poin' => htmlspecialchars($_POST['poin']),
            ];

            $this->model("TingkatKompetisiModel")->store($data);
        }

        header("location:" . BASEURL . "/Admin/pengaturanPrestasi");
    }

    public function edit($id_tingkat_kompetisi)
    {
        $id = htmlspecialchars($id_tingkat_kompetisi);

        $data = $this->model("TingkatKompetisiModel")->getTingkatKompetisiById($id);

        $this->view("Admin/TingkatKompetisi/edit", $data);
    }

    public function update()
    {
        if (isset($_POST['submit'])) {
            $data = [
                'id_tingkat_kompetisi' => htmlspecialchars($_POST['id_tingkat_kompetisi']),
                'tingkat_kompetisi' => htmlspecialchars($_POST['tingkat_kompetisi']),
                'poin' => htmlspecialchars($_POST['poin'])
            ];

            $this->model("TingkatKompetisiModel")->update($data);
        }

        header("location:" . BASEURL . "/Admin/pengaturanPrestasi");
    }

    public function delete($id_tingkat_kompetisi)
    {
        $id = htmlspecialchars($id_tingkat_kompetisi);

        $this->model("TingkatKompetisiModel")->delete($id);

        header("location:" . BASEURL . "/Admin/pengaturanPrestasi");
    }
}