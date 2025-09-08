<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class AuthForm
{
    protected array $errors = [];
    protected string $email;
    protected string $password;

    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;

        if (! Validator::email($email)) {
            $this->errors['email'] = 'Email must be a valid email address';
        }
        if (! Validator::string($password, 255, 7)) {
            $this->errors['password'] = 'Please provide a valid password';
        }
    }

    public static function validate(string $email, string $password): AuthForm
    {
        $instance = new self($email, $password);

        if ($instance->hasErrors()) {
            $instance->throw();
        }

        return $instance;
    }

    public function hasErrors(): bool
    {
        return ! empty($this->errors);
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function addErrors(array $errors): AuthForm
    {
        $this->errors = array_merge($this->errors, $errors);
        return $this;
    }

    public function throw(): void
    {
        throw new ValidationException(
            $this->getErrors(),
            $this->email
        );
    }


}
