<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2022/2/8 下午8:34
 * Module: fork.php
 * Please No Garbage Code!
 */


//fork.php

$cmds = [
    './1.php',
    './code.php',
    './datetime.php'
];

foreach ($cmds as $cmd) {
    $pid = pcntl_fork();
    if ($pid == -1) {
        //进程创建失败
        echo '创建子进程失败时返回-1';
        exit(-1);
    } else if ($pid) {
        //父进程会得到子进程号，所以这里是父进程执行的逻辑
        pcntl_wait($status, WNOHANG);
    } else {
        //子进程处理逻辑
        echo getmypid(), " \r\n";
        sleep(20);// 保持20秒，确保能被ps查到

        pcntl_exec('/usr/local/php/bin/php', $cmd);
        exit(0);
    }
}

/*
 *
# php fork.php  //使用php cls模式执行运行fork.php
# ps aux | grep fork.php
root     61097  0.0  0.7 367880  7776 pts/1    S    14:22   0:00 php fork.php
root     61098  0.0  0.7 367880  7776 pts/1    S    14:22   0:00 php fork.php
root     61099  0.0  0.7 367880  7776 pts/1    S    14:22   0:00 php fork.php
root     61311  0.0  0.0 103268   872 pts/2    R+   14:22   0:00 grep --color fork.php
 *
 * */



