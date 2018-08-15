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

    $connection=mysqli_connect('127.0.0.1','root','asdzxc456','music');
    if (!$connection) {
        die('连接数据库失败');
    }
    mysqli_query($connection,"set names utf8");

    mysqli_select_db($connection,'music');
    $query=mysqli_query($connection,"delete from music_demo1 where m_id='$id'");
    if (!$query) {
        die('删除此音乐条失败');
    }

    mysqli_close($connection);
    header('Location: index.php');
