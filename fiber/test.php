<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2022/4/29 13:53
 * Module: test.php
 */

$t1 = false;
$t2 = false;

$reg = [];

$reg[] = new \Fiber(function () use (&$t1) {
    for ($i = 1; $i < 10; $i++) {
        echo $i;
        echo PHP_EOL;
        \Fiber::suspend();
    }
    $t1 = true;
});

$reg[] = new \Fiber(function () use (&$t2) {
    for ($i = 1; $i < 10; $i++) {
        echo $i;
        echo PHP_EOL;
        \Fiber::suspend();
    }
    $t2 = true;
});

$startTag = true;

while (count($reg) > 1) {
    if ($startTag) foreach ($reg as $pI) {
        $pI->start();
        $startTag = false;
    }

    foreach ($reg as $pI) {
        $pI->resume();
    }

    if ($t1 === true && $t2 === true) {
        break;
    }
}