<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/25
 * Time: 9:46
 */

//1.建立与数据库执教的连接-》桥梁
    $connection=mysqli_connect('127.0.0.1','root','asdzxc456','demo');

    if (!$connection) {
        exit('<h1>连接数据库失败</h1>');
    }

    //2.获得查询结果对象
    $query=mysqli_query($connection,"delete from user_demo where g_id=04");

    //var_dump($query);
    //判断$query的布尔类型
    if (!$query)
    {
        exit('<h1>删除失败</h1>');
    }


    //3.拿到受影响行
    //  传入的是连接对象
    $rows=mysqli_affected_rows($connection);


    var_dump($rows);
    //关闭连接
    mysqli_close($connection);

