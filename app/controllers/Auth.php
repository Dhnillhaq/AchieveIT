<?php

class Auth extends Controller
{


    public function loginForm()
    {
        if (isset($_POST["submit"])) {
            $username = htmlspecialchars($_POST["username"]);
            $password = htmlspecialchars($_POST["password"]);

            $user = self::authenticateUser($username, $password);

            if (!empty($user)) {
                self::setSession($user);
                Flasher::setFlash("Login", "Selamat Datang " . $_SESSION['user']['nama'], "success", $_SESSION['user']['role'] == "Admin" || $_SESSION['user']['role'] == "Super Admin" ? "Admin/index" : ($_SESSION['user']['role'] == "Ketua Jurusan" ? "Kajur/index" : "Mahasiswa/index"));
                $this->model("LogAdminModel")->storeAdminLog("Login", "Sukses");
            } else {
                $data["message"] = "Username atau password yang anda masukkan tidak ditemukan!";
                Flasher::setFlash("Gagal", "Akun tidak ditemukan", "error");
            }
        }
        $this->view('Auth/login', $data ?? []);
    }

    public function authenticateUser($username, $password)
    {
        if (strlen($username) >= 10) {
            $users = $this->model("AuthModel")->getMahasiswa();
            foreach ($users as $user) {
                if ($user['nim'] == $username && $user['password'] == $password) {
                    return $user;
                }
            }
        } else {
            $users = $this->model("AuthModel")->getAdmin();
            foreach ($users as $user) {
                if ($user['nip'] == $username && $user['password'] == $password) {
                    return $user;
                }
            }
        }

        return [];
    }

    // Method Halaman Registrasi
    public function registerForm()
    {
        try {
            $this->checkMethod("GET");
            $data['prodi'] = $this->model("ProdiModel")->getProdi();
            $this->view('Auth/daftar', $data);
        } catch (Exception $e) {
            $this->view('exception', $e);
        }
    }

    // Method proses Registrasi
    public function registrasiProcess()
    {
        try {
            $this->checkMethod("POST");
            if (isset($_POST['submit'])) {
                $data = [
                    'id_prodi' => htmlspecialchars($_POST['id_prodi']),
                    'nim' => htmlspecialchars($_POST['nim']),
                    'nama' => htmlspecialchars($_POST['nama']),
                    'tempat_lahir' => htmlspecialchars($_POST['tempat_lahir']),
                    'tanggal_lahir' => htmlspecialchars($_POST['tanggal_lahir']),
                    'agama' => htmlspecialchars($_POST['agama']),
                    'jenis_kelamin' => htmlspecialchars($_POST['jenis_kelamin']),
                    'no_telepon' => htmlspecialchars($_POST['no_telepon']),
                    'email' => htmlspecialchars($_POST['email']),
                    'status' => 'Not Validated',
                    'password' => htmlspecialchars($_POST['password'])
                ];

                $mahasiswa = $this->model("MahasiswaModel")->getMahasiswaByNim($data['nim']);

                if (!empty($mahasiswa)) {
                    if ($mahasiswa['status'] == "Valid") {
                        Flasher::setFlash("Daftar", "NIM yang anda masukkan sudah terdaftar", "error", "Auth/loginForm");
                    } else if ($mahasiswa['status'] == "Not Validated") {
                        Flasher::setFlash("Daftar", "Akun anda sudah terdaftar, kami akan menghubungi anda lebih lanjut", "error", "Auth/loginForm");
                    } else if ($mahasiswa['status'] == "Invalid") {
                        $isSuccess = $this->model("MahasiswaModel")->updateAccount($data);

                        if ($isSuccess) {
                            Flasher::setFlash("Berhasil Terdaftar!", "Admin akan memeriksa akun anda terlebih dahulu, kami akan menghubungi anda lebih lanjut", "success", "Home/index");
                        } else {
                            Flasher::setFlash("Perbarui Gagal", "Koneksi ke database mungkin gagal, tunggu beberapa saat lagi", "error", "Home/index");
                        }
                    }
                } else {
                    $isSuccess = $this->model("MahasiswaModel")->store($data);

                    if ($isSuccess) {
                        Flasher::setFlash("Berhasil Terdaftar!", "Admin akan memeriksa akun anda terlebih dahulu, kami akan menghubungi anda lebih lanjut", "success", "Home/index");
                    } else {
                        Flasher::setFlash("Daftar Gagal", "Koneksi ke database mungkin gagal, tunggu beberapa saat lagi", "error", "Home/index");
                    }
                }

                header("location:" . BASEURL . "/Auth/registerForm");
            }
        } catch (Exception $e) {
            $this->view('exception', $e);
        }
    }

    public function setSession($user)
    {
        if (isset($user['role'])) {
            $_SESSION['user'] = [
                "id_admin" => $user['id_admin'],
                "nip" => $user['nip'],
                "nama" => $user['nama'],
                "password" => $user['password'],
                "role" => $user['role']
            ];
        } else {
            $_SESSION['user'] = [
                "nim" => $user['nim'],
                "password" => $user['password'],
                "nama" => $user['nama'],
                "tempat_lahir" => $user['tempat_lahir'],
                "tanggal_lahir" => $user['tanggal_lahir'],
                "agama" => $user['agama'],
                "jenis_kelamin" => $user['jenis_kelamin'],
                "no_telepon" => $user['no_telepon'],
                "email" => $user['email'],
                "prodi" => $user['nama_prodi'],
                "role" => "Mahasiswa"
            ];
        }
    }

    public function lupaSandiForm()
    {
        $this->checkMethod("GET");
        $this->view('Auth/lupaSandi');
    }

    public function lupaSandiProcess()
    {
        try {
            $this->checkMethod("POST");
            if (isset($_POST['submit'])) {
                $data = [
                    'nim' => htmlspecialchars($_POST['nim']),
                    'email' => htmlspecialchars($_POST['email']),
                    'tanggal_lahir' => date('Y-m-d', strtotime($_POST['tanggal_lahir'])),
                ];
                $mahasiswa = $this->model("MahasiswaModel")->getMahasiswaByNim($data['nim']);

                if (!empty($mahasiswa)) {
                    if ($mahasiswa['email'] == $data['email'] && $mahasiswa['tanggal_lahir'] == new DateTime($data['tanggal_lahir'])) {
                        $_SESSION['message'] = "";
                        Flasher::setFlash("{$mahasiswa['nama']}", "Silahkan ganti kata sandi anda", "success", "Auth/gantiSandiForm/" . $data['nim']);
                    } else {
                        $_SESSION['message'] = "Email & tanggal lahir yang anda masukkan mungkin salah!";
                        Flasher::setFlash("Tidak Ditemukan", "Data yang anda masukkan mungkin salah!", "error");
                    }
                } else {
                    $_SESSION['message'] = "NIM yang anda masukkan tidak cocok dengan akun manapun";
                    Flasher::setFlash("Tidak Ditemukan", "Data yang anda masukkan tidak cocok!", "error");
                }
                header("location:" . BASEURL . "/Auth/lupaSandiForm");
            }
        } catch (Exception $e) {
            $this->view('exception', $e);
        }
    }

    // Method / function ganti sandi setelah lupa sandi saat Login
    public function gantiSandiForm($nim)
    {
        $this->checkMethod("GET");
        $this->view('Auth/gantiSandi', $nim);
    }

    public function gantiSandiProcess()
    {
        try {
            $this->checkMethod("POST");
            if (isset($_POST['submit'])) {
                $data = [
                    'nim' => htmlspecialchars($_POST['nim']),
                    'sandiBaru' => htmlspecialchars($_POST['sandiBaru']),
                ];

                $isSuccess = $this->model("AuthModel")->gantiSandi($data['sandiBaru'], $data['nim']);

                if ($isSuccess) {
                    Flasher::setFlash("Berhasil", "Sandi anda berhasil diganti", "success", "Auth/loginForm");
                } else {
                    Flasher::setFlash("Gagal", "Sandi anda gagal diganti", "error");
                }
            }
            header("location:" . BASEURL . "/Auth/gantiSandiForm/" . $data['nim']);
        } catch (Exception $e) {
            $this->view('exception', $e);
        }
    }

    // Method / function ubah sandi di profil
    public function ubahSandiForm()
    {
        $this->checkMethod("GET");
        $this->view('Auth/ubahKataSandi');
    }

    // Method / function pengecekan & konfirmasi ubah sandi di profil
    public function passProcess()
    {
        $this->checkMethod("POST");
        if (isset($_POST['submit'])) {
            $sandiLama = htmlspecialchars($_POST['sandiLama']);
            $data = [
                'sandiBaru' => htmlspecialchars($_POST['sandiBaru']),
            ];

            if ($sandiLama == $_SESSION['user']['password']) {
                Flasher::setFlash("Ubah Sandi", "Apakah anda yakin ingin mengubah kata sandi anda?", "question", "Auth/updatePass/" . $data['sandiBaru']);
            } else {
                Flasher::setFlash("Gagal", "Kata Sandi Lama yang anda masukkan tidak cocok!", "error");
            }
        }
        header("location:" . BASEURL . "/Auth/ubahSandiForm");
    }

    // Method / function memperbarui sandi pengguna
    public function updatePass($password)
    {
        try {
            $data['password'] = $password;

            if ($_SESSION['user']['role'] == "Mahasiswa") {
                $data['username'] = htmlspecialchars($_SESSION['user']['nim']);
            } else {
                $data['username'] = htmlspecialchars($_SESSION['user']['nip']);
            }


            $isSuccess = $this->model("AuthModel")->gantiSandi($data['password'], $data['username']);

            if ($isSuccess) {
                $_SESSION['user']['password'] = $data['password'];
                Flasher::setFlash("Berhasil", "Kata Sandi anda berhasil diubah", "success");
            } else {
                Flasher::setFlash("Gagal", "Kata Sandi anda gagal diubah", "error");
            }

            if (isset($_SESSION['user'])) {
                if ($_SESSION['user']['role'] == "Mahasiswa") {
                    header("location:" . BASEURL . "/Mahasiswa/profil");
                } else if ($_SESSION['user']['role'] == "Ketua Jurusan") {
                    $this->model("LogAdminModel")->storeAdminLog("Ubah Sandi", "Memperbarui Kata Sandi");
                    header("location:" . BASEURL . "/Kajur/profil");
                } else {
                    $this->model("LogAdminModel")->storeAdminLog("Ubah Sandi", "Memperbarui Kata Sandi");
                    header("location:" . BASEURL . "/Admin/profil");
                }
            } else {
                header("location:" . BASEURL . "/Auth/loginForm");
            }
        } catch (Exception $e) {
            $this->view('exception', $e);
        }
    }

    public function logout()
    {
        try {
            if ($_SESSION['user']['role'] !== "Mahasiswa") {
                $this->model("LogAdminModel")->storeAdminLog("Logout", "Sukses");
            }
            unset($_SESSION['user']);
            header("location:" . BASEURL . '/Auth/loginForm');
        } catch (Exception $e) {
            $this->view('exception', $e);
        }
    }
}