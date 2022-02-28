<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2022/2/23 22:11
 * Module: trait.php
 */


/*trait Hello
{
    public function sayHello()
    {
        echo 'Hello ';
    }
}

trait World
{
    public function sayWorld()
    {
        echo 'World';
    }
}

class MyHelloWorld
{
    use Hello, World;

    public function sayExclamationMark()
    {
        echo '!';
    }
}

$o = new MyHelloWorld();
$o->sayHello();
$o->sayWorld();
$o->sayExclamationMark();*/


trait Cat
{
    public function eat()
    {
        echo "This is Cat eat";
    }
}

trait Dog
{
    use Cat;

    public function drive()
    {
        echo "This is Dog drive";
    }

    abstract public function getName();

    public function test()
    {
        static $num = 0;
        $num++;
        echo $num;
    }

    public static function say()
    {
        echo "This is Dog say";
    }
}

class animal
{
    use Dog;

    public function getName()
    {
        echo "This is animal name";
    }
}

$animal = new animal();
$animal->getName();
echo "<br/>";
$animal->eat();
echo "<br/>";
$animal->drive();
echo "<br/>";
$animal::say();
echo "<br/>";
$animal->test();
echo "<br/>";
$animal->test();
