<?php

class Controller
{

    public function view($view, $data = [])
    {

        require_once '../app/views/templates/header.php';
        require_once '../app/views/templates/sidebar.php';
        require_once '../app/views/' . $view . '.php';
        require_once '../app/views/templates/footer.php';
    }

    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';

        return new $model;
    }

    public function checkRole()
    {
        if (isset($_SESSION['user']['role'])) {
            return true;
        }
        return false;
    }


}
?>