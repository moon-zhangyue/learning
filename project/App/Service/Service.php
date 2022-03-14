<?php

namespace App\Service;

class UserService
{

    public function register($data)
    {
        $username = $data['username'];
        $password = $data['password'];

        $password = encrypt($password);

        $user           = new User();
        $user->username = $username;
        $user->password = $password;
        $result         = $user->save();

        return $result;
    }

}

