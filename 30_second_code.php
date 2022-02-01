<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2022/1/30 下午2:44
 * Module: 30_second_code.php
 * Please No Garbage Code!
 */

//排列
//all
//如果所提供的函数返回 true 的数量等于数组中成员数量的总和，则函数返回 true，否则返回 false。
function all($items, $func): bool
{
    return count(array_filter($items, $func)) === count($items);
}

//Examples
all([2, 3, 4, 5], function ($item) {
    return $item > 1;
}); // true


/*any
如果提供的函数对数组中的至少一个元素返回true，则返回true，否则返回false。*/

function any($items, $func): bool
{
    return count(array_filter($items, $func)) > 0;
}

//Examples
any([1, 2, 3, 4], function ($item) {
    return $item < 2;
}); // true


/*deepFlatten(深度平铺数组)
将多维数组转为一维数组*/
function deepFlatten($items): array
{
    $result = [];
    foreach ($items as $item) {
        if (!is_array($item)) {
            $result[] = $item;
        } else {
            $result = array_merge($result, deepFlatten($item));
        }
    }
    return $result;
}

var_dump(deepFlatten([1, [2], [[3], 4], 5])); // [1, 2, 3, 4, 5]


/*drop
返回一个新数组，并从左侧弹出n个元素。*/
function drop($items, $n = 1): array
{
    return array_slice($items, $n);
}

drop([1, 2, 3]); // [2,3]
var_dump(drop([1, 2, 3], 2)); // [3]
var_dump(array_slice([1, 2, 3], 2));

/*findLast
返回所提供的函数为其返回的有效值（即过滤后的值）的最后一个元素的键值（value）。*/
function findLast($items, $func)
{
    $filteredItems = array_filter($items, $func);

    return array_pop($filteredItems);
}

var_dump(findLast([1, 2, 3, 4], function ($n) {
    return ($n % 2) === 1;
}));
// 3

//findLastIndex 返回所提供的函数为其返回的有效值（即过滤后的值）的最后一个元素的键名（key）。
function findLastIndex($items, $func): int
{
    $keys = array_keys(array_filter($items, $func));

    return array_pop($keys);
}

findLastIndex([1, 2, 3, 4], function ($n) {
    return ($n % 2) === 1;
});
// 2