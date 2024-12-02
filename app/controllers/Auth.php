<?php
class Auth extends Controller
{
    private $usernameInp;
    private $passwordInp;
    private $userDB;
    public function login()
    {
        $this->view('Auth/login');
    }

    public function isLogin()
    {
        $this->usernameInp = htmlspecialchars($_POST["username"]);
        $this->passwordInp = htmlspecialchars($_POST["password"]);
        $url = BASEURL;

        if ($this->isSuperAdmin()) {
            $this->setSession();
            header("location:$url/Admin/superAdmin");
            exit;
        } else if ($this->isAdmin()) {
            $this->setSession();
            header("location:$url/Admin/");
            exit;
        } else if ($this->isKajur()) {
            $this->setSession();
            header("location:$url/Kajur/index");
            exit;
        } else if ($this->isMahasiswa()) {
            $this->setSession();
            header("location:$url/Mahasiswa/index");
            exit;
        } else {
            header("location:$url/Auth/login");
            exit;
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
        if ($this->usernameInp == $this->userDB['0']['nim'] && $this->passwordInp == $this->userDB['0']['password']) {
            return true;
        } else {
            return false;
        }
    }

    public function changePass()
    {
        $this->view('Auth/ubahKataSandi');
    }

    public function deleteSession()
    {
        session_unset();
        session_destroy();
        header("location:" . BASEURL . '/Auth/login');
    }
}