<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2022/3/27 20:57
 * Module: redis.php
 */

$redis = new Redis();

if (!$redis->connect('127.0.0.1', 6379)) {
    trigger_error('Redis连接出错！！！', E_USER_ERROR);
} else {
    echo '连接正常<br>';
}

$data = $redis->keys('*');
//var_dump($data);

//set操作
//$res = $redis->hSet('user1', 'age', 26);
//$res = $redis->hSet('user1', 'name', 'hahaha');
//var_dump($res);

$res = $redis->hGet('user1', 'age');
//var_dump($res);

//hash操作
//var_dump($redis->hGetAll('user1')); //返回hash key对应所有的field和value
//var_dump($redis->hVals('user1')); //返回hash key对应所有的field的value 没有field
//var_dump($redis->hExists('user1', 'name'));
//var_dump($redis->hLen('user1')); //	获取hash key field的数量
//var_dump($redis->hIncrBy('user1', 'age', 2));

//list操作
//var_dump($redis->rPush('list1', 'a', 'b', 'c'));
//var_dump($redis->lPush('list1', 'aa', 'bb', 'cc'));
//var_dump($redis->lRange('list1', 0, 5)); //获取列表指定索引范围所有item
//var_dump($redis->lRange('list1', 0, -1)); //获取列表指定索引范围所有item
//var_dump($redis->lPop('list1'));
//var_dump($redis->lSet('list1',5,'dddddddddd'));//设置列表指定索引值
//var_dump($redis->blPop('list1', 10)); //lpop阻塞版本,timeout超时时间
//var_dump($redis->lPop('list1'));

//var_dump($redis->lRange('list1', 0, -1)); //获取列表指定索引范围所有item
