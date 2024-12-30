<?php

class Files extends Controller
{
    private $storageDir = __DIR__ . "../../../storage/files/";

    public function uploadFile($file)
    {
        try {
            if (!is_dir($this->storageDir)) {
                mkdir($this->storageDir, 0755, true);
            }

            if ($file['error'] !== UPLOAD_ERR_OK) {
                throw new Exception("File Upload Error: File {$file['name']} failed to upload [{$file['error']}]");
            }

            $fileName = uniqid() . '_' . basename($file['name']);
            $targetFile = $this->storageDir . '/' . $fileName;

            // validate file type
            $allowedTypes = ['image/jpg', 'image/jpeg', 'image/png', 'application/pdf'];
            if (!in_array($file['type'], $allowedTypes)) {
                throw new Exception("File Upload Error: Invalid file type for {$file['name']}");
            }

            // validate file size
            if ($file['size'] > 5 * 1024 * 1024) {
                throw new Exception("File Upload Error: File {$file['name']} exceeds the maximum allowed size");
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
                }
            }

            throw new Exception("File Upload Error: Failed to move uploaded file.");
            
        } catch (Exception $e) {
            $this->view('exception', $e);
        }
    }
}
