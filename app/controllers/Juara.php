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
        $this->checkRole("Admin", "Super Admin");
        if (isset($_POST['submit'])) {
            $data = [
                'juara' => htmlspecialchars($_POST['juara']),
                'poin' => htmlspecialchars($_POST['poin']),
            ];

            $isSuccess =  $this->model("JuaraModel")->store($data);
            if ($isSuccess) {
                Flasher::setFlash("Tambahkan", "Data berhasil ditambahkan", "success", "Admin/pengaturanPrestasi");
            } else {
                Flasher::setFlash("Tambahkan", "Data gagal ditambahkan", "error", "Admin/pengaturanPrestasi");
            }
        }

        header("location:" . BASEURL . "/Juara/create");
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
        $this->checkRole("Admin", "Super Admin");
        if (isset($_POST['submit'])) {
            $data = [
                'id_juara' => htmlspecialchars($_POST['id_juara']),
                'juara' => htmlspecialchars($_POST['juara']),
                'poin' => htmlspecialchars($_POST['poin'])
            ];

            $isSuccess =  $this->model("JuaraModel")->update($data);
            if ($isSuccess) {
                Flasher::setFlash("Tambahkan", "Data berhasil ditambahkan", "success", "Admin/pengaturanPrestasi");
            } else {
                Flasher::setFlash("Tambahkan", "Data gagal ditambahkan", "error", "Admin/pengaturanPrestasi");
            }
        }

        header("location:" . BASEURL . "/Juara/edit/" . $data['id_juara']);
    }

    // Method proses Delete Juara
    public function delete($id_juara)
    {
        $this->checkRole("Admin", "Super Admin");
        $id = htmlspecialchars($id_juara);

        $isSuccess =  $this->model("JuaraModel")->delete($id);
        if ($isSuccess) {
            Flasher::setFlash("Tambahkan", "Data berhasil ditambahkan", "success");
        } else {
            Flasher::setFlash("Tambahkan", "Data gagal ditambahkan", "error");
        }
        header("location:" . BASEURL . "/Admin/pengaturanPrestasi");
    }

}