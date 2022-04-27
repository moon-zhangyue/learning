<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2022/4/11 21:31
 * Module: pcntl.php
 */

echo 'Master process id =' . posix_getpid() . PHP_EOL;

$childs = [];

function fork()
{
    global $childs;

    $pid = pcntl_fork();

    switch ($pid) {
        case -1:
            die('Create failed');
            break;
        case 0:
            //Child
            echo "Child process id = " . posix_getpid() . PHP_EOL;
//            sleep(2);
//            echo 'I will exit\n';

            while (true) {
                sleep(5);
            }
            break;
        default:
            //Parent
            $childs[$pid] = $pid;

//            if ($exit_id = pcntl_waitpid($pid, $status, WUNTRACED)) {
//                echo "Child({$exit_id}) exit_id \n";
//            }
            break;
    }
}

fork();
sleep(10);

