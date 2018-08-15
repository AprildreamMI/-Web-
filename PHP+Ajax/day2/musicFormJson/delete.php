<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/24
 * Time: 10:46
 */
    if (empty($_GET['id'])){ //没有数据传输过来
        exit('<h1>必须制定参数</h1>');
    }
    $id=$_GET['id'];

    $json_str=file_get_contents("music.json");   //获取了JSON格式的字符串
    $json_str_arr=json_decode($json_str,true);      //成为关联数组
    foreach ($json_str_arr as $key => $value) {
        	$json_id=$value['id'];
        	echo $json_id .'||' . $id .'||'.'||'.strcmp($json_id,$id)."<br>";
        	if (strcmp($json_id,$id)==0){
        	    unset($json_str_arr[$key]);
        	    break;
            }
    }

//    var_dump($json_str_arr);

    $new_json_str_arr=json_encode($json_str_arr);
    file_put_contents('music.json',$new_json_str_arr);
    header('Location: index.php');
