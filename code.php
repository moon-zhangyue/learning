<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2022/2/6 下午8:37
 * Module: code.php
 * Please No Garbage Code!
 */

/*
 * 输出：true3
简析：表达式从左到右依次执行
 * */
if (($a = 1) & ($a == 1) & ($a = 3)) {
    echo 'true', $a;
    die;
}
echo 'false', $a;

/*
 * 输出：false3
简析：即使前面已经为 false, 后面的表达式依旧会执行。
 * */
if (false & ($a = 3)) {
    echo 'true', $a;die;
}
echo 'false', $a;