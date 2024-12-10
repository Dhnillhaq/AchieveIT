<?php

class PeranMahasiswa extends Controller
{
    public function create()
    {
        $this->checkRole("Admin", "Super Admin");
        $this->view("Admin/PeranMahasiswa/create");
    }

    public function store()
    {
        $this->checkRole("Admin", "Super Admin");
        if (isset($_POST['submit'])) {
            $data = [
                'peran' => htmlspecialchars($_POST['peran'])
            ];
            $isSuccess =  $this->model("PeranMahasiswaModel")->store($data);
            if ($isSuccess) {
                Flasher::setFlash("Tambahkan", "Data berhasil ditambahkan", "success", "Mahasiswa/listMhs");
            } else {
                Flasher::setFlash("Tambahkan", "Data gagal ditambahkan", "error", "Mahasiswa/listMhs");
            }
        }
        header("location:" . BASEURL . "/PeranMahasiswa/create");
    }
    
    public function edit($id_peran)
    {
        $this->checkRole("Admin", "Super Admin");
        $data = $this->model("PeranMahasiswaModel")->getPeranMhsById($id_peran);
        $this->view("Admin/PeranMahasiswa/edit", $data);
    }
    
    public function update()
    {
        $this->checkRole("Admin", "Super Admin");
        $data = [
            'peran' => htmlspecialchars($_POST['peran']),
            'id_peran' => htmlspecialchars($_POST['id_peran'])
        ];

        $isSuccess =  $this->model("PeranMahasiswaModel")->update($data);
        if ($isSuccess) {
            Flasher::setFlash("Perbarui", "Data berhasil diperbarui", "success", "Mahasiswa/listMhs");
        } else {
            Flasher::setFlash("Perbarui", "Data gagal diperbarui", "error", "Mahasiswa/listMhs");
        }
        header('location:' . BASEURL . '/PeranMahasiswa/edit/' . $data['id_peran']);
    }
    
    public function delete($id_peran)
    {
        $this->checkRole("Admin", "Super Admin");
        $id = htmlspecialchars($id_peran);

        Flasher::setFlash("Hapus", "Apakah anda yakin ingin menghapus data ini?", "warning", "PeranMahasiswa/deleting/" . $id);

        header("location:" . BASEURL . "/Mahasiswa/listMhs");
    }

    public function deleting($id)
    {
        $this->checkRole("Admin", "Super Admin");
        $isSuccess =  $this->model("PeranMahasiswaModel")->delete($id);

        if ($isSuccess) {
            Flasher::setFlash("Hapus", "Data berhasil dihapus", "success");
        } else {
            Flasher::setFlash("Hapus", "Data gagal dihapus", "error");
        }
        header("location:" . BASEURL . "/Mahasiswa/listMhs");
    }

}