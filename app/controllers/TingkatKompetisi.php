<?php

class TingkatKompetisi extends Controller
{
    public function create()
    {
        $this->checkRole("Admin", "Super Admin");
        $this->view("Admin/TingkatKompetisi/create");
    }

    public function store()
    {
        $this->checkRole("Admin", "Super Admin");
        if (isset($_POST['submit'])) {
            $data = [
                'tingkat_kompetisi' => htmlspecialchars($_POST['tingkat_kompetisi']),
                'poin' => htmlspecialchars($_POST['poin']),
            ];

            $isSuccess =  $this->model("TingkatKompetisiModel")->store($data);
            if ($isSuccess) {
                Flasher::setFlash("Input", "Data berhasil ditambahkan", "success", "Admin/pengaturanPrestasi");
            } else {
                Flasher::setFlash("Input", "Data gagal ditambahkan", "error", "Admin/pengaturanPrestasi");
            }
        }

        header("location:" . BASEURL . "/TingkatKompetisi/create");
    }

    public function edit($id_tingkat_kompetisi)
    {
        $this->checkRole("Admin", "Super Admin");
        $id = htmlspecialchars($id_tingkat_kompetisi);

        $data = $this->model("TingkatKompetisiModel")->getTingkatKompetisiById($id);

        $this->view("Admin/TingkatKompetisi/edit", $data);
    }

    public function update()
    {
        $this->checkRole("Admin", "Super Admin");
        if (isset($_POST['submit'])) {
            $data = [
                'id_tingkat_kompetisi' => htmlspecialchars($_POST['id_tingkat_kompetisi']),
                'tingkat_kompetisi' => htmlspecialchars($_POST['tingkat_kompetisi']),
                'poin' => htmlspecialchars($_POST['poin'])
            ];

            $isSuccess =  $this->model("TingkatKompetisiModel")->update($data);
            if ($isSuccess) {
                Flasher::setFlash("Input", "Data berhasil ditambahkan", "success", "Admin/pengaturanPrestasi");
            } else {
                Flasher::setFlash("Input", "Data gagal ditambahkan", "error", "Admin/pengaturanPrestasi");
            }
        }

        header("location:" . BASEURL . "/TingkatKompetisi/edit/" . $data['id_tingkat_kompetisi']);
    }

    public function delete($id_tingkat_kompetisi)
    {
        $this->checkRole("Admin", "Super Admin");
        $id = htmlspecialchars($id_tingkat_kompetisi);

        $isSuccess =  $this->model("TingkatKompetisiModel")->delete($id);
        if ($isSuccess) {
            Flasher::setFlash("Input", "Data berhasil ditambahkan", "success");
        } else {
            Flasher::setFlash("Input", "Data gagal ditambahkan", "error");
        }

        header("location:" . BASEURL . "/Admin/pengaturanPrestasi");
    }
}