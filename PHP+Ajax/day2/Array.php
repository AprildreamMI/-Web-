<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/21
 * Time: 10:05
 */

    /*
     *
     * 创建数组
     * */
   /* $dict=array(
        "hellow"=>"你好",
        "word"=>"世界",
        "class"=>"类"
        );
    print_r(array_keys($dict));
    print_r(array_values($dict));

    var_dump(array_key_exists("hellow",$dict));*/


    /*
     * isset函数会吞掉$dict["class"]的警告
     * */
    if (isset($dict["class"]))
    {
        echo $dict["class"];
    }else{
        echo "没有此键";
    }



    if (empty($dict["class"]))
    {
        echo "没有此键"."<br>";
    }else{
        echo $dict["class"]."<br>";
    }


    date_default_timezone_set("PRC");
    /*echo date("Y-m-d H:i:s",time())."\n";
    echo date("Y-M-D H:I:S",time())."\n";*/


    /*
     * 对以后时间做格式化
     * */
    $date_str="2018-7-21 11:16:58";
    echo date("Y年m月d日 H时i分s秒",strtotime($date_str))."\n";

