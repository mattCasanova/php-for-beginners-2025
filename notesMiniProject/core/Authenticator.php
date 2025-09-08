<?php

namespace Core;

class Authenticator
{
    protected $errors = [];

    public function attemptLogin(string $email, string $password): bool
    {
        $this->errors = [];
        // Check if the user exists
        $user = $this->findUserByEmail($email);

        // If the user doesn't exist or the password is incorrect, return false
        if (! $user || ! password_verify($password, $user['password'])) {
            $this->errors['email'] = 'No user with that email address or the password is incorrect';
            return false;
        }

        // Log the user in
        $this->login($user);
        return true;
    }

    public function attemptRegister(string $email, string $password): bool
    {
        $this->errors = [];
        // Check if the user already exists
        $user = $this->findUserByEmail($email);
        if ($user) {
            $this->errors['email'] = 'A user with that email address already exists';
            return false;
        }

        // Insert the new user into the database
        App::resolve(Database::class)->query('insert into users (email, password) values (:email, :password)', [
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT)
        ]);

        // Log the user in
        $this->login([
            'email' => $email,
        ]);
        return true;
    }

    private function findUserByEmail(string $email)
    {
        return App::resolve(Database::class)->query('select * from users where email = :email', [
            'email' => $email
        ])->find();
    }

    private function login($user)
    {
        // mark the user as logged in
        Session::put('user', [
            'email' => $user['email'],
        ]);

        // Regenerate the session ID to prevent session fixation attacks
        session_regenerate_id(true);
    }

    public function logout()
    {
        Session::destroy();
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

}
