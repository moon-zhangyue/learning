<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2022/2/16 下午10:50
 * Module: reflection.php
 * 反射
 */
class person
{
    public string $name;
    public string $gender;

    public function say()
    {
        echo $this->name, " \tis ", $this->gender, "\r\n";
    }

    public function set($name, $value)
    {
        echo "Setting $name to $value \r\n";
        $this->$name = $value;
    }

    public function get($name)
    {
        if (!isset($this->$name)) {
            echo '未设置';
            $this->$name = "正在为你设置默认值";
        }
        return $this->$name;
    }
}

$student = new person();

$student->name   = 'Tom';
$student->gender = 'male';
$student->age    = 24;

$reflect = new ReflectionObject($student);

$props = $reflect->getProperties();

foreach ($props as $prop) {
    print $prop->getName() . "\n";
}
// 获取对象方法列表
$m = $reflect->getMethods();
foreach ($m as $prop) {
    print $prop->getName() . "\n";
}