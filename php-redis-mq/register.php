<?php
/*
 * 主业务主要功能是接收两个参数:姓名和手机号,将这两个参数作为用户信息写入用户表,写入成功后插入一条消息到消息队列register_users,并且发送消息OK到频道register_success,主要代码如下:
 * */

require './lib.php';
$name   = $argv[1];
$mobile = $argv[2];
if (empty($name) || empty($mobile)) {
    die("参数错误");
}
$connection = getDBConnection('127.0.0.1', 'root', '', 'mq');
// 开启事务
mysqli_begin_transaction($connection);
$sql = "insert into mq_user(name, mobile) values ('$name', '$mobile')";
if (!mysqli_query($connection, $sql)) {
    die("写入用户信息失败,原因:" . $connection->error);
}
$redis = getRedis();
// 添加消息
$result = $redis->lpush('register_users', json_encode(array('name' => $name, 'mobile' => $mobile), JSON_UNESCAPED_UNICODE));
if ($result === false) {
    mysqli_rollback($connection);
    die("添加消息队列失败");
}
// 发布消息
$res = $redis->publish('register_success', 'ok'); //返回值-接收到信息的订阅者数量。
//应该根据$res 判断是否有订阅者

// 所有操作完成后提交事务
mysqli_commit($connection);
$connection->close();
$redis->close();