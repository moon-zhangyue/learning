<?php

namespace App\Service;

use User;

class UserService
{

    public function register($data)
    {
        $username = $data['username'];
        $password = $data['password'];

        $password = encrypt($password);

        $user = new User();

        $user->username = $username;
        $user->password = $password;

        return $user->save();
    }

}

