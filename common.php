<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2022/4/1 16:14
 * Module: common.php
 */

$substr    = substr('henghenghaha', 0, 5);
$cn_substr = substr('这是字符串', 0, 6);
var_dump($substr);
var_dump($cn_substr);

$bodytag = str_replace("%body%", "black", "<body text='%body%'>");
echo $bodytag;

$mystring = 'abc';
$findme   = 'a';
$pos      = strpos($mystring, $findme);
var_dump($pos);

//模式分隔符后的"i"标记这是一个大小写不敏感的搜索
if (preg_match("/php/i", "PHP is the web scripting language of choice.")) {
    echo "A match was found.";
} else {
    echo "A match was not found.";
}

//如果你仅仅想要检查某个字符串是否包含另外一个字符串，不要使用preg_match()。 使用 strpos() 会更快。

$num      = 5;
$location = 'tree';

$format = 'There are %d monkeys in the %s';
echo sprintf($format, $num, $location);

$pattern     = '/(\w+) (\d+), (\d+)/i';
$replacement = '${1}1,$3';
$string      = 'April 15, 2003';
var_dump(preg_replace($pattern, $replacement, $string));