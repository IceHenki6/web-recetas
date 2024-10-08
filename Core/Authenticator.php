<?php

namespace Core;

class Authenticator
{
    public function attempt($email, $password)
    {
        $user = App::resolve(Database::class)
            ->query('SELECT * FROM users WHERE email = :email', [
                'email' => $email
            ])->find();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $this->login([
                    'email' => $email,
                    'username' => $user['username'],
                    'user_id' => $user['id']
                ]);

                return true;
            }
        }

        return false;
    }

    function login($user)
    {
        $_SESSION['user'] = [
            'email' => $user['email'],
            'username' => $user['username'],
            'user_id' => $user['user_id']
        ];

        session_regenerate_id(true);
    }

    function logout()
    {
        Session::destroy();
    }
}