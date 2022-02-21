<?php
declare(strict_types=1);

/**
 * 定义一个支持联合类型的 Number 类
 */
class Number
{
    private int|float $number;

    public function setNumber(int|float $number): void
    {
        $this->number = $number;
    }

    public function getNumber(): int|float
    {
        return $this->number;
    }
}

/**
 * 我们可以传递浮点型和整型值到 Number 对象
 */
$number = new Number();

$number->setNumber(5);

var_dump($number->getNumber());

$number->setNumber(11.54);

var_dump($number->getNumber());

exit;