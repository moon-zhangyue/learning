<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2022/2/28 22:05
 * Module: interface.php
 */

/**
 * Connection interface
 */
interface ConnectionInterface
{
    public function getQueryClass(): string;

    public function table($table);

    public function name($name);
}

abstract class Connection implements ConnectionInterface
{
    public function table($table)
    {
    }
}

class Test extends Connection
{
    public function table($table)
    {
        echo $table;
    }

    public function name($name)
    {
        echo $name;
    }

    public function getQueryClass(): string
    {
        return 'aaaaa';
    }
}

$class = new Test();
$class->table('ddd');