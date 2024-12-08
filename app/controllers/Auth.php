<?php
class Auth extends Controller
{
    private $usernameInp;
    private $passwordInp;
    private $userDB;

    public function login()
    {
        $data = [];

        if (isset($_POST["submit"])) {
            $this->usernameInp = htmlspecialchars($_POST["username"]);
            $this->passwordInp = htmlspecialchars($_POST["password"]);

            if ($this->isSuperAdmin()) {
                $this->setSession();
                Flasher::setFlash("Login", "Selamat Datang " . $_SESSION['user']['role'], "success", "Admin/index");
            } else if ($this->isAdmin()) {
                $this->setSession();
                Flasher::setFlash("Login", "Selamat Datang " . $_SESSION['user']['role'], "success", "Admin/index");
            } else if ($this->isKajur()) {
                $this->setSession();
                Flasher::setFlash("Login", "Selamat Datang " . $_SESSION['user']['role'], "success", "Kajur/index");
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

    public function pageNotFound()
    {
        if ($_SESSION['user']['role'] == 'Super Admin') {
            $data['url'] = 'Admin/index';
        } else if ($_SESSION['user']['role'] == 'Ketua Jurusan') {
            $data['url'] = 'Kajur/index';
        } else {
            $data['url'] = 'Mahasiswa/index';
        }
        $this->view('Auth/pageNotFound', $data);
    }

    // Method Halaman Registrasi
    public function registrasi()
    {
        $this->view('Auth/registrasi');
    }

    // Method proses Registrasi
    public function registration()
    {
        $this->usernameInp = htmlspecialchars($_POST["username"]);
        $this->passwordInp = htmlspecialchars($_POST["password"]);
        $confirmPassword = htmlspecialchars($_POST["confirm_password"]);

        if ($this->passwordInp != $confirmPassword) {
            $data['message'] = "Konfirmasi password tidak sesuai!";
            $this->view('Auth/registrasi', $data);
        }

        if ($this->isRegistered()) {
            $data['message'] = "Username sudah terdaftar!";
        } else {
            $this->model("AuthModel")->register($this->usernameInp, $this->passwordInp);
        }

    }

    public function setSession()
    {
        if (isset($this->userDB['role'])) {
            $_SESSION['user'] = [
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
    public function isRegistered()
    {
        $this->userDB = $this->model("MahasiswaModel")->getMahasiswaByNim($this->usernameInp);
        if (!empty($this->userDB['0'])) {
            return true;
        }
        return false;
    }

    public function changePass()
    {
        $this->view('Auth/ubahKataSandi');
    }

    public function passprocess()
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
        header("location:" . BASEURL . "/Auth/changePass");

    }

    public function updatePass($password)
    {
        $data['password'] = $password;
        if ($_SESSION['user']['role'] == "Mahasiswa") {
            $data['username'] = htmlspecialchars($_SESSION['user']['nim']);
        } else {
            $data['username'] = htmlspecialchars($_SESSION['user']['nip']);
        }
        echo "<pre>";
        print_r($data);
        echo "</pre>";

        $isSuccess = $this->model("AuthModel")->changePass($data['password'], $data['username']);

        if ($isSuccess) {
            $_SESSION['user']['password'] = $data['password'];
        }

        if ($_SESSION['user']['role'] == "Mahasiswa") {
            header("location:" . BASEURL . "/Mahasiswa/profil");
        } else if ($_SESSION['user']['role'] == "Ketua Jurusan") {
            header("location:" . BASEURL . "/Kajur/profil");
        } else {
            header("location:" . BASEURL . "/Admin/profil");

        }
    }

    public function deleteSession()
    {
        unset($_SESSION['user']);
        header("location:" . BASEURL . '/Auth/login');
    }
}