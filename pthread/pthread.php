<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2022/4/29 9:04
 * Module: pthread.php
 */

file_put_contents(dirname(__FILE__) . '/1.txt', '1111', FILE_APPEND);

class test extends Thread
{
    public string $arg;

    public function __construct($arg)
    {
        $this->arg = $arg;
    }

    public function run()
    {
        file_put_contents(dirname(__FILE__) . '/1.txt', '3333', FILE_APPEND);
        $getCreatorId       = $this->getCreatorId();//创建当前线程的线程ID
        $getCurrentThreadId = Thread::getCurrentThreadId();//当前执行线程的ID
        $getThreadId        = $this->getThreadId();//引用线程的ID
        if ($this->arg) {
            if ($this->arg == 'World') {
                sleep(3);
            }
            echo "Hello" . $this->arg . '<br />
getCreatorId:' . $getCreatorId . '创建当前线程的线程ID<br />
getCurrentThreadId:' . $getCurrentThreadId . '当前执行线程的ID<br />
getThreadId:' . $getThreadId . '引用线程的ID<br />';
        }
    }
}

$thread = new test("World");
$thread->start();
$thread->join();
// var_dump($thread->isJoined());

// $thread2 = new test("World2");
// $thread2->start();
// $thread2->join();
file_put_contents(dirname(__FILE__) . '/1.txt', '2222', FILE_APPEND);

/*解析：整个程序的执行为主线程， $thread->start()的时候会自动执行Thread类的的run()方法，为子线程，子线程会在主线程执行完毕后执行（异步/非阻塞），若加上$thread->join()，则$thread->start()的时候会立即执行子线程，会影响主线程的后续执行（同步/阻塞）*/