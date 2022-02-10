<?php
//$data = array('a', 'b', 'c');
//foreach ($data as $key => $val) {
//    $val = &$data[$key];
//    var_dump($val);
//    var_dump($data[$key]);
//}
//
//var_dump($data);


//class A
//{
//    function handleString($text, $column)
//    {
//        //对text进行处理
//        $info = preg_replace('/\n/', ';', trim($text));
//        var_dump($info);//'Apple,20,red;Pear,10,yellow'
//        $array = explode(';', $info);
//        var_dump($array);
////        array (
////            0 => string 'Apple,20,red'
////            1 => string 'Pear,10,yellow'
////        );
//        foreach ($array as $key => $va) {
//            $array[$key] = explode(',', $va);
//            $list[]      = array_combine($column, $array[$key]);
//        }
//        return $list;
//    }
//}
//
//$text = "Apple,20,red
//Pear,10,yellow
//";
//
//$columnNames = array('Fruit', 'Number', 'Color');
//
//$model = new A();
//$res   = $model->handleString($text, $columnNames);
//var_dump($res);

//如果所提供的函数返回 true 的数量等于数组中成员数量的总和，则函数返回 true，否则返回 false。
//function all($items, $func)
//{
////    array_filter() 函数用回调函数过滤数组中的元素。该函数把输入数组中的每个键值传给回调函数。如果回调函数返回 true，则把输入数组中的当前键值返回给结果数组。数组键名保持不变
//    return count(array_filter($items, $func)) === count($items);
//}
//
//$res = all([2, 3, 4, 5], function ($item) {
//    return $item > 1;
//}); // true
//
//var_dump($res);

//将多维数组转为一维数组
//function deepFlatten($items)
//{
//    $result = [];
//    foreach ($items as $item) {
//        if (!is_array($item)) {
//            $result[] = $item;
//        } else {
//            $result = array_merge($result, deepFlatten($item));
//        }
//    }
//
//    return $result;
//}
//
//$res = deepFlatten([1, [2], [[3], 4], 5]); // [1, 2, 3, 4, 5]
//var_dump($res);

//array_slice() 函数返回数组中的选定部分。
//返回一个新数组，并从左侧弹出n个元素。

//function drop($items, $n = 1)
//{
//    return array_slice($items, $n);
//}
//
//var_dump(drop([1, 2, 3])); // [2,3]
//var_dump(drop([1, 2, 3, 3, 4], 3)); // [3]

//析构函数
//class des{
//    function __destruct(){
//        echo "对象被销毁，执行析构函数<br>";
//    }
//}
//$p=new des(); /* 实例化类 */
//echo "程序开始<br>";
//unset($p); /* 销毁变量$p */
//echo "程序结束";

//class Test
//{
//    /* 保存未定义的对象变量 */
//    private $data = array();
//    public function __set($name, $value){
//        //在设置一个对象的属性时，若属性可以访问，则直接赋值；若不可以被访问，则调用__set 函数。
//        print('该属性没有定义去设定');
//        $this->data[$name] = $value;
//    }
//    public function __get($name){
//        //在访问类属性的时候，若属性可以访问，则直接返回；若不可以被访问，则调用__get 函数。
//        if(array_key_exists($name, $this->data))
//            print('该属性没有定义去获取');
//            return $this->data[$name];
//        return NULL;
//    }
//    public function __isset($name){
//        //当对不可访问的属性调用 isset() 或 empty() 时，__isset() 会被调用。
//        var_dump('该属性不存在isset');
//        return isset($this->data[$name]);
//    }
//    public function __unset($name){
//        //当对不可访问属性调用 unset() 时，__unset() 会被调用。
//        var_dump('该属性不存在unset');
//        unset($this->data[$name]);
//    }
//}
//$obj = new Test;
//$obj->a = 1;
//echo $obj->a . "\n";
//var_dump(isset($obj->a));
//unset($obj);

//function average(...$items)
//{
//    var_dump($items);//自动处理成数组
//    $count = count($items);
//
//    return $count === 0 ? 0 : array_sum($items) / $count;
//}
//
//echo average(1, 2, 3);
//$file_name = 'dir/upload.image.jpg';
//
//function get_ext1($file_name){
//    return strrchr($file_name, '.'); //strrchr() 函数查找字符串在另一个字符串中最后一次出现的位置，并返回从该位置到字符串结尾的所有字符。
//}
//
//function get_ext2($file_name){
//    return substr($file_name,strrpos($file_name, '.'));
//}
///*
//    strpos() - 查找字符串在另一字符串中第一次出现的位置（区分大小写）
//    stripos() - 查找字符串在另一字符串中第一次出现的位置（不区分大小写）
//    strripos() - 查找字符串在另一字符串中最后一次出现的位置（不区分大小写）
//*/
//
//function get_ext3($file_name){
//    return array_pop(explode('.', $file_name)); //array_pop() 函数删除数组中的最后一个元素并返回
//}
//
//function get_ext4($file_name){
//    $p = pathinfo($file_name);
//    var_dump($p);
//    /*
//     array (size=4)
//          'dirname' => string 'dir' (length=3)
//          'basename' => string 'upload.image.jpg' (length=16)
//          'extension' => string 'jpg' (length=3)
//          'filename' => string 'upload.image' (length=12)
//     * */
//    return $p['extension'];
//}
//
//function get_ext5($file_name){
//    return strrev(substr(strrev($file_name), 0,strpos(strrev($file_name), '.')));
//}
//
//var_dump(get_ext1($file_name));
//var_dump(get_ext2($file_name));
//var_dump(get_ext3($file_name));
//var_dump(get_ext4($file_name));
//var_dump(get_ext5($file_name));

//截取中文字符串无乱码
//function GBsubstr($string, $start, $length)
//{
//    if (strlen($string) > $length) {
//        $str = null;
//        $len = $start + $length;
//        for ($i = $start; $i < $len; $i++) {
//            if (ord(substr($string, $i, 1)) > 0xa0) {
//                $str .= substr($string, $i, 2);
//                $i++;
//            } else {
//                $str .= substr($string, $i, 1);
//            }
//        }
//        return $str . '...';
//    } else {
//        return $string;
//    }
//}
//
//echo GBsubstr('挺好的啊啊啊啊啊',1,2); //NO
//
//echo mb_substr('这样一来我的字符串就不会有乱码^_^', 0, 7, 'utf-8');//OK
//
//echo mb_strcut('这样一来我的字符串就不会有乱码^_^', 0, 7, 'utf-8');//OK
//
//echo substr('挺好的的框架爱我付款了法律框架',0,10).chr(0); //NO

//echo $_SERVER['REQUEST_URI'];

//PDO写法:
//try {
//    $dsn = "mysql:host=localhost;dbname=user";
//
//    $pdo = new PDO($dsn, 'root', '123456');
//
//    $pdo->query('set names utf8');
//
//    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//
//    $sql = "SELECT * FROM user WHERE name='张三'";
//
//    $result = $pdo->query($sql);
//
//    $data = $result->fetchAll();
//
//    foreach ($data as $v) {
//        echo $v['name'];
//    }
//} catch (PDOException $e) {
//    echo $e->getCode() . ':' . $e->getMessage();
//}
//
////Mysqli写法:
//$mysqli = new mysqli('localhost', 'root', '123456', 'user');
//
//If (mysqli_connect_errno()) {
//    die('连接数据库失败,' . mysqli_connect_error());
//}
//
//$mysqli->set_charset('utf8');
//
//$result = $mysqli->query("SELECT* FROM user WHERE name='张三'");
//
//If ($result && $row = mysqli_fetch_assoc($result)) {
//    echo $row['name'];
//}

//二维数组排序
//function array_sort($arr, $keys, $order = 0)
//{
//    if (!is_array($arr)) {
//        return false;
//    }
//
//    $keysvalue = array();
//
//    foreach ($arr as $key => $val) {
//        $keysvalue[$key] = $val[$keys];
//    }
//
//    if ($order == 0) {
//        asort($keysvalue);
//    } else {
//        arsort($keysvalue);
//    }
//    reset($keysvalue);
//
//    foreach ($keysvalue as $key => $vals) {
//        $keysort[$key] = $key;
//    }
//
//    $new_array = array();
//
//    foreach ($keysort as $key => $val) {
//        $new_array[$key] = $arr[$val];
//    }
//
//    return $new_array;
//}
//
//$array = [
//    [1, 2, 3, 7],
//    [6, 4, 9, 6]
//];
//var_dump(array_sort($array, 2));

//转化为小写并且排序
//function order_sort($str)
//{
//    $str = strtolower($str);
//
//    $arr = explode(' ',$str);
//
//    if(is_array($arr)){
//        sort($arr);
//
//        return $arr;
//    }else{
//        $arr = [];
//    }
//
//    return $arr;
//}
//
//$str = 'Apple Orange Banana Strawberry';
//
//var_dump(order_sort($str));

//对于用户输入一串字符串$string,要求$string中只能包含大于0的数字和英文逗号，请用正则表达式验证，对于不符合要求的$string返回出错信息
//class regx
//{
//    public static function check($str)
//    {
//        if (preg_match("/^([1-9,])+$/", $str)) {
//            return true;
//        }
//
//        return false;
//    }
//
//}
//
//$str = "12345,6";
//
//if (regx::check($str)) {
//    echo "suc";
//} else {
//    echo "fail";
//}

//昨天时间
//date_default_timezone_set('PRC');
//echo date('Y-m-d H:i:s',strtotime('-1 day',time()));
//echo date("Y-m-d H:i:s",time()-24*3600);

//$arr['res'] = array(
//    array('id' => '', 'name' => '请选择城市'),
//    array('id' => '1', 'name' => '岳麓区'),
//    array('id' => '2', 'name' => '芙蓉区'),
//    array('id' => '3', 'name' => '天心区'),
//    array('id' => '4', 'name' => '开福区'),
//    array('id' => '5', 'name' => '雨花区'),
//    array('id' => '6', 'name' => '长沙县'),
//    array('id' => '7', 'name' => '望城县'),
//    array('id' => '8', 'name' => '宁乡县')
//);
//$arr['statusCode'] = 200;
//
//echo json_encode($arr);
//$j = '';
//for ($i = 10; $i < 100; $i++) {
//    if ($i % 2 != 0 && $i % 3 != 0 && $i % 5 != 0 && $i % 7 != 0) {
//        $j .= $i.'-';
//    }
//}
//echo $j;

//$array[] = array("age" => 20, "name" => "li");
//$array[] = array("age" => 21, "name" => "ai");
//$array[] = array("age" => 20, "name" => "ci");
//$array[] = array("age" => 22, "name" => "di");
//
//foreach ($array as $key => $value) {
//    $age[$key]  = $value['age'];
//    $name[$key] = $value['name'];
//}
//var_dump($age);
//var_dump($name);
//array_multisort($age, SORT_NUMERIC, SORT_DESC, $name, SORT_STRING, SORT_ASC, $array);
//var_dump($array);


//class sort
//{
//    function array_sort($arr, $keys, $type = 'asc')
//    {
//        foreach ($arr as $k => $v) {
//            $id[$k] = $v['id'];
////            var_dump($id);
//            $key[$k] = $v[$keys];
////            var_dump($key);
//        }
////        var_dump($key);
//        var_dump($id);
////        var_dump($arr);
//
//        array_multisort($key, SORT_NUMERIC, SORT_DESC, $id, SORT_STRING, SORT_ASC, $arr);
////        array_multisort($arr);
//        return $arr;
//    }
//}

//$model = new sort();

//$a  = '[{"id":"178","idstr":"","account_id":"1","name":"\u6d4b\u8bd55\u65b9\u666e\u901a\u8d26\u53f71","remark":"","type":"2","status":"1","effect_time":"1513785600","due_time":"1545378861","add_time":"1513842861","up_time":"0","del_time":"0","maxsourcenum":"5","site_id":"1","state":"1","goods_id":"24","option_id":"70","h323":"0","h323_port_num":"0","occupy_h323_port":"0","isoccupy":1},{"id":"187","idstr":"","account_id":"1","name":"windows5\u65b9\u666e\u901a\u8d26\u53f7H323","remark":"","type":"2","status":"1","effect_time":"1513785600","due_time":"1545378861","add_time":"1513842861","up_time":"0","del_time":"0","maxsourcenum":"5","site_id":"1","state":"1","goods_id":"24","option_id":"70","h323":"1","h323_port_num":"20","occupy_h323_port":"0","isoccupy":1},{"id":"190","idstr":"","account_id":"1","name":"iOS5\u65b9\u666e\u901a\u8d26\u53f7H323","remark":"","type":"2","status":"1","effect_time":"1513785600","due_time":"1545378861","add_time":"1513842861","up_time":"0","del_time":"0","maxsourcenum":"5","site_id":"1","state":"1","goods_id":"24","option_id":"70","h323":"1","h323_port_num":"20","occupy_h323_port":"0","isoccupy":1}]';
//$aa = json_decode($a, true);

//var_dump($model->array_sort($aa, 'isoccupy', 'desc'));


//$b = '[{"id":"187","idstr":"","account_id":"1","name":"windows5\u65b9\u666e\u901a\u8d26\u53f7H323","remark":"","type":"2","status":"1","effect_time":"1513785600","due_time":"1545378861","add_time":"1513842861","up_time":"0","del_time":"0","maxsourcenum":"5","site_id":"1","state":"1","goods_id":"24","option_id":"70","h323":"1","h323_port_num":"20","occupy_h323_port":"0","isoccupy":1,"isused":0},{"id":"190","idstr":"","account_id":"1","name":"iOS5\u65b9\u666e\u901a\u8d26\u53f7H323","remark":"","type":"2","status":"1","effect_time":"1513785600","due_time":"1545378861","add_time":"1513842861","up_time":"0","del_time":"0","maxsourcenum":"5","site_id":"1","state":"1","goods_id":"24","option_id":"70","h323":"1","h323_port_num":"20","occupy_h323_port":"0","isoccupy":1,"isused":0},{"id":"178","idstr":"","account_id":"1","name":"\u6d4b\u8bd55\u65b9\u666e\u901a\u8d26\u53f71","remark":"","type":"2","status":"1","effect_time":"1513785600","due_time":"1545378861","add_time":"1513842861","up_time":"0","del_time":"0","maxsourcenum":"5","site_id":"1","state":"1","goods_id":"24","option_id":"70","h323":"0","h323_port_num":"0","occupy_h323_port":"0","isoccupy":1,"isused":0},{"id":"198","idstr":"","account_id":"1","name":"\u5fae\u8fea\u52a0\u5458\u5de530\u65b9\u5e76\u53d1\u8d26\u53f7","remark":"","type":"1","status":"1","effect_time":"1513785600","due_time":"1545383866","add_time":"1513847866","up_time":"0","del_time":"0","maxsourcenum":"30","site_id":"1","state":"1","goods_id":"30","option_id":"74","h323":"0","h323_port_num":"0","occupy_h323_port":"0","isoccupy":0,"isused":0},{"id":"191","idstr":"","account_id":"1","name":"windows30\u65b9\u5e76\u53d1\u8d26\u53f7","remark":"","type":"1","status":"1","effect_time":"1513785600","due_time":"1545379208","add_time":"1513843208","up_time":"0","del_time":"0","maxsourcenum":"30","site_id":"1","state":"1","goods_id":"30","option_id":"74","h323":"0","h323_port_num":"0","occupy_h323_port":"0","isoccupy":0,"isused":0},{"id":"181","idstr":"","account_id":"1","name":"Mac5\u65b9\u666e\u901a\u8d26\u53f7","remark":"","type":"2","status":"1","effect_time":"1513785600","due_time":"1545378861","add_time":"1513842861","up_time":"0","del_time":"0","maxsourcenum":"5","site_id":"1","state":"1","goods_id":"24","option_id":"70","h323":"0","h323_port_num":"0","occupy_h323_port":"0","isoccupy":0,"isused":0},{"id":"182","idstr":"","account_id":"1","name":"\u5b89\u53535\u65b9\u666e\u901a\u8d26\u53f7","remark":"","type":"2","status":"1","effect_time":"1513785600","due_time":"1545378861","add_time":"1513842861","up_time":"0","del_time":"0","maxsourcenum":"5","site_id":"1","state":"1","goods_id":"24","option_id":"70","h323":"0","h323_port_num":"0","occupy_h323_port":"0","isoccupy":0,"isused":0},{"id":"183","idstr":"","account_id":"1","name":"iOS5\u65b9\u666e\u901a\u8d26\u53f7","remark":"","type":"2","status":"1","effect_time":"1513785600","due_time":"1545378861","add_time":"1513842861","up_time":"0","del_time":"0","maxsourcenum":"5","site_id":"1","state":"1","goods_id":"24","option_id":"70","h323":"0","h323_port_num":"0","occupy_h323_port":"0","isoccupy":0,"isused":0},{"id":"184","idstr":"","account_id":"1","name":"\u6d4b\u8bd55\u65b9\u666e\u901a\u8d26\u53f7H3233","remark":"","type":"2","status":"1","effect_time":"1513785600","due_time":"1545378861","add_time":"1513842861","up_time":"0","del_time":"0","maxsourcenum":"5","site_id":"1","state":"1","goods_id":"24","option_id":"70","h323":"1","h323_port_num":"20","occupy_h323_port":"0","isoccupy":0,"isused":0},{"id":"185","idstr":"","account_id":"1","name":"\u6d4b\u8bd55\u65b9\u666e\u901a\u8d26\u53f7H3232","remark":"","type":"2","status":"1","effect_time":"1513785600","due_time":"1545378861","add_time":"1513842861","up_time":"0","del_time":"0","maxsourcenum":"5","site_id":"1","state":"1","goods_id":"24","option_id":"70","h323":"1","h323_port_num":"20","occupy_h323_port":"0","isoccupy":0,"isused":0},{"id":"186","idstr":"","account_id":"1","name":"\u6d4b\u8bd55\u65b9\u666e\u901a\u8d26\u53f7H3231","remark":"","type":"2","status":"1","effect_time":"1513785600","due_time":"1545378861","add_time":"1513842861","up_time":"0","del_time":"0","maxsourcenum":"5","site_id":"1","state":"1","goods_id":"24","option_id":"70","h323":"1","h323_port_num":"20","occupy_h323_port":"0","isoccupy":0,"isused":0}]';
//$bb = json_decode($b, true);
//var_dump($model->array_sort($bb, 'isoccupy', 'desc'));

//$start_date = date('Y-m');
//echo $start_date;
//var_dump(strtotime(date('Y-m')));
//$a = strtotime(date('Y-m')) - 1;
//var_dump($a);

//$b = date('Y-m-' . (28 + 1));
//var_dump($b);

//echo md5(hash('sha256',md5('wdj123456')));


//class star
//{
//    static public $count = 1;
//
//    function __construct()
//    {
//        echo "这是第", self::$count;
//        echo "次实例化", "";
//        self::$count += 1;
//    }
//}
//
//$xin = new star();
//$mao = new star();
//$xi  = new star();
//
//class start
//{
//    public $count = 1;
//
//    function __construct()
//    {
//        echo "这是第", $this->count;
//        echo "次实例化", "";
//        $this->count += 1;
//    }
//}
//
//$xin = new start();
//$mao = new start();
//$xi  = new start();


//$bool = TRUE;
//echo gettype($bool);
//echo is_string($bool);

//$a = array(1=>5,5=>8,22,2=>'8',81); var_dump($a);
//echo $a[7];
//echo $a[6];
//echo $a[3];
//echo $a['2'];

//$fruits = array('strawberry' => 'red', 'banana' => 'yellow');
//
//echo "A banana is {$fruits['banana']}";
//echo "A banana is $fruits['banana']";
//echo "A banana is {$fruits[banana]}";
//echo "A banana is $fruits[banana]";

//$BeginDate=date('Y-m-01', strtotime(date("Y-m-d")));
//echo $BeginDate;
//echo date('Y-m-d', strtotime("$BeginDate +1 month -1 day"));
//echo date( "Y-m-d H:i:s",mktime (0,0,0,date('n')+1,1,date('Y')));
//echo strtotime(date('Y-m-01', strtotime(date("Y-m-d"))));echo '<hr>';
//echo strtotime(date("Y-m-d H:i:s", mktime(0, 0, 0, date('n') + 1, 1, date('Y'))));

//$start_date = date('Y-m'); var_dump($start_date);
//$start_date = strtotime($start_date); var_dump($start_date);

//$x=87;
//$y=($x%7)*16; echo $y;
//$z=$x>$y?1:0;
//Echo $z;

//function myfunc($argument){
//    echo $argunment + 10;
//}
//$variable = 10;
//echo "myfunc($variable)=".myfunc($variable);

//$str="cd";
//$$str="abcde";
//$$str.="ok";
//echo $cd;

//$a = 5;
//$b = 7;
//if ($a = (3 || $b = 6)) {
//    var_dump($a);
//    $a++;
//    $b++;
//}
//var_dump($a);
//var_dump($b);

//$respondArr = explode('&@', "单引号&@双引号&@heredoc"); var_dump($respondArr);

//$a = ['单引号','双引号','heredoc',];//正确
//$b = ['单引号','双引号','ee'];//错误
//$c = array_diff($a, $b);  var_dump($c);

//$a = [1, 1];
//foreach ($a as $k=>&$v){
//    $v = 2;
//}
//var_dump($a);

//$str  = 'dd_dd';
//$qian = array(" ", "　", "\t", "\n", "\r", "-", '_');
//$hou  = array("", "", "", "", "", "", "");
//echo str_replace($qian, $hou, $str);

//$a = '15989380761‬'; var_dump($a);

//ob_start();//开启buffer缓冲区  php-cli下默认关闭buffer,由于web访问测试较麻烦,该段代码只为了查看以及测试缓冲区的作用,在web模式下,默认开启,无需手动开启,可自行配置
//for ($i = 0; $i < 1000; $i++) {
//    echo $i;
//    sleep(1);
//    if ($i % 10 == 0) {
//        //当i为10的倍数时,将直接结束并输出缓冲区的数据,然后再次开启缓冲区
//        ob_end_flush();
//        ob_start();
//    }
//}

//$i = 100;
//ob_start();//开启buffer缓冲区  php-cli下默认关闭buffer,由于web访问测试较麻烦,该段代码只为了查看以及测试缓冲区的作用,在web模式下,默认开启,无需手动开启,可自行配置
//while ($i > 0) {
//    echo $i . "\n";
//    $i--;
////    sleep(1);
//    if ($i % 2 == 0) {
//        echo 'T' . time() . "\n";
//        ob_end_flush();
//        ob_start();
//    }
//}
//echo 'ok';
//die;

//set_time_limit(0);
//ob_end_clean();
//ob_implicit_flush();
//header('X-Accel-Buffering: no'); // 关键是加了这一行。
//for ($i = 0; $i < 1000; $i++) {
//    echo $i;
//    sleep(1);
//}

//function createRange($number){
//    for($i=0;$i<$number;$i++){
//        yield time();
//    }
//}
//
//$result = createRange(10); // 这里调用上面我们创建的函数
//foreach($result as $value){
//    sleep(1);
//    echo $value.'<br />';
//}

/**
 * 计算平方数列
 *
 * @param $start
 * @param $stop
 *
 * @return Generator
 */
//function squares($start, $stop)
//{
//    if ($start < $stop) {
//        for ($i = $start; $i <= $stop; $i++) {
//            yield $i => $i * $i;
//        }
//    } else {
//        for ($i = $start; $i >= $stop; $i--) {
//            yield $i => $i * $i; //迭代生成数组： 键=》值
//        }
//    }
//}
//
//foreach (squares(3, 15) as $n => $square) {
//    echo $n . 'squared is' . $square . '<br>';
//}

//对某一数组进行加权处理
//$numbers = array('nike' => 200, 'jordan' => 500, 'adiads' => 800);
//
////通常方法，如果是百万级别的访问量，这种方法会占用极大内存
//function rand_weight($numbers)
//{
//    $total        = 0;
//    $distribution = [];
//    foreach ($numbers as $number => $weight) {
//        $total += $weight;
//
//        $distribution[$number] = $total;
//    }
//    $rand = mt_rand(0, $total - 1);
//
//    foreach ($distribution as $num => $weight) {
//        if ($rand < $weight) return $num;
//    }
//}

//改用yield生成器
//function mt_rand_weight($numbers) {
//    $total = 0;
//    foreach ($numbers as $number => $weight) {
//        $total += $weight;
//        yield $number => $total;
//    }
//}
//
//function mt_rand_generator($numbers)
//{
//    $total = array_sum($numbers);
//    $rand = mt_rand(0, $total -1);
//    foreach (mt_rand_weight($numbers) as $num => $weight) {
//        if ($rand < $weight) return $num;
//    }
//}

//登记回调函数
//function insert(int $i): bool
//{
//    echo "插入数据{$i}\n";//模拟数据库插入//响应回调事件
//    return true;
//}
//
//$arr = range(0, 1000);//模拟生成1001条数据
//function action(array $arr, callable $function)
//{
//    foreach ($arr as $value) {
//        if ($value % 10 == 0) {//当满足条件时,去执行回调函数处理//触发回调
//            call_user_func($function, $value);//调用回调事件
//        }
//    }
//}
//
//action($arr, 'insert');

//先引用后增加
//function _call($call){
//    //通过传参获取call_user_func传过来的参数
//    echo $call++,'<br/>';
//    echo $call++,"<br/>";
//
////    return 'OK';
//}
////上面回调函数没有返回值，所以，这里就没有返回值，_call为上面的函数的名称
//$re = call_user_func('_call',1);
////实验结果为 null，符合上面的结论
//var_dump($re);

//$arr = range(0, 1000);//模拟生成1001条数据
//function action(array $arr, callable $function)
//{
//    foreach ($arr as $value) {
//        if ($value % 10 == 0) {//当满足条件时,去执行回调函数处理
//            call_user_func($function, $value);
//        }
//    }
//}
//
//action($arr, function ($i) {
//    echo "插入数据{$i}\n";//模拟数据库插入
//    return true;
//});

//$arr = range(0, 10);//模拟生成1001条数据
//function action(array $arr, callable $function)
//{
//    foreach ($arr as $value) {
//        if ($value % 10 == 0) {//当满足条件时,去执行回调函数处理
////            var_dump($function);
//            $a = call_user_func($function, $value);
////            var_dump($a);
//        }
//    }
//}
//class A{
//    static function insert(int $i):bool {
//        echo "插入数据{$i}\n";//模拟数据库插入
//        return true;
//    }
//}
//action($arr,'A::insert');
//action($arr,array('A','insert'));

//function tick($callback)
//{
//    while (1) {//简单实现的定时器,每秒都去执行一次回调
//        call_user_func($callback);
//        sleep(1);
//    }
//}
//
//class Server
//{
//    //模拟退出一个服务
//    public function exitServer()
//    {
//        return true;
//    }
//}
//
//$server = new Server();
//$time   = time();
//tick(function () use ($server) {
//    var_dump(time()); //这样 比较明显易懂
//    $server->exitServer();
//});


//$fun = function ($name) {
//    printf("Hello %s\r\n", $name);
//};
//echo $fun('Tioncico');
//function a($callback)
//{
//    return $callback();
//}
//
//a(function () {
//    echo "EasySwoole\n";
//    return 1;
//});

//function a($callback)
//{
//    return $callback();
//}
//
//$str1 = "hello,";
//$str2 = "Tioncico,";
//a(function () use ($str1, $str2) {
//    echo $str1, $str2, "EasySwoole\n";
//    return 1;
//});


//测试php的多进程

//while (1)//循环采用3个进程
//{/*{{{*/
//    //declare(ticks=1);
//    $bWaitFlag = FALSE; // 是否等待进程结束
//    //$bWaitFlag = TRUE; // 是否等待进程结束
//    $intNum = 3; // 进程总数
//    $pids   = array(); // 进程PID数组
//    for ($i = 0; $i < $intNum; $i++) {
//        $pids[$i] = pcntl_fork();// 产生子进程，而且从当前行之下开试运行代码，而且不继承父进程的数据信息
//        /*if($pids[$i])//父进程
//        {
//            //echo $pids[$i]."parent"."$i -> " . time(). "\n";
//        }
//        */
//        if ($pids[$i] == -1) {
//            echo "couldn't fork" . "\n";
//        } elseif (!$pids[$i]) {
//            sleep(1);
//            echo "\n" . "第" . $i . "个进程 -> " . time() . "\n";
//            //$url=" 抓取页面的例子
//            //$content = file_get_contents($url);
//            //file_put_contents('message.txt',$content);
//            //echo "\n"."第".$i."个进程 -> " ."抓取页面".$i."-> " . time()."\n";
//            exit(0);//子进程要exit否则会进行递归多进程，父进程不要exit否则终止多进程
//        }
//        if ($bWaitFlag) {
//            pcntl_waitpid($pids[$i], $status, WUNTRACED);
//            echo "wait $i -> " . time() . "\n";
//        }
//    }
//    sleep(1);
//}/*}}}*/

//精度丢失
//$val1 = 945;
//echo $val1 % 100; //输出45
//$val    = 9.45;
//$result = $val * 100; //其实是44.9999999999
//echo $result % 100; //输出44


//当一个实现了Iterator接口的对象，被foreach遍历时，会自动调用这些方法。调用的循序是：
//rewind() -> valid() -> current() -> key() -> next()
//class Season implements Iterator
//{
//    private $position = 0;//指针指向0
//    private $arr = array('春', '夏', '秋', '冬');
//
//    public function rewind()
//    {
//        return $this->position = 0;
//    }
//
//    public function current()
//    {
//        return $this->arr[$this->position];
//    }
//
//    public function key()
//    {
//        return $this->position;
//    }
//
//    public function next()
//    {
//        ++$this->position;
//    }
//
//    public function valid()
//    {
//        return isset($this->arr[$this->position]);
//    }
//}
//
//$obj = new Season;
//foreach ($obj as $key => $value) {
//    echo $key . ':' . $value . "\n";
//}

//迭代器接口
//interface MyIterator{
//    //函数将内部指针设置回数据开始处
//    function rewind();
//
//    //函数将判断数据指针的当前位置是否还存在更多数据
//    function valid();
//
//    //函数将返回数据指针的值
//    function key();
//
//    //函数将返回当前数据指针的值
//    function value();
//
//    //函数在数据中移动数据指针的位置
//    function next();
//}

//迭代器类

//class ObjectIterator implements MyIterator{
//
//    private $obj;//对象
//
//    private $count;//数据元素的数量
//
//    private $current;//当前指针
//
//    function __construct($obj){
//
//        $this->obj = $obj;
//
//        $this->count = count($this->obj->data);
//    }
//
//    function rewind(){
//        $this->current = 0;
//    }
//
//    function valid(){
//        return $this->current < $this->count;
//    }
//
//    function key(){
//        return $this->current;
//    }
//
//    function value(){
//        return $this->obj->data[$this->current];
//    }
//
//    function next(){
//        $this->current++;
//    }
//
//}

//interface MyAggregate{
//    //获取迭代器
//    function getIterator();
//}

//class MyObject implements MyAggregate{
//
//    public $data = array();
//
//    function __construct($in){
//        $this->data = $in;
//    }
//
//    function getIterator(){
//        return new ObjectIterator($this);
//    }
//}

//迭代器的用法
//$arr = array(2,4,6,8,10);
//
//$myobject = new MyObject($arr);
//
//$myiterator = $myobject->getIterator();
//
//for($myiterator->rewind();$myiterator->valid();$myiterator->next()){
//
//    $key = $myiterator->key();
//
//    $value = $myiterator->value();
//
//    echo $key.'=>'.$value;
//
//    echo "<br/>";
//}

/*返回
  0=>2
  1=>4
  2=>6
  3=>8
  4=>10
*/

//class Test
//{
//    //获取 logger 的实体
//    private static $logger;
//
//    public static function getLogger()
//    {
//        return self::$logger ?: self::$logger = self::createLogger();
//    }
//
//    private static function createLogger()
//    {
//        return new Logger();
//    }
//
//    public static function setLogger(LoggerInterface $logger)
//    {
//        self::$logger = $logger;
//    }
//
//
//    public function __call($name, $arguments)
//    {
//        call_user_func_array([self::getLogger(), $name], $arguments);
//    }
//
//    public static function __callStatic($name, $arguments)
//    {
//        forward_static_call_array([self::getLogger(), $name], $arguments);
//    }
//}
//
//interface LoggerInterface
//{
//    function info($message, array $content = []);
//
//    function alert($messge, array $content = []);
//}
//
//class Logger implements LoggerInterface
//{
//    function info($message, array $content = [])
//    {
//        echo 'this is Log method info' . PHP_EOL;
//        var_dump($content);
//    }
//
//    function alert($messge, array $content = [])
//    {
//        echo 'this is Log method alert: ' . $messge . PHP_EOL;
//    }
//}
//
//Test::info('喊个口号:', ['好好', '学习', '天天', '向上']);
//$test = new Test();
//$test->alert('hello');

//接口使用关键字 interface 来定义，并使用关键字 implements 来实现接口中的方法，且必须完全实现。
//定义接口
//interface User
//{
//    function getDiscount();
//
//    function getUserType();
//}
//
////VIP用户 接口实现
//class VipUser implements User
//{
//    // VIP 用户折扣系数
//    private $discount = 0.8;
//
//    function getDiscount()
//    {
//        return $this->discount;
//    }
//
//    function getUserType()
//    {
//        return "VIP用户";
//    }
//}
//
//class Goods
//{
//    var $price = 100;
//    var $vc;
//
//    //定义 User 接口类型参数，这时并不知道是什么用户
//    function run(User $vc)
//    {
//        $this->vc = $vc;
//        $discount = $this->vc->getDiscount();
//        $usertype = $this->vc->getUserType();
//        echo $usertype . "商品价格：" . $this->price * $discount;
//    }
//}
//
//$display = new Goods();
//$display->run(new VipUser); //可以是更多其他用户类型

/*接口是特殊的抽象类，也可以看做是一个模型的规范。接口与抽象类大致区别如下：

1.一个子类如果 implements 一个接口，就必须实现接口中的所有方法（不管是否需要）；如果是继承一个抽象类，只需要实现需要的方法即可。

2.如果一个接口中定义的方法名改变了，那么所有实现此接口的子类需要同步更新方法名；而抽象类中如果方法名改变了，其子类对应的方法名将不受影响，只是变成了一个新的方法而已（相对老的方法实现）。

3.抽象类只能单继承，当一个子类需要实现的功能需要继承自多个父类时，就必须使用接口。*/


//$url = 'http://www.test.com.cn/abc/de/fg.php?id=1';
//
//$res = parse_url($url);
//var_dump($res);
//
//echo substr($res['path'],strpos($res['path'],'.')); //strops 查找 "php" 在字符串中第一次出现的位置  substr 按照位置截取
//
//echo end(explode('.',$res['path'])); //end()函数将数组内部指针指向最后一个元素，并返回该元素的值（如果成功）
//
//$arr = parse_url($url);
//$suffix = $arr['path'];
//echo array_pop(explode('.',$suffix));
//
//$suffix = array_pop(explode('.',$url));var_dump($suffix);
//var_dump(array_shift(explode('?',$suffix))); //删除数组中的第一个元素，并返回被删除的元素
//
//$suffix = pathinfo($url,PATHINFO_EXTENSION); var_dump($suffix);
//return array_shift(explode('?',$suffix));

////双向队列的实现
//class DoubleEndedQueue
//{
//    public $elements;
//
//    public function __construct()
//    {//构建函数,创建一个数组
//        $this->elements = array();
//    }
//
//    public function push($element)
//    {
//        array_unshift($this->elements, $element);//array_unshift() 函数在数组开头插入一个或多个元素。
//    }
//
//    public function pop()
//    {
//        return array_shift($this->elements);//PHP array_shift() 函数删除数组中的第一个元素_
//    }
//
//    public function inject($element)
//    {//给数组末尾追加元素，无指定下标，默认为数字
//        $this->elements[] = $element;
//    }
//
//    public function eject()
//    {
//        array_pop($this->elements);//PHP array_pop() 函数删除数组中的最后一个元素
//    }
//}
//
////实例化该类，测试下
//$a = new DoubleEndedQueue();
//
//$a->inject('aa');//给数组末尾追加元素，无指定下标，默认为数字
//$a->inject('bb');
//$a->inject('cc');
//$a->inject('dd');
//var_dump($a->elements);
//$a->push('111');//函数在数组开头插入一个或多个元素。
//var_dump($a->elements);
//$a->pop();//PHP array_shift() 函数删除数组中的第一个元素_
//$a->eject();//PHP array_pop() 函数删除数组中的最后一个元素
//print_r($a->elements);

//$file_path = 'hello.txt';
//if (!file_exists($file_path)) {
//    fopen($file_path, 'w+');
//}
//
//$fp  = fopen($file_path, 'r'); //r只读。在文件的开头开始 r+	读/写。在文件的开头开始。
//$str = 'hello!' . "\n";
//$str .= fread($fp, filesize($file_path)); //filesize() 函数返回指定文件的大小。如果成功，该函数返回文件大小的字节数。如果失败，则返回 FALSE
//fclose($fp);
//$fp1 = fopen($file_path, 'w'); 	//只写。打开并清空文件的内容；如果文件不存在，则创建新文件。
//fwrite($fp1, $str);
////如果是在文尾追加 用a即可

//$Tarray = array(
//    array('id' => 0, 'name' => '123'),
//    array('id' => 0, 'name' => '1234'),
//    array('id' => 0, 'name' => '1235'),
//    array('id' => 0, 'name' => '12356'),
//    array('id' => 0, 'name' => '123abc')
//);
//
//foreach($Tarray as $key=>$val)
//{
//    $c[]=$val['name'];
//}
//
//function order($a,$b)
//{
//    if(strlen($a)==strlen($b)) return 0;
//    return strlen($a)>strlen($b)?-1:1;
//}
//usort($c, 'order');//自定义排序方法
//$len=count($c);
//for($i=0;$i<$len;$i++)
//{
//    $t[$i]['id']=$i+1;
//    $t[$i]['name']=$c[$i];
//}
//var_dump($t);

/**
 * 生成不重复的随机数--并排序
 *
 * @param int $start 需要生成的数字开始范围
 * @param int $end 结束范围
 * @param int $length 需要生成的随机数个数
 *
 * @return array 生成的随机数
 */
//function get_rand_number($start = 1, $end = 10, $length = 4)
//{
//    $connt = 0;
//    $temp  = [];
//    while ($connt < $length) {
//        $temp[] = mt_rand($start, $end);
//        $data   = array_unique($temp);
//        $connt  = count($data);
//    }
//    sort($data);
//    return $data;
//}
//
//var_dump(get_rand_number(1, 1000, 100));


//$mysqli = new mysqli('localhost', 'root', '123456', 'test');
//
//if (mysqli_connect_errno()) {
//    die('数据库连接失败,' . mysqli_connect_error());
//}
//
//$mysqli->set_charset('utf8');

//$sql = "select DATE_FORMAT(created_at,'%Y-%m-%d') as days,count(*) count from user where UNIX_TIMESTAMP(created_at) > UNIX_TIMESTAMP('2019-02-01 00:00:00') AND UNIX_TIMESTAMP(created_at) < UNIX_TIMESTAMP('2019-03-01 00:00:00') group by days";
//$sql = "select DATE_FORMAT(created_at,'%Y-%m-%d') as days,count(*) count from user where MONTH(created_at) = '2' group by days";

//$result = $mysqli->query($sql);
//$row    = $result->fetch_all();//抓取所有的结果行并且以关联数据，数值索引数组，或者两者皆有的方式返回结果集
//$row = $result->fetch_array();//一行结果
//$row = $result->fetch_object();//返回对象
//$row = mysqli_fetch_array($result); //函数从结果集中取得一行作为关联数组，或数字数组，或二者兼有 返回根据从结果集取得的行生成的数组，没有更多行则返回 false
//var_dump($row);
//var_dump($result);
//var_dump(mysqli_fetch_assoc($result));

/*
fetch_all()	抓取所有的结果行并且以关联数据，数值索引数组，或者两者皆有的方式返回结果集。
fetch_array()	以一个关联数组，数值索引数组，或者两者皆有的方式抓取一行结果。
fetch_object()	以对象返回结果集的当前行。
fetch_row()	以枚举数组方式返回一行结果
fetch_assoc()	以一个关联数组方式抓取一行结果。
fetch_field_direct()	以对象返回结果集中单字段的元数据。
fetch_field()	以对象返回结果集中的列信息。
fetch_fields()	以对象数组返回代表结果集中的列信息。
*/

/*
 -- 每日单量
select DATE_FORMAT(createtime,'%Y-%m-%d') as days,count(*) count from ibt_shop_order group by days;
-- 每周单量
select DATE_FORMAT(createtime,'%Y-%u') as weeks,count(*) count from ibt_shop_order group by weeks;
-- 每月单量
select DATE_FORMAT(createtime,'%Y-%m') as months,count(*) count from ibt_shop_order group by months;
 * */

//$sqls = "select sum(b.total_amount) total,u.username,count(b.uid) as times from buy as b left join user as u on b.uid = u.uid where b.type = 'buy' group by b.uid";
//
//$results = $mysqli->query($sqls);
//
//if ($results) {
//    $rows = $results->fetch_all(MYSQLI_BOTH); //MYSQLI_ASSOC 只返回索引数组
//}


//class Test
//{
//    /**
//     * 这个就是求排列组合问题，从 m个元素中选n个，有多少种选法,下面是一个递归的实现，若元素个数太多，并不适合。
//     * arr 元素数组，
//     * m 从arr 中选择的元素个数
//     * isRepeat arr中的元素是否可以重复
//     * b 中间变量
//     * M 等于第一次调用时的 m
//     * res 存放结果
//     */
//
//    public static function combine($arr, $m, $isRepeat = 0, $b = [], $n = 0, $res = [])
//    {
//        !$n && $n = $m;
//
//        if ($m == 1) {
//            foreach ($arr as $item)
//                $res[] = array_merge($b, [$item]);
//        } else {
//            foreach ($arr as $key => $item) {
//                $b[$n - $m] = $item;
//
//                $tmp = $arr;
//                if (!$isRepeat) unset($tmp[$key]);
//
//                $res = self::combine($tmp, $m - 1, $isRepeat, $b, $n, $res);
//            }
//        }
//        return $res;
//    }
//}
//
//$arr = ['a', 'b', 'c'];
//var_dump(Test::combine($arr, 3));

//$a = '1234567890';
//
//$a = strrev($a);
//
//$b = '';
//for ($i = 0; $i < strlen($a); $i++) {
//    if (($i + 1) % 3 == 0) {
//        $b .= $a[$i] . ',';
//    } else {
//        $b .= $a[$i];
//    }
//}
//$b = strrev($b);

//var_dump(get_loaded_extensions());


//function newsubstr($str, $num)
//{
//    $strNeed = preg_replace(array('/<\/\w+>/', '/<\w+>/'), array('', ','), $str);
//    $arr     = explode(',', $strNeed);
//
//    $arrCount = array_map('strlen', $arr);
//
////array_map() 函数将用户自定义函数作用到数组中的每个值上，并返回用户自定义函数作用后的带有新值的数组。回调函数接受的参数数目应该和传递给 array_map() 函数的数组数目一致。提示：您可以向函数输入一个或者多个数组。
//
//    $newstr = '';
//    if ($num < $arrCount[0] + $arrCount[1] && $num >= 0) {
//        $newstr .= ($num <= $arrCount[0]) ? substr($arr[0], 0, $num) : substr($arr[0], 0, $arrCount[0]) . substr($arr[1], 0, $num - $arrCount[0]);
//    } else {
//        foreach ($arr as $key => $val) {
//            if ($key > 1 && $num < array_sum(array_slice($arrCount, 0, $key + 1)) && $num >= array_sum(array_slice($arrCount, 0, $key))) {
//
//                $newstr .= $arr[0] . "<em>{$arr[1]}</em>";
//                for ($i = 2; $i <= $key; $i++) {
//                    $newstr .= $i < $key ? '<em>' . $arr[$i] . '</em>' : substr($arr[$key], 0, $num - array_sum(array_slice($arrCount, 0, $key + 1)));
//                }
//            }
//
//        }
//        if ($num >= array_sum($arrCount)) {
//            $newstr = $str;
//        }
//    }
//    echo $newstr;
//}
//
//$str = '123<em>abc</em>456<em>def</em>789';
//newsubstr($str, 8);


//function monkeyKing($n, $m)
//{
//    //$n为猴子总数,$m为剔除猴子步长
//    $s = 0;    //$s为大王坐标,只有一只猴子时,大王坐标为0
//    for ($i = 2; $i <= $n; $i++) {    //依次向后递推,求到共有$n只猴子,剔除步长为$m时的大王坐标
//        $s = ($s + $m) % $i;    //大王坐标递推公式
//    }
//    return $s;//坐标
//}
//
//echo monkeyKing(6, 2);


//$arr = array(1, 2, 3, 4, 5, 6);//示例数组
//echo '<pre>The King is :<br/>';
//print_r(King($arr, 2));
//此方法错误
//function King($arr, $count)
//{
//    while (count($arr) != 1) {//如果数组只剩一个，就是大王，即结果
//        $length = count($arr);//统计本次循环数组所剩数目
//        if ($length >= $count) {//如果所要压出数组直接可以点出来
//            $res = array_splice($arr, $count - 1, 1);//压出数组--该处错误,每次都是从头开始计数
//        } else {
//            $remainder = $count % $length;//求余数，即为所要压出数组的元素
//            if ($remainder == 0) {
//                $remainder = $length;//如果求余结果为0，即时为本数组最后一个元素
//            }
//            $res = array_splice($arr, $remainder - 1, 1);//压出数组
//        }
//    }
//    return $arr;//返回所求，即大王
//}

/**
 * 猴子选大王
 *
 * @param int $m 猴子数
 * @param int $n 出局数
 *
 * @return array
 *
 */
//function king($m, $n)
//{
////构造数组
//    for ($i = 1; $i < $m + 1; $i++) {
//        $arr[] = $i;
//    }
//    $i = 0;    //设置数组指针
//
//    while (count($arr) > 1) {
//        //遍历数组，判断当前猴子是否为出局序号，如果是则出局，否则放到数组最后
//        if (($i + 1) % $n == 0) {
//            unset($arr[$i]);
//        } else {
//            array_push($arr, $arr[$i]); //本轮非出局猴子放数组尾部
//            unset($arr[$i]);   //删除
//        }
//        $i++;
//    }
//    return $arr;
//}
//
//var_dump(king(6, 2));

//function getNum($num, $start = 0, $get = 100, $co = 1)
//{
//    $tag = ceil(($start + $get) / 2);  // ceil() 函数向上舍入为最接近的整数。
//    if ($tag == $num) {
//        echo $co;
//        return;
//    }
//    if ($tag > $num) {
//        getNum($num, $start, $tag, ++$co);
//    } else {
//        getNum($num, $tag, $get, ++$co);
//    }
//}
//
//getNum(99);

//var_dump($_SERVER['REMOTE_ADDR']); //客户端IP，有可能是用户的IP，也有可能是代理的IP。
//var_dump($_SERVER['HTTP_CLIENT_IP']); //代理端的IP，可能存在，可伪造。
//var_dump($_SERVER['HTTP_X_FORWARDED_FOR']); //用户是在哪个IP使用的代理，可能存在，可以伪造。
//var_dump($_SERVER["SERVER_NAME"]); //需要使用函数gethostbyname()获得。这个变量无论在服务器端还是客户端均能正确显示。
//var_dump($_SERVER["SERVER_ADDR"]); //在服务器端测试：127.0.0.1（这个与httpd.conf中BindAddress的设置值相关）。在客户端测试结果正确。

/**
 * PHP将网页上的图片攫取到本地存储
 *
 * @param        $imgUrl         图片url地址
 * @param string $saveDir 本地存储路径 默认存储在当前路径
 * @param null   $fileName 图片存储到本地的文件名
 *
 * @return mix
 */
//function crabImage($imgUrl, $saveDir = './', $fileName = null)
//{
//    if (empty($imgUrl)) {
//        return false;
//    }
//
//    //获取图片信息大小
//    $imgSize = getImageSize($imgUrl);
//    if (!in_array($imgSize['mime'], array('image/jpg', 'image/gif', 'image/png', 'image/jpeg'), true)) {
//        return false;
//    }
//
//    //获取后缀名
//    $_mime = explode('/', $imgSize['mime']);
//    $_ext  = '.' . end($_mime);
//
//    if (empty($fileName)) {  //生成唯一的文件名
//        $fileName = uniqid(time(), true) . $_ext;
//    }
//
//    //开始攫取
//    ob_start();
//    readfile($imgUrl);
//    $imgInfo = ob_get_contents();
//    ob_end_clean();
//
//    if (!file_exists($saveDir)) {
//        mkdir($saveDir, 0777, true);
//    }
//    $fp     = fopen($saveDir . $fileName, 'a');
//    $imgLen = strlen($imgInfo);    //计算图片源码大小
//    $_inx   = 1024;   //每次写入1k
//    $_time  = ceil($imgLen / $_inx);
//    for ($i = 0; $i < $_time; $i++) {
//        fwrite($fp, substr($imgInfo, $i * $_inx, $_inx));
//    }
//    fclose($fp);
//
//    return array('file_name' => $fileName, 'save_path' => $saveDir . $fileName);
//}
//
//// $url = 'https://mmbiz.qlogo.cn/mmbiz/7WQtTI9h56hgvOH8J0Xp5v97cDNOxf94vq0NdNOhZmb2ZiaJLfwd2U8gNoEvTQXdWlRPOuibkkSebexmR2epE0pQ/0?wx_fmt=gif';
//$url = 'http://www.phpernote.com/images/logo.gif';
////$url = 'http://avatar.csdn.net/5/3/6/1_u014236259.jpg';
//
//var_dump(crabImage($url));

//class sample
//{
//    function __call($a, $b)
//    {
//        echo ucwords(implode(' ', $b) . ' ' . $a);
//    }
//
//    function ads()
//    {
//        ob_start();
//        echo 'by';
//        return $this;
//    }
//
//    function ade()
//    {
//        $c = ob_get_clean();
//        $this->php('power', $c);
//    }
//}
//
//$inst = new sample();
//$inst->cmstop('welcome', 'to');
//$inst->ads()->ade();

//快速排序法
//$a = [18, 2, 4, 6, 22, 55, 43, 12, 3, 5, 6, 11];
//
//function mysort($a)
//{
//    $total = count($a);
//
//    $left  = [];
//    $right = [];
//
//    if ($total <= 1) return $a;
//
//    for ($i = 1; $i < $total; $i++) {
//        if ($a[0] < $a[$i]) { //升序
//            $right[] = $a[$i];
//        } else {
//            $left[] = $a[$i];
//        }
//    }
//    $left  = mysort($left);
//    $right = mysort($right);
//
//    return array_merge($left, [$a[0]], $right);
//}
//
//var_dump(mysort($a));

//$a = array(28, 32, 43, 14, 53, 67, 42, 54, 46, 31);
//$b = array(28, 32, 43, 14, 53, 67, 42, 54, 46, 31);
//
//rsort($a);        //对数组逆向排序
//sort($b);        //对数组顺向排序
//
//$num = sizeof($a); //计算数组中的单元数目或对象中的属性个数
//$x   = [];
//for ($i = 0; $i <= $num / 2 - 1; $i++) {
//    $x[$i * 2]     = $a[$i]; //把最大的放在第一位
//    $x[$i * 2 + 1] = $b[$i]; //把最小的放在第二位上
//}
//var_dump($x);

//$addr = '192.168.1.101';
//
//$port = 8899;
//
//if ($socket = socket_create(AF_INET, SOCK_STREAM, TCP) < 0) {
//    echo "创建失败，原因：" . socket_strerror($sock);
//    return false;
//}
//
//if ($bind = socket_bind($socket, $addr, $port) < 0) {
//    echo "绑定失败，原因：" . socket_strerroe($bind);
//    return false;
//}
//
//if ($listen = socket_listen($socket, 5) < 0) {
//    echo "监听失败，原因：" . socket_strerror($listen);
//    return false;
//}
//
//if ($accept = socket_accept($socket) < 0) {
//    echo "连接失败，原因：" . socket_strerror($accept);
//    return FALSE;
//}
//
//socket_write($accept, "Hello World", strlen("Hello World"));
//socket_close($socket);

//确保在连接客户端时不会超时
//set_time_limit(0);
//
////设置IP和端口号
//$address = "127.0.0.1";
//$port    = 2048; //调试的时候，可以多换端口来测试程序！
//
///**
// * 创建一个SOCKET
// * AF_INET=是ipv4 如果用ipv6，则参数为 AF_INET6
// * SOCK_STREAM为socket的tcp类型，如果是UDP则使用SOCK_DGRAM
// */
//header("content-type:text/html;charset=utf-8");
//
//$sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP) or die("socket_create() 失败的原因是:" . socket_strerror(socket_last_error()) . "/n");
////阻塞模式
//socket_set_block($sock) or die("socket_set_block() 失败的原因是:" . socket_strerror(socket_last_error()) . "/n");
////绑定到socket端口
//$result = socket_bind($sock, $address, $port) or die("socket_bind() 失败的原因是:" . socket_strerror(socket_last_error()) . "/n");
////开始监听
//$result = socket_listen($sock, 4) or die("socket_listen() 失败的原因是:" . socket_strerror(socket_last_error()) . "/n");
//echo "OK\nBinding the socket on $address:$port ... ";
//echo "OK\nNow ready to accept connections.\nListening on the socket ... \n";
//do { // never stop the daemon
//    //它接收连接请求并调用一个子连接Socket来处理客户端和服务器间的信息
//    $msgsock = socket_accept($sock) or die("socket_accept() failed: reason: " . socket_strerror(socket_last_error()) . "/n");
//
//    //读取客户端数据
//    echo "Read client data \n";
//    //socket_read函数会一直读取客户端数据,直到遇见\n,\t或者\0字符.PHP脚本把这写字符看做是输入的结束符.
//    $buf = socket_read($msgsock, 8192);
//    echo "Received msg: $buf \n";
//
//    //数据传送 向客户端写入返回结果
//    $msg = "welcome \n";
//    socket_write($msgsock, $msg, strlen($msg)) or die("socket_write() failed: reason: " . socket_strerror(socket_last_error()) . "/n");
//    //一旦输出被返回到客户端,父/子socket都应通过socket_close($msgsock)函数来终止
//    socket_close($msgsock);
//} while (true);
//socket_close($sock);

//if (
//    function_exists('socket_create') AND //判断socket_create函数是否存在
//    $sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP) AND //创建一个socket
//    $sock_data = socket_connect($sock, "192.168.1.101", 8899) //连接socket服务
//) {
//    $sock_data = socket_set_option($sock, SOL_SOCKET, SO_BROADCAST, 1); //设置
//    $msg       = "helloserver!";
//    $sock_data = socket_write($sock, $msg, strlen($msg)); //发送数据
//    socket_close($sock); //关闭socket
//    echo "发送成功！";
//} else {
//    echo "连接或发送失败!";
//}

//function getExt($url)
//{
//    $arr  = parse_url($url);
//    $file = basename($arr['path']);
//    $ext  = explode(".", $file);
//    return $ext[1];
//}
//
//function getExts($url)
//{
//    $url  = basename($url);
//    $pos1 = strpos($url, ".");
//    $pos2 = strpos($url, "?");
//    if (strstr($url, "?")) {
//        return substr($url, $pos1 + 1, $pos2 - $pos1 - 1);
//    } else {
//        return substr($url, $pos1);
//    }
//}


//redis数据入队操作
//$redis = new Redis();
//$redis->connect('127.0.0.1', 6379);
//for ($i = 0; $i < 50; $i++) {
//    try {
//        $redis->LPUSH('click', rand(1000, 5000));
//    } catch (Exception $e) {
//        echo $e->getMessage();
//    }
//}
//
////redis数据出队操作,从redis中将请求取出
//$redis = new Redis();
//$redis->pconnect('127.0.0.1', 6379);
//while (true) {
//    try {
//        $value = $redis->LPOP('click');
//        if (!$value) {
//            break;
//        }
//        var_dump($value) . "\n";
//        /*
//        * 利用$value进行逻辑和数据处理
//        */
//    } catch (Exception $e) {
//        echo $e->getMessage();
//    }
//}


//$b = 20;
//$c = 40;
//$a = $b > $c ? ($c - $b) ? 1 : ($b - $c) > 0 : ($b + $c) ? 0 : $b * $c;
//echo $a;

//php三元运算符的顺序是从左向右的
//原始 $a = $b > $c ? ($c-$b) ? 1 : ($b-$c) > 0 : ($b+$c) ? 0 : $b*$c;
//先计算优先级高于三元运算符的
//$a = 20 > 40 ? 20 ? 1 : -20 > 0 : 60 ? 0 : 800;
//$a = 0 ? 20 ? 1 : 0 : 60 ? 0 : 800;
//然后从左测第一个可执行的三元运算开始执行 20 ? 1 : 0 为 1
//$a = 0 ? 1 : 60 ? 0 : 800;
//再从左测第一个可执行的三元运算开始执行 0 ? 1 : 60 为 60
//$a = 60 ? 0 : 800;
//最终
//$a = 0
//为了避免工作中出现这种情况，建议避免出现比较长的三元运算表达式

//$s = 0;
//for ($i = 1; $i < 10; $i++) {
//    if ($i % 2 == 0) {
//        continue;
//    }
//    $s += $i;
//}
//echo $s;

/**
 * 根据时间戳计算年龄
 *
 * @param $birth
 *
 * @return mixed
 */
//function howOld($birth, $time)
//{
////    var_dump(strtotime($birth));
//    if (strtotime($birth)) $birth = strtotime($birth);
//    if (strtotime($time)) $time = strtotime($time);
//
//
//    list($birthYear, $birthMonth, $birthDay) = explode('-', date('Y-m-d', $birth)); //list() 函数用于在一次操作中给一组变量赋值。
//    list($currentYear, $currentMonth, $currentDay) = explode('-', date('Y-m-d', $time));
//    $age = $currentYear - $birthYear - 1;
//    if ($currentMonth > $birthMonth || $currentMonth == $birthMonth && $currentDay >= $birthDay)
//        $age++;
//
//    return $age;
//}
//
//var_dump(howOld('2010-01-11', '2018-11-11'));
//var_dump(howOld('1263139200', '1541865600'));
//var_dump(howOld('1263139200', '2018-11-11'));


/**
 * @param string $birthday
 *
 * @return string|number
 * @uses 根据生日计算年龄，年龄的格式是：2016-09-23
 */
//function calcAge($birthday)
//{
//    $iage = 0;
//    if (!empty($birthday)) {
//        $year  = date('Y', strtotime($birthday));
//        $month = date('m', strtotime($birthday));
//        $day   = date('d', strtotime($birthday));
//
//        $now_year  = date('Y');
//        $now_month = date('m');
//        $now_day   = date('d');
//
//        if ($now_year > $year) {
//            $iage = $now_year - $year - 1;
//            if ($now_month > $month) {
//                $iage++;
//            } else if ($now_month == $month) {
//                if ($now_day >= $day) {
//                    $iage++;
//                }
//            }
//        }
//    }
//    return $iage;
//}
//var_dump(calcAge('2011-11-02'));

//根据出现次数排序,相同次数的按照出现次序排序
//$data = array('d', 'b', 'b', 'a', 'f', 'a', 'b', 'd');
//$res  = array();
//foreach ($data as $key => $value) {
//    $res[$value] = 1;
//}//Array ( [a] => 1 [b] => 1 [d] => 1 [f] => 1 )
//for ($i = 0; $i < count($data); $i++) {
//    if ($res[$data[$i]] == 1) {
//        for ($j = $i + 1; $j < count($data); $j++) {
//            if ($data[$j] == $data[$i]) {
//                $res[$data[$i]] += 1;
//            }
//        }
//    }
//}
//arsort($res);
////var_dump(array_keys($res));
//foreach ($res as $key => $value) {
//    $desc[] = $key;
//}
//var_dump($desc);


//$str = '1,2,3,4,2,54,23,12,3221,2,1,3';
//$arr = array_count_values(explode(',', $str));//重复的次数,Array ( [1] => 2 [2] => 3 [3] => 2 [4] => 1 [23] => 1 [54] => 1 [12] => 1 [3221] => 1 )
//var_dump($arr);
//
//$arr = array_keys($arr); //返回包含数组中所有键名的一个新数组
//var_dump($arr);
//
//arsort($arr);//对关联数组按照键值进行降序排序。 asort升序
//var_dump($arr);
//
//echo implode(',', $arr);
//1，2，3，4，12，23，54，3221 //排过序的输出


//$array = array('a' => "abc", 'b' => "bcd",'c' =>"cde",'d' =>"def",'e'=>"");
//$b= array_filter($array);
//
//print_r($b);

//$private_key = file_get_contents('private_key.pem'); //读取私钥
//$public_key = file_get_contents('rsa_public_key.pem');//读取公钥
//$pi_key = openssl_pkey_get_private($private_key);//这个函数可用来判断私钥是否是可用的，可用返回资源idResourceid
//$pu_key = openssl_pkey_get_public($public_key);//这个函数可用来判断公钥是否是可用的
//
//$data= 'method=medicool.user.detail&nonce_str=607673¶meters={"test":"2458"}&partnerid=test';//原始数据
//
//echo "privatekeyencrypt:\n";
//
//openssl_private_encrypt($data, $encrypted, $pi_key);//私钥加密
//
//$encrypted = base64_encode($encrypted);//加密后的内容通常含有特殊字符，需要编码转换下，在网络间通过url传输时要注意base64编码是否是url安全的
//$encrypted = urlencode($encrypted);
//
//echo $encrypted,"\n";//输出私钥加密后的字符串数据
//echo "publickeydecrypt:\n";
//
//openssl_public_decrypt(base64_decode(urldecode($encrypted)), $decrypted, $pu_key);//私钥加密的内容通过公钥可用解密出来
//
//echo $decrypted,"\n";//通过公钥解密后的字符串数据
//echo "publickeyencrypt:\n";
//
//openssl_public_encrypt($data, $encrypted, $pu_key);//公钥加密
//
//$encrypted = (base64_encode($encrypted));
//$encrypted = urlencode($encrypted);
//
//echo $encrypted,"\n";//通过公钥加密后的字符串数据
//echo "privatekeydecrypt:\n";
//
//openssl_private_decrypt(base64_decode(urldecode($encrypted)), $decrypted, $pi_key);//私钥解密
//echo $decrypted,"\n";//通过私钥解密后的字符串数据


//得到一个类的对象的方式
//class Father
//{
//    public $money = 10000;
//}
////要判断是否是同一个对象，必须类成员一致，而且编号必须相同;
////第一种方式,直接获取对象的方式new,产生一个新对象
//$f = new Father();
//$e = new Father();
//
//var_dump($f === $e);//false
//var_dump($f == $e); //true
////第二种方式,赋值的方式,是同一个对象
//$fm = &$f;
//var_dump($f === $fm);//ture
////第三种方式,克隆,出来的对象是一个新对象
//$fm2 = clone $f;
//var_dump($f === $fm2);//false
//var_dump($f == $fm2); //true
//var_dump($f, $fm, $fm2);
//object(Father)[1]
//  public 'money' => int 10000
//object(Father)[1]
//  public 'money' => int 10000
//object(Father)[3]
//  public 'money' => int 10000

//$a = 3;
//var_dump($a);//输出：3
//
//static $a = 6;
//var_dump($a);//输出：12.静态变量会在编译阶段声明提升。
//
//$a = 9;
//var_dump($a);//输出：9
//
//static $a = 12;
//var_dump($a);//输出：9
//
//static $a = 11;
//var_dump($a);//输出：9

//多态
//abstract class Employee
//{
//    abstract function continueToWork();
//}
//
//class Sales extends Employee
//{
//    private function makeSalePlan()
//    {
//        echo "make sale plan";
//    }
//
//    public function continueToWork()
//    {
//        $this->makeSalePlan();
//    }
//}
//
//class Market extends Employee
//{
//    private function makeProductPrice()
//    {
//        echo "make product price";
//    }
//
//    public function continueToWork()
//    {
//        $this->makeProductPrice();
//    }
//}
//
//class Engineer extends Employee
//{
//    private function makeNewProduct()
//    {
//        echo "make new product";
//    }
//
//    public function continueToWork()
//    {
//        $this->makeNewProduct();
//    }
//}
//
//class Demo
//{
//    public function Work(Employee $employeeObj)
//    {//添加父类类型限制传参类型,使其满足多态第三点要求，父类指向子类
//        $employeeObj->continueToWork();
//    }
//}
//
////调用
//$obj = new Demo();
//$obj->Work(new Sales());
//$obj->Work(new Market());
//$obj->Work(new Engineer());

//function content(){
//    return $func = function($param){
//        echo $param;
//    };
//}
//$data = content();
//$data('hello world');

//(示例3):把匿名函数当做参数传递,并且调用它
//function callFunc($func){
//    $func('hello world');
//}
//$data = function($param){
//    echo $param;
//};
//callFunc($data);
////die;
//
////直接将匿名函数进行传递
//callFunc(function($param){
//    echo $param;
//});

//class Person{
//    public $name;
//}abstract
//$a = new Person();
//$a->name = "张三";
//$b = $a;
//$b->name = "李四";
//echo $a->name;

//格林威治时间转换
//$a = '2014-01-01T00:29:23Z';
//date_default_timezone_set('UTC');
//echo date('Y-m-d H:i:s',strtotime($a));

/*问题：假设有一个背包的负重最多可达8公斤，而希望在背包中装入负重范围内可得之总价物品，假设是水果好了，水果的编号、单价与重量如下所示：
1  栗子  4KG  $4500
2  苹果  5KG  $5700
3  橘子  2KG  $2250
4  草莓  1KG  $1100
5  甜瓜  6KG  $6700
分析：背包问题是关于最佳化的问题，要解最佳化问题可以使用「动态规划」（Dynamic programming），从空集合开始，每增加一个元素就先求出该阶段的最佳解，直到所有的元素加入至集合中，最后得到的就是最佳解。*/

//背包承重上限
/*$limit = 10;
//物品种类
$total = 5;
//物品
$array = array(
    array("栗子", 4, 45),
    array("苹果", 5, 57),
    array("橘子", 2, 22),
    array("草莓", 1, 11),
    array("甜瓜", 6, 67)
);
//存放物品的数组
$item = array_fill(0, $limit + 1, 0);
//存放价值的数组
$value = array_fill(0, $limit + 1, 0);
$p     = $newvalue = 0;
for ($i = 0; $i < $total; $i++) {
    for ($j = $array[$i][1]; $j <= $limit; $j++) {
        $p        = $j - $array[$i][1];
        $newvalue = $value[$p] + $array[$i][2];
        //找到最优解的阶段
        if ($newvalue > $value[$j]) {
            $value[$j] = $newvalue;
            $item[$j]  = $i;
        }
    }
}
echo "物品  价格<br />";
for ($i = $limit; 1 <= $i; $i = $i - $array[$item[$i]][1]) {
    echo $array[$item[$i]][0] . "  " . $array[$item[$i]][2] . "<br />";
}
echo "合计  " . $value[$limit];*/


/*$thing_arr = array(
    array('size' => 9, 'weight' => 10),
    array('size' => 4, 'weight' => 5),
    array('size' => 6, 'weight' => 4),
    array('size' => 7, 'weight' => 9),
);

$max_package_arr = array();
$max_thing_arr   = array();

function package($space)
{
    global $thing_arr, $max_package_arr, $max_thing_arr;
    if (isset($max_package_arr[$space])) return $max_package_arr[$space];
    $max_value = 0;
    foreach ($thing_arr as $thing) {
        if (($rest_space = $space - $thing['size']) > 0) {
            if (($value = package($rest_space) + $thing['weight']) > $max_value) {
                $max_package_arr[$space] = $max_value = $value;
                $max_thing_arr[$space]   = $thing['weight'];
            }
        }
    }
    return $max_value;
}


echo package(12);
var_dump($max_thing_arr);*/


//初始化各个物品重量和价值数组
/*$weight_arr = array(0, 4, 2, 6, 5, 3);
$value_arr  = array(0, 6, 3, 5, 4, 6);

//设置包最大重量为10
$bag_max = 10;
$items   = count($weight_arr) - 1;

$cache_map   = array();
$cache_map[] = array_fill(1, $items, 0);
$ik          = 1;
//初始状态,假如只有第一个物品包各个重量的最大价值
for ($i = 1; $i <= $bag_max; $i++) {
    if ($weight_arr[$ik] > $i) {
        $cache_map[$ik][$i] = 0;
    } else {
        $cache_map[$ik][$i] = $value_arr[$ik];
    }
}
//中间的各种决策(依次放入物品b,c,d,e)
for ($i = 1; $i <= $bag_max; $i++)
    for ($j = 2; $j <= $items; $j++) {
        $j_weight     = $weight_arr[$j];
        $j_value      = $value_arr[$j];
        $j_prev_value = $cache_map[$j - 1][$i];
        if ($j_weight > $i) {
            $cache_map[$j][$i] = $j_prev_value;
        } else {
            $j_extra_value     = $j_value + $cache_map[$j - 1][$i - $j_weight];
            $cache_map[$j][$i] = max($j_prev_value, $j_extra_value);
        }
    }

//最终状态
for ($i = 1; $i <= $bag_max; $i++) {
    echo $i . ':' . $cache_map[$items][$i] . PHP_EOL;
}*/

/*$aa = array(
    array('id' => 1, 'name' => 'break', 'age' => 3),
    array('id' => 2, 'name' => 'sarah', 'age' => 3),
    array('age' => 3, 'name' => 'sarah', 'id' => 2),
    array('age' => 2, 'name' => 'lala', 'id' => 4),
    array('id' => 4, 'name' => 'lala', 'age' => 2),
);

$keys   = [];
$values = [];
foreach ($aa as $k => $v) {
    $s = $v['id'] . $v['name'] . $v['age'];
    if (!in_array($s, $keys)) {
        $keys[]   = $s;
        $values[] = $v;
    }
}
var_dump($values);*/

//使用PHP比较两个字符串A和B,确定A中是否包含B中所有字符(不限制大小和出现顺序)
/*$a = 'achdkwdw';
$b = 'hhw1k';

$len = strlen($b);
for ($i = 0; $i < $len; $i++) {
    $res = strpos($a, $b{$i});
    if ($res === false) {
        echo '不包含';
    }
}*/

/*class Food
{
    protected static $num = 0;

    public function __construct()
    {
        var_dump(self::$num);
        self::$num++;
    }
}

$a = $b = $c = new Food();
var_dump($a, $b, $c);
$d = new Food();
$e = new Food();
$f = new Food();
var_dump($d);*/

//获取每周一的时间
/*function caluateTime()
{
    $now    = date("Ymd");//当前时间
    $week_n = date("w", time()); //	0（表示星期天）到 6（表示星期六）
    return date("Ymd", strtotime("-" . ($week_n - 1) . "days", strtotime($now)));
}

echo caluateTime();*/

//闭包绑定 简短干练的暂时绑定一个方法到对象上闭包并调用它。
/*class A
{
    private $x = 1;
}

// PHP 7 之前版本的代码
$getXCB = function () {
    return $this->x;
};
$getX   = $getXCB->bindTo(new A, 'A'); // 中间层闭包
echo $getX();

// PHP 7+ 及更高版本的代码
$getX = function () {
    return $this->x;
};
echo $getX->call(new A);*/

//这个类自身定义了许多静态方法用于操作多字符集的 unicode 字符。需要安装intl拓展
/*printf('%x', IntlChar::CODEPOINT_MAX);
echo IntlChar::charName('@');
var_dump(IntlChar::ispunct('!'));*/


/*ini_set('assert.exception', 1);

class CustomError extends AssertionError
{
}

assert(false, new CustomError('Some error message'));*/

//var_dump(intdiv(10, 3)); //3
//var_dump(intdiv(11, 4)); //3

/*string preg_replace_callback_array(array $regexesAndCallbacks, string $input);
$tokenStream = []; // [tokenName, lexeme] pairs

$input = <<<'end'
$a = 3; // variable initialisation
end;

// Pre PHP 7 code
preg_replace_callback(
    [
        '~\$[a-z_][a-z\d_]*~i',
        '~=~',
        '~[\d]+~',
        '~;~',
        '~//.*~'
    ],
    function ($match) use (&$tokenStream) {
        if (strpos($match[0], '$') === 0) {
            $tokenStream[] = ['T_VARIABLE', $match[0]];
        } elseif (strpos($match[0], '=') === 0) {
            $tokenStream[] = ['T_ASSIGN', $match[0]];
        } elseif (ctype_digit($match[0])) {
            $tokenStream[] = ['T_NUM', $match[0]];
        } elseif (strpos($match[0], ';') === 0) {
            $tokenStream[] = ['T_TERMINATE_STMT', $match[0]];
        } elseif (strpos($match[0], '//') === 0) {
            $tokenStream[] = ['T_COMMENT', $match[0]];
        }
    },
    $input
);

preg_replace_callback_array(
    [
        '~\$[a-z_][a-z\d_]*~i' => function ($match) use (&$tokenStream) {
            $tokenStream[] = ['T_VARIABLE', $match[0]];
        },
        '~=~' => function ($match) use (&$tokenStream) {
            $tokenStream[] = ['T_ASSIGN', $match[0]];
        },
        '~[\d]+~' => function ($match) use (&$tokenStream) {
            $tokenStream[] = ['T_NUM', $match[0]];
        },
        '~;~' => function ($match) use (&$tokenStream) {
            $tokenStream[] = ['T_TERMINATE_STMT', $match[0]];
        },
        '~//.*~' => function ($match) use (&$tokenStream) {
            $tokenStream[] = ['T_COMMENT', $match[0]];
        }
    ],
    $input
);*/

/*$length = 1;
$min    = 2;
$max    = 3;
random_bytes($length);
random_int($min, $max);*/

#php7+
//define('ALLOWED_IMAGE_EXTENSIONS', ['jpg', 'jpeg', 'gif', 'png']);
//var_dump(ALLOWED_IMAGE_EXTENSIONS);
//list($array[], $array[], $array[]) = [1, 2, 3];
//var_dump($array); // [1, 2, 3]


//$array = [0, 1, 2];
//foreach ($array as &$val) {
//    var_dump(current($array));
//}

#php5
/*function ($a = null)
{
    if ($a === null) {
        return null;
    }
    return $a;
}

#php7+
function testReturn(): ?string
{
    return 'elePHPant';
}

var_dump(testReturn());

// 此处返回值如果没有问号，那么不能返回 null 值
function testReturn1(): ?string
{
    return null;
}

var_dump(testReturn1());

// 参数类型提示为 ?string 代表可以传入一个 null 类型和 string 类型的值，但是不能不传值
function test(?string $name)
{
    var_dump($name);
}

test('elePHPant');
test(null);
test();*/

/*function iterator(iterable $iter)
{
    foreach ($iter as $val) {
        //
        var_dump($val);
    }
}*/


/*class Test
{
    public function exposeFunction()
    {
        return Closure::fromCallable([$this, 'privateFunction']);
    }

    private function privateFunction($param)
    {
        var_dump($param);
    }
}

$privFunc = (new Test)->exposeFunction();
$privFunc('some value');*/

/*function test(object $obj): object
{
    return new SplQueue();
}

var_dump(test(new StdClass()));*/

//var_dump(number_format(-0.01)); // now outputs string(1) "0" instead of string(2) "-0"
/*$array = ['a' => '1', 'b' => '2'];
#php 7.3之前
//$firstKey = key(reset($array));
reset($array);
$firstKey = key($array); // a
end($array);
$endKey = key($array); // b
var_dump($firstKey);
# php 7.3
$firstKey = array_key_first($array);//a
$lastKey  = array_key_last($array);//b

var_dump($firstKey);
var_dump($lastKey);*/


/*class Database
{
    private $instance;

    private function __construct()
    {
        // Do nothing.
    }

    private function __clone()
    {
        // Do nothing.
    }

    public static function getInstance()
    {
        if (!(self::$instance instanceof self)) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}

$a = Database::getInstance();
$b = Database::getInstance();
 var_dump($a === $b);*/


/*$text = 'This is a Simple text.';

// 输出 "is is a Simple text."，因为 'i' 先被匹配
echo strpbrk($text, 'mi');*/

//header("content-type:text/html;charset=utf-8");
//$string ="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut elit id mi ultricies adipiscing. Nulla facilisi. Praesent pulvinar, sapien vel feugiat vestibulum,nulla dui pretium orci, non ultricies elit lacus quis ante. Lorem ipsum dolor sit amet,consectetur adipiscing elit. Aliquam pretium ullamcorper urna quis iaculis. Etiam ac massased turpis tempor luctus. Curabitur sed nibh eu elitmollis congue. Praesent ipsum diam, consectetur vitae ornare a, aliquam a nunc. In id magna pellentesque tellus posuere adipiscing. Sed non mi metus, at lacinia augue. Sed magna nisi, ornare in mollis in, mollis sed nunc. Etiam at justo in leo congue mollis.Nullam in neque eget metus hendreritscelerisque eu non enim. Ut malesuada lacus eu nulla bibendum id euismod urna sodales. ";
///*压缩字符串*/
//
//$compressed = gzcompress($string);
//echo "Original size: ". strlen($string);
///* 输出原始大小 Original size:773 */
//echo "Compressed size: ". strlen($compressed);
///* 输出压缩后的大小 Compressed size: 396 */
//// 解压缩
//$original = gzuncompress($compressed);
//echo $original;
//var_dump($compressed);
//var_dump($string);

/*通过位运算符异或方式
上面所说的方式并不是这次的重点，本次主要想记录一下通过位运算符的方式来交换 2 个变量，并且不借助于第三方变量。先看代码*/
function swapByBit(&$a, &$b)
{
    $a = $a ^ $b;
    $b = $a ^ $b;
    $a = $a ^ $b;
}

$a = 1;
$b = 2;

swapByBit($a, $b);
var_dump($a, $b);
// int(2)
// int(1)

/*通过位运算符的方式主要是基于异或 (^) 运算的如下特性：
任意一个变量 X 与其自身进行异或运算，结果为 0，即 X^X=0
任意一个变量 X 与 0 进行异或运算，结果不变，即 X^0=X
异或运算具有可结合性，即 a^b^c =（a^b）^c = a^（b^c）
异或运算具有可交换性，即 a^b = b^a
更新一波 php 通过 list 方法交换 2 个变量*/

function swap(&$a, &$b)
{
    list($a, $b) = [$b, $a];
}

$a = 1;
$b = 2;

swap($a, $b);
var_dump($a, $b);
// int(2)
// int(1)