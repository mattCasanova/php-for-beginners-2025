<?php

namespace Core;

class Authenticator
{
    protected $errors = [];

    public function attempt(string $email, string $password): bool
    {
        $this->errors = [];
        // Check if the user exists
        $user = App::resolve(Database::class)->query('select * from users where email = :email', [
            'email' => $email
        ])->find();

        if (! $user || ! password_verify($password, $user['password'])) {
            $this->errors['email'] = 'No user with that email address or the password is incorrect';
            return false;
        }

        $this->login($user);
        return true;
    }

    private function login($user)
    {
        // mark the user as logged in
        $_SESSION['user'] = [
            'email' => $user['email'],
        ];

        // Regenerate the session ID to prevent session fixation attacks
        session_regenerate_id(true);
    }

    public function logout()
    {
        $_SESSION = [];
        session_destroy();

        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

}
