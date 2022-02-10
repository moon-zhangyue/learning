## About

这个项目是使用 [php-resque](https://github.com/chrisboulton/php-resque) 做的轻量级MQ,仅仅用于测试说明,没有实际业务

## 使用

1. 安装扩展

```
vagrant@homestead:~/code/php-resque-mq$ composer install
```

2. 配置 `register.php` 中的数据库和Redis链接

3. 导入sql文件 `mq_user.sql`

4. 执行主业务并将Job插入队列

```
vagrant@homestead:~/code/php-resque-mq$ php register.php [姓名] [手机号]
```

5. 查看任务状态

```
vagrant@homestead:~/code/php-resque-mq$ php status 26bf81f1943d1a940ffd68a287a7d16c
```

6 启动Worker

```
QUEUE=sms LOGLEVEL=2 php worker.php
```

## 运行结果

![](https://qiniu.blog.lerzen.com/75ef3010-bd84-11e8-a59d-6d4df176b9c8.gif)