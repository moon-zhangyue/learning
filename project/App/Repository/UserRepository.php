<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2022/3/15 7:43 下午
 * Module: UserRepository.php
 */

namespace App\Repository;

class UserRepository
{
    public function getUserInfo($data)
    {
        $userId = $data['user_id'];
        return User::where('id', $userId)->first();
    }
}

