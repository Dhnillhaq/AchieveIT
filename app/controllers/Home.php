<?php
class Home extends Controller
{
    private $usernameInp;
    private $passwordInp;
    private $userDB;

    public function index()
    {
        if (isset($_POST['limit'])) {
            $data['prestasi'] = $this->model("PrestasiModel")->printPrestasiUmum($_POST['limit']);
        } else if (isset($_POST['keyword'])) {
            $data['prestasi'] = $this->model("PrestasiModel")->searchPrestasi($_POST['keyword']);
        } else {
            $data['prestasi'] = $this->model("PrestasiModel")->printPrestasiUmum();
        }
        $this->view('index', $data);
        if (isset($_POST['login'])) {
        }
    }
    public function tampilSort()
    {
        if (isset($_POST['limit'])) {
            $data['prestasi'] = $this->model("PrestasiModel")->printPrestasiUmum($_POST['limit']);
        } else {
            $data['prestasi'] = $this->model("PrestasiModel")->printPrestasiUmum();
        }
        $this->view('index', $data);
        if (isset($_POST['login'])) {
        }
    }

    public function login()
    {
        $this->view('Auth/login');
    }

    public function isLogin()
    {
        $this->usernameInp = $_POST["username"];
        $this->passwordInp = $_POST["password"];
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
        $_SESSION['username'] = $this->userDB['nip'];
        $_SESSION['password'] = $this->userDB['password'];
        if (isset($this->userDB['role'])) {
            $_SESSION['role'] = $this->userDB['role'];
        } else {
            $_SESSION['role'] = "Mahasiswa";
        }

    }
    public function isSuperAdmin()
    {
        $this->userDB = $this->model("UserModel")->getSuperAdmin();
        if ($this->usernameInp == $this->userDB['nip'] && $this->passwordInp == $this->userDB['password']) {
            return true;
        }
        return false;
    }

    public function isAdmin()
    {
        $this->userDB = $this->model("UserModel")->getAdmin();
        if ($this->usernameInp == $this->userDB['nip'] && $this->passwordInp == $this->userDB['password']) {
            return true;
        }
        return false;
    }

    public function isKajur()
    {
        $this->userDB = $this->model("UserModel")->getKajur();
        if ($this->usernameInp == $this->userDB['nip'] && $this->passwordInp == $this->userDB['password']) {
            return true;
        } else {
            return false;
        }
    }

    public function isMahasiswa()
    {
        $this->userDB = $this->model("UserModel")->getMahasiswa($this->usernameInp);
        if ($this->usernameInp == $this->userDB['nim'] && $this->passwordInp == $this->userDB['password']) {
            return true;
        } else {
            return false;
        }
    }

    public function search()
    {
        $data['search'] = $this->model("PrestasiModel")->searchPrestasi($_POST['keyword']);
    }
}

?>