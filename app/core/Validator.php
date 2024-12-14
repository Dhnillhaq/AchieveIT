<?php

class Validator
{
    private $errors = [];
    private $data = [];

    public function validate(array $data, array $rules)
    {
        $this->data = $data;
        $this->errors = [];

        foreach ($rules as $field => $fieldRules) {
            $value = $data[$field] ?? null;
            $ruleset = explode('|', $fieldRules);

            foreach ($ruleset as $rule) {
                $this->applyRule($field, $value, $rule);
            }
        }

        if (!empty($this->errors)) {
            throw new ValidationException('Validation failed', $this->errors);
        }

        return true;
    }

    private function applyRule($field, $value, $rule)
    {
        // Parse rule and parameters
        $parts = explode(':', $rule);
        $ruleName = $parts[0];
        $params = $parts[1] ?? null;

        switch ($ruleName) {
            case 'required':
                if ($value === null || $value === '') {
                    $this->errors[$field][] = "$field is required";
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
}