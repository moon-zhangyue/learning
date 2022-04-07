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


//$res = $redis->hSet('user1', 'age', 26);
//$res = $redis->hSet('user1', 'name', 'hahaha');
//var_dump($res);

$res = $redis->hGet('user1', 'age');
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
var_dump($redis->zAdd('zset', 1, 'a', 2, 'b')); //添加score和element
var_dump($redis->zrank('zset','b')); //返回元素排名