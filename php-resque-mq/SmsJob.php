<?php
require_once './lib.php';

class SmsJob{

    private $name;

    private $mobile;

    /**
     * 预处理
     */
    public function setUp(){
        $this->name = $this->args['name'];
        $this->mobile = $this->args['mobile'];
        stdout('新注册用户信息:');
        stdout('姓名:'.$this->name);
        stdout('手机号:'.$this->mobile);
    }

    /**
     * 具体任务
     */
    public function perform(){
        for($i=0;$i<10;$i++){
            if($i === 0){
                stdout('开始执行具体任务');
            }
            stdout('发送短信中--第'.($i+1).'秒');
            if($i === 10){
                stdout('任务执行完毕');
            }
            sleep(1);
        }
    }

    /**
     * 后续处理
     */
    public function tearDown(){
        stdout('任务执行完毕');
        stdout();
    }
}