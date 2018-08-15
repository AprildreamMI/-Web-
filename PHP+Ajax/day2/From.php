
<?php
    if ($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $arr=$_POST;
        foreach ($arr as $key => $value) {
        	echo $value."<br>";
        }
    }
?>
<foreach></foreach>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>php表单</title>
</head>
<body>
<!--    <form action="From.php" method=post>-->
<!--    便于维护，不能写死文件名字-->
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method=post>
        用户名：<input type="text" name="userName"><br>
        密  码：<input type="password" name="userPassword"><br>
        <input type="submit" value="登录">
    </form>
</body>
</html>