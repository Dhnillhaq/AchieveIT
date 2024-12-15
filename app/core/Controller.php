<?php

require_once 'Validator.php';

class Controller
{
    private $models = [];

    protected $validator;

    private static $excludeSidebarFooter = ['index', 'index', 'Auth/login', 'Auth/daftar', 'Auth/lupaSandi', 'Auth/gantiSandi', 'pageNotFound', 'exception'];

    public function __construct()
    {
        $this->validator = new Validator();
    }

    protected function view($view, $data = [])
    {
        $viewFile = '../app/views/' . $view . '.php';

        if (!file_exists($viewFile)) {
            header("location:" . BASEURL . "/Home/pageNotFound");
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

    protected function redirect($path)
    {
        header("location" . BASEURL . $path);
    }

    protected function model($model)
    {
        if (!isset($this->models[$model])) {
            $modelFile = '../app/models/' . $model . '.php';

            if (!file_exists($modelFile)) {
                header("location:" . BASEURL . "/Home/pageNotFound");
                exit;
            }

            require_once $modelFile;
            $this->models[$model] = new $model();
        }
        return $this->models[$model];
    }

    protected function checkRole(...$roles)
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