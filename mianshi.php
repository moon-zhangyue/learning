<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2022/2/9 下午3:16
 * Module: mianshi.php
 * Please No Garbage Code!
 */

$a = [0, 1, 2, 3];
$b = [1, 2, 3, 4, 5];
$a += $b;
echo json_encode($a);
// + 会把$b中 $a已存在的键全部忽略

$count = 5;
function get_count(): int
{
    static $count = 0;
    return $count++;
}

++$count;
get_count();
echo get_count();