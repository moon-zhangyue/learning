<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2022/4/29 9:10
 * Module: test.php
 */

$thread = new class extends Thread {
    public function run()
    {
        echo 'hello world' . PHP_EOL;
    }
};

print_r(get_class_methods($thread));