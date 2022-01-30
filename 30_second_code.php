<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2022/1/30 下午2:44
 * Module: 30_second_code.php
 * Please No Garbage Code!
 */

//排列
//all
//如果所提供的函数返回 true 的数量等于数组中成员数量的总和，则函数返回 true，否则返回 false。
function all($items, $func)
{
    return count(array_filter($items, $func)) === count($items);
}

//Examples
all([2, 3, 4, 5], function ($item) {
    return $item > 1;
}); // true
