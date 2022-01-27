<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2022/1/27 下午8:34
 * Module: coroutines.php
 * Please No Garbage Code!
 */

function xrange($start, $end, $step = 1)
{
    for ($i = $start; $i <= $end; $i += $step) {
        yield $i;
    }
}

foreach (xrange(1, 1000) as $num) {
    echo $num, "\n";
}