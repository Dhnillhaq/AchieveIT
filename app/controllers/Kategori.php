<?php

class Kategori extends Controller
{
    public function create()
    {
        $this->checkMethod("GET");
        $this->checkRole("Admin", "Super Admin");
        $this->view("Admin/Kategori/create");
    }

    // Method proses Create Kategori
    public function store()
    {
        try {
            $this->checkMethod("POST");
            $this->checkRole("Admin", "Super Admin");
            if (isset($_POST['submit'])) {
                $data = [
                    'kategori' => htmlspecialchars($_POST['kategori'])
                ];

                $isSuccess = $this->model("KategoriModel")->store($data);
                if ($isSuccess) {
                    $this->model("LogAdminModel")->storeAdminLog("Tambah Data", "Menambahkan Data Kategori");
                    Flasher::setFlash("Tambahkan", "Data berhasil ditambahkan", "success", "Admin/pengaturanPrestasi");
                } else {
                    Flasher::setFlash("Tambahkan", "Data gagal ditambahkan", "error", "Admin/pengaturanPrestasi");
                }
            }

            header("location:" . BASEURL . "/Kategori/create");
        } catch (Exception $e) {
            $this->view('exception', $e);
        }
    }

    public function edit($id_kategori)
    {
        try {
            $this->checkMethod("GET");
            $this->checkRole("Admin", "Super Admin");
            $id = htmlspecialchars($id_kategori);

            $data = $this->model("KategoriModel")->getKategoriById($id);

            $this->view("Admin/Kategori/edit", $data);
        } catch (Exception $e) {
            $this->view('exception', $e);
        }
    }

    // Method proses Update Kategori
    public function update()
    {
        try {
            $this->checkMethod("POST");
            $this->checkRole("Admin", "Super Admin");
            if (isset($_POST['submit'])) {
                $data = [
                    'id_kategori' => htmlspecialchars($_POST['id_kategori']),
                    'kategori' => htmlspecialchars($_POST['kategori'])
                ];

                $isSuccess = $this->model("KategoriModel")->update($data);
                if ($isSuccess) {
                    $this->model("LogAdminModel")->storeAdminLog("Ubah Data", "Mengubah Data Kategori dengan ID " . $data['id_kategori']);
                    Flasher::setFlash("Perbarui", "Data berhasil diperbarui", "success", "Admin/pengaturanPrestasi");
                } else {
                    Flasher::setFlash("Perbarui", "Data gagal diperbarui", "error", "Admin/pengaturanPrestasi");
                }
            }

            header("location:" . BASEURL . "/Kategori/edit/" . $data['id_kategori']);
        } catch (Exception $e) {
            $this->view('exception', $e);
        }
    }

    // Method proses Delete Kategori
    public function delete($id_kategori)
    {
        $this->checkMethod("GET");
        $this->checkRole("Admin", "Super Admin");
        $id = htmlspecialchars($id_kategori);

        Flasher::setFlash("Hapus", "Apakah anda yakin ingin menghapus data ini?", "warning", "Kategori/deleting/" . $id);

        header("location:" . BASEURL . "/Admin/pengaturanPrestasi");
    }

    public function deleting($id)
    {
        try {
            $this->checkRole("Admin", "Super Admin");
            $isSuccess = $this->model("KategoriModel")->delete($id);

            if ($isSuccess) {
                $this->model("LogAdminModel")->storeAdminLog("Hapus Data", "Menghapus Data Kategori dengan ID " . $id);
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