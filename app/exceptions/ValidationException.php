<?php

class ValidationException extends \Exception
{
    private $errors;

    public function __construct($message, $errors)
    {
        parent::__construct($message);
        $this->errors = $errors;
    }

    public function getErrors()
    {
        return $this->errors;
    }
}