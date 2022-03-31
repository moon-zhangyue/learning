<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2022/3/13 11:46 上午
 * Module: test.php
 */

require 'vendor/autoload.php';

use Elasticsearch\ClientBuilder;

$hosts  = [
    '192.168.16.241:9200',         // IP + Port
    '192.168.16.241',              // Just IP
    'localhost:9200', // Domain + Port
    'localhost',     // Just Domain
    'http://localhost',        // SSL to localhost
    'https://192.168.16.241:9200'  // SSL to IP + Port
];
$client = ClientBuilder::create()->setHosts($hosts)->build(); // Instantiate a new ClientBuilder  // Set the hosts

//$params = [
//    'index'  => 'test_data',
//    'type'   => 'users',
//    'id'     => 100027,
//    'client' => ['ignore' => 404]
//];

$params = [
    'index' => 'myindex', #index的名字不能是大写和下划线开头
    'body'  => [
        'settings' => [
            'number_of_shards'   => 2,
            'number_of_replicas' => 0
        ]
    ]
];
//$client->indices()->create($params);

$params = [
    'index'  => 'myindex',
    'body'   => 'settings',
    'id'     => 100027,
];

var_dump($client->get($params));