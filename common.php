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