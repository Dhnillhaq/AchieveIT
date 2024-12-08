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
        $this->checkRole("Admin", "Super Admin");
        if (isset($_POST['submit'])) {
            $data = [
                'tingkat_penyelenggara' => htmlspecialchars($_POST['tingkat_penyelenggara']),
                'poin' => htmlspecialchars($_POST['poin']),
            ];

            $isSuccess =  $this->model("TingkatPenyelenggaraModel")->store($data);
            if ($isSuccess) {
                Flasher::setFlash("Tambahkan", "Data berhasil ditambahkan", "success", "Admin/pengaturanPrestasi");
            } else {
                Flasher::setFlash("Tambahkan", "Data gagal ditambahkan", "error", "Admin/pengaturanPrestasi");
            }
        }

        header("location:" . BASEURL . "/TingkatPenyelenggara/create");
    }

    public function edit($id_tingkat_penyelenggara)
    {
        $this->checkRole("Admin", "Super Admin");
        $this->checkRole("Admin", "Super Admin");
        $id = htmlspecialchars($id_tingkat_penyelenggara);

        $data = $this->model("TingkatPenyelenggaraModel")->getTingkatPenyelenggaraById($id);

        $this->view("Admin/TingkatPenyelenggara/edit", $data);
    }

    public function update()
    {
        $this->checkRole("Admin", "Super Admin");
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
        $this->checkRole("Admin", "Super Admin");
        $id = htmlspecialchars($id_tingkat_penyelenggara);

        Flasher::setFlash("Hapus", "Apakah anda yakin ingin menghapus data ini?", "warning", "TingkatPenyelenggara/deleting/" . $id);

        header("location:" . BASEURL . "/Admin/pengaturanPrestasi");
    }

    public function deleting($id)
    {
        $this->checkRole("Admin", "Super Admin");
        $isSuccess =  $this->model("TingkatPenyelenggaraModel")->delete($id);
        
        if ($isSuccess) {
            Flasher::setFlash("Hapus", "Data berhasil dihapus", "success");
        } else {
            Flasher::setFlash("Hapus", "Data gagal dihapus", "error");
        }

        header("location:" . BASEURL . "/Admin/pengaturanPrestasi");
    }
}