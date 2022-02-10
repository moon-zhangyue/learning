<?php
require_once './lib.php';
require_once './vendor/autoload.php';

$token = $argv[1];
if(empty($token)){
    die("参数错误");
}
$obj = new Resque_Job_Status($token);
if(!$obj->isTracking()) {
    die("该任务没有设定状态跟踪");
}
while(true) {
    $status = $obj->get();
    $statusLabels = ['', '等待执行', '正在运行', '执行失败', '执行完毕'];
    stdout('任务['.$token.']的当前状态:'.$statusLabels[$status]);
    if($status == 4){
        break;
    }else{
        sleep(1);
    }
}