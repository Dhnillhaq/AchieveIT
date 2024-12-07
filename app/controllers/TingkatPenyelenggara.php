<?php

class TingkatPenyelenggara extends Controller
{
    public function create()
    {
        $this->checkRole("Admin", "Super Admin");
        $this->view("Admin/TingkatPenyelenggara/create");
    }
    public function store()
    {
        if (isset($_POST['submit'])) {
            $data = [
                'tingkat_penyelenggara' => htmlspecialchars($_POST['tingkat_penyelenggara']),
                'poin' => htmlspecialchars($_POST['poin']),
            ];

            $isSuccess =  $this->model("TingkatPenyelenggaraModel")->store($data);
            if ($isSuccess) {
                Flasher::setFlash("Input", "Data berhasil ditambahkan", "success", "Admin/pengaturanPrestasi");
            } else {
                Flasher::setFlash("Input", "Data gagal ditambahkan", "error", "Admin/pengaturanPrestasi");
            }
        }

        header("location:" . BASEURL . "/TingkatPenyelenggara/create");
    }

    public function edit($id_tingkat_penyelenggara)
    {
        $this->checkRole("Admin", "Super Admin");
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

            $isSuccess =  $this->model("TingkatPenyelenggaraModel")->update($data);
            if ($isSuccess) {
                Flasher::setFlash("Perbarui", "Data berhasil diperbarui", "success", "Admin/pengaturanPrestasi");
            } else {
                Flasher::setFlash("Perbarui", "Data gagal diperbarui", "error", "Admin/pengaturanPrestasi");
            }
        }

        header("location:" . BASEURL . "/TingkatPenyelenggara/edit/" . $data['id_tingkat_penyelenggara']);
    }

    public function delete($id_tingkat_penyelenggara)
    {
        $id = htmlspecialchars($id_tingkat_penyelenggara);

        $isSuccess =  $this->model("TingkatPenyelenggaraModel")->delete($id);
        if ($isSuccess) {
            Flasher::setFlash("Hapus", "Data berhasil dihapus", "success");
        } else {
            Flasher::setFlash("Hapus", "Data gagal dihapus", "error");
        }

        header("location:" . BASEURL . "/Admin/pengaturanPrestasi");
    }
}