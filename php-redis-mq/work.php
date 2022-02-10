<?php
/*
 * Worker的主要功能是订阅频道register_success,如果收到消息且消息内容是OK就从队列register_users获取并消费消息
 * */
require './lib.php';
$redis = getRedis();

//启动时，优先检查是否有残存数据
//$list = $redis->lrange('register_users', 0, -1);
$arr = $redis->rPop('register_users');
//判断队列中是否有数据--避免work.php进程中断后在进入无法处理遗留数据

//TODO 错误处理
while ($arr != null) {
    $userInfo = json_decode($arr, true);
    stdout("新注册用户信息:");
    stdout("姓名:" . $userInfo['name']);
    stdout("手机号:" . $userInfo['mobile']);
    stdout();

    $arr = $redis->rPop('register_users');
}

//Redis Subscribe 命令用于订阅给定的一个或多个频道的信息
$redis->subscribe(['register_success'], function ($instance, $channelName, $message) {
    $redis = getRedis();

    if ($channelName == "register_success" && $message = "ok") {//订阅接收成功
        $arr = $redis->brPop(['register_users'], 20);//Redis Brpop 命令移出并获取列表的最后一个元素， 如果列表没有元素会阻塞列表直到等待超时或发现可弹出元素为止。
        if (count($arr)) {
            $userInfo = json_decode($arr[1], true);
            stdout("新注册用户信息:");
            stdout("姓名:" . $userInfo['name']);
            stdout("手机号:" . $userInfo['mobile']);
            stdout();
        }
    }
});