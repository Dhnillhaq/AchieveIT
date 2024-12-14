<?php

class Auth extends Controller
{
    private $usernameInp;
    private $passwordInp;
    private $userDB;

    public function loginForm()
    {
        $data = [];

        if (isset($_POST["submit"])) {
            $this->usernameInp = htmlspecialchars($_POST["username"]);
            $this->passwordInp = htmlspecialchars($_POST["password"]);

            if ($this->isSuperAdmin()) {
                $this->setSession();
                Flasher::setFlash("Login", "Selamat Datang " . $_SESSION['user']['role'], "success", "Admin/index");
                $this->model("LogAdminModel")->storeAdminLog("Login", "Sukses");
            } else if ($this->isAdmin()) {
                $this->setSession();
                Flasher::setFlash("Login", "Selamat Datang " . $_SESSION['user']['role'], "success", "Admin/index");
                $this->model("LogAdminModel")->storeAdminLog("Login", "Sukses");
            } else if ($this->isKajur()) {
                $this->setSession();
                Flasher::setFlash("Login", "Selamat Datang " . $_SESSION['user']['role'], "success", "Kajur/index");
                $this->model("LogAdminModel")->storeAdminLog("Login", "Sukses");
            } else if ($this->isMahasiswa()) {
                $this->setSession();
                Flasher::setFlash("Login", "Selamat Datang " . $_SESSION['user']['nama'], "success", "Mahasiswa/index");
            } else {
                $data["message"] = "Username atau password yang anda masukkan tidak ditemukan!";
                Flasher::setFlash("Gagal", "Akun tidak ditemukan", "error");
            }
        }

        $this->view('Auth/login', $data);
    }

    // Method Halaman Registrasi
    public function registerForm()
    {
        $data['prodi'] = $this->model("ProdiModel")->getAllProdi();
        $this->view('Auth/daftar', $data);
    }

    // Method proses Registrasi
    public function registrasiProcess()
    {
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
                'password' => htmlspecialchars($_POST['password'])
            ];


            if ($this->isValidated($data['nim'])) {
                Flasher::setFlash("Daftar", "NIM yang anda masukkan sudah terdaftar", "error", "w");
            } else if ($this->isNotValidatedYet($data['nim'])) {
                Flasher::setFlash("Daftar", "Akun anda sudah terdaftar, kami akan menghubungi anda lebih lanjut", "error", "Auth/loginForm");
            } else if ($this->isInvalid($data['nim'])) {
                $isSuccess = $this->model("MahasiswaModel")->updateAccount($data);

                if ($isSuccess) {
                    Flasher::setFlash("Berhasil Terdaftar!", "Admin akan memeriksa akun anda terlebih dahulu, kami akan menghubungi anda lebih lanjut", "success", "Homeindex");
                } else {
                    Flasher::setFlash("Perbarui Gagal", "Koneksi ke database mungkin gagal, tunggu beberapa saat lagi", "error", "Home/index");
                }
            } else {
                $isSuccess = $this->model("MahasiswaModel")->store($data, "Not Validated");

                if ($isSuccess) {
                    Flasher::setFlash("Berhasil Terdaftar!", "Admin akan memeriksa akun anda terlebih dahulu, kami akan menghubungi anda lebih lanjut", "success", "Home/index");
                } else {
                    Flasher::setFlash("Daftar Gagal", "Koneksi ke database mungkin gagal, tunggu beberapa saat lagi", "error", "Home/index");
                }
            }
            header("location:" . BASEURL . "/Auth/registerForm");
        }

    }

    public function setSession()
    {
        if (isset($this->userDB['role'])) {
            $_SESSION['user'] = [
                "id_admin" => $this->userDB['id_admin'],
                "nip" => $this->userDB['nip'],
                "nama" => $this->userDB['nama'],
                "password" => $this->userDB['password'],
                "role" => $this->userDB['role'],
            ];
        } else {
            $_SESSION['user'] = [
                "nim" => $this->userDB['0']['nim'],
                "password" => $this->userDB['0']['password'],
                "nama" => $this->userDB['0']['nama'],
                "tempat_lahir" => $this->userDB['0']['tempat_lahir'],
                "tanggal_lahir" => $this->userDB['0']['tanggal_lahir'],
                "agama" => $this->userDB['0']['agama'],
                "jenis_kelamin" => $this->userDB['0']['jenis_kelamin'],
                "no_telepon" => $this->userDB['0']['no_telepon'],
                "email" => $this->userDB['0']['email'],
                "total_poin" => $this->userDB['0']['total_poin'],
                "prodi" => $this->userDB['0']['nama_prodi'],
                "role" => "Mahasiswa"
            ];
        }
    }

    public function isSuperAdmin()
    {
        $this->userDB = $this->model("AuthModel")->getSuperAdmin();
        if ($this->usernameInp == $this->userDB['nip'] && $this->passwordInp == $this->userDB['password']) {
            return true;
        }
        return false;
    }

    public function isAdmin()
    {
        $this->userDB = $this->model("AuthModel")->getAdmin();
        if ($this->usernameInp == $this->userDB['nip'] && $this->passwordInp == $this->userDB['password']) {
            return true;
        }
        return false;
    }

    public function isKajur()
    {
        $this->userDB = $this->model("AuthModel")->getKajur();
        if ($this->usernameInp == $this->userDB['nip'] && $this->passwordInp == $this->userDB['password']) {
            return true;
        } else {
            return false;
        }
    }

    public function isMahasiswa()
    {
        $this->userDB = $this->model("MahasiswaModel")->getMahasiswaByNim($this->usernameInp);
        if (!empty($this->userDB['0'])) {
            if ($this->usernameInp == $this->userDB['0']['nim'] && $this->passwordInp == $this->userDB['0']['password']) {
                return true;
            } else {
                return false;
            }
        }
        return false;
    }

    // Method check apakah sudah terdaftar
    public function isValidated($nim)
    {
        $check = $this->model("MahasiswaModel")->getMahasiswaByNim($nim, "Valid");
        if (!empty($check['0'])) {
            return true;
        }
        return false;
    }

    public function isInvalid($nim)
    {
        $check = $this->model("MahasiswaModel")->getMahasiswaByNim($nim, "Invalid");
        if (!empty($check['0'])) {
            return true;
        }
        return false;
    }

    public function isNotValidatedYet($nim)
    {
        $check = $this->model("MahasiswaModel")->getMahasiswaByNim($nim, "Not Validated");
        if (!empty($check['0'])) {
            return true;
        }
        return false;
    }

    public function lupaSandiForm()
    {
        $this->view('Auth/lupaSandi');
    }

    public function lupaSandiProcess()
    {
        $data = [];
        if (isset($_POST['submit'])) {
            $data = [
                'nim' => htmlspecialchars($_POST['nim']),
                'email' => htmlspecialchars($_POST['email']),
                'tanggal_lahir' => date('Y-m-d', strtotime($_POST['tanggal_lahir'])),
            ];
            $userDB = $this->model("MahasiswaModel")->getMahasiswaByNim($data['nim']);

            if (!empty($userDB['0'])) {
                if ($userDB['0']['email'] == $data['email'] && $userDB['0']['tanggal_lahir'] == new DateTime($data['tanggal_lahir'])) {
                    $_SESSION['message'] = "";
                    Flasher::setFlash("{$userDB['0']['nama']}", "Silahkan ganti kata sandi anda", "success", "Auth/gantiSandiForm/" . $data['nim']);
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
    }

    // Method / function ganti sandi setelah lupa sandi saat Login
    public function gantiSandiForm($nim)
    {
        $this->view('Auth/gantiSandi', $nim);
    }

    public function gantiSandiProcess()
    {
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
    }

    // Method / function ubah sandi di profil
    public function ubahSandiForm()
    {
        $this->view('Auth/ubahKataSandi');
    }

    // Method / function pengecekan & konfirmasi ubah sandi di profil
    public function passProcess()
    {
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
    }

    public function logout()
    {
        if ($_SESSION['user']['role'] !== "Mahasiswa") {
            $this->model("LogAdminModel")->storeAdminLog("Logout", "Sukses");
        }
        unset($_SESSION['user']);
        header("location:" . BASEURL . '/Auth/loginForm');
    }
}