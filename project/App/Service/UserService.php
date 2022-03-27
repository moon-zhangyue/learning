<?php

namespace App\Service;

class UserService
{
    public function getUserInfo(UserRepository $userRepository)
    {
        return $this->userRepository->getUserInfo($data);
    }

    public function register()
    {
        return (new CreateUser())->execute($this->request->all());
    }
}


