<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2022/3/27 20:57
 * Module: redis.php
 */
echo 1;
$redis = new Redis();

try {
    if(!$redis->connect('redis', 6379)){ //dnmp连接方式 具体情况请参考文档
        throw new Exception('Redis连接出错！！！'.E_USER_ERROR);
    }
    echo '连接正常<br>';
} catch (Exception $e) {
    echo $e->getMessage(); // 返回自定义的异常信息
}
//if (!$redis->connect('127.0.0.1', 6379)) {
//    trigger_error('Redis连接出错！！！', E_USER_ERROR);
//
//} else {
//    echo '连接正常<br>';
//}

$data = $redis->keys('*');
var_dump($data);


//$res = $redis->hSet('user1', 'age', 26);
//$res = $redis->hSet('user1', 'name', 'hahaha');
//var_dump($res);

//$res = $redis->hGet('user1', 'age');
//var_dump($res);

//hash操作
/*mapmap
small redis
field不能相同，value可以相同*/
//var_dump($redis->hGetAll('user1')); //返回hash key对应所有的field和value
//var_dump($redis->hVals('user1')); //返回hash key对应所有的field的value 没有field
//var_dump($redis->hExists('user1', 'name'));
//var_dump($redis->hLen('user1')); //	获取hash key field的数量
//var_dump($redis->hIncrBy('user1', 'age', 2));

//list操作
/*
 * 有序
可以重复
左右两边插入弹出
 * */
//var_dump($redis->rPush('list1', 'a', 'b', 'c'));
//var_dump($redis->lPush('list1', 'aa', 'bb', 'cc'));
//var_dump($redis->lRange('list1', 0, 5)); //获取列表指定索引范围所有item
//var_dump($redis->lRange('list1', 0, -1)); //获取列表指定索引范围所有item
//var_dump($redis->lPop('list1'));
//var_dump($redis->lSet('list1',5,'dddddddddd'));//设置列表指定索引值
//var_dump($redis->blPop('list1', 10)); //lpop阻塞版本,timeout超时时间
//var_dump($redis->lPop('list1'));

//var_dump($redis->lRange('list1', 0, -1)); //获取列表指定索引范围所有item


//set操作-Redis 的 Set 是 String 类型的无序集合。集合成员是唯一的，这就意味着集合中不能出现重复的数据。 Redis 中集合是通过哈希表实现的，所以添加，删除，查找的复杂度都是 O(1)。
//var_dump($redis->sAdd('set', 'a', 'b', 'c'));
//var_dump($redis->sAdd('set1', 'a', 'b', 'd'));
//var_dump($redis->srem('set', 'a', 'b', 'c'));//将集合key中的element移除掉
//var_dump($redis->sMembers('set'));
//var_dump($redis->sMembers('set1'));
//var_dump($redis->sCard('set')); //判断大小
//var_dump($redis->sIsMember('set', 'a')); //判断是否存在
//var_dump($redis->sRandMember('set', 2)); //随机挑选
//var_dump($redis->sDiff('set', 'set1')); //差集
//var_dump($redis->sInter('set', 'set1')); //交集
//var_dump($redis->sUnion('set', 'set1')); //并集

//srandmember不会破坏集合
//spop会破会
//smembers 返回的是无序集合，并且要注意量很大的时候回阻塞


//zset有序集合
/*Redis 有序集合和集合一样也是string类型元素的集合,且不允许重复的成员。不同的是每个元素都会关联一个double类型的分数。redis正是通过分数来为集合中的成员进行从小到大的排序。有序集合的成员是唯一的,但分数(score)却可以重复。*/
//var_dump($redis->zAdd('zset', 1, 'a', 2, 'b')); //添加score和element
//var_dump($redis->zrank('zset', 'b')); //返回元素排名

//Bitmap 位图
//var_dump($redis->set('hello', 'big'));
//var_dump($redis->getBit('hello', 0)); //获取位图指定索引的值
//var_dump($redis->setBit('hello', 0, 1)); //给位图指定索引设置值
//echo ($redis->get('hello'));
//$redis->set('hell','a');
//var_dump($redis->bitCount('hell', 0, 5)); //获取位图指定范围（start 到end，单位为字节，如果不指定就获取全部）位值为1的个数
//var_dump($redis->bitOp('and', 'hello', 'hell'));//做多个bitmap的and，or，not，xor操作并将结果保存在destkey中

//使用场景一:用户签到
//用户uid
/*$uid = 11;

//记录有uid的key
$cacheKey = sprintf("sign_%d", $uid);

//开始有签到功能的日期
$startDate = '2022-01-01';

//今天的日期
$todayDate = '2022-01-21';

//计算offset
$startTime = strtotime($startDate);
$todayTime = strtotime($todayDate);
$offset    = floor(($todayTime - $startTime) / 86400);
$offset = date('d', time());
echo "今天是第{$offset}天" . PHP_EOL;

//签到
//一年一个用户会占用多少空间呢？大约365/8=45.625个字节，好小，有木有被惊呆？
$redis->setBit($cacheKey, $offset, 1);

//查询签到情况
$bitStatus = $redis->getBit($cacheKey, $offset);
echo 1 == $bitStatus ? '今天已经签到啦' : '还没有签到呢';
echo PHP_EOL;

//计算总签到次数
echo $redis->bitCount($cacheKey) . PHP_EOL; */

/**
 * 计算某段时间内的签到次数
 * 很不幸啊,bitCount虽然提供了start和end参数，但是这个说的是字符串的位置，而不是对应"位"的位置
 * 幸运的是我们可以通过get命令将value取出来，自己解析。并且这个value不会太大，上面计算过一年一个用户只需要45个字节
 * 给我们的网站定一个小目标，运行30年，那么一共只需要1.31KB
 */
//这是个错误的计算方式
//echo $redis->bitCount($cacheKey, 0, 20) . PHP_EOL;

/*使用时间作为cacheKey，然后用户ID为offset，如果当日活跃过就设置为1
那么我该如果计算某几天/月/年的活跃用户呢(暂且约定，统计时间内只有有一天在线就称为活跃)，有请下一个redis的命令
命令 BITOP operation destkey key [key ...]
说明：对一个或多个保存二进制位的字符串 key 进行位元操作，并将结果保存到 destkey 上。
说明：BITOP 命令支持 AND 、 OR 、 NOT 、 XOR 这四种操作中的任意一种参数*/

//日期对应的活跃用户
/*$data = array(
    '2017-01-10' => array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10),
    '2017-01-11' => array(1, 2, 3, 4, 5, 6, 7, 8),
    '2017-01-12' => array(1, 2, 3, 4, 5, 6),
    '2017-01-13' => array(1, 2, 3, 4),
    '2017-01-14' => array(1, 2)
);

//批量设置活跃状态
foreach ($data as $date => $uids) {
    $cacheKey = sprintf("stat_%s", $date);
    foreach ($uids as $uid) {
        $redis->setBit($cacheKey, $uid, 1); //短的自动补0
    }
}

$redis->bitOp('AND', 'stat', 'stat_2017-01-10', 'stat_2017-01-11', 'stat_2017-01-12') . PHP_EOL;
//总活跃用户：6
echo "总活跃用户：" . $redis->bitCount('stat') . PHP_EOL;

$redis->bitOp('AND', 'stat1', 'stat_2017-01-10', 'stat_2017-01-11', 'stat_2017-01-14') . PHP_EOL;
//总活跃用户：2
echo "总活跃用户：" . $redis->bitCount('stat1') . PHP_EOL;

$redis->bitOp('AND', 'stat2', 'stat_2017-01-10', 'stat_2017-01-11') . PHP_EOL;
//总活跃用户：8
echo "总活跃用户：" . $redis->bitCount('stat2') . PHP_EOL;*/

//假设当前站点有5000W用户，那么一天的数据大约为50000000/8/1024/1024=6MB

/*使用场景三：用户在线状态
前段时间开发一个项目，对方给我提供了一个查询当前用户是否在线的接口。不了解对方是怎么做的，自己考虑了一下，使用bitmap是一个节约空间效率又高的一种方法，只需要一个key，然后用户ID为offset，如果在线就设置为1，不在线就设置为0，和上面的场景一样，5000W用户只需要6MB的空间。*/

//批量设置在线状态
/*$uids = range(1, 500000);
foreach ($uids as $uid) {
    $redis->setBit('online', $uid, $uid % 2);
}
//一个一个获取状态
$uids      = range(1, 500000);
$startTime = microtime(true);
foreach ($uids as $uid) {
    echo $redis->getBit('online', $uid) . PHP_EOL;
}
$endTime = microtime(true);
//在我的电脑上，获取50W个用户的状态需要25秒
echo "total:" . ($endTime - $startTime) . "s";*/

/**
 * 对于批量的获取，上面是一种效率低的办法，实际可以通过get获取到value，然后自己计算
 * 具体计算方法改天再写吧，之前写的代码找不见了。。。
 */

var_dump($redis->getBit('stat2', 0));
var_dump($redis->get('stat2'));

$bit = $redis->get('stat2');

$bitmap = unpack('C*', $bit); //二进制字符串对数据进行解包  C*unsigned char
var_dump($bitmap);

$hex_arr = unpack("H*", $bit); //十六进制字符串，高位在前
echo decbin(hexdec($hex_arr[1]));

$bitLength = strlen($bit);
while ($bitLength % 4 != 0) {
    $bitLength++;
}

$bit = str_pad($bit, $bitLength, pack('n', 0));
$bit = unpack('n*', $bit);

var_dump($bit);

