<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2022/4/12 19:15
 * Module: producer.php
 */
require_once './vendor/php-amqplib/php-amqplib/PhpAmqpLib/Connection/AMQPStreamConnection.php';

// 设置交换机名、路由键、队列名
$_conf = [
    'exchange_name' => 'exchange_test',
    'route_key'     => 'hello',
    'queue_name'    => 'test',
];

// 连接 rabbitmq 服务
$connection = new \PhpAmqpLib\Connection\AMQPStreamConnection('127.0.0.1', 15672, 'test', 'test');

// 获取信道
$channel = $connection->channel();

// 创建消息
$data = "{$_conf['exchange_name']}#{$_conf['route_key']}#{$_conf['queue_name']} " . date('H:i:s');

$msg = new \PhpAmqpLib\Message\AMQPMessage($data);

// 发送消息
$channel->basic_publish($msg, $_conf['exchange_name'], $_conf['route_key']);

// 关闭信道和连接
$channel->close();
$connection->close();