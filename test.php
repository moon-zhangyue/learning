<?php

/*class A
{
    public function add($i = 0, &$arr = [])
    {
        if ($i < 5) {
            $i++;

            array_push($arr, $i);

            $result = $this->add($i, $arr);
        }
        var_dump($arr);
        return $arr;
    }
}

$a   = new A;
$res = $a->add();

var_dump($res);*/

/*class Foo
{
    static $variable = "static property";
    static function variable()
    {
        echo "Method Variable called ";
    }
}

echo Foo::$variable; // 输出 'static property'.
echo "</pre>";
$variable = "variable";
Foo::$variable();  // 调用 $foo->variable()，输出“Method Variable called”*/


/*class Foo
{
    static function bar()
    {
        echo "bar\n";
    }

    function baz()
    {
        echo "baz\n";
    }
}

$func = ["Foo", "bar"];
$func(); // 输出 "bar"

$func = [new Foo, "baz"];
$func(); // 输出 "baz"

$func = "Foo::bar";
$func(); // 自 PHP 7.0.0 版本起会输出 "bar"; 在此之前的版本会引发致命错误*/


/*$message = 'hello';

// 没有 "use"
//$example = function () {
//    var_dump($message);
//};
//echo $example(); // PHP Notice:  Undefined variable: message

// 继承 $message
$example = function () use ($message) {
    var_dump($message);
};
//echo $example(); // string(5) "hello"

// 继承的变量的值来自于函数定义时，而不是调用时
$message = 'world';
echo $example(); // string(5) "hello"*/


//声明函数swap，作为下面匿名函数的回调函数
/*function swap(&$x, &$y)
{
    $temp = $x;
    $x    = $y;
    $y    = $temp;

    return;
}

//call_user_func调用的回调函数
function add($a, $b)
{
    return $a + $b;
}

//匿名函数，即不声明函数名称而使用一个变量来代替函数声明
$fuc = function ($fucName) {
    $x = 1;
    $y = 2;
    //调用回调函数
    $fucName($x, $y);
    echo 'x=' . $x . ',y=' . $y, "\n";

    //与$fucName($x, $y)相同效果
    //这里无法调用swap方法，因为swap方法是对参数引用传值
    //call_user_func与call_user_func_array都无法调用引用传参形式的函数
    echo call_user_func('add', $x, $y);
};

//调用 $fuc
$fuc('swap');*/


/*$var1 = 5;
$var2 = 10;

function foo(&$my_var)
{
    global $var1;
    $var1   += 2;
    $var2   = 4;
    $my_var += 3;
    return $var2;
}

$my_var = 5;
echo foo($my_var) . "\n";
echo $my_var . "\n";
echo $var1;
echo $var2;
$bar    = 'foo';
$my_var = 10;
echo $bar($my_var) . "\n";*/


//assert(1 == 2);


/*function my_assert_handler($file, $line, $code, $desc)
{
    echo "Assertion Failed:
    File '{$file}'
    Line '{$line}'
    Code '{$code}'
    Desc '{$desc}'
";
}

// 设置回调函数
assert_options(ASSERT_CALLBACK, 'my_assert_handler');

// 让一则断言失败
assert('1 == 2', '1 不可能等于 2');*/


//assert_options(ASSERT_EXCEPTION, 1); // 在断言失败时产生异常
//
//try {
//    // 用 AssertionError 异常替代普通字符串
//    assert(true == false, new AssertionError('True is not false!'));
//} catch (Throwable $e) {
//    echo $e->getMessage();
//}

/*try {
    assert('a +== 1');
} catch (Throwable $e) {
    echo $e->getMessage(), "\n";
}*/