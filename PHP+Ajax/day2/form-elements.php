<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/21
 * Time: 16:39
 */
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    var_dump($_POST);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        性别
        <label><input type="radio" name="男" value="male">男</label>
        <lable><input type="radio" name="女" value="female">女</lable>

        <br><br>

        <input type="checkbox" name="funs[]" value="footbox">足球
        <input type="checkbox" name="funs[]" value="basketbox">篮球
        <input type="checkbox" name="funs[]" value="earth">地球

        <input type="checkbox" name="xieyi" value="yes">是否同意注册协议

        <section>
            <option>激活</option>
            <option>未激活</option>
            <option>待激活</option>
        </section>

        <br><br><br>

        <file>

        </file>

        <button type=submit>提交</button>
    </form>
</body>
</html>
