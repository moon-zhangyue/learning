<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2022/4/27 20:29
 * Module: callback.php
 */

/*回调函数*/

//函数字符串
/*function insert(int $i): bool
{
    echo "插入数据{$i}\n";//模拟数据库插入
    return true;
}

$arr = range(0, 1000);//模拟生成1001条数据
function action(array $arr, callable $function)
{
    foreach ($arr as $value) {
        if ($value % 10 == 0) {//当满足条件时,去执行回调函数处理
            call_user_func($function, $value);
        }
    }
}

action($arr, 'insert');*/

//匿名函数
/*$arr = range(0, 1000);//模拟生成1001条数据
function action(array $arr, callable $function)
{
    foreach ($arr as $value) {
        if ($value % 10 == 0) {//当满足条件时,去执行回调函数处理
            call_user_func($function, $value);
        }
    }
}

action($arr, function ($i) {
    echo "插入数据{$i}\n";//模拟数据库插入
    return true;
});*/

//类静态方法
/*$arr = range(0, 100);//模拟生成1001条数据
function action(array $arr, callable $function)
{
    foreach ($arr as $value) {
        if ($value % 10 == 0) {//当满足条件时,去执行回调函数处理
            call_user_func($function, $value);
        }
    }
}

class A
{
    static function insert(int $i): bool
    {
        echo "插入数据{$i}\n";//模拟数据库插入
        return true;
    }
}

action($arr, 'A::insert');
action($arr, array('A', 'insert'));*/

//类方法
/*$arr = range(0, 100);//模拟生成1001条数据
function action(array $arr, callable $function)
{
    foreach ($arr as $value) {
        if ($value % 10 == 0) {//当满足条件时,去执行回调函数处理
            call_user_func($function, $value);
        }
    }
}

class A
{
    public function insert(int $i): bool
    {
        echo "插入数据{$i}\n";//模拟数据库插入
        return true;
    }
}

$a = new A();
action($arr, array($a, 'insert'));*/

//匿名函数
function a($callback)
{
    return $callback();
}

$str1 = "hello,";
$str2 = "Tioncico,";
a(function () use ($str1, $str2) {
    echo $str1, $str2, "EasySwoole\n";
    return 1;
});