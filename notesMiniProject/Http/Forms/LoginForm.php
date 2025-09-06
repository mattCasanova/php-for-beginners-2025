<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm
{
    protected array $errors = [];

    public function validate(string $email, string $password): bool
    {
        $this->errors = [];
        if (! Validator::email($email)) {
            $this->errors['email'] = 'Email must be a valid email address';
        }
        if (! Validator::string($password, 255, 7)) {
            $this->errors['password'] = 'Please provide a valid password';
        }
        return empty($this->errors);
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}
