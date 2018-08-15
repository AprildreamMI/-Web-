<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/28
 * Time: 17:03
 */
$data=array(
    'name'=>'赵思',
    'age'=>20,
    'greend'=>'男'
);
if (empty($_GET['callback'])) {
    header('Content-Type:application/json');
    echo json_encode($data);
    exit();
}
header('Content-Type:application/javascript');
$data_json=json_encode($data);
$callback_name=$_GET['callback'];
echo "typeof {$callback_name} ==='function' && {$callback_name}({$data_json})";
