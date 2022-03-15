<?php

namespace App\Service;

class UserService
{
    public UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUserInfo($data)
    {
        return $this->userRepository->getUserInfo($data);
    }
}

