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
                Flasher::setFlash("Perbarui", "Data berhasil diperbarui", "success", "Admin/pengaturanPrestasi");
            } else {
                Flasher::setFlash("Perbarui", "Data gagal diperbarui", "error", "Admin/pengaturanPrestasi");
            }
        }

        header("location:" . BASEURL . "/Juara/edit/" . $data['id_juara']);
    }

    // Method proses Delete Juara
    public function delete($id_juara)
    {
        $this->checkRole("Admin", "Super Admin");
        $id = htmlspecialchars($id_juara);

        Flasher::setFlash("Hapus", "Apakah anda yakin ingin menghapus data ini?", "warning", "Juara/deleting/" . $id);

        header("location:" . BASEURL . "/Admin/pengaturanPrestasi");
    }

    public function deleting($id)
    {
        $this->checkRole("Admin", "Super Admin");
        $isSuccess =  $this->model("JuaraModel")->delete($id);

        if ($isSuccess) {
            Flasher::setFlash("Hapus", "Data berhasil dihapus", "success");
        } else {
            Flasher::setFlash("Hapus", "Data gagal dihapus", "error");
        }
        header("location:" . BASEURL . "/Admin/pengaturanPrestasi");
    }

}