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

//groupBy 根据给定的函数对数组的元素进行分组。
function groupBy($items, $func): array
{
    $group = [];
    foreach ($items as $item) {
        if ((!is_string($func) && is_callable($func)) || function_exists($func)) {
            $key           = call_user_func($func, $item);
            $group[$key][] = $item;
        } elseif (is_object($item)) {
            $group[$item->{$func}][] = $item;
        } elseif (isset($item[$func])) {
            $group[$item[$func]][] = $item;
        }
    }

    return $group;
}

var_dump(groupBy(['one', 'two', 'three'], 'strlen')); // [3 => ['one', 'two'], 5 => ['three']]

//pluck检索给定键名的所有键值
function pluck($items, $key): array
{
    return array_map(function ($item) use ($key) {
        return is_object($item) ? $item->$key : $item[$key];
    }, $items);
}

pluck([
    ['product_id' => 'prod-100', 'name' => 'Desk'],
    ['product_id' => 'prod-200', 'name' => 'Chair'],
], 'name');
// ['Desk', 'Chair']

//pull修改原始数组以过滤掉指定的值。
function pull(&$items, ...$params): array
{
    $items = array_values(array_diff($items, $params));
    return $items;
}

$items = ['a', 'b', 'c', 'a', 'b', 'c'];
pull($items, 'a', 'c'); // $items will be ['b', 'b']


//reject使用给定的回调筛选数组。
function reject($items, $func): array
{
    return array_values(array_diff($items, array_filter($items, $func)));
}

reject(['Apple', 'Pear', 'Kiwi', 'Banana'], function ($item) {
    return strlen($item) > 4;
}); // ['Pear', 'Kiwi']

//remove从给定函数返回false的数组中删除元素。
function remove($items, $func): array
{
    $filtered = array_filter($items, $func);

    return array_diff_key($items, $filtered);
}

remove([1, 2, 3, 4], function ($n) {
    return ($n % 2) === 0;
});
// [0 => 1, 2 => 3]

//take返回一个数组，其中从开头删除了n个元素。
function take($items, $n = 1): array
{
    return array_slice($items, 0, $n);
}

take([1, 2, 3], 5); // [1, 2, 3]
take([1, 2, 3, 4, 5], 2); // [1, 2]

//without筛选出给定值之外的数组元素。
function without($items, ...$params): array
{
    return array_values(array_diff($items, $params));
}

without([2, 1, 2, 3, 5, 8], 1, 2, 8); // [3, 5]

//orderBy按键名对数组或对象的集合进行排序。
function orderBy($items, $attr, $order): array
{
    $sortedItems = [];
    foreach ($items as $item) {
        $key               = is_object($item) ? $item->{$attr} : $item[$attr];
        $sortedItems[$key] = $item;
    }
    if ($order === 'desc') {
        krsort($sortedItems);
    } else {
        ksort($sortedItems);
    }

    return array_values($sortedItems);
}

orderBy(
    [
        ['id' => 2, 'name' => 'Joy'],
        ['id' => 3, 'name' => 'Khaja'],
        ['id' => 1, 'name' => 'Raja']
    ],
    'id',
    'desc'
); // [['id' => 3, 'name' => 'Khaja'], ['id' => 2, 'name' => 'Joy'], ['id' => 1, 'name'=> 'Raja']

function average(...$items)
{
    $count = count($items);

    return $count === 0 ? 0 : array_sum($items) / $count;
}

var_dump(average(1, 2, 3)); // 2

function factorial($n)
{
    if ($n <= 1) {
        return 1;
    }

    return $n * factorial($n - 1);
}

//Examples
factorial(6); // 720

//最大公约数
function gcd(...$numbers)
{
    if (count($numbers) > 2) {
        return array_reduce($numbers, 'gcd');
    }

    $r = $numbers[0] % $numbers[1];
    return $r === 0 ? abs($numbers[1]) : gcd($numbers[1], $r);
}

//var_dump(gcd(8, 36)); // 4
var_dump(gcd(12, 8, 32)); // 4

//maxN从提供的数组中返回最大的数的个数。
function maxN($numbers): int
{
    $maxValue = max($numbers);
    $maxValueArray = array_filter($numbers, function ($value) use ($maxValue) {
        return $maxValue === $value;
    });

    return count($maxValueArray);
}
//Examples
var_dump(maxN([1, 2, 3, 4, 5, 5])); // 2
maxN([1, 2, 3, 4, 5]); // 1
