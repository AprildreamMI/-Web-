<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/21
 * Time: 23:30
 */

    //1.建立与数据库之间的连接
    $connection=mysqli_connect('127.0.0.1','root','asdzxc456','music');

    //2.检查是否连接正确
    if (!$connection) {
        die('连接失败');
    }

    //3.设置编码，防止中文乱码
    mysqli_query($connection,'set names utf8');

    //4.设置当前连接数据库 use
    mysqli_select_db($connection,'music');

    //5.获得查询结果集
    $query=mysqli_query($connection,"select * from music_demo1");

    //6.检查是否返回了结果集
    if (!$query) {
        die('查询失败');
    }

    while ($row=mysqli_fetch_assoc($query))
    {
        //关联数组
        $rows[]=$row;
    }


    //释放结果集
    mysqli_free_result($query);
    //关闭连接
    mysqli_close($connection);


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
        .table th, .table td{
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="container my-3">
        <h1 class="display-1">音乐列表</h1>
        <button class="btn btn-success my-3" onclick="location.href='base.php'">添加音乐</button>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>名字</th>
                    <th>歌手</th>
                    <th>封面</th>
                    <th>播放</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
<!--                <!--<tr>-->
<!--                    <td>59d632855434e</td>-->
<!--                    <td>完美生活</td>-->
<!--                    <td>许巍</td>-->
<!--                    <td><img src="img/许巍.jpg"></td>-->
<!--                    <td><audio src="mp3/许巍%20-%20完美生活%20-%20吉他伴奏版.mp3" controls></audio></td>-->
<!--                    <td><button class="btn btn-info" id="removeBtn">删除</button></td>-->
<!--                </tr>-->

                <?php foreach ($rows as $key => $value): ?>
                <tr>
	                    <td><?php echo $value['m_ID'] ?></td>
	                    <td><?php echo $value['m_Title'] ?></td>
	                    <td><?php echo $value['m_Author'] ?></td>
                        <td><img src="<?php echo $value['m_Cover'] ?>" alt=""></td>
                        <td><audio src="<?php echo $value['m_Mp3'] ?>" controls></audio></td>
                        <td><a class="btn btn-danger btn-sm" href="delete.php?id=<?php echo $value['m_ID'] ?>">删除</a></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <script>

        function removeBtn(btn) {
                btn.parentNode.parentNode.style.display="none";
            }

    </script>
</body>
</html>
