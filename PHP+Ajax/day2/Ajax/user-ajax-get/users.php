<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/26
 * Time: 20:42
 */

/*
 * 对于返回的信息，服务器响应返回数据
 * 对于返回数据的地址，我们称之为接口
 * */
$data=array(
    array(
        'id'=>1,
        'name'=>'张三',
        'age'=>18
    ),
    array(
        'id'=>2,
        'name'=>'李四',
        'age'=>19
    ),
    array(
        'id'=>3,
        'name'=>'王五',
        'age'=>20
    ),
    array(
        'id'=>4,
        'name'=>'钱六',
        'age'=>21
    ),
);

if (empty($_GET['id'])) {
    //没有id则返回全部数据
    //因为HTTP中约定的保温内容是字符串，而我们需要传递
    //给酷虎是一个有格式的字符串
    $json=json_encode($data);
    echo $json;
}else {
    foreach ($data as $itme)
    {
        if ($itme['id']==$_GET['id']) {
            $json=json_encode($itme);
            echo $json;
        }
    }
}