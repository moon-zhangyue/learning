<?php
$redis = new Redis();

//$res = $redis->connect('192.168.1.101', 6379);
$res = $redis->connect('127.0.0.1', 6379);

$redis->set('user:age:1',20);
$redis->set('user:age:2',20);
//var_dump($res);

