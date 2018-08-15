<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/21
 * Time: 12:45
 */
    /*
     * GET方式提交,地址中的提交数据
     * */
    //var_dump($_GET);

    /*
     *post请求接受请求体
     * */
    //var_dump($_POST);

    /*
     *他可以获取随意
     * */
    //var_dump($_REQUEST);

    $name_password=$_POST;


    echo "用户名：".$name_password["userName"]."<br>";
    echo "密码：".$name_password["userPassword"]."<br>";





