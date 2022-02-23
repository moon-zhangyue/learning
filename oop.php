<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2022/2/23 21:57
 * Module: oop.php
 */

/**
 * parent　只能调用父类中的公有或受保护的方法，不能调用父类中的属性
 * self 　可以调用父类中除私有类型的方法和属性外的所有数据
 */
class User
{
    public $name;
    private $passwd;
    protected $email;

    public function __construct()
    {
        //print __CLASS__." ";
        $this->name   = 'simple';
        $this->passwd = '123456';
        $this->email  = 'bjbs_270@163.com';
    }

    public function show()
    {
        print "good ";
    }

    public function inUserClassPublic()
    {
        print __CLASS__ . '::' . __FUNCTION__ . " ";
    }

    protected function inUserClassProtected()
    {
        print __CLASS__ . '::' . __FUNCTION__ . " ";
    }

    private function inUserClassPrivate()
    {
        print __CLASS__ . '::' . __FUNCTION__ . " ";
    }
}

class simpleUser extends User
{
    public function __construct()
    {
        //print __CLASS__." ";
        parent::__construct();
    }

    public function show()
    {
        print $this->name . "//public ";
        print $this->passwd . "//private ";
        print $this->email . "//protected ";
    }

    public function inSimpleUserClassPublic()
    {
        print __CLASS__ . '::' . __FUNCTION__ . " ";
    }

    protected function inSimpleUserClassProtected()
    {
        print __CLASS__ . '::' . __FUNCTION__ . " ";
    }

    private function inSimpleUserClassPrivate()
    {
        print __CLASS__ . '::' . __FUNCTION__ . " ";
    }
}

class adminUser extends simpleUser
{
    protected $admin_user;

    public function __construct()
    {
        //print __CLASS__." ";
        parent::__construct();
    }

    public function inAdminUserClassPublic()
    {
        print __CLASS__ . '::' . __FUNCTION__ . " ";
    }

    protected function inAdminUserClassProtected()
    {
        print __CLASS__ . '::' . __FUNCTION__ . " ";
    }

    private function inAdminUserClassPrivate()
    {
        print __CLASS__ . '::' . __FUNCTION__ . " ";
    }
}

class administrator extends adminUser
{
    public function __construct()
    {
        parent::__construct();
    }
}

/**
 * 在类的实例中 只有公有属性和方法才可以通过实例化来调用
 */
$s = new administrator();
print '-------------------';
$s->show();