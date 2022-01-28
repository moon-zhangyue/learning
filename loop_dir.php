<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2022/1/26 14:44
 * Module: loop_dir.php
 * 快乐存心底❤
 */

//递归遍历文件夹及其子目录
//遍历文件夹及其子目录
/*
 * 遍历指定文件夹下的所有文件
 * @param1 string $dir,需要遍历的路径
*/
function myScandir($dir)
{
    //取出$dir中的所有文件
    $files = scandir($dir);
    //遍历输出
    foreach ($files as $file) {
        //判断输出
        if (is_dir($dir . '/' . $file)) {
            //路径:文件夹
            echo '<font color="blue">', $file, '</font><br/>';
            //文件夹下有子文件: . 和..除外
            if ($file != '.' && $file != '..') {
                //递归点
                myScandir($dir . '/' . $file);
            }
        } else {
            //文件
            echo '<font color="red">', $file, '</font><br/>';
        }
    }
    //递归出口
}

//调用
myScandir('./');


//php 递归实现遍历 用dir 返回对象
function loop($dir)
{
    $mydir = dir($dir);    //以对象的形式访问
    while ($file = $mydir->read()) {
        //目录中有隐藏文件'.'和'..' 遍历的时候须要注意
        if ((is_dir("$dir/$file")) && ($file != ".") && ($file != "..")) {
            echo $file . '</br>';
            loop("$dir/$file"); //递归循环
        } else {
            if ($file != ".." && $file != ".") {
                echo $file . "</br>";
            }
        }
    }
}

loop(dirname(__FILE__));   //dirname 去掉文件名返回目录名
