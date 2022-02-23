<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2022/2/23 17:19
 * Module: CaseClass.php
 */

spl_autoload_register(function ($className) {
    require_once 'TestClass' . '.php';
});

spl_autoload_register('CaseAutoLoad');
function CaseAutoLoad($className)
{
    echo "second==>\n";
    require_once 'CaseClass.php';
}

$testClass = new TestClass();
$testClass->print();

echo "还没实例化 CaseClass \n";

// 在这之前都没有执行第二个 spl_autoload_register函数 也就是利用闭包实现了懒加载