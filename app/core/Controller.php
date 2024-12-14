<?php

class Controller
{
    private $models = [];

    private static $excludeSidebarFooter = ['index', 'index', 'Auth/login', 'Auth/daftar', 'Auth/lupaSandi', 'Auth/gantiSandi', 'pageNotFound'];

    public function view($view, $data = [])
    {
        $viewFile = '../app/views/' . $view . '.php';

        if (!file_exists($viewFile)) {
            header("location:" . BASEURL . "/Auth/pageNotFound");
            exit;
        }

        require_once '../app/views/templates/header.php';

        if (!in_array($view, self::$excludeSidebarFooter)) {
            require_once '../app/views/templates/sidebar.php';
        }

        require_once $viewFile;

        if (!in_array($view, self::$excludeSidebarFooter)) {
            require_once '../app/views/templates/footer.php';
        }
    }

    public function model($model)
    {
        if (!isset($this->models[$model])) {
            $modelFile = '../app/models/' . $model . '.php';

            if (!file_exists($modelFile)) {
                header("location:" . BASEURL . "/Auth/pageNotFound");
                exit;
            }

            require_once $modelFile;
            $this->models[$model] = new $model();
        }
        return $this->models[$model];
    }

    public function checkRole(...$roles)
    {

        if (!isset($_SESSION['user']) || !isset($_SESSION['user']['role'])) {
            header('location:' . BASEURL . '/Auth/loginForm');
            exit;
        }

        if (!in_array($_SESSION['user']['role'], $roles)) {
            header('location:' . BASEURL . '/Home/pageNotFound');
            exit;
        }
    }
}
?>