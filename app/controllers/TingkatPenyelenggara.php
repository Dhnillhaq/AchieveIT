<?php

class TingkatPenyelenggara extends Controller
{
    public function create()
    {
        $this->checkMethod("GET");
        $this->checkRole("Admin", "Super Admin");
        $this->view("Admin/TingkatPenyelenggara/create");
    }
    public function store()
    {
        try {
            $this->checkMethod("POST");
            $this->checkRole("Admin", "Super Admin");
            if (isset($_POST['submit'])) {
                $data = [
                    'tingkat_penyelenggara' => htmlspecialchars($_POST['tingkat_penyelenggara']),
                    'poin' => htmlspecialchars($_POST['poin']),
                ];

                $isSuccess = $this->model("TingkatPenyelenggaraModel")->store($data);
                if ($isSuccess) {
                    $this->model("LogAdminModel")->storeAdminLog("Tambah Data", "Menambah Data Tingkat Penyelenggara");
                    Flasher::setFlash("Tambahkan", "Data berhasil ditambahkan", "success", "Admin/pengaturanPrestasi");
                } else {
                    Flasher::setFlash("Tambahkan", "Data gagal ditambahkan", "error", "Admin/pengaturanPrestasi");
                }
            }

            header("location:" . BASEURL . "/TingkatPenyelenggara/create");
        } catch (Exception $e) {
            $this->view('exception', $e);
        }
    }

    public function edit($id_tingkat_penyelenggara)
    {
        try {
            $this->checkMethod("GET");
            $this->checkRole("Admin", "Super Admin");
            $id = htmlspecialchars($id_tingkat_penyelenggara);

            $data = $this->model("TingkatPenyelenggaraModel")->getTingkatPenyelenggaraById($id);

            $this->view("Admin/TingkatPenyelenggara/edit", $data);
        } catch (Exception $e) {
            $this->view('exception', $e);
        }
    }

    public function update()
    {
        try {
            $this->checkMethod("POST");
            $this->checkRole("Admin", "Super Admin");
            if (isset($_POST['submit'])) {
                $data = [
                    'id_tingkat_penyelenggara' => htmlspecialchars($_POST['id_tingkat_penyelenggara']),
                    'tingkat_penyelenggara' => htmlspecialchars($_POST['tingkat_penyelenggara']),
                    'poin' => htmlspecialchars($_POST['poin'])
                ];

                $isSuccess = $this->model("TingkatPenyelenggaraModel")->update($data);
                if ($isSuccess) {
                    $this->model("LogAdminModel")->storeAdminLog("Ubah Data", "Mengubah Data Tingkat Penyelenggara dengan ID " . $data['id_tingkat_penyelenggara']);
                    Flasher::setFlash("Perbarui", "Data berhasil diperbarui", "success", "Admin/pengaturanPrestasi");
                } else {
                    Flasher::setFlash("Perbarui", "Data gagal diperbarui", "error", "Admin/pengaturanPrestasi");
                }
            }

            header("location:" . BASEURL . "/TingkatPenyelenggara/edit/" . $data['id_tingkat_penyelenggara']);
        } catch (Exception $e) {
            $this->view('exception', $e);
        }
    }

    public function delete($id_tingkat_penyelenggara)
    {
        $this->checkMethod("GET");
        $this->checkRole("Admin", "Super Admin");
        $id = htmlspecialchars($id_tingkat_penyelenggara);

        Flasher::setFlash("Hapus", "Apakah anda yakin ingin menghapus data ini?", "warning", "TingkatPenyelenggara/deleting/" . $id);

        header("location:" . BASEURL . "/Admin/pengaturanPrestasi");
    }

    public function deleting($id)
    {
        try {
            $this->checkRole("Admin", "Super Admin");
            $isSuccess = $this->model("TingkatPenyelenggaraModel")->delete($id);

            if ($isSuccess) {
                $this->model("LogAdminModel")->storeAdminLog("Hapus Data", "Menghapus Data Tingkat Penyelenggara dengan ID " . $id);
                Flasher::setFlash("Hapus", "Data berhasil dihapus", "success");
            } else {
                Flasher::setFlash("Hapus", "Data gagal dihapus", "error");
            }

            header("location:" . BASEURL . "/Admin/pengaturanPrestasi");
        } catch (Exception $e) {
            $this->view('exception', $e);
        }
    }
}