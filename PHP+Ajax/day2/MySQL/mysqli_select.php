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
    $query=mysqli_query($connection,'select * from user_demo');

    //var_dump($query);
    //判断$query的布尔类型
    if (!$query)
    {
        exit('<h1>查询数据库失败</h1>');
    }


    //3.获得一行数据，每次获得一行
    while ($row=mysqli_fetch_assoc($query)) {
        var_dump($row);
    }


    //释放结果集
    mysqli_free_result($query);
    //关闭连接
    mysqli_close($connection);

