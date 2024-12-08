<?php

class Controller
{
    private $models = [];
    private $storageDir = __DIR__ . "../../../storage";

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
                header("location:" . BASEURL . "/Auth/pageNotFound");
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

    public function uploadFile($file)
    {
        if (!is_dir($this->storageDir)) {
            mkdir($this->storageDir, 0755, true);
        }

        if ($file['error'] !== UPLOAD_ERR_OK) {
            Flasher::setFlash("Input", "1 File {$file['name']} gagal ditambahkan {$file['error']}", "error", "Prestasi/create");
            return false;
        }

        $fileName = uniqid() . '_' . basename($file['name']);
        $targetFile = $this->storageDir . '/' . $fileName;

        // validate file type
        $allowedTypes = ['image/jpg', 'image/jpeg', 'image/png', 'application/pdf'];
        if (!in_array($file['type'], $allowedTypes)) {
            Flasher::setFlash("Input", "2 File {$file['name']} gagal ditambahkan {$file['error']}", "error", "Prestasi/create");
            return false;
        }

        // validate file size
        if ($file['size'] > 5 * 1024 * 1024) {
            Flasher::setFlash("Input", "3 File {$file['name']} gagal ditambahkan {$file['error']}", "error", "Prestasi/create");
            return false;
        }

        if (move_uploaded_file($file['tmp_name'], $targetFile)) {
            $data = [
                'nama_file' => $fileName,
                'nama_asli' => $file['name'],
                'ukuran' => $file['size'],
                'tipe' => $file['type'],
                'path' => $targetFile
            ];

            $result = $this->model("FilesModel")->store($data);

            if (!empty($result)) {
                return $result;
            } else {
                Flasher::setFlash("Input", "4 File {$file['name']} gagal ditambahkan {$file['error']}", "error", "Prestasi/create");
                return false;
            }
        }

        Flasher::setFlash("Input", "5 File {$file['name']} gagal ditambahkan {$file['error']}", "error", "Prestasi/create");
        return false;
    }
}
?>