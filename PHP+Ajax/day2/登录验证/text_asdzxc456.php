<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/23
 * Time: 11:27
 */
    $value1="asdzxc456 ";
    $value2="asdzxc456";
    if ($value1==$value2) {
        echo $value1.'||'.$value2;
        echo "双等于相等"."<br>";
    }else {
        echo $value1.'||'.$value2;
        echo "双等于不相等"."<br>";
    }

    if ($value1===$value2) {
        echo $value1.'||'.$value2;
        echo "三等于相等"."<br>";
    }else {
        echo $value1.'||'.$value2;
        echo "三等于不相等"."<br>";
    }

    if (strcmp($value1,$value2)==0) {
        echo strcmp($value1,$value2)."<br>";
        echo "strcmp()函数相等"."<br>";
    }else {
        echo strcmp($value1,$value2)."<br>";
        echo "strcmp()函数不相等"."<br>";
    }