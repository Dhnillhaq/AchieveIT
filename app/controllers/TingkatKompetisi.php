<?php

class TingkatKompetisi extends Controller
{
    public function create()
    {
        $this->checkMethod("GET");
        $this->checkRole("Admin", "Super Admin");
        $this->view("Admin/TingkatKompetisi/create");
    }

    public function store()
    {
        try {
            $this->checkMethod("POST");
            $this->checkRole("Admin", "Super Admin");
            if (isset($_POST['submit'])) {
                $data = [
                    'tingkat_kompetisi' => htmlspecialchars($_POST['tingkat_kompetisi']),
                    'poin' => htmlspecialchars($_POST['poin']),
                ];

                $isSuccess = $this->model("TingkatKompetisiModel")->store($data);
                if ($isSuccess) {
                    $this->model("LogAdminModel")->storeAdminLog("Tambah Data", "Menambah Data Tingkat Kompetisi");
                    Flasher::setFlash("Tambahkan", "Data berhasil ditambahkan", "success", "Admin/pengaturanPrestasi");
                } else {
                    Flasher::setFlash("Tambahkan", "Data gagal ditambahkan", "error", "Admin/pengaturanPrestasi");
                }
            }

            header("location:" . BASEURL . "/TingkatKompetisi/create");
        } catch (Exception $e) {
            $this->view('exception', $e);
        }
    }

    public function edit($id_tingkat_kompetisi)
    {
        try {
            $this->checkMethod("GET");
            $this->checkRole("Admin", "Super Admin");
            $id = htmlspecialchars($id_tingkat_kompetisi);

            $data = $this->model("TingkatKompetisiModel")->getTingkatKompetisiById($id);

            $this->view("Admin/TingkatKompetisi/edit", $data);
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
                    'id_tingkat_kompetisi' => htmlspecialchars($_POST['id_tingkat_kompetisi']),
                    'tingkat_kompetisi' => htmlspecialchars($_POST['tingkat_kompetisi']),
                    'poin' => htmlspecialchars($_POST['poin'])
                ];

                $isSuccess = $this->model("TingkatKompetisiModel")->update($data);
                if ($isSuccess) {
                    $this->model("LogAdminModel")->storeAdminLog("Ubah Data", "Mengubah Data Tingkat Kompetisi dengan ID " . $data['id_tingkat_kompetisi']);
                    Flasher::setFlash("Perbarui", "Data berhasil diperbarui", "success", "Admin/pengaturanPrestasi");
                } else {
                    Flasher::setFlash("Perbarui", "Data gagal diperbarui", "error", "Admin/pengaturanPrestasi");
                }
            }

            header("location:" . BASEURL . "/TingkatKompetisi/edit/" . $data['id_tingkat_kompetisi']);
        } catch (Exception $e) {
            $this->view('exception', $e);
        }
    }

    public function delete($id_tingkat_kompetisi)
    {
        $this->checkMethod("GET");
        $this->checkRole("Admin", "Super Admin");
        $id = htmlspecialchars($id_tingkat_kompetisi);

        Flasher::setFlash("Hapus", "Apakah anda yakin ingin menghapus data ini?", "warning", "TingkatKompetisi/deleting/" . $id);

        header("location:" . BASEURL . "/Admin/pengaturanPrestasi");
    }

    public function deleting($id)
    {
        try {
            $this->checkRole("Admin", "Super Admin");
            $isSuccess = $this->model("TingkatKompetisiModel")->delete($id);

            if ($isSuccess) {
                $this->model("LogAdminModel")->storeAdminLog("Hapus Data", "Menghapus Data Tingkat Kompetisi dengan ID " . $id);
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