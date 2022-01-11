<?php
///*
///**
// * 接口
// */
//interface IDeviceWriter
//{
//    public function saveToDevice();
//}
//
///**
// * 高层
// */
//class Business
//{
//    /**
//     * @var IDeviceWriter
//     */
//    private $writer;
//
//    /**
//     * @param IDeviceWriter $writer
//     */
//    public function setWriter($writer)
//    {
//        $this->writer = $writer;
//    }
//
//    public function save()
//    {
//        $this->writer->saveToDevice();
//    }
//}
//
///**
// * 低层，软盘存储
// */
//class FloppyWriter implements IDeviceWriter
//{
//    public function saveToDevice()
//    {
//        echo __METHOD__;
//    }
//}
//
///**
// * 低层，USB盘存储
// */
//class UsbDiskWriter implements IDeviceWriter
//{
//    public function saveToDevice()
//    {
//        echo __METHOD__;
//    }
//}
//
//$biz = new Business();
//$biz->setWriter(new UsbDiskWriter());
//$biz->save(); // UsbDiskWriter::saveToDevice
//
//$biz->setWriter(new FloppyWriter());
//$biz->save(); // FloppyWriter::saveToDevice*/


class SomeComponent
{

    protected $_di;

    public function __construct($di)
    {
        $this->_di = $di;
    }

    public function someDbTask()
    {

        // 获得数据库连接实例
        // 总是返回一个新的连接
        $connection = $this->_di->get('db');

    }

    public function someOtherDbTask()
    {

        // 获得共享连接实例
        // 每次请求都返回相同的连接实例
        $connection = $this->_di->getShared('db');

        // 这个方法也需要一个输入过滤的依赖服务
        $filter = $this->_di->get('filter');

    }

}

$di = new Phalcon\DI();

//在容器中注册一个db服务
$di->set('db', function () {
    return new Connection(array(
        "host"     => "localhost",
        "username" => "root",
        "password" => "secret",
        "dbname"   => "invo"
    ));
});

//在容器中注册一个filter服务
$di->set('filter', function () {
    return new Filter();
});

//在容器中注册一个session服务
$di->set('session', function () {
    return new Session();
});

//把传递服务的容器作为唯一参数传递给组件
$some = new SomeComponent($di);

$some->someTask();