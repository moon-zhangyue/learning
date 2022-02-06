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
} else {
    echo 'false', $a;
}

/*
 * 输出：false3
简析：即使前面已经为 false, 后面的表达式依旧会执行。
 * */
if (false & ($a = 3)) {
    echo 'true', $a;
} else {
    echo 'false', $a;
}


if (true & ($a = 1)) {
    echo 'true', $a;
} else {
    echo 'false', $a;
}
//输出：true1

if (true & ($a = 2)) {
    echo 'true', $a;
} else {
    echo 'false', $a;
}
//输出：false2

if (true & ($a = 3)) {
    echo 'true', $a;
} else {
    echo 'false', $a;
}
//输出：true3

if (true & ($a = 4)) {
    echo 'true', $a;
} else {
    echo 'false', $a;
}
//输出：false4

/*简析：一个 & 是按位“与”。
true 会转换成 1。
数字转换成二进制：
1 -> 1
2 -> 10
3 -> 11
4 -> 100

所以：
1 & 1 => 1 => true
1 & 10 => 0 => false
1 & 11 => 1 => true
1 & 100 => 0 => false*/