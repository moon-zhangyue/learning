<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2022/4/28 16:58
 * Module: dead.php
 */

$num = 1;
$str = "EasySwoole,Easy学swoole\n";
$pid = pcntl_fork();
if ($pid > 0) {//主进程代码
    echo "我是主进程,id是" . getmypid() . ",子进程的pid是{$pid}\n";
    pcntl_async_signals(true);
    pcntl_signal(SIGCHLD, function () {
        echo '子进程退出了,请及时处理' . PHP_EOL;
    });
    while (1) {//主进程一直不退出
        sleep(1);
    }

} elseif ($pid == 0) {
    echo "我是子进程,我的pid是" . getmypid() . "\n";
} else {
    echo "我是主进程,我慌得一批,开启子进程失败了\n";
}