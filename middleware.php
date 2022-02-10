<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2022/2/10 13:57
 * Module: middleware.php
 */

$step1 = function ($next) {
    echo "第一步：过滤小石头" . PHP_EOL;
    $next();
};

$step2 = function ($next) {
    echo "第二步：过滤细沙" . PHP_EOL;
    $next();
};

$step3 = function ($next) {
    echo "第三步：过滤细菌" . PHP_EOL;
    $next();
};

$success = function () {
    echo "最后：输出纯净水" . PHP_EOL;
};

$callback = function ($next, $step) {
    return function () use ($next, $step) {
        return $step($next);
    };
};

$middleWares = [
    $step1,
    $step2,
    $step3
];

$middleWares = array_reverse($middleWares); //将数组元素顺序反转

call_user_func(
    array_reduce($middleWares, $callback, $success)
);
//第一步：过滤小石头 第二步：过滤细沙 第三步：过滤细菌 最后：输出纯净水

/*array_reduce
array_reduce ( array $array , callable $callback [, mixed $initial = NULL ] ) : mixed
array_reduce () 将回调函数 callback 迭代地作用到 array 数组中的每一个单元中，从而将数组简化为单一的值。

解释挺不容易明白，$array 就是中间件数组；$callback 见上面的 $callback 变量，永远返回一个闭包函数；$initial 意思是 init 初始值，也就是最终的目的「输出净水」$success。*/

//模拟 laravel 中间件
interface MiddleWare
{
    public static function handle(Closure $next);
}

class StartSession implements MiddleWare
{
    public static function handle(Closure $next)
    {
        echo '开启 session' . '<br>';
        $next();
        echo '关闭 session' . '<br>';
    }
}

class AddQueuedCookiesToResponse implements MiddleWare
{
    public static function handle(Closure $next)
    {
        $next();
        echo '添加下一次请求的token' . "<br>";
    }
}

class EbcryptCookies implements MiddleWare
{
    public static function handle(Closure $next)
    {
        echo '对 cookie 加密' . '<br>';
        $next();
        echo '对 cookie 解密' . '<br>';
    }
}


function getSlice()
{
    return function ($stack, $pipe) {
        return function () use ($stack, $pipe) {
            return $pipe::handle($stack);
        };
    };
}

function then()
{
    $pipes = [
        'EbcryptCookies',               //加密请求cookie
        'AddQueuedCookiesToResponse',   //添加下一次请求需要的cookie
        'StartSession',                 //开启session
    ];

    $firstSlice = function () {
        echo '请求向路由器传递，返回相应' . '<br>';
    };

    $pipes = array_reverse($pipes);

    call_user_func(
        array_reduce($pipes, getSlice(), $firstSlice)
    );
}

then();
/*
    对 cookie 加密
    开启 session
    请求向路由器传递，返回相应
    关闭 session
    添加下一次请求的token
    对 cookie 解密
*/