<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/21
 * Time: 23:30
 */

    $music_arr=file_get_contents('music.json');
    $music_arr_object=json_decode($music_arr);  //进行JSON解析，加上true可以变为关联数组格式
                                                //JSON其数据中不能出现空格，但可以用中横线-，或者下横线_
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
                <!--<tr>
                    <td>59d632855434e</td>
                    <td>完美生活</td>
                    <td>许巍</td>
                    <td><img src="img/许巍.jpg"></td>
                    <td><audio src="mp3/许巍%20-%20完美生活%20-%20吉他伴奏版.mp3" controls></audio></td>
                    <td><button class="btn btn-info" id="removeBtn">删除</button></td>
                </tr>-->
                <?php foreach ($music_arr_object as $key => $item): ?>
                	<tr>
                        <td><?php echo $item->id ?></td>
                        <td><?php echo $item->musicName ?></td>
                        <td><?php echo $item->musicAuthor ?></td>
                        <td><img src=<?php echo $item->musicCover ?> /></td>
                        <td><audio src=<?php echo $item->musicMp3 ?> controls></audio></td>
                        <td><a class="btn btn-danger btn-sm" href="delete.php?id=<?php echo $item->id ?>">删除</a></td>
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
