<?php

class Files extends Controller
{
    private final $storageDir = __DIR__ . "../../../storage/files/";

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
