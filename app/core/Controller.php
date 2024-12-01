<?php

class Controller
{
    private $models = [];

    public function view($view, $data = [])
    {
        require_once '../app/views/templates/header.php';
        if ($view != 'index') {
            require_once '../app/views/templates/sidebar.php';
        }
        require_once '../app/views/' . $view . '.php';
        require_once '../app/views/templates/footer.php';
    }

    public function model($model)
    {
        if (!isset($this->models[$model])) {
            $modelFile = '../app/models/' . $model . '.php';

            if (file_exists($modelFile)) {
                require_once $modelFile;
                $this->models[$model] = new $model();
            } else {
                // error handling
            }
        }

        return $this->models[$model];
    }

    public function checkRole(...$roles)
    {
        $hasAccess = false;

        if (!isset($_SESSION['user'])) {
            header('location:' . BASEURL . '/Auth/Login');
        }

        foreach ($roles as $role) {
            if ($_SESSION['user']['role'] == $role) {
                $hasAccess = true;
            }
        }

        if (!$hasAccess) {
            if ($_SESSION['user']['role'] == 'Super Admin') {
                $selectedRole = 'Admin';
            } else if ($_SESSION['user']['role'] == 'Ketua Jurusan') {
                $selectedRole = 'Kajur';
            } else {
                $selectedRole = $_SESSION['user']['role'];
            }

            header('location:' . BASEURL . '/' . $selectedRole);
        }
    }


}
?>