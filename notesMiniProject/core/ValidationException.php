<?php

namespace Core;

use Exception;

class ValidationException extends Exception
{
    public readonly array $errors;
    public readonly string $email;

    public function __construct(array $errors, string $email)
    {
        parent::__construct('Validation failed');
        $this->errors = $errors;
        $this->email = $email;
    }
}
