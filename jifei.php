<?php

class testAction
{
    /**
     * 递归回调函数实现计费
     *
     * @param $start 开始时间戳
     * @param $end  结束时间戳
     * @param $price [{"start":"00:00:00","end":"12:00:00","price":1000},{"start":"12:00:00","end":"24:00:00","price":1500}]
     * @param $deep
     *
     * @return float
     */
    public function test($start, $end, $price, $deep)
    {
        global $total;
        if ($deep > 100) {
            log_message('info', '出现了超过100天的数据.' . __FUNCTION__ . '>>>' . $price);
            return $total;
        }
        //第一次的开始时间戳
        $at = strtotime(date('Y-m-d', $start) . ' ' . $price[0]['end']);//第一次的结束时间戳
        $et = strtotime(date('Y-m-d', $start) . ' ' . $price[1]['end']);//计费结束的时间戳

        if ($end >= $et) {
            $new_start = $et;
            $new_end   = $end;
            $deep      = $deep + 1;
            $end       = $et;
        }
        //1,开始时间，结束时间在第一段中
        if ($start < $at && $end <= $at) {
            $hour  = ceil(($end - $start) / 3600);
            $total += $price[0]['price'] * $hour;
        }
        //2,开始时间第一段，结束时间第二段
        if ($start < $at && $end > $at && $end <= $et) {
            $one   = ceil(($at - $start) / 3600) * $price[0]['price'];
            $two   = ceil(($end - $at) / 3600) * $price[1]['price'];
            $total += $one + $two;
        }

        //4,开始时间，结束时间都在第二段
        if ($start >= $at && $end <= $et) {
            $hour  = ceil(($end - $start) / 3600);
            $total += $price[1]['price'] * $hour;
        }

        if (isset($new_end) && isset($new_start)) {
            unset($start);
            unset($end);
            unset($at);
            unset($et);
            $this->test($new_start, $new_end, $price, $deep);
        }

        return $total;
    }
}
