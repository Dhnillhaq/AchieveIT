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
            header("location:$url/Admin/Kajur");
            exit;
        } else if ($this->isMahasiswa()) {
            $this->setSession();
            header("location:$url/Mahasiswa");
            exit;
        } else {
            header("location:$url/Umum/login");
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
                "nim" => $this->userDB['nim'],
                "password" => $this->userDB['password'],
                "nama" => $this->userDB['nama'],
                "tempat_lahir" => $this->userDB['tempat_lahir'],
                "tanggal_lahir" => $this->userDB['tanggal_lahir'],
                "agama" => $this->userDB['agama'],
                "jenis_kelamin" => $this->userDB['jenis_kelamin'],
                "email" => $this->userDB['email'],
                "total_poin" => $this->userDB['total_poin']
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
        $this->userDB = $this->model("AuthModel")->getMahasiswa($this->usernameInp);
        if ($this->usernameInp == $this->userDB['nim'] && $this->passwordInp == $this->userDB['password']) {
            return true;
        } else {
            return false;
        }
    }
}