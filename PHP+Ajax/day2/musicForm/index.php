<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/21
 * Time: 23:30
 */

    $music_arr=file_get_contents("music.txt");
    $music_list=explode("\n",$music_arr);
    foreach ($music_list as $key => $value) {
        $music_list_ele[]=explode("|",$value);
    }
    unset($music_list_ele[count($music_list_ele)-1]);
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
                <?php foreach ($music_list_ele as $key => $value): ?>
                	<tr>
                        <?php foreach ($value as $key => $tim): ?>
                        	<td>
                                <?php
                                    switch ($key) {
                                            case '0':
                                                echo $tim;
                                                break;

                                            case '1':
                                                echo $tim;
                                                break;

                                            case '2':
                                                echo $tim;
                                                break;

                                            case '3':
                                                echo "<img src='$tim'>";
                                                break;

                                            case '4':
                                                echo "<audio src='$tim' controls></audio>";
                                                break;

                                            default:
                                                break;
                                    }
                                ?>
                            </td>
                        <?php endforeach ?>
                        <td><button class="btn btn-info" onclick=removeBtn(this)>删除</button></td>
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
