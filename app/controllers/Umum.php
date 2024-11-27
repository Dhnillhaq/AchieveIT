<?php
class Umum extends Controller {
    private $username;
    private $password;

    public function index(){
        
        $this->view('templates/header');
        $this->view('Umum/index');
        $this->view('templates/footer');
        if (isset($_POST['login'])) {
            $this->model("UserModel");
        }
    }
    public function login(){
        $this->view('templates/header');
        $this->view('Umum/login');
        $this->view('templates/footer');
    
    }

    public function isLogin($usernameInp, $passwordInp)
    {
            $this->username = $usernameInp;
            $this->password = $passwordInp;

            if (isAdmin()) {
                $_SESSION['role'] = "admin";
            } else if (isKajur()) {
                $_SESSION['role'] = "kajur";
            } else if (isMahasiswa()) {
                $_SESSION['role'] = "mahasiswa";
            } else {
                echo "Mohon input benar";
                exit;
            }
            $_SESSION['username'] = $this->username;
            $_SESSION['password'] = $this->password;
        }


    public function isAdmin(): bool
    {
        if ($this->username == "Admin" && $this->password == "admin") {
            return true;
        } else {
            echo "Bukan admin";
            return false;
        }
    }

    public function isKajur(): bool 
    {
        if ($this->username == "nip" && $this->password == "nip") {
            return true;
        } else {
            return false;
        }
    }

    public function isMahasiswa(): bool
    {
        if ($this->username == "nim" && $this->password == "password") {
            return true;
        } else {
            return false;
        }
    }
}

?>