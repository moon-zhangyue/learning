<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2022/4/12 19:15
 * Module: consumer.php
 */
require_once './vendor/php-amqplib/php-amqplib/PhpAmqpLib/Connection/AMQPStreamConnection.php';

// 设置交换机名、路由键、队列名
$_conf = [
    'exchange_name' => 'exchange_test',
    'route_key'     => 'hello',
    'queue_name'    => 'test',
];

// 连接 rabbitmq 服务
$connection = new \PhpAmqpLib\Connection\AMQPStreamConnection('139.199.230.57', 5672, 'test', 'test');

// 获取信道
$channel = $connection->channel();

// 声明队列
$channel->queue_declare($_conf['queue_name']);

// 绑定队列
$channel->queue_bind($_conf['queue_name'], $_conf['exchange_name'], $_conf['route_key']);

// 定义回调函数
$callback = function ($msg) {
// 消息确认
    $msg->delivery_info['channel']->basic_ack($msg->delivery_info['delivery_tag']);

    if ($msg->body == 'quit') {
// 停止消费并退出
        $msg->delivery_info['channel']->basic_cancel($msg->delivery_info['consumer_tag']);
    } else {
        echo 'Hello ', $msg->body, PHP_EOL;
    }
};

// 消费者订阅队列
$channel->basic_consume($_conf['queue_name'],
    '',
    false,
    false,
    false,
    false,
    $callback);

// 开始消费
while (count($channel->callbacks)) {
    $channel->wait();
}

// 关闭信道和连接
$channel->close();
$connection->close();