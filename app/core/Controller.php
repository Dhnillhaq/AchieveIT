<?php

class Controller
{
    private $models = [];

    public function view($view, $data = [])
    {
        require_once '../app/views/templates/header.php';
        if ($view != 'index' && $view != 'Auth/login' && $view != 'Auth/pageNotFound') {
            require_once '../app/views/templates/sidebar.php';
        }
        require_once '../app/views/' . $view . '.php';
        if ($view != 'index' && $view != 'Auth/login') {
            require_once '../app/views/templates/footer.php';
        }
    }

    public function model($model)
    {
        if (!isset($this->models[$model])) {
            $modelFile = '../app/models/' . $model . '.php';

            if (file_exists($modelFile)) {
                require_once $modelFile;
                $this->models[$model] = new $model();
            } else {
                header("location:".BASEURL."/Auth/pageNotFound");
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
            header('location:' . BASEURL . '/Auth/pageNotFound');
        }
    }


}
?>