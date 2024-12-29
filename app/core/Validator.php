<?php

class Validator
{
    private $errors = [];
    private $data = [];
    private $files = [];

    public function validate(array $data, array $rules, array $files = [])
    {
        $this->data = $data;
        $this->files;
        $this->errors = [];

        foreach ($rules as $field => $fieldRules) {
            $value = $files[$field]['tmp_name'] ?? $data[$field] ?? null;
            $ruleset = is_string($fieldRules) ? explode('|', $fieldRules) : $fieldRules;

            foreach ($ruleset as $rule) {
                $isFileRule = in_array($rule, ['image', 'max_size', 'mime']);

                if (isset($files[$field]) || $isFileRule) {
                    $this->validateFile($field, $files[$field] ?? null, $rule);
                } else {
                    $this->applyRule($field, $value, $rule);
                }
            }
        }

        if (!empty($this->errors)) {
            throw new ValidationException('Validation failed', $this->errors);
        }

        return true;
    }

    private function applyRule($field, $value, $rule, ?array $fileInfo = null)
    {
        // Parse rule and parameters
        $parts = explode(':', $rule);
        $ruleName = $parts[0];
        $params = $parts[1] ?? null;

        if ($fileInfo !== null) {
            $this->validateFile($field, $fileInfo, $ruleName, $params);
            return;
        }

        switch ($ruleName) {
            case 'required':
                if ($value === null || $value === '') {
                    $this->errors[$field][] = "$field is required";
                }
                break;

            case 'integer':
                if ($value && !filter_var($value, FILTER_VALIDATE_INT)) {
                    $this->errors[$field][] = "$field must be an integer";
                }
                break;

            case 'email':
                if ($value && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->errors[$field][] = "$field must be a valid email";
                }
                break;

            case 'min':
                if (strlen($value) < $params) {
                    $this->errors[$field][] = "$field must be at least $params characters";
                }
                break;

            case 'max':
                if (strlen($value) > $params) {
                    $this->errors[$field][] = "$field must not exceed $params characters";
                }
                break;

            case 'unique':
                break;
        }
    }

    private function validateFile(string $field, array $fileInfo, string $ruleName, ?string $params = null): void
    {
        switch ($ruleName) {
            case 'required':
                if (empty($fileInfo['name'])) {
                    $this->addError($field, "$field file is required");
                }
                break;

            case 'max_size':
                $maxSizeInBytes = $this->parseFileSize($params);
                if ($fileInfo['size'] > $maxSizeInBytes) {
                    $this->addError($field, "$field file exceeds maximum size of " . $this->formatFileSize($maxSizeInBytes));
                }
                break;

            case 'mime':
                $allowedMimes = explode(',', $params);
                $fileMime = mime_content_type($fileInfo['tmp_name']);
                if (!in_array($fileMime, $allowedMimes)) {
                    $this->addError($field, "$field file must be of type: " . implode(', ', $allowedMimes));
                }
                break;

            case 'image':
                $imageMimes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
                $fileMime = mime_content_type($fileInfo['tmp_name']);
                if (!in_array($fileMime, $imageMimes)) {
                    $this->addError($field, "$field must be an image (jpeg, png, gif, webp)");
                }
                break;
        }
    }

    private function parseFileSize(string $size): int
    {
        $size = trim($size);
        $lastChar = strtoupper(substr($size, -1));
        $value = (int) substr($size, 0, -1);

        switch ($lastChar) {
            case 'G':
                return $value * 1024 * 1024 * 1024;
            case 'M':
                return $value * 1024 * 1024;
            case 'K':
                return $value * 1024;
            default:
                return (int) $size;
        }
    }

    private function formatFileSize(int $bytes): string
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $i = 0;
        while ($bytes >= 1024 && $i < 4) {
            $bytes /= 1024;
            $i++;
        }
        return round($bytes, 2) . ' ' . $units[$i];
    }

    private function addError(string $field, string $message): void
    {
        $this->errors[$field][] = $message;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function fails(): bool
    {
        return !empty($this->errors);
    }
}