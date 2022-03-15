<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2022/3/15 8:10 下午
 * Module: CreateUser.php
 */

namespace App\Action;

use App\Model\Member;

class CreateUser extends CreateUserWallet
{
    public function execute(array $data)
    {
        $models           = new Member();
        $models->tel      = $data['tel'];
        $models->password = $data['password'];

        return $models->save();
    }
}
