<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2022/2/9 下午3:16
 * Module: mianshi.php
 * Please No Garbage Code!
 */

/*$a = [0, 1, 2, 3];
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


$a = [1, 2, 3];
foreach ($a as &$v) {

}
foreach ($a as $v) {

}
echo json_encode($a);

/*
 * 将一个或多个数组的单元合并起来，一个数组中的值附加在前一个数组的后面。返回作为结果的数组。
如果输入的数组中有相同的字符串键名，则该键名后面的值将覆盖前一个值。然而，如果数组包含数字键名，后面的值将 不会 覆盖原来的值，而是附加到后面。
如果输入的数组存在以数字作为索引的内容，则这项内容的键名会以连续方式重新索引
 * */
/*$a = ['10022' => 'mm', '10023' => 'dd'];
$b = ['p' => 1, 'q' => 2];

var_dump(array_merge($a, $b));

class person
{
    public string $lan;

    public function __construct($lan)
    {
        $this->lan = $lan;
    }

    public function speak()
    {
        echo $this->lan;
    }
}

$person = new person('中文');
$person->speak();

$person2      = $person;
$person2->lan = '英文';

$person2->speak();
$person->speak();*/

//内存
//var_dump(memory_get_usage());//获取内存方法，加上true返回实际内存，不加则返回表现内存
//$a = "a";
//$b = $a;
//$c = $a;
//var_dump(memory_get_usage()); //PHP的释放机制,程序还未运行完,此时的unset并为真正释放内存
//unset($a);
//var_dump(memory_get_usage());

//var_dump(memory_get_usage(true));//注意获取的是real_size
//$a = "laruence";
//var_dump(memory_get_usage(true));
//unset($a);
//var_dump(memory_get_usage(true));
//输出
//int 262144
//int 262144
//int 262144

//$a = "hello";
//定义变量时，存储两个方面：
//1.变量名，存储在符号表
//2.变量值存储在内存空间
//3.在删除变量的时候，会将变量值存储的空间释放，而变量名所在的符号表不会减小（只增不减）

//var_dump(memory_get_usage());
//for ($i = 0; $i < 100; $i++) {
//    $a  = "test" . $i;
//    $$a = "hello";
//}
//var_dump(memory_get_usage());
//for ($i = 0; $i < 100; $i++) {
//    $a = "test" . $i;
//    unset($$a);
//}
//var_dump(memory_get_usage());

//$a = 1;
//xdebug_debug_zval("a");
//echo PHP_EOL;//换行符，提高代码的源代码级可移植性

//$a = "new string";
//$c = $b = $a;
//xdebug_debug_zval('a');
//unset($b, $c);
//xdebug_debug_zval('a');

echo '测试字符串引用计数';
$a = "new string";
$b = $a;
xdebug_debug_zval('a');
unset($b);
xdebug_debug_zval('a');
$b = &$a;
xdebug_debug_zval('a');
echo '测试数组引用计数';
$c = array('a', 'b');
xdebug_debug_zval('c');
$d = $c;
xdebug_debug_zval('c');
$c[2] = 'c';
xdebug_debug_zval('c');
echo '测试int型计数';
$e = 1;
xdebug_debug_zval('e');
