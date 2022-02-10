<?php
require './lib.php';
require './SmsJob.php';
require './vendor/autoload.php';

$name = $argv[1];
$mobile = $argv[2];
if(empty($name) || empty($mobile)){
    die("参数错误");
}
$connection = getDBConnection('127.0.0.1', 'homestead', 'secret', 'mq');
$sql = "insert into mq_user(name, mobile) values ('$name', '$mobile')";
if(!mysqli_query($connection, $sql)){
    die("写入用户信息失败,原因:".$connection->error);
}
$connection->close();
$token = Resque::enqueue('sms', SmsJob::class, array('name'=>$name, 'mobile'=>$mobile),true);
echo 'Job Token: '.$token.chr(10);