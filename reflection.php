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

// 返回对象属性的关联数组
var_dump(get_object_vars($student));
// 类属性
var_dump(get_class($student));
var_dump(get_class_vars(get_class($student)));
// 返回由类的方法名组成的数组
var_dump(get_class_methods(get_class($student)));

$obj       = new ReflectionClass('person');
$className = $obj->getName();
$Methods   = $Properties = array();
foreach ($obj->getProperties() as $v) {
    $Properties[$v->getName()] = $v;
}
foreach ($obj->getMethods() as $v) {
    $Methods[$v->getName()] = $v;
}
echo "class {$className}\n{\n";
is_array($Properties) && ksort($Properties);
foreach ($Properties as $k => $v) {
    echo "\t";
    echo $v->isPublic() ? ' public' : '', $v->isPrivate() ? ' private' : '',
    $v->isProtected() ? ' protected' : '',
    $v->isStatic() ? ' static' : '';
    echo "\t{$k}\n";
}
echo "\n";
if (is_array($Methods)) ksort($Methods);
foreach ($Methods as $k => $v) {
    echo "\tfunction {$k}(){}\n";
}
echo "}\n";

//输出如下
/*class person
{
	public gender
	public name
	function get(){}
	function set(){}
	function say(){}
}*/

//## 反射有什么作用
//反射可以用于文档生成。因此可以用它对文件里的类进行扫描，逐个生成描述文档。
//既然反射可以探知类的内部结构，那么是不是可以用它做hook实现插件功能呢？或者是做动态代理呢？
